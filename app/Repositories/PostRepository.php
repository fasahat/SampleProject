<?php

namespace App\Repositories;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Input;

class PostRepository {

    function __construct(Category $category,Post $post) 
    {
        $this->category = $category;
        $this->post = $post;
    }

    public function getAllCategories()
    {
        return $this->category->get();
        
    }

    

    public function getAllSameCategoryPosts($id)
    {
        return $this->post->where('category_id','=',$id)->where('status','=',1)->get();
    }

    public function getPost($pid) {
        return $this->post->where('id','=',$pid)->get();
    }


    public function storePost($inputs){
        
        if($this->post->validate($inputs)){
            $this->post->title = $inputs['title'];
            $this->post->body = $inputs['body'];
            $this->post->category_id = $inputs['cid'];
            $this->post->status = 1;
            $this->post->save();
        } 
    }

    public function inactivePost($pid) {
        $this->post->where('id','=',$pid)->update(['status' => '0']);
        // $this->post->findOrFail($pid)->delete();

    }
} 