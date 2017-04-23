<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueList extends Model {

    protected $fillable = ["scategory", "description", "value"];

    protected $guarded = ['id'];

    protected $dates = [];

    public static $rules = [
        "category" => "required",
        "description" => "required",
        "value" => "required",
    ];

    public $timestamps = false;

    // Relationships
    protected $table = 'value_list';
}
