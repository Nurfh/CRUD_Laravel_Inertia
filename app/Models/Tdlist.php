<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tdlist extends Model
{
    use HasFactory;

    public function user(){
        //this is one-many inverse eloquent relationship
        //User is a model class
        return $this->belongsTo(User::class);
    }

    //nama model merujuk kepada object
}
