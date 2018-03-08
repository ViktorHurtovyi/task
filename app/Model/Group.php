<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;
    protected $table = "group";
    protected  $primaryKey = "groupId";

    protected $fillable = [
        'groupId',
        'name'
    ];
}
