<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
class CategoryRepository {

    function __construct(Category $category) 
    {
        $this->category = $category;
        // $this->post = $post;
    }

    public function getCategoryDet($cid){
        return $this->category->where('id','=',$cid)->get();
    }

    public function getAllCategories()
    {
        // return $this->post->get();
        return $this->category->get();
        // return $this->category->with(['posts' => function($q){
        //     $q->with('user')->with('comments');
        // }])->get();

    }

  	
  	public function storeCat($inputs) {
  		if($this->category->validate($inputs)){
            $this->category->title = $inputs['title'];
            
            $this->category->status = 1;
            $this->category->save();
        }
  	}


} 