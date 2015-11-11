<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 18:32
 * To change this template use File | Settings | File Templates.

 La classe Router est une classe globale qui sera appelée au niveau de toute l'application
 donc elle a des variables static, ce qui permet de les appelé directement sans créer d'instances*/

class Router {
    static  $routes=array();
    static $prefixes=array();
    static function prefix($url,$prefix){
        self::$prefixes[$url]=$prefix;
    }
    /** cette fonction permet de parser une url
     * @param $url url à parser
     * @param $request un objet request qui va contenir les paramètres
     *
     */
    static function parse($url,$request){
        $url=trim($url,'/');
        foreach(Router::$routes as $v){
            if(preg_match($v['catcher'],$url,$match))
            {
                $request->controller=$v['controller'];
                $request->action=$v['action'];
                $request->params=array();
                foreach($v['params'] as $k=>$w)
                {
                    $request->params[$k]=$match[$k];}


                return $request;

            }

        }
        $params=explode ('/',$url);
        if(in_array($params[0],array_keys(self::$prefixes)))//on check si le prefix pour l'admin existe bien dans l'url tapée
        {
            $request->prefix=self::$prefixes[$params[0]];
            array_shift($params);//nous allons éliminer le premier index, c'est à dire le préfixe de l'url

        }


        //print_r($params);
        $request->controller=$params[0];
           $request->action=isset($params[1])?$params[1]:'index';
        $request->params=array_slice($params,2);

        return true;

    }

    public static function connect($redirect,$url){
        $r=array();
        $r['params']=array();
        $r['redir']=$redirect;
        $r['origin']=preg_replace('/([a-z0-9]+):([^\/]+)/','${1}:(?P<${1}>${2})',$url);
        $r['origin']='/'.str_replace('/','\/',$r['origin']).'/';
        $params=explode('/',$url);
        foreach($params as $k=>$v){
            if(strpos($v,':')){
                $p=explode(':',$v);
                $r['params'][$p[0]]=$p[1];


            }else{
                if($k==0)
                    $r['controller']=$v;
                elseif($k==1)
                    $r['action']=$v;
            }
        }

        $r['catcher']=$redirect;
        foreach($r['params'] as $k=>$v){

            $r['catcher']=str_replace(":$k","(?P<$k>$v)",$r['catcher']);

        }
        $r['catcher']='/'.str_replace('/','\/',$r['catcher']).'/';

        self::$routes[]=$r;



    }
    public static function url($url){
        foreach(self::$routes as $v){
            if(preg_match($v['origin'],$url,$match))
            {
                foreach($match as $k=>$w){
                    if(!is_numeric($k)){

                        $v['redir']=str_replace(":$k",$w,$v['redir']);
                    }

                }
                //return BASE_URL.str_replace('//','/','/'.$v['redir']).$v['origin'];
                return $v['redir']; }
            foreach(self::$prefixes as $k=>$v){
                if(strpos($url,$v)===0){//nous allons testé nous avons un prefix dans l'url pour garder toujours le nom prefix dans l'url, cad dans la barre d'adresse
                    // s'il exite, il doit avoir l'index 0 avant le controller et l'action
                    $url=str_replace($v,$k,$url);//remplacer admin par fioufiouadmin (nom de l'url vers la partie admin
                }
            }

            return BASE_URL.$url;
        }



        //return $url;

    }

}