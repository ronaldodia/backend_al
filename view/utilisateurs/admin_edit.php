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
    <h1>Editer un Utilisateur</h1>
</div>
<div class='panel-body'>
    <?php  if(isset($_SESSION['flash']))echo $this->Session->flash();?>
<form action="<?php Router::url('/admin/utilisateurs/edit/'.$id)?>" method="POST">
<?php echo $this->Form->input('NOM_UTILISATEUR','Nom d\'utilisateur');?>
<?php echo $this->Form->input('DROIT_ACCESS','Droit d\'accès',array('type'=>'select'));?>
<?php echo $this->Form->input('COURRIEL_UTILISATEUR','Courriel de l\'utilisateur');?>
<?php echo $this->Form->input('URL_LINKEDIN','Courriel linkedin');?>
<?php echo $this->Form->input('INFORMATION_POUR_OFFRES','Information pour les offres',array('type'=>'textarea'));?>
<?php echo $this->Form->input('ID_UTILISATEUR',false,array('type'=>'hidden'));?>
<?php echo $this->Form->input('MOTDEPASSE','MOT DE PASSE',array('type'=>'password'));?>
</div><div class='form-group'>
        <div class='col-md-offset-5 col-md-3'>
            <button class='btn-lg btn-primary' type='submit'>Soumettre</button>
        </div>

    </div>
</form>
</div>