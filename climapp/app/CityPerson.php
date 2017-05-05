<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CityPerson extends Model {

    protected $fillable = ["id_city", "id_person"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ['created_at','updated_at'];

    public static $rules = [
        "id_city" => "numeric|required",
        "id_person" => "numeric|required",
    ];

    // Relationships
    protected $table = 'city_person';

    /**
     * Set the CityPerson's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = $value;
    }

    /**
     * Get the CityPerson's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the CityPerson's id_city.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdCityAttribute($value)
    {
        $this->attributes['id_city'] = strtolower($value);
    }

    /**
     * Get the CityPerson's id_city.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdCityAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the CityPerson's id_person.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdPersonAttribute($value)
    {
        $this->attributes['id_person'] = strtolower($value);
    }

    /**
     * Get the CityPerson's id_person.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdPersonAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the CityPerson's created_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $value;
    }

    /**
     * Get the CityPerson's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the CityPerson's updated_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $value;
    }

    /**
     * Get the CityPerson's updated_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return ucfirst($value);
    }

}
