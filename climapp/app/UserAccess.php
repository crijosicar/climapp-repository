<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccess extends Model {

    use SoftDeletes;

    protected $fillable = ["id_user", "state_login", "state_token", "token"];

    protected $hidden = ['login_date', 'logout_date','created_at','updated_at','deleted_at'];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ["login_date", "logout_date",'created_at','updated_at','deleted_at'];

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
        $this->attributes['id'] = $value;
    }

    /**
     * Get the UserAccess's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    /**
     * Set the UserAccess's id_user.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdUserAttribute($value)
    {
        $this->attributes['id_user'] = $value;
    }

    /**
     * Get the UserAccess's id_user.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdUserAttribute()
    {
        return $this->attributes['id_user'];
    }
    
    /**
     * Set the UserAccess's login_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setLoginDateAttribute($value)
    {
        $this->attributes['login_date'] = $value;
    }

    /**
     * Get the UserAccess's login_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getLoginDateAttribute()
    {
        return $this->attributes['login_date'];
    }
    
    /**
     * Set the UserAccess's logout_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setLogoutDateAttribute($value)
    {
        $this->attributes['logout_date'] = $value;
    }

    /**
     * Get the UserAccess's logout_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getLogoutDateAttribute()
    {
        return $this->attributes['logout_date'];
    }

    /**
     * Set the UserAccess's state_login.
     *
     * @param  string  $value
     * @return void
     */
    public function setStateLoginAttribute($value)
    {
        $this->attributes['state_login'] = $value;
    }

    /**
     * Get the UserAccess's state_login.
     *
     * @param  string  $value
     * @return string
     */
    public function getStateLoginAttribute()
    {
        return $this->attributes['state_login'];
    }
    
    /**
     * Set the UserAccess's state_token.
     *
     * @param  string  $value
     * @return void
     */
    public function setStateTokenAttribute($value)
    {
        $this->attributes['state_token'] = $value;
    }

    /**
     * Get the UserAccess's state_token.
     *
     * @param  string  $value
     * @return string
     */
    public function getStateTokenAttribute()
    {
        return $this->attributes['state_token'];
    }
    
    /**
     * Set the UserAccess's token.
     *
     * @param  string  $value
     * @return void
     */
    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = $value;
    }

    /**
     * Get the UserAccess's token.
     *
     * @param  string  $value
     * @return string
     */
    public function getTokenAttribute()
    {
        return $this->attributes['token'];
    }

    /**
     * Set the UserAccess's created_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $value;
    }

    /**
     * Get the UserAccess's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'];
    }

    /**
     * Set the UserAccess's updated_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $value;
    }

    /**
     * Get the UserAccess's updated_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'];
    }

    /**
     * Set the UserAccess's deleted_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setDeletedAtAttribute($value)
    {
        $this->attributes['deleted_at'] = $value;
    }

    /**
     * Get the UserAccess's deleted_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getDeletedAtAttribute()
    {
        return $this->attributes['deleted_at'];
    }
}
