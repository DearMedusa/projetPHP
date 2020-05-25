
<?php

namespace ProjetPHP\models;

require_once './vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;

class Liste extends Model{

    protected $table = 'liste';
    protected $primaryKey = 'no';
    public $timestamps = false;
    
        public function user(){
    	return $this->belongsTo('\PHPProject\models\List','user_id')->first();


    	public function item() {
        return $this->hasMany('\wishlist\models\Item','liste_id')->get();
    }
}

?>
