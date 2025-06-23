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

        // logo upload
        if ($request->hasFile('logo')) {
            if ($setting && $setting->logo) {
                Storage::disk('public')->delete(str_replace('storage/', '', $setting->logo));
            }
            $logoFile = $request->file('logo');
            $logoName = time() . '_' . $logoFile->getClientOriginalName();
            $logoPath = $logoFile->storeAs('logo', $logoName, 'public');
        } else {
            $logoPath = $setting->logo ?? null;
        }

        // profile upload
        if ($request->hasFile('profile')) {
            if ($setting && $setting->profile) {
                Storage::disk('public')->delete(str_replace('storage/', '', $setting->profile));
            }
            $profileFile = $request->file('profile');
            $profileName = time() . '_' . $profileFile->getClientOriginalName();
            $profilePath = $profileFile->storeAs('profile', $profileName, 'public');
        } else {
            $profilePath = $setting->profile ?? null;
        }

        // banner image upload
        if ($request->hasFile('banner_image')) {
            if ($setting && $setting->banner_image) {
                Storage::disk('public')->delete(str_replace('storage/', '', $setting->banner_image));
            }
            $bannerFile = $request->file('banner_image');
            $bannerName = time() . '_' . $bannerFile->getClientOriginalName();
            $bannerPath = $bannerFile->storeAs('banner', $bannerName, 'public');
        } else {
            $bannerPath = $setting->banner_image ?? null;
        }

        // resume upload
        if ($request->hasFile('resume')) {
            if ($setting && $setting->resume) {
                Storage::disk('public')->delete(str_replace('storage/', '', $setting->resume));
            }
            $resumeFile = $request->file('resume');
            $resumeName = time() . '_' . $resumeFile->getClientOriginalName();
            $resumePath = $resumeFile->storeAs('resume', $resumeName, 'public');
        } else {
            $resumePath = $setting->resume ?? null;
        }

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
