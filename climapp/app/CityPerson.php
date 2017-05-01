<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CityPerson extends Model {

    protected $fillable = ["id_city", "id_person"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ['created_at','updated_at'];

    public static $rules = [
        "id_city" => "numeric|required",
        "id_person" => "numeric|required",
    ];

    // Relationships
    protected $table = 'city_person';
}
