<?php

namespace Informate\Models;

use Support\Models\Base as BaseModel;
use App\Services\Normalizer;
use Informate\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Informate\TraitsBusinessTrait;
use Informate\Models\System\Archive;

class Event extends BaseModel
{
    use Translatable, SoftDeletes; //, BusinessTrait;

    public $table = 'events';

    public $primaryKey = 'id';

    protected $guarded = [];

    public $rules = [
        'title' => 'required',
    ];

    protected $appends = [
        'translations',
    ];

    protected $fillable = [
        'start_date',
        'end_date',
        'title',
        'details',
        'seo_description',
        'seo_keywords',
        'is_published',
        'template',
        'published_at',
    ];

    protected $dates = [
        'published_at' => 'Y-m-d H:i'
    ];

    public function __construct(array $attributes = [])
    {
        $keys = array_keys(request()->except('_method', '_token'));
        $this->fillable(array_values(array_unique(array_merge($this->fillable, $keys))));
        parent::__construct($attributes);
    }

    public function getDetailsAttribute($value)
    {
        return new Normalizer($value);
    }

    public function history()
    {
        return Archive::where('entity_type', get_class($this))->where('entity_id', $this->id)->get();
    }
}
