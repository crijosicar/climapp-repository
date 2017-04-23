<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $fillable = ["code", "id_state", "latitude", "longitude", "name"];

    protected $guarded = ['id'];

    protected $dates = [];

    public static $rules = [
        "code" => "string|required",
        "id_state" => "integer|required",
        "latitude" => "string|required",
        "longitude" => "string|required",
        "name" => "string|required",
    ];

    public $timestamps = false;

    // Relationships
    protected $table = 'city';
}
