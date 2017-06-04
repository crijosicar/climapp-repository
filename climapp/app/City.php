<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model {
    
    use SoftDeletes;

    protected $fillable = ["code", "id_state", "latitude", "longitude", "name", "value"];

    protected $hidden = ['id','created_at','updated_at','deleted_at'];

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
    
    protected $dates = ['created_at','updated_at','deleted_at'];

    public static $rules = [
        "code" => "string|unique:city|required",
        "id_state" => "integer|required",
        "latitude" => "string|required",
        "longitude" => "string|required",
        "name" => "string|required",
        "value" => "string|required"
    ];

    // Relationships
    protected $table = 'city';

    /**
     * Set the City's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = $value;
    }

    /**
     * Get the City's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute($value)
    {
        return $value;
    }

    /**
     * Set the City's code.
     *
     * @param  string  $value
     * @return void
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = $value;
    }

    /**
     * Get the City's code.
     *
     * @param  string  $value
     * @return string
     */
    public function getCodeAttribute($value)
    {
        return $value;
    }

    /**
     * Set the City's id_state.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdStateAttribute($value)
    {
        $this->attributes['id_state'] = $value;
    }

    /**
     * Get the City's id_state.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdStateAttribute($value)
    {
        return $value;
    }

    /**
     * Set the City's latitude.
     *
     * @param  string  $value
     * @return void
     */
    public function setLatitudeAttribute($value)
    {
        $this->attributes['latitude'] = $value;
    }

    /**
     * Get the City's latitude.
     *
     * @param  string  $value
     * @return string
     */
    public function getLatitudeAttribute($value)
    {
        return $value;
    }

    /**
     * Set the City's longitude.
     *
     * @param  string  $value
     * @return void
     */
    public function setLongitudeAttribute($value)
    {
        $this->attributes['longitude'] = $value;
    }

    /**
     * Get the City's longitude.
     *
     * @param  string  $value
     * @return string
     */
    public function getLongitudeAttribute($value)
    {
        return $value;
    }
    
    
    /**
     * Set the City's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    /**
     * Get the City's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return $value;
    }

    /**
     * Set the City's created_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $value;
    }

    /**
     * Get the City's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return $value;
    }

     /**
     * Set the City's updated_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $value;
    }

    /**
     * Get the City's updated_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return $value;
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
        return $value;
    }

    /**
     * Set the City's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAtAttribute($value)
    {
        $this->attributes['value'] = $value;
    }

    /**
     * Get the City's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAtAttribute($value)
    {
        return $value;
    }
}
