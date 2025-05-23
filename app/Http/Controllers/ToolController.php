<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        return view('dashboard.content.tool.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image'=>'required',
        ],
            [
                'name.required'=>'Tools name is required',
                'image.required'=>'Image is required',
            ]
        );

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/tool/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }



        Tool::create([
            'name'=>$request->name,
            'image'=>$imageUrl
        ]);

        return response()->json([
            'status'=>'success',
        ]);

    }

    public function fetch()
    {
        $tools = Tool::all();
        return response()->json($tools);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $tool = Tool::find($id);

        return response()->json($tool);
    }

    public function update(Request $request)
    {
        $id = $request->tool_id;

        $tool = Tool::find($id);

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/tool/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }else{
            $imageUrl = $tool->image;
        }

        $tool->update([
            'name'=>$request->name,
            'image'=>$imageUrl,
            'status'=>$request->status
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $tool = Tool::find($id);

        $tool->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }


}
