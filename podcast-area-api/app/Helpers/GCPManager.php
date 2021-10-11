<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class GCPManager
{
    /**
     * 爬圖片上傳到gcp
     * @param string $file
     * @param string $fileName
     * @return string
     */
    public function upload($file, string $fileName): string
    {
        $disk = Storage::disk('gcs');
        $img = file_get_contents($file);
        $disk->put($fileName, $img);

        return $disk->url($fileName);
    }
}
