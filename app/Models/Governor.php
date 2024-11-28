<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governor extends Model
{
    use HasFactory;
    //protected $fillable = ['first_name', 'last_name', 'gender', 'age', 'state_id', 'party_id'];
    protected $guarded = [];

    public function state(){
	    return $this->belongsTo(State::class);
	}
	    
    public function party(){
        return $this->belongsTo(Party::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
