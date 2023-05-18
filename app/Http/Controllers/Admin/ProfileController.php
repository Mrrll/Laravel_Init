<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ProfileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        try {
            if (isset($request->validated()['avatar'])) {
                $profile = Profile::create($request->safe()->except('avatar'));
                $url = Profile::Upload($request, 'avatar', 'images/user', 'avatar'.'-'.$request->validated()['user_id']);
                $profile->image()->create(['url' => $url]);
            } else {
                $profile = Profile::create($request->validated());
            }
            return redirect()->route('profile.edit', $profile)->with('message', [
                'type' => 'success',
                'title' => Lang::get('Save success').'!',
                'message' => Lang::get('Success in saving your :name.', ['name' => strtolower(Lang::get('Profile'))]),
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => Lang::get('An unexpected error has occurred').'!',
                'message' => Lang::get('Check your settings and if the problem persists, contact your administrator.'),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('admin.user.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        try {
            if (isset($request->validated()['avatar'])) {
                $profile->update($request->safe()->except('avatar'));
                $url = Profile::Upload($request, 'avatar', 'images/user', 'avatar' . '-' . $request->validated()['user_id']);
                if ($profile->image->first()) {
                    $profile->image()->update(['url' => $url]);
                } else {
                    $profile->image()->create(['url' => $url]);
                }
            } else {
                $profile->update($request->validated());
            }
            return redirect()->route('profile.edit', $profile)->with('message', [
                'type' => 'success',
                'title' => Lang::get('Save success') . '!',
                'message' => Lang::get('Success in saving your :name.', ['name' => strtolower(Lang::get('Profile'))]),
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => Lang::get('An unexpected error has occurred') . '!',
                'message' => Lang::get('Check your settings and if the problem persists, contact your administrator.'),
            ]);
        }
    }
}
