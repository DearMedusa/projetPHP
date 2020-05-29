<?php

namespace PHPProject\models;

use \Illuminate\Database\Eloquent\Model;
use \PHPProject\models\Liste;

class User extends Model{

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
?>
