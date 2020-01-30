<?php


session_unset();
session_destroy();

setcookie('id','' , time() -3600, '/');
setcookie('hash', '' , time() -3600, '/');
setcookie('ip', '' , time() -3600, '/');


	header( 'Location:/cab/auth');
    exit();