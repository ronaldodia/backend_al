<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 18:56
 * To change this template use File | Settings | File Templates.
 */

class Controller {

    public $request;
    private  $vars=array();
    private $rendered=false;
    function __construct($request=null){
           if($request) $this->request=$request;

    }
    public function render($view){
        if($this->rendered){return false;}
        extract($this->vars);
        if(strpos($view,'/')===0)
            $view=ROOT.DS.'view'.DS.$view.'.php';
        else
        $view=ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        ob_start();
        if($view!=ROOT.DS.'view'.DS.'offreancias'.DS.'admin_ajax.php'){
			if(file_exists($view)) {
            require($view);
            $content_for_layout=ob_get_clean();
            require ROOT.DS.'view'.DS.'layout'.DS.'admin_template.php';
            $this->rendered=true;}
			else {$this->e404('ce que vous cherchez n\'existe pas :-p');}
        }

    }

    /**
     * cette fonction permet d'injecter des variables dans le tebleau params
     * @param $key valeur de la clé, nom de la variable dans le fond
     * @param $value valeur de la variable à envoyer vers la vue
     */
    public function  set($key,$value=null){
        if(is_array($key)){
            $this->vars+=$key;
        }
        else
        $this->vars[$key]=$value;

}
    public function loadModel($name){

         if(!isset($this->name)){
             $file=ROOT.DS.'model'.DS.$name.'.php' ;//include le fichier model correspondant au nom du model qu'on veut charger
             require_once($file);
             $this->$name=new $name(); //on initialise le model
             if(isset($this->Form))//vérifier si on a une variable form pour le formulaire dans notre model, puis l'envoyer avec le model
             {
                 $this->$name->Form=$this->Form;
             }
         }



    }
    public function e404($msg){
        header('HTTP/1.0 404 Not Found');
        $this->set('msg',$msg);
        $this->render('/errors/404');
        die(":-(");
    }

    public function  request($controller,$action){

   $controller.='Controller';
        require_once ROOT.DS.'controller'.DS.$controller.'.php';
        $c=new $controller();
        return $c->$action();
}


    /**
     * C'EST UNE FONCTION QUI PERMET DE FAIRE DES REDIRECTIONS
     */
    public function redirect($url,$code=null){
        if($code=='301'){
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("Location: ".Router::url($url));
    }
}