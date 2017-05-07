<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TUser extends Model {

    use SoftDeletes;

    protected $fillable = ["id_person", "password", "user_name"];

    protected $hidden = ['password'];

    protected $guarded = ['id'];
    
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
    public function getIdAttribute($value)
    {
        return ucfirst($value);
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
    public function getIdPersonAttribute($value)
    {
        return ucfirst($value);
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
    public function getPasswordAttribute($value)
    {
        return ucfirst($value);
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
    public function getUserNameAttribute($value)
    {
        return ucfirst($value);
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
    public function getCreatedAtAttribute($value)
    {
        return ucfirst($value);
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
    public function getUpdatedAtAttribute($value)
    {
        return ucfirst($value);
    }
}
