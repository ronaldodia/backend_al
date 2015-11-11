<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 09/08/15
 * Time: 19:01
 * To change this template use File | Settings | File Templates.
 */

class Client extends Model {
    public $validate=array(
        'NOM_CLIENT'=>array('rule'=>'noEmpty','message'=>'vous devez donner un nom client (employeur'),
        'NOM_CLIENT_PRIVE'=>array('rule'=>'noEmpty','message'=>'vous devez donner un nom client (privé)'),
        'VILLE_A_AFFICHER'=>array('rule'=>'noEmpty','message'=>'vous devez donner une ville'),
        'SLUG'=>array('rule'=>'([a-z0-9\-]+)','message'=>'le titre page est érroné'));


    public function changeID(){
        $this->primaryKey='ID_CLIENT';
    }
}