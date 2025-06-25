<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use FileUploadTrait;

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

        $imageUrl = $this->handleFileStore($request, 'image', 'images/slider');

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

        $imageUrl = $this->handleFileUpdate($request, 'image', $slider, 'images/slider/');

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
        if ($slider) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
        }
        $slider->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }
}
