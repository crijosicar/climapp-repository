<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CityPerson extends Model {

    protected $fillable = ["id", "id_city", "id_person"];

    protected $dates = [];

    public static $rules = [
        "id_city" => "numeric|required",
        "id_person" => "numeric|required",
    ];

    public $timestamps = false;

    // Relationships
    protected $table = 'city_person';
}
