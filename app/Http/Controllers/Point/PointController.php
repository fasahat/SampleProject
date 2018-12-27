<?php

namespace App\Http\Controllers\Point;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Point;

use Illuminate\Support\Facades\Storage;
use File;
use Mapper;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(){
        // $jsondata = file_get_contents('composerBlog/blog/points.geojson');
        // $jsondata = File::get(url('composerBlog/blog/storage/app/points.geojson'));
        // $jsondata = Storage::files('points.geojson');
        // $jsondata = file('points.geojson');

        // $json = json_decode($jsondata,true);
      // var_dump($jsondata);

      $path = storage_path() . "/app/points.geojson"; // ie: /var/www/laravel/app/storage/json/filename.json

        $json = json_decode(file_get_contents($path), true); 
        //do not convert to array
        
        // var_dump($json);

        foreach ($json['features'] as $key => $value) {
            Point::create(['lat' => $value['geometry']['coordinates'][1] , 'lng' => $value['geometry']['coordinates'][0]]);
            // var_dump($value['geometry']['coordinates']);
            // echo('<br>');
            // echo('<br>');
        }
    }

    public function mappoints(){
        // $lat = $request->input('lat');

        // $long = $request->input('long');
        // Mapper::location('Iran');
        $point =  Point::get();
        return response()->json(array(
            'Status' => true,
            'Points' => $point->toArray(),
            200
        ));
        // return view('maps.map',compact('point'));
        return $point;
        // foreach ($point as $key => $value) {
            
        //     Mapper::map($value['original']['lat'], $value['original']['lng']);
        // }
        // $point =  response()->json(Point::get(), 200);
        // $point = json_decode($point, TRUE);

        // $array = json_decode($point, true);
        // var_dump($point);
        // return view('posts.posts',compact('cid'));



        // $location = ["lat"=>$lat, "long"=>$long];
        // event(new SendLocation($location));
        // return response()->json(['status'=>'success', 'data'=>$location]);

        // Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('maps.map');

    }

    public function map() {
        return view('maps.map');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
