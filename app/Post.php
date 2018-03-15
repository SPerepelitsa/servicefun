<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function generateSlug($s)
    {

        $s = (string)$s; // converts to string
        $s = strip_tags($s); // removes HTML-tags
        $s = str_replace(array("\n", "\r"), " ", $s); // removes newlines.
        $s = preg_replace("/\s+/", ' ', $s); // removes multiple spaces.
        $s = trim($s); // removes spaces before and after the string
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // converts string to lowercase.
        $s = strtr($s, array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'j',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ы' => 'y',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
            'ъ' => '',
            'ь' => ''
        ));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // removes invalid characters from the string.
        $s = str_replace(" ", "-", $s); // changes "space" to "-"(minus)
        return $s; // returns the result

    }

    public function getShortBody($text)
    {

        $text = substr($text, 0, 300);

        return $text;
    }
}
