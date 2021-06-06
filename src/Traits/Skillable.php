<?php

namespace Informate\Traits;

use Informate\Models\Entytys\About\Skill;
use Illuminate\Database\Eloquent\Model;

trait Skillable
{
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    //  */
    // public function transactions($amount = null)
    // {
    //     return $this->morphMany(Transaction::class, 'skillable')->orderBy('created_at', 'desc')->take($amount);
    // }

    /**
     * Get all of the skills for the post.
     */
    public function skills()
    {
        return $this->morphToMany(Skill::class, 'skillable');
    }
    // /**
    //  *
    //  * @return mix
    //  */
    // public function averageSkill($round= null)
    // {
    //   if ($round) {
    //         return $this->transactions()
    //           ->selectRaw('ROUND(AVG(amount), '.$round.') as averageSkillTransaction')
    //           ->pluck('averageSkillTransaction');
    //     }
    //
    //     return $this->transactions()
    //         ->selectRaw('AVG(amount) as averageSkillTransaction')
    //         ->pluck('averageSkillTransaction');
    // }
    //
    // /**
    //  *
    //  * @return mix
    //  */
    // public function countSkill(){
    //   return $this->transactions()
    //       ->selectRaw('count(amount) as countTransactions')
    //       ->pluck('countTransactions');
    // }
    //
    // /**
    //  *
    //  * @return mix
    //  */
    // public function sumSkill()
    // {
    //     return $this->transactions()
    //         ->selectRaw('SUM(amount) as sumSkillTransactions')
    //         ->pluck('sumSkillTransactions');
    // }
    //
    // /**
    //  * @param $max
    //  *
    //  * @return mix
    //  */
    // public function skillPercent($max = 5)
    // {
    //     $transactions = $this->transactions();
    //     $quantity = $transactions->count();
    //     $total = $transactions->selectRaw('SUM(amount) as total')->pluck('total');
    //     return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 100) : 0;
    // }

    // /**
    //  *
    //  * @return mix
    //  */
    // public function countTransactions()
    // {
    //     return $this->transactions()
    //         ->count();
    // }

    // /**
    //  *
    //  * @return double
    //  */
    // public function currentSkills()
    // {
    //     return (new Transaction())->getCurrentSkills($this);
    // }

    // /**
    //  * @param $amount
    //  * @param $message
    //  * @param $data
    //  *
    //  * @return static
    //  */
    // public function addSkills($amount, $message, $data = null)
    // {
    //     return (new Transaction())->addTransaction($this, $amount, $message, $data = null);
    // }
}
