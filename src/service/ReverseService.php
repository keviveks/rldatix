<?php

// src/command/ReverseService.php

namespace RLDatix\Service;

class ReverseService
{
    public function reverseWord(string $string)
    {
        $reverseString = '';
        $i = 0;
        while (isset($string[$i])) {
            $reverseString = $string[$i].$reverseString;
            ++$i;
        }

        return $reverseString;
    }
}
