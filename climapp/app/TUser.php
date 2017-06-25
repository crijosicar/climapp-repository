<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class TUser extends Model {

    use SoftDeletes;
    use AuthenticableTrait;

    protected $fillable = ["id_person", "password", "user_name"];

    protected $hidden = ['password', 'terms', 'api_token', 'created_at', 'updated_at', 'deleted_at'];

    protected $guarded = ['id', 'terms', 'api_token'];
    
    protected $primaryKey = 'id';
    
    protected $dates = ['created_at','updated_at','deleted_at'];

    public static $rules = [
        "password" => "required",
        "user_name" => "required|unique:t_user",
    ];

    // Relationships
    protected $table = 't_user';

    /**
     * Set the TUser's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = $value;
    }

    /**
     * Get the TUser's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    /**
     * Set the TUser's id_person.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdPersonAttribute($value)
    {
        $this->attributes['id_person'] = $value;
    }

    /**
     * Get the TUser's id_person.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdPersonAttribute()
    {
        return $this->attributes['id_person'];
    }

    /**
     * Set the TUser's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }

    /**
     * Get the TUser's password.
     *
     * @param  string  $value
     * @return string
     */
    public function getPasswordAttribute()
    {
        return $this->attributes['password'];
    }

    /**
     * Set the TUser's user_name.
     *
     * @param  string  $value
     * @return void
     */
    public function setUserNameAttribute($value)
    {
        $this->attributes['user_name'] = strtolower($value);
    }

    /**
     * Get the TUser's user_name.
     *
     * @param  string  $value
     * @return string
     */
    public function getUserNameAttribute()
    {
        return $this->attributes['user_name'];
    }
    
    /**
     * Set the TUser's user_name.
     *
     * @param  string  $value
     * @return void
     */
    public function setTermsAttribute($value)
    {
        $this->attributes['terms'] = $value;
    }

    /**
     * Get the TUser's user_name.
     *
     * @param  string  $value
     * @return string
     */
    public function getTermsAttribute()
    {
        return $this->attributes['terms'];
    }
    
    /**
     * Set the TUser's api_token.
     *
     * @param  string  $value
     * @return void
     */
    public function setApiTokenAttribute($value)
    {
        $this->attributes['api_token'] = $value;
    }

    /**
     * Get the TUser's api_token.
     *
     * @param  string  $value
     * @return string
     */
    public function getApiTokenAttribute()
    {
        return $this->attributes['api_token'];
    }

    /**
     * Set the TUser's created_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $value;
    }

    /**
     * Get the TUser's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'];
    }

    /**
     * Set the TUser's updated_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $value;
    }

    /**
     * Get the TUser's updated_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'];
    }

    /**
     * Set the City's deleted_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setDeletedAtAttribute($value)
    {
        $this->attributes['deleted_at'] = $value;
    }

    /**
     * Get the City's deleted_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getDeletedAtAttribute()
    {
        return $this->attributes['deleted_at'];
    }
}
