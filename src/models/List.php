
<?php

namespace ProjetPHP\models;

require_once './vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;

class Liste extends Model{

    protected $table = 'liste';
    protected $primaryKey = 'no';
    public $timestamps = false;
}

?>
