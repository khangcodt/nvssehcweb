<?php

/**
 * @param int $length: Length of random String
 * @return string: Random string of specific length, default = 15
 */
function genRandomString($length = 15)
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

?>