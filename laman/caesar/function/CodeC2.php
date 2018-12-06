<?php
function encrypt($str, $offset) {
    $encrypted_text = "";
    $offset = $offset % 256;
    if($offset < 0) {
        $offset += 256;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = ($str{$i}); 
        if(($c >= "a" || "A") && ($c <= 'z'||'Z')) {
            if((ord($c) + $offset) > ord("z"||"Z")) {
                $encrypted_text .= chr(ord($c) + $offset - 256);
        } else {
            $encrypted_text .= chr(ord($c) + $offset % 256);
        }
      } else {
          $encrypted_text .= " ";
      }
      $i++;
    }
    return $encrypted_text;
}
function decrypt($str, $offset) {
    $decrypted_text = "";
    $offset = $offset % 256;
    if($offset < 0) {
        $offset += 256;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = ($str{$i}); 
        if(($c >= "A"||"a") && ($c <= 'Z'||'z')) {
            if((ord($c) - $offset) < ord("A"||"a")) {
                $decrypted_text .= chr(ord($c) - $offset + 256);
        } else {
            $decrypted_text .= chr(ord($c) - $offset % 256);
        }
      } else {
          $decrypted_text .= " ";
      }
      $i++;
    }
    return $decrypted_text;
}
?>