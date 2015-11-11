<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 18:13
 * To change this template use File | Settings | File Templates.
 */

class Request {
    public $url; //permet de savoir l'url appelée le user
    public $prefix=false; //cette variable va contenir le prefix des urls spéciales comme /fioufiou
    public $data=false;
    function __construct(){
         $this->url = $_SERVER['PATH_INFO'];
        if(isset($_POST)){
            $this->data=new stdClass();//initialiser data en tant que Objet
            foreach($_POST as $k=>$v){//récupérer toutes données envoyées par POST et les mettre dans data


               $this->data->$k=$v;
            }

        }
    }

}