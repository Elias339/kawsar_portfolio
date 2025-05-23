<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::where('status', 'Active')->get();
        return view('dashboard.content.project.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'image'=>'required',
        ],
            [
                'name.required'=>'Project name is required',
                'title.required'=>'Project title is required',
                'image.required'=>'Image is required',
            ]
        );

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/project/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }



        Project::create([
            'project_category_id'=>$request->project_category_id,
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imageUrl
        ]);

        return response()->json([
            'status'=>'success',
        ]);

    }

    public function fetch()
    {
//        $projects = Project::all();
        $projects = Project::with('projectCategory')->get();
        return response()->json($projects);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $project = Project::find($id);

        return response()->json($project);
    }

    public function update(Request $request)
    {
        $id = $request->project_id;

        $project = Project::find($id);

        if(isset($request->image)){
            $img = $request->file('image');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/project/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }else{
            $imageUrl = $project->image;
        }

        $project->update([
            'project_category_id'=>$request->project_category_id,
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imageUrl,
            'status'=>$request->status
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $project = Project::find($id);

        $project->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }
}
