<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Category\CategoryController;
use View;

class PostsController extends Controller
{
    
    public $post_id;


    public function __construct(PostRepository $postRepository,CategoryController $category,Request $request)
    {
        $this->postRepository = $postRepository;
        $this->request = $request;
        $this->category = $category;
    }

    public function index($cid)
    {
        $posts = $this->postRepository->getAllSameCategoryPosts($cid);
        $categoryDetail = $this->category->getCategory($cid);
        return view('posts.posts', compact('posts','cid','categoryDetail'));
        // return View::make('index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newpost($cid){
        return view('posts.posts',compact('cid'));
    }

    public function create()
    {
        $this->postRepository->newPost($this->request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // $title = $this->request->get('title');
        // $body = $this->request->get('body');
       
        $this->postRepository->storePost($this->request->all());
        $cid = $this->request->cid;
        // return view('posts.posts', compact('posts'));   
        return Redirect::route('posts.index', compact('cid'));
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pid)
    {
        $posts = $this->postRepository->getPost($pid);
        
        return view('posts.posts', compact('posts'));   
    }

    public function inactive($cid,$pid) {
        
        $this->postRepository->inactivePost($pid);    
        return Redirect::route('posts.index', compact('cid'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
