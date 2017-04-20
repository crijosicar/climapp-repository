<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

    protected $fillable = ['nombre','email','telefono','contrasenhia'];

    protected $dates = ['started_at', 'published_at'];

    public static $rules = [
        "nombre" => "required",
        "email" => "email|required",
		"telefono" => "integer|min:13",
		"contrasenhia" => "required",
		"started_at" => "required",
		"published_at" => "required"
    ];

    // Relationships

}
