<?php

namespace App;

class ContentReceiver
{
    /**
     * Get content from url
     *
     * @param string $url
     * @return string
     */
    public static function fromUrl(string $url)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $content = curl_exec($ch);
        curl_close($ch);

        return $content;
    }
}
