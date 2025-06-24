<?php

namespace App\Http\Controllers;

use App\Models\Websetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $logoPath = $this->handleFileUpload($request, 'logo', $setting);
        $profilePath = $this->handleFileUpload($request, 'profile', $setting);
        $bannerPath = $this->handleFileUpload($request, 'banner_image', $setting);
        $resumePath = $this->handleFileUpload($request, 'resume', $setting);

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'profile' => $profilePath,
            'logo' => $logoPath,
            'phone' => $request->phone,
            'email' => $request->email,
            'banner_title' => $request->banner_title,
            'profession' => $request->profession,
            'banner_image' => $bannerPath,
            'resume' => $resumePath,
            'about_title' => $request->about_title,
            'about_description' => $request->about_description,
        ];

        if (!$setting) {
            Websetting::create($data);
        } else {
            $setting->update($data);
        }

        return response()->json(['status' => 'success']);
    }

    private function handleFileUpload(Request $request, $field, $setting)
    {
        if ($request->hasFile($field)) {
            if ($setting && $setting->$field) {
                Storage::disk('public')->delete(str_replace('storage/', '', $setting->$field));
            }
            $file = $request->file($field);
            $fileName = time() . '_' . $file->getClientOriginalName();
            return $file->storeAs($field, $fileName, 'public');
        }

        return $setting->$field ?? null;
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
