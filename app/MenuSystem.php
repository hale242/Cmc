<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuSystem extends Model
{
    protected $table = 'menu_system';
 
    protected $primaryKey = 'menu_system_id';

    public function MenuSystemLang(){
        return $this->hasMany('\App\MenuSystemLang', 'menu_system_id', 'menu_system_id');
    }
}
