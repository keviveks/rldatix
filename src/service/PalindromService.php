<?php

// src/command/PalindromService.php

namespace RLDatix\Service;

class PalindromService
{
    public function checkPalindrom(string $string)
    {
        $string = \strtolower($string);
        $palindrome = true;
        $i = 0;
        $l = strlen($string);
        while (isset($string[$i])) {
            if ($string[$i] != $string[--$l]) {
                $palindrome = false;
                break;
            }
            ++$i;
        }

        return $palindrome;
    }
}
