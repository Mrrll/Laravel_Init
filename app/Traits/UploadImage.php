<?php

namespace App\Traits;

trait UploadImage
{
    public static function Upload($request, $key, $dir = "image", $name = null)
    {
        $data = $request->validated();
        if ($name == null) {
            $filename = $data[$key]->getClientOriginalName();
        } else {
            $filename = $name.'.'.$data[$key]->extension();
        }
        $route = public_path($dir);
        $request->validated()[$key]->move($route, $filename);
        return $dir.'/'.$filename;
    }
}
