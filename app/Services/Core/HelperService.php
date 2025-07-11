<?php

namespace App\Services\Core;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HelperService
{
    public static function uploadImage($image = null, $oldImagePath = null, $directory)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            if($oldImagePath) {
                $relativePath = str_replace('storage/', '', $oldImagePath);
                if(Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
            }

            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs($directory, $imageName, 'public');
            return 'storage/' . $path;
        }

        return $oldImagePath;
    }

    public static function deleteImage(string $imagePath)
    {
        if ($imagePath) {
            $relativePath = str_replace('storage/', '', $imagePath);
             if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            }
        }
    }

    public static function uploadPdf($pdf, $directory)
    {
        $pdfName = uniqid().'.'.$pdf->getClientOriginalExtension();
        $path = $pdf->storeAs($directory, $pdfName, 'public');
        return 'storage/' . $path;
    }
}