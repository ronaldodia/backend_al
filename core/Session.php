<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 27/08/15
 * Time: 11:00
 * To change this template use File | Settings | File Templates.
 */

class Session {

    function __construct(){
        if(!isset($_SESSION))
        session_start();
    }
public function setFlash($msg,$type='success'){

    $_SESSION['flash']=array(
        'message'=>$msg,
    'type'=>$type);

}
    public function flash(){
        if(isset($_SESSION['flash']['message'])&&$_SESSION['flash']['message']){
            $html= '<div class="alert alert-'.$_SESSION['flash']['type'].'"<p>'.$_SESSION['flash']['message'].'</p></div>';
            $_SESSION['flash']=array();

            return $html;
        }


    }
}