<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model {

    use SoftDeletes;

    protected $fillable = ["email", "id_born_city", "id_gender", "id_state", "lastname", "name", "phone"];

    protected $hidden = ['birth_date','created_at','updated_at','deleted_at'];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ["birth_date",'created_at','updated_at','deleted_at'];

    public static $rules = [
        "birth_date" => "required",
        "email" => "required|unique:Person",
        "id_born_city" => "required",
        "id_gender" => "required",
        "id_state" => "required",
        "lastname" => "required",
        "name" => "required",
        "phone" => "required",
    ];

    // Relationships
    protected $table = 'person';

    /**
     * Set the Person's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = $value;
    }

    /**
     * Get the Person's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    /**
     * Set the Person's email.
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * Get the Person's email.
     *
     * @return string
     */
    public function getEmailAttribute()
    {
        return $this->attributes['email'];
    }

    /**
     * Set the Person's id_born_city.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdBornCityAttribute($value)
    {
        $this->attributes['id_born_city'] = $value;
    }

    /**
     * Get the Person's id_born_city.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdBornCityAttribute()
    {
        return $this->attributes['id_born_city'];
    }

    /**
     * Set the Person's id_gender.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdGenderAttribute($value)
    {
        $this->attributes['id_gender'] = $value;
    }

    /**
     * Get the Person's id_gender.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdGenderAttribute()
    {
        return $this->attributes['id_gender'];
    }

    /**
     * Set the Person's id_state.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdStateAttribute($value)
    {
        $this->attributes['id_state'] = $value;
    }

    /**
     * Get the Person's id_state.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdStateAttribute()
    {
        return $this->attributes['id_state'];
    }

    /**
     * Set the Person's last_name.
     *
     * @param  string  $value
     * @return void
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['lastname'] = strtolower($value);
    }

    /**
     * Get the Person's last_name.
     *
     * @param  string  $value
     * @return string
     */
    public function getLastNameAttribute()
    {
        return $this->attributes['lastname'];
    }

    /**
     * Set the Person's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * Get the Person's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->attributes['name'];
    }

    /**
     * Set the Person's phone.
     *
     * @param  string  $value
     * @return void
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = $value;
    }

    /**
     * Get the Person's phone.
     *
     * @param  string  $value
     * @return string
     */
    public function getPhoneAttribute()
    {
        return $this->attributes['phone'];
    }
    
    /**
     * Set the Person's birth_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value;
    }

    /**
     * Get the Person's phone.
     *
     * @param  string  $value
     * @return string
     */
    public function getBirthDateAttribute()
    {
        return $this->attributes['birth_date'];
    }

    /**
     * Set the Person's created_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $value;
    }

    /**
     * Get the Person's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'];
    }

    /**
     * Set the Person's updated_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $value;
    }

    /**
     * Get the Person's updated_at.
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
