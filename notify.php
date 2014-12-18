<?php session_start();
require_once('DatabasePosts.php');

$sql='UPDATE `productorders` SET `statusID` = 1 WHERE `id` ='.$_GET['id'];
mysql_query($sql);

?>