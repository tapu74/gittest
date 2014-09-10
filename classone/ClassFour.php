<?php

require_once('Log.class.php');

$log=new Log();
$log->Write('text.txt','My name is tufazzul');
echo "<pre>";
echo $log->Read('text.txt');
?>