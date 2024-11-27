<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function flag(){
        return $this->hasOne(Flag::class);
    }

    public function governors(){
        return $this->hasMany(Governor::class);
    }

    public function senators(){
        return $this->hasMany(Senator::class);
    }

    public function presElectors(){
        return $this->hasMany(PresElector::class);
    }
}
