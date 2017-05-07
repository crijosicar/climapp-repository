<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccess extends Model {

    use SoftDeletes;

    protected $fillable = ["id_user", "state_login", "state_token", "token"];

    protected $hidden = ['id'];

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
    public function getCreatedAtAttribute($value)
    {
        return ucfirst($value);
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
    public function getUpdatedAtAttribute($value)
    {
        return ucfirst($value);
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
    public function getDeletedAtAttribute($value)
    {
        return ucfirst($value);
    }
}
