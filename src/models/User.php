
<?php

namespace ProjetPHP\models;

require_once './vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;
use \ProjetPhp\models\liste;


class User extends Model{

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

?>
