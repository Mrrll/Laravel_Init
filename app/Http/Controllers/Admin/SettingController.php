<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppearanceRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {

        return view('admin.setting');
    }
    public function appearance(AppearanceRequest $request)
    {
        try {
            $setting = Setting::create($request->safe()->except('logo'));
            $url = Setting::Upload($request, 'logo', 'images/logo', 'logo');
            $setting->image()->create(['url' => $url]);
            return back()->with('message', [
                'type' => 'success',
                'title' => 'Success in saving !',
                'message' => 'Success in saving the appearance of the application.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
        dd($request->validated());
    }
    public function store(Type $var = null)
    {
        # code...
    }
    public function update(Type $var = null)
    {
        # code...
    }
}
