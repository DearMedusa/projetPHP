
<?php

namespace ProjetPHP\models;

require_once './vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;
use \ProjetPhp\models\liste;


class Item extends Model{

    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
?>
