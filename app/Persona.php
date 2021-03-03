<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = ['nombres', 'apellidos', 'direccion', 'ci'];

    public function user() {
    	return $this->hasOne('App\User');
    }

    public function peliculas() {
    	return $this->belongsToMany('App\Pelicula')	// persona_id, pelicula_id
    				->withTimestamps()				// created_at, updated_at
    				->withPivot('cantidad');		// cantidad
    }
}
