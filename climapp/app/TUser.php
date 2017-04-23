<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TUser extends Model {

    protected $fillable = ["id_person", "password", "user_name"];

    protected $guarded = ['id'];

    protected $dates = [];

    public static $rules = [
        "password" => "required",
        "user_name" => "required",
    ];

    public $timestamps = false;

    // Relationships
    protected $table = 't_user';
}
