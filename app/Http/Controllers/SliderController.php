<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('dashboard.content.slider.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
        ],
            [
                'image.required'=>'Image is required',
            ]
        );

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/slider/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }



        Slider::create([
            'title'=>$request->title,
            'image'=>$imageUrl
        ]);

        return response()->json([
            'status'=>'success',
        ]);

    }

    public function fetch()
    {
        $sliders = Slider::all();
        return response()->json($sliders);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $slider = Slider::find($id);

        return response()->json($slider);
    }

    public function update(Request $request)
    {
        $id = $request->slider_id;

        $slider = Slider::find($id);

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/slider/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }else{
            $imageUrl = $slider->image;
        }

        $slider->update([
            'title'=>$request->edit_title,
            'image'=>$imageUrl,
            'status'=>$request->status
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $slider = Slider::find($id);

        $slider->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }
}
