<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValueList extends Model {

    use SoftDeletes;

    protected $fillable = ["category", "description", "value"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ['created_at','updated_at','deleted_at'];

    public static $rules = [
        "category" => "required",
        "description" => "required",
        "value" => "required",
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
        return ucfirst($value);
    }

    /**
     * Set the ValueList's category.
     *
     * @param  string  $value
     * @return void
     */
    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = strtolower($value);
    }

    /**
     * Get the ValueList's category.
     *
     * @param  string  $value
     * @return string
     */
    public function getCategoryAttribute($value)
    {
        return ucfirst($value);
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
        return ucfirst($value);
    }

    /**
     * Set the ValueList's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = strtolower($value);
    }

    /**
     * Get the ValueList's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        return ucfirst($value);
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
        return ucfirst($value);
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
        return ucfirst($value);
    }
}
