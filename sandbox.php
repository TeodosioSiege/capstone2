<?php 
$range = 10000000000;
$log = ceil(log($range, 2));
 $bytes = (int) ($log / 8) + 1;
$ref =  bin2hex(openssl_random_pseudo_bytes($bytes));

echo $ref;
 ?>