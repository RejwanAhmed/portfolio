<?php

namespace App\Services\Core;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HelperService
{
    // public static function uploadImage($image = null, $oldImagePath = null, $directory)
    // {
    //     if ($image instanceof \Illuminate\Http\UploadedFile) {
    //         if($oldImagePath) {
    //             $relativePath = str_replace('storage/', '', $oldImagePath);
    //             if(Storage::disk('public')->exists($relativePath)) {
    //                 Storage::disk('public')->delete($relativePath);
    //             }
    //         }

    //         $imageName = uniqid().'.'.$image->getClientOriginalExtension();
    //         $path = $image->storeAs($directory, $imageName, 'public');
    //         return 'storage/' . $path;
    //     }

    //     return $oldImagePath;
    // }

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

    // public static function deleteImage(string $imagePath)
    // {
    //     if ($imagePath) {
    //         $relativePath = str_replace('storage/', '', $imagePath);
    //          if (Storage::disk('public')->exists($relativePath)) {
    //             Storage::disk('public')->delete($relativePath);
    //         }
    //     }
    // }

    public static function deleteImage(string $imagePath)
    {
        if ($imagePath && File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }
    }

    // public static function uploadPdf($pdf, $directory)
    // {
    //     $pdfName = uniqid().'.'.$pdf->getClientOriginalExtension();
    //     $path = $pdf->storeAs($directory, $pdfName, 'public');
    //     return 'storage/' . $path;
    // }

    public static function uploadPdf($pdf, $directory)
    {
        $pdfName = uniqid().'.'.$pdf->getClientOriginalExtension();
        $pdf->move(public_path($directory), $pdfName);
        $pdfPath = $directory.'/'.$pdfName;
        return $pdfPath;
    }

    // public static function deletePdf(string $pdfPath)
    // {
    //     if($pdfPath) {
    //         $relativePath = str_replace('storage/', '', $pdfPath);
    //         if(Storage::disk('public')->exists($relativePath)) {
    //             Storage::disk('public')->delete($relativePath);
    //         }
    //     }
    // }

    public static function deletePdf(string $pdfPath)
    {
        if ($pdfPath && File::exists(public_path($pdfPath))) {
            File::delete(public_path($pdfPath));
        }
    }
}