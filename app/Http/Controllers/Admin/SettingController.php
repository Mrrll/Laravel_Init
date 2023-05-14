<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\AppearanceRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * The function returns a view for creating a new setting in the admin panel.
     *
     * @return A view named "admin.setting.create" is being returned.
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * This function saves the appearance settings of an application, including uploading a logo image.
     *
     * @param AppearanceRequest request  is an instance of the AppearanceRequest class, which
     * is a custom request class that extends the base Laravel request class. It is used to validate
     * and sanitize the incoming request data for the appearance settings of the application.
     *
     * @return a redirect to the edit page of the newly created Setting object, with a success message
     * if the creation was successful, or a redirect back with an error message if an error occurred.
     */
    public function appearance(AppearanceRequest $request)
    {
        try {
            if (isset($request->validated()['logo'])) {
                $setting = Setting::create($request->safe()->except('logo'));
                $url = Setting::Upload($request, 'logo', 'images/logo', 'logo');
                $setting->image()->create(['url' => $url]);
            } else {
                $setting = Setting::create($request->validated());
            }
            return redirect()->route('setting.edit', $setting)->with('message', [
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
    }

    /**
     * The function returns a view for editing a setting object.
     *
     * @param Setting setting The parameter `` is an instance of the `Setting` model class. It
     * is being passed to the `edit` method of a controller, which is responsible for rendering a view
     * for editing the settings. The `compact` function is used to pass the `` variable to the
     * view so
     *
     * @return A view called "admin.setting.edit" is being returned with the "setting" variable passed
     * to it.
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * This function updates the appearance settings of an application, including the logo image.
     *
     * @param AppearanceRequest request  is an instance of the AppearanceRequest class, which
     * is a custom request class that contains validation rules and messages for updating the
     * appearance settings of an application. It is used to validate the incoming request data before
     * processing it further.
     * @param Setting setting The `` parameter is an instance of the `Setting` model, which
     * represents the application settings. It is used to update the appearance settings of the
     * application, such as the logo image and other visual elements.
     *
     * @return a redirect to the edit page of the updated setting with a success message if the update
     * is successful. If there is an error, it will return back to the previous page with a danger
     * message containing the error message.
     */
    public function appearanceUpdate(AppearanceRequest $request, Setting $setting)
    {
        try {
            if (isset($request->validated()['logo'])) {
                $setting->update($request->safe()->except('logo'));
                $url = Setting::Upload($request, 'logo', 'images/logo', 'logo');
                if ($setting->image->first()) {
                    $setting->image()->update(['url' => $url]);
                } else {
                    $setting->image()->create(['url' => $url]);
                }
            } else {
                $setting->update($request->validated());
            }
            return redirect()->route('setting.edit', $setting)->with('message', [
                'type' => 'success',
                'title' => 'Success when editing !',
                'message' => 'Success when editing the appearance of the application.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
}
