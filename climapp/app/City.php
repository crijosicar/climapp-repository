<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model {
    
    use SoftDeletes;

    protected $fillable = ["code", "id_state", "latitude", "longitude", "name", "value"];

    protected $hidden = ['created_at','updated_at','deleted_at'];

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
    public function getIdAttribute()
    {
        return $this->attributes['id'];
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
    public function getCodeAttribute()
    {
        return $this->attributes['code'];
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
    public function getIdStateAttribute()
    {
        return $this->attributes['id_state'];
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
    public function getLatitudeAttribute()
    {
        return $this->attributes['latitude'];
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
    public function getLongitudeAttribute()
    {
        return $this->attributes['longitude'];
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
    public function getNameAttribute()
    {
        return $this->attributes['name'];
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
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'];
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

    /**
     * Set the City's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $value;
    }

    /**
     * Get the City's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute()
    {
        return $this->attributes['value'];
    }
}
