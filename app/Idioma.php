<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = 'idiomas';

    public function peliculas() {
    	return $this->hasMany('App\Pelicula');
    }
}
