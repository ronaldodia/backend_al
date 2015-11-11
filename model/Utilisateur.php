<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 09/08/15
 * Time: 19:01
 * To change this template use File | Settings | File Templates.
 */

class Utilisateur extends Model {
    public $validate=array(
        'NOM_UTILISATEUR'=>array('rule'=>'noEmpty','message'=>'vous devez donner un nom d\'utilisateur'),
        'COURRIEL UTILISATEUR'=>array('rule'=>'noEmpty','message'=>'Donner une adresse courriel'),
        'DROIT_ACCESS'=>array('rule'=>'noEmpty','message'=>'SELECTIONNER UN DROIT ACCESS A L\'UTILISATEUR'));


    public function changeID(){
        $this->primaryKey='ID_UTILISATEUR';
    }

}