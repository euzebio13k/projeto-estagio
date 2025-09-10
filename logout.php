<?php

require __DIR__.'/vendor/autoload.php';
use App\Session\Login;

//OBRIGA O USUARIO NÃO ESTAR LOGADO
//Login::requereLogout();

Login::logout();