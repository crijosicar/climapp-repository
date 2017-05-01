<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {

    protected $fillable = ["email", "id_born_city", "id_gender", "id_state", "last_name", "name", "phone"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ["birth_date",'created_at','updated_at'];

    public static $rules = [
        "birth_date" => "required",
        "email" => "required|unique:Person",
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
