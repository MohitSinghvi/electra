<?php

require'core.inc.php';
session_destroy();
header('Location: '.$http_referer);
//echo $http_referer;
?>