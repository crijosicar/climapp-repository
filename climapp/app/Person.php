<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {

    protected $fillable = ["email", "id_born_city", "id_gender", "id_state", "last_name", "name", "phone"];

    protected $dates = ["birth_date"];

    public static $rules = [
        "birth_date" => "required",
        "email" => "required",
        "id_born_city" => "required",
        "id_gender" => "required",
        "id_state" => "required",
        "last_name" => "required",
        "name" => "required",
        "phone" => "required",
    ];

    // Relationships
    protected $table = 'person';
}
