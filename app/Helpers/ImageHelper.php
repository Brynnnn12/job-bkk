<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageHelper
{
    /**
     * Save an uploaded avatar image.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param string|null $filename
     * @return string Path to the saved image
     */
    public static function saveAvatar(UploadedFile $file, string $folder = 'avatars', string $filename = null): string
    {
        $filename = $filename ?? uniqid('avatar_') . '.' . $file->getClientOriginalExtension();
        $path = Storage::disk('public')->putFileAs($folder, $file, $filename);
        return $path;
    }

    /**
     * Save an uploaded company image.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param string|null $filename
     * @return string Path to the saved image
     */
    public static function saveCompanyImage(UploadedFile $file, string $folder = 'companies', string $filename = null): string
    {
        $filename = $filename ?? uniqid('company_') . '.' . $file->getClientOriginalExtension();
        $path = Storage::disk('public')->putFileAs($folder, $file, $filename);
        return $path;
    }
}
