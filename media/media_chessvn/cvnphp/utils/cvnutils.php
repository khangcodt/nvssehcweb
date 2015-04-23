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
function isEmailUpdated($inputEMail, $emailPrefix="defaultemail", $emailSuffix="@chessvn.org", $randomMidLength=15) {
    // Em cho mặc định nếu không có tham số thì các giá trị sẽ giống như trong file config
    //tìm hiểu cách sử dụng regular expression để code

    $randomString = substr($inputEMail,12,-12);
    //hàm này dùng để tách chuỗi random. Cắt email từ vị trí bắt đầu là 12 đến vị trí 12 tính từ cuối chuỗi

    if(strlen($randomString)==$randomMidLength){
        $strPrefix = '/^'.$emailPrefix.'/'; // Chuỗi so sánh phải bắt đầu bằng defaulemail
        $strSuffix = '/'.$emailSuffix.'$/'; // Chuỗi so sánh phải kết thúc bằng @chessvn.org
        if(preg_match($strPrefix,$inputEMail) && preg_match($strSuffix,$inputEMail)){
            return true;
        }
        return false;
    }
    return false;
}
?>