<?php

namespace App\Services;

class ImageGenerationServices
{
    /**
     * Changes the Faker URL.
     *
     * @param $url
     * @return mixed
     */
    public static function changeURL($url)
    {
        $newURL = str_replace('https://lorempixel.com/', 'https://picsum.photos/', $url);

        return $newURL;
    }
}