<?php

namespace PHPProject\models;

use \Illuminate\Database\Eloquent\Model;
use \PHPProject\models\Liste;

class Item extends Model{

    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
?>
