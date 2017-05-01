<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueList extends Model {

    protected $fillable = ["category", "description", "value"];

    protected $guarded = ['id'];
    
    protected $primaryKey = 'id';

    protected $dates = ['created_at','updated_at'];

    public static $rules = [
        "category" => "required",
        "description" => "required",
        "value" => "required",
    ];
    
    // Relationships
    protected $table = 'value_list';
}
