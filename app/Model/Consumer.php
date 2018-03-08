<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    public $timestamps = false;
    protected $table = "consumer";
    protected  $primaryKey = "consumerId";

    protected $fillable = [
        'consumerId',
        'groupId',
        'login',
        'password',
        'email'
    ];
}
