<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseUtil extends Model {

    protected $fillable = ["code", "id_state", "latitude", "longitude", "name"];

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
    
    protected $dates = ['created_at','updated_at'];

    public static $rules = [
        "code" => "string|unique:city|required",
        "id_state" => "integer|required",
        "latitude" => "string|required",
        "longitude" => "string|required",
        "name" => "string|required",
    ];

    // Relationships
    protected $table = 'city';

    /**
     * Set the city's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = strtolower($value);
    }

    /**
     * Get the city's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the city's code.
     *
     * @param  string  $value
     * @return void
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtolower($value);
    }

    /**
     * Get the city's code.
     *
     * @param  string  $value
     * @return string
     */
    public function getCodeAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the city's id_state.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdStateAttribute($value)
    {
        $this->attributes['id_state'] = strtolower($value);
    }

    /**
     * Get the city's id_state.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdStateAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the city's latitude.
     *
     * @param  string  $value
     * @return void
     */
    public function setLatitudeAttribute($value)
    {
        $this->attributes['latitude'] = strtolower($value);
    }

    /**
     * Get the city's latitude.
     *
     * @param  string  $value
     * @return string
     */
    public function getLatitudeAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the city's longitude.
     *
     * @param  string  $value
     * @return void
     */
    public function setLongitudeAttribute($value)
    {
        $this->attributes['longitude'] = strtolower($value);
    }

    /**
     * Get the city's longitude.
     *
     * @param  string  $value
     * @return string
     */
    public function getLongitudeAttribute($value)
    {
        return ucfirst($value);
    }
    
    
    /**
     * Set the city's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * Get the city's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the city's created_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = strtolower($value);
    }

    /**
     * Get the city's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return ucfirst($value);
    }

     /**
     * Set the city's updated_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = strtolower($value);
    }

    /**
     * Get the city's updated_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return ucfirst($value);
    }
}
