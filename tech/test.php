<?php

//$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
//    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
//    $key = "This is a very secret key";
//    $text = "Meet me at 11 o'clock behind the monument.";
//    echo $text . "\n";
//
//    $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
//    echo $crypttext . "\n";
//
//$pool = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-";
//$countPool = strlen($pool);
//$totalChars = 16;
//
//$serial = '';
//for ($i = 0; $i < $totalChars; $i++) {
//    //echo $countPool;
//    //echo '<br/>';
//    $currIndex = mt_rand(0, (int) $countPool);
//    //echo $currIndex;
//    // echo '<br/>';
//    $currChar = $pool[$currIndex];
////    echo '<br/>';
//    $serial .= $currChar;
////    echo '<br/>';
//}
//echo explode($serial);

$alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", 'o', "p", "q", "r", "s", "t", "u", "v", "w", "y", "z");
$currIndex = mt_rand(0, count($alphabet));
echo $alphabet[$currIndex];
$array[0] = "moijr";
//$array[1] = "gbpka";
//$array[2] = "xklvf";
//$array[3] = "rmqii";
//$array[4] = "ynwdh";
//
//
//
//

foreach ($array as $value) {
    for ($i = 0; i <= 1; $i++) {
        echo shuffle(str_split($value));
    }
}
?>