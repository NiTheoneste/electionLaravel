<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongressMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function party(){
        return $this->belongsTo(Party::class);
    }
}
