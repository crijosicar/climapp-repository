<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityPerson extends Model {

    use SoftDeletes;

    protected $fillable = ["id_city", "id_person"];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ['created_at','updated_at','deleted_at'];

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
    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    /**
     * Set the CityPerson's id_city.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdCityAttribute($value)
    {
        $this->attributes['id_city'] = $value;
    }

    /**
     * Get the CityPerson's id_city.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdCityAttribute()
    {
        return $this->attributes['id_city'];
    }

    /**
     * Set the CityPerson's id_person.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdPersonAttribute($value)
    {
        $this->attributes['id_person'] = $value;
    }

    /**
     * Get the CityPerson's id_person.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdPersonAttribute()
    {
        return $this->attributes['id_person'];
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
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'];
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
