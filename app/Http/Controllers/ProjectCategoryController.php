<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.content.project_category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image'=>'required',
        ],
            [
                'name.required'=>'Category name is required',
                'title.required'=>'Title is required',
                'image.required'=>'Image is required',
            ]
        );

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/project_category/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }

        ProjectCategory::create([
            'name'=>$request->name,
            'title'=>$request->title,
            'image'=>$imageUrl
        ]);

        return response()->json([
            'status'=>'success',
        ]);

    }

    public function fetch()
    {
        $categories = ProjectCategory::all();
        return response()->json($categories);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $category = ProjectCategory::find($id);

        return response()->json($category);
    }

    public function update(Request $request)
    {
        $id = $request->category_id;

        $category = ProjectCategory::find($id);

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/project_category/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }else{
            $imageUrl = $category->image;
        }

        $category->update([
            'name'=>$request->name,
            'title'=>$request->title,
            'image'=>$imageUrl,
            'status'=>$request->status
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $category = ProjectCategory::find($id);

        $category->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }
}
