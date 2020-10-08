<?php

function cleanFancyString($str)
{

    function match($item) {
        return preg_match('/[^\w ]+/',$item);
    }

    preg_match_all('/./u', $str, $chars);

    $chinesseItems = array_reverse(array_filter($chars[0], static fn($item) => match($item)));
    $regularItems = array_filter($chars[0], static fn($item) => !match($item));

    $words = explode(' ',preg_replace('/\s+/i',' ',trim(implode('',$regularItems))));

    $cleanWords = array_unique($words);

    return trim(implode(' ',$cleanWords).implode('',$chinesseItems));

}
