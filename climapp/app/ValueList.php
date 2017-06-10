<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValueList extends Model {

    use SoftDeletes;

    protected $fillable = ["category", "description", "value"];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ['created_at','updated_at','deleted_at'];

    public static $rules = [
        "category" => "required",
        "description" => "required",
        "value" => "required|unique:value_list",
    ];
    
    // Relationships
    protected $table = 'value_list';

    /**
     * Set the ValueList's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = $value;
    }

    /**
     * Get the ValueList's id.
     *
     * @param  string  $value
     * @return string
     */
    public function getIdAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ValueList's category.
     *
     * @param  string  $value
     * @return void
     */
    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = strtoupper($value);
    }

    /**
     * Get the ValueList's category.
     *
     * @param  string  $value
     * @return string
     */
    public function getCategoryAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ValueList's description.
     *
     * @param  string  $value
     * @return void
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtolower($value);
    }

    /**
     * Get the ValueList's description.
     *
     * @param  string  $value
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ValueList's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = strtoupper($value);
    }

    /**
     * Get the ValueList's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        return $value;
    }

    

    /**
     * Set the ValueList's created_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $value;
    }

    /**
     * Get the ValueList's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ValueList's updated_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $value;
    }

    /**
     * Get the ValueList's updated_at.
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
}
