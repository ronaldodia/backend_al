<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 18:07
 * To change this template use File | Settings | File Templates.
 */

class Dispatcher {

    var $request;

    function __construct(){
       $this->request = new Request();
        Router::parse($this->request->url,$this->request);
       $controller=$this->loadController();
        $action=$this->request->action;
        if($this->request->prefix){
            $action=$this->request->prefix.'_'.$this->request->action;
        }


        if(!in_array($action,array_diff(get_class_methods($controller),get_class_methods('Controller'))))//checker si la méthode n'existe pas dans le controleur, afficher une erreur
        {
            $this->errors('le controlleur <h1>'.$this->request->controller.' n\'a pas de méthode '.$action.'</h1>');
        }
       call_user_func_array(array($controller,$action),$this->request->params);
        $controller->render($action);
    }
    function loadController(){

        $name=ucfirst($this->request->controller).'Controller';//ça équivaut à PagesController par exemple
         $file=ROOT.DS.'controller'.DS.$name.'.php';//ici nous aurons le chemin absolu du fichier controlleur
        require $file;
        $controller=new $name($this->request);
        $controller->Session=new Session();//en chargeant le controller on charge les classes dont on a besoin ici c'est la session et la classe form
                                            //qui sert à créer des formulaires
        $controller->Form=new Form($controller);//nous avons une variable Form dans notre controller qui est déjà disponible
        return $controller;//nous allons utiliser cette variable pour lier le form et les modeles afin de pouvoir acceder aux erreurs

    }
    function errors($msg){

      $controller=new Controller($this->request);
        $controller->Session=new Session();
      //  print_r($controller);
        $controller->e404($msg);

    }
}