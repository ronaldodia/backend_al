<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 17:45
 * To change this template use File | Settings | File Templates.
 $_SERVER[PATH_INFO] est l'url tapée par le user
 * echo dirname(__FILE__)recupere le dossier parent du fichier en cours
 */


$debut=microtime(true);
define('WEBROOT',dirname(__FILE__)); //recuperer le chemin absolu de webroot
define('ROOT',dirname(WEBROOT)); //recuperer le chemin absolu du site
define('DS',DIRECTORY_SEPARATOR);//recuperer le separateur selon le OS (operating system)
define('CORE',ROOT.DS.'core');//recuperer le chemin absolu du repertoire core
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));//recuperer la racine de l'url

require CORE.DS.'includes.php';
new Dispatcher();
//echo '<div style="position:fixed;bottom:0;background:#900;color:#FFF;line-height:30px;height:30px;left:0;right:0;padding:5px;">Page générée en '.round(microtime(true)-$debut,5).' s </div>';