<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $fillable = [
        'area', 'state_id'
    ];

    protected $appends = [
        'stateOwner'
    ];

    public function state() {
        return $this->hasOne(State::class);
    }

    public function getStateOwnerAttribute() {
        $state = \App\State::where('id', $this->state_id)->first();

        return $state;
    }
}
