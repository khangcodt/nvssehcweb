<?php

/**
 * @param int $length: Length of random String
 * @return string: Random string of specific length, default = 15
 */
function genRandomString($length = 15)
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}


/**
 * return true if inputEmail match with prefix, suffix and length of random middle string, otherwise false
 * @param $inputEMail
 * @param $emailPrefix
 * @param $emailSuffix
 * @param $randomMidLength
 */
function isEmailUpdated($inputEMail, $emailPrefix, $emailSuffix, $randomMidLength) {
    //tìm hiểu cách sử dụng regular expression để code
}
?>