<?php
/**
 * 0 -> Founder
 * 1 -> Co-Founder
 * 2 -> Sócio
 * 3 -> Assalariado
 */
namespace Informate\Models\Business;

use Pedreiro\Models\Base;

class CollaboratorType extends Base
{

    /**
     * @var false
     */
    protected bool $organizationPerspective = false;

    protected $table = 'business_collaborator_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id',
        'business_id',
        'business_collaborator_type_id',
    ];


    /**
     * @var string[][]
     *
     * @psalm-var array{customer_id: array{type: string, analyzer: string}, credit_card_id: array{type: string, analyzer: string}, user_id: array{type: string, analyzer: string}, score: array{type: string, analyzer: string}}
     */
    protected array $mappingProperties = array(

        'customer_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'credit_card_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'user_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'score' => [
            'type' => 'float',
            "analyzer" => "standard",
        ],
    );


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Illuminate\Support\Facades\Config::get('application.directorys.models.users', \App\Models\User::class), 'user_id', 'id');
    }
}
