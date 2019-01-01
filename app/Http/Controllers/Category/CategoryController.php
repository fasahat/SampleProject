<?php
namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
// use App\Category;
use App\Http\Requests;
use App\Repositories\CategoryRepository;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use \Validator;
class CategoryController extends Controller
{

    public function __construct(CategoryRepository $CategoryRepository,Category $Category)
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    public function index(){
        return response()->json(Category::get(), 200);
    }

    public function show($id) {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(null,404);
        }
        return response()->json($category,200);
    }

    public function store(Request $request) {
        
        $validator = $this->validate($request, [
            'title' => 'required|min:3|max:15',
        ]);

        if (!$validator)
        {
           $category = Category::create($request->all());
            return response()->json($category, 201);
        } else {
            return response()->json(null,204);
        }     
    }

    public function update(Request $request,Category $category,$id){
        $category->where('id', $id)->update($request->all());
        return response()->json($category,200);
    }

    public function delete(Request $request,Category $category,$id) {
        $category->where('id', $id)->delete();
        return response()->json(null,204);
    }
}
