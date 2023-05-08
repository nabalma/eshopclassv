<?php
 
// Server informations
$path = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"];
$path = str_replace("index.php","",$path);

define("ROOT",$path);
define("ASSETS",$path."assets/");


// Website Titles
define("WEBSITE_TITLE","CLASS V");

//Database informations
define("DB_NAME","classv_db");
define("DB_USER","root");
define("DB_PASS","");
define("DB_TYPE","mysql");
define("DB_HOST","localhost");

//SMTP Server Informations
define("SMTP_SERVER_HOST",""); //smtp.gmail.com //mail.mochahost.com mail.mochahost.com ou mail.classevmode.com
define("SMTP_SERVER_USERNAME",""); //nabalma.hussein@gmail.com// classevmode@gmail.comclassevmode@gmail.com ou un compte classevmode.com car compte chez hochahost.com
define("SMTP_SERVER_PASSWORD",""); //  tvkngybrskatqdvd //Je sais ou trouver cela ou celui associé a hocha ou a classvmode
define("SMTP_SET_FROM_EMAIL",""); //nabalma.hussein@gmail.com//classevmode@gmail.com  Le meme email que celui du serveur
define("SMTP_SET_FROM_NAME",""); //Ousseynou// Class VOusseynou Nabalma Le nom du detenteur du compte du serveur pour le contact , mais la variable $email pour le resetPassword



?>