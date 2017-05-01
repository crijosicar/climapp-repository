<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $fillable = ["code", "id_state", "latitude", "longitude", "name"];

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
    
    protected $dates = ['created_at','updated_at'];

    public static $rules = [
        "code" => "string|unique:City|required",
        "id_state" => "integer|required",
        "latitude" => "string|required",
        "longitude" => "string|required",
        "name" => "string|required",
    ];

    // Relationships
    protected $table = 'city';
}
