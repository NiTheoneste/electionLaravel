<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    //protected $fillable = ['first_name', 'last_name', 'gender', 'age', 'state_id', 'party_id'];
    protected $guarded = [];

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
