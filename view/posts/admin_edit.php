<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 25/08/15
 * Time: 19:57
 * To change this template use File | Settings | File Templates.
 */
//debug($pages);

?>
<div class="page-header">
    <h1>Créer une offre</h1>
</div>
<div class="container-fluid">
    <form action="<?php Router::url('/admin/posts/edit/')?>" method="POST">
        <?php echo $this->Form->input('PREVENANCE','',array('type'=>'radio',1=>'ANCIA',2=>'Lefebvre & Fortier'));?>

        <?php echo $this->Form->input('DATE_AFFICHAGE','Date d\'affichage',array('required'=>'required'));?>
        <?php echo $this->Form->input('TITRE_OFFRE','Titre du poste',array('required'=>'required'));?>

        <?php echo $this->Form->input('ID_UTILISATEUR','Personne contact',array('type'=>'users_list','data'=>$utilisateurs));?>
        <?php echo $this->Form->input('ID_CLIENT','Client',array('type'=>'clients_list','data'=>$clients));?>
        <?php echo $this->Form->input('NUMERO_INTERNE','Numero interne du poste',array('required'=>'required'));?>
        <?php echo $this->Form->input('TAGS','TAG master<div class="text-info col-md-12" >Pour entrer plusieurs Tags, vous pouvez les séparer par Enter ou une virgule</div>',array('data-role'=>'tagsinput','style'=>"width:50em !important;"),array('required'=>'required'));?>
    <div class="actions col-md-2">
            <input type="submit" value="Valider" class="btn btn-primary">
        </div>
    </form></div>