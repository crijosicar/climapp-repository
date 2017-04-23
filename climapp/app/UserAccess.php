<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model {

    protected $fillable = ["id_user", "state_login", "state_token", "token"];

    protected $guarded = ['id'];

    protected $dates = ["login_date", "logout_date"];

    public static $rules = [
        "id_user" => "required",
        "state_login" => "required",
        "state_token" => "required",
        "token" => "required",
        "login_date" => "required",
        "logout_date" => "required",
    ];

    public $timestamps = false;

    // Relationships
    protected $table = 'user_access';
}
