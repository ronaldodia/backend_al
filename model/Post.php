<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 09/08/15
 * Time: 19:01
 * To change this template use File | Settings | File Templates.
 */

class Post extends Model {
    public $validate=array(
        'TITLE'=>array('rule'=>'noEmpty','message'=>'vous devez donner un titre'),
        'NUMERO_INTERNE'=>array('rule'=>'noEmpty','message'=>'Veuillez indiquer un numéro interne'),
        'SLUG'=>array('rule'=>'([a-z0-9\-]+)','message'=>'le titre page est érroné'));




public function changeID(){
    $this->primaryKey='ID';
}



}