<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 09/08/15
 * Time: 19:01
 * To change this template use File | Settings | File Templates.
 */

class Offreancia extends Model {


    public $validate=array(
        'TITRE_OFFRE'=>array('rule'=>'noEmpty','message'=>'le titre de l\'offre est requis'),
        'FORMATION_REQUISE'=>array('rule'=>'noEmpty','message'=>'La formation est requise!'),
        'COMPETENCES_REQUISES'=>array('rule'=>'noEmpty','message'=>'Compétences est requise!'),
         'TITRE_PAGE'=>array('rules'=>'slug','rule'=>'([a-z0-9\-]+)','message'=>'le titre offre est érroné'));
      function addTable(){
       $this->table.=',utilisateurs,clients';
    }
    public function changeID(){
        $this->primaryKey='ID_OFFRE_ANCIA';
    }
}