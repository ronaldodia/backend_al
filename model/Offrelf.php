<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 09/08/15
 * Time: 19:01
 * To change this template use File | Settings | File Templates.
 */

class Offrelf extends Model {


    public $validate=array(
        'TITRE_OFFRE'=>array('rule'=>'noEmpty','message'=>'vous devez donner le titre d\'offre'),
        'TAGS'=>array('rule'=>'noEmpty','message'=>'Au moin un tag est requis'),
        'NOMBRE_POSTES'=>array('rule'=>'noEmpty','message'=>'Nombre de postes requis'),
        'NUMERO_INTERNE'=>array('rule'=>'noEmpty','message'=>'Numéro interne requis'),
       );
    public function changeID(){
        $this->primaryKey='ID_OFFRE_LF';
    }
    function addTable(){
        $this->table.=',utilisateurs,clients';
    }
}