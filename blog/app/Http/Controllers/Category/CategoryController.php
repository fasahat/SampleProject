<?php
namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
// use App\Category;
use App\Http\Requests;
use App\Repositories\CategoryRepository;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
        return response()->json(Category::findOrFail($id), 200);
    }

    public function store(Request $request) {
        // private $rules = [
        //     'title' => 'required|min:3'
        // ];

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|min:3'
            
        // ]);
        // return $validator;
        // if ($validator->fails()) {
        //     return response()->json(null,404);
            
        // } else {
            // $category = Category::create($request->all());
            // return response()->json($category, 201);
        // }


        // $valid = Category::validate($request->all());
        
        // if ($valid->passes()) {
        //   echo 'Everything is Valid!';
        // } else {
        //   var_dump($valid->messages());
        // }
        // die('');
        // $validate = Category::validate($request->all());

        // if($validate) {
            $category = Category::create($request->all());
            return response()->json($category, 201);
        // } else {
        //     return response()->json(null,404);
        // }
        
    }

    public function update(Request $request,Category $category,$id){
        $category->where('id', $id)->update($request->all());
        return response()->json($category,200);
    }

    public function delete(Request $request,Category $category,$id) {
        $category->where('id', $id)->delete();
        return response()->json(null,204);
    }

    public function read() {
        $jsondata = file_get_contents('test.json');
        $json = json_decode($jsondata);
        $id = $json->device->sn;
    }
}
