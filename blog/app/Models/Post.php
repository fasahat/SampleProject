<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Post extends Model
{
    //use SluggableTrait;
	// protected $sluggable = [
 //        'build_from' => 'title',
 //        'save_to'    => 'slug',
 //        'on_update'  => true,
 //    ];

    // public function comments() {
    //     return $this->hasMany('App\Models\Comment');
    // }
	private $rules = [
        'body' => 'required|min:3',
        'title' => 'required|min:3'
    ];

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        // return the result
        return $v->passes();
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    // public function nestedComments() 
    // {
    //     return $this->hasMany('App\Models\Comment')->where('parent_id', 0);
    // }
    
    public function setTitleAttribute($value)
    {
	    $this->attributes['title'] = $value;
		// $this->attributes['slug'] = str_slug($value);
	}

}
