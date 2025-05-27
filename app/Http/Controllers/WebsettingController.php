<?php

namespace App\Http\Controllers;

use App\Models\Websetting;
use Illuminate\Http\Request;

class WebsettingController extends Controller
{
    public function index()
    {
        $websetting = Websetting::first();
        return view('dashboard.content.websettings.index',compact('websetting'));
    }

    public function update(Request $request)
    {
        $setting = Websetting::first();

        if(isset($request->logo)){
            $img = $request->file('logo');
            $name = time() . "_" . $img->getClientOriginalName();
            $uploadPath = ('images/logo/');
            $img->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }else{
            $imageUrl = $setting->logo;
        }

        if(isset($request->profile)){
            $img = $request->file('profile');
            $name_p = time() . "_" . $img->getClientOriginalName();
            $uploadPath_p = ('images/profile/');
            $img->move($uploadPath_p, $name_p);
            $imageUrl_p = $uploadPath_p . $name_p;
        }else{
            $imageUrl_p = $setting->profile;
        }

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'description' => $request->description,
            'profile' => $imageUrl_p,
            'logo' => $imageUrl,
            'long_description' => $request->long_description,
            'foot_text' => $request->foot_text,
            'phone' => $request->phone,
        ];

        if (!$setting) {
            Websetting::create($data);

        } else {
            $setting->update($data);
        }

        return response()->json([
            'status' => 'success',
        ]);

    }

    public function socialUpdate(Request $request)
    {
        $social = Websetting::first();

        $social->update([
            'linkedin'=>$request->linkedin,
            'facebook'=>$request->facebook,
            'instagram'=>$request->instagram,
            'youtube'=>$request->youtube,
            'behance'=>$request->behance,
            'dribbble'=>$request->dribbble,
            'pinterest'=>$request->pinterest,
            'twitter'=>$request->twitter,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
}
