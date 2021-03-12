<?php

namespace App\app\Services;

class ImageGenerationServices
{
    public static function changeURL($url)
    {
        $newURL = str_replace('https://lorempixel.com/', 'https://picsum.photos/', $url);

        return $newURL;
    }
}