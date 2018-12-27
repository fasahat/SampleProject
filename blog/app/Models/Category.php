<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Validator;

class Category extends Model
{
	private $rules = [
        'title' => 'required|min:3'
    ];

    protected $fillable = ['title'];

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        // dd($v->passes());
        // return the result
        return $v->passes();
        
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
}
