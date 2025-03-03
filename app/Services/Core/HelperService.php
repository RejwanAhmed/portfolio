<?php

namespace App\Services\Core;

use Illuminate\Support\Facades\File;

class HelperService
{
    public static function uploadImage($image = null, $oldImagePath = null, $directory)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            if($oldImagePath && File::exists(public_path($oldImagePath))) {
                File::delete(public_path($oldImagePath));
            }

            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path($directory), $imageName);
            $imagePath = $directory.'/'.$imageName;
            return $imagePath;
        }

        return $oldImagePath;
    }

    public static function deleteImage(string $imagePath)
    {
        if ($imagePath && File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }
    }
}