<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model {

    protected $fillable = ["id_user", "state_login", "state_token", "token"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ["login_date", "logout_date",'created_at','updated_at'];

    public static $rules = [
        "id_user" => "required",
        "state_login" => "required",
        "state_token" => "required",
        "token" => "required",
        "login_date" => "required",
        "logout_date" => "required",
    ];

    // Relationships
    protected $table = 'user_access';

    /**
     * Set the UserAccess's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = strtolower($value);
    }

    /**
     * Get the UserAccess's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the UserAccess's id_user.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdUserAttribute($value)
    {
        $this->attributes['id_user'] = strtolower($value);
    }

    /**
     * Get the UserAccess's id_user.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdUserAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the UserAccess's state_login.
     *
     * @param  string  $value
     * @return void
     */
    public function setStateLoginAttribute($value)
    {
        $this->attributes['state_login'] = strtolower($value);
    }

    /**
     * Get the UserAccess's state_login.
     *
     * @param  string  $value
     * @return string
     */
    public function getStateLoginAttribute($value)
    {
        return ucfirst($value);
    }
}
