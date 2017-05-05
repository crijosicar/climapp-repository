<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TUser extends Model {

    protected $fillable = ["id_person", "password", "user_name"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';
    
    protected $dates = ['created_at','updated_at'];

    public static $rules = [
        "password" => "required",
        "user_name" => "required|unique:t_user",
    ];

    public $timestamps = false;

    // Relationships
    protected $table = 't_user';
}
