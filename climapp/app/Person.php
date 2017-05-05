<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model {

    use SoftDeletes;

    protected $fillable = ["email", "id_born_city", "id_gender", "id_state", "last_name", "name", "phone"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ["birth_date",'created_at','updated_at','deleted_at'];

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
    public function getIdAttribute($value)
    {
        return ucfirst($value);
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
     * @param  string  $value
     * @return string
     */
    public function getEmailAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the Person's id_born_city.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdBornCityAttribute($value)
    {
        $this->attributes['id_born_city'] = strtolower($value);
    }

    /**
     * Get the Person's id_born_city.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdBornCityAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the Person's id_gender.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdGenderAttribute($value)
    {
        $this->attributes['id_gender'] = strtolower($value);
    }

    /**
     * Get the Person's id_gender.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdGenderAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the Person's id_state.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdStateAttribute($value)
    {
        $this->attributes['id_state'] = strtolower($value);
    }

    /**
     * Get the Person's id_state.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdStateAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the Person's last_name.
     *
     * @param  string  $value
     * @return void
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }

    /**
     * Get the Person's last_name.
     *
     * @param  string  $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
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
    public function getNameAttribute($value)
    {
        return ucfirst($value);
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
    public function getPhoneAttribute($value)
    {
        return ucfirst($value);
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
    public function getCreatedAtAttribute($value)
    {
        return ucfirst($value);
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
    public function getUpdatedAtAttribute($value)
    {
        return ucfirst($value);
    }

}
