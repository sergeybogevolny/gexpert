<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cSecurity
 *
 * @author sundar
 */
class cSecurity {

//put your code here



    function encrypt($data) {
        return base64_encode(mcrypt_encrypt(EncryptMethod, md5(EncryptKey), $data, EncryptMode, md5(md5(EncryptKey))));
    }

    function decrypt($data) {
        return rtrim(mcrypt_decrypt(EncryptMethod, md5(EncryptKey), base64_decode($data), EncryptMode, md5(md5(EncryptKey))), "\0");
    }

}

?>
