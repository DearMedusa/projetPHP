
<?php

namespace PHPProject\models;

require_once './vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;
use \PHPProject\models\Liste;


class Item extends Model{

    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
     public function list(){
    	return $this->belongsTo('\PHPProject\models\list','list_id')->first();
     }
}
?>
