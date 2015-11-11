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
    <h1>Editer un client</h1>
</div>
<div class='panel-body'>
    <?php  if(isset($_SESSION['flash']))echo $this->Session->flash();?>
<form action="<?php Router::url('/admin/clients/edit/'.$id)?>" method="POST">
<?php echo $this->Form->input('NOM_CLIENT_PRIVE','Nom du client (privé)');?>
<?php echo $this->Form->input('URL_CLIENT','URL DU CLIENT');?>
<?php echo $this->Form->input('NOM_CLIENT','Nom de L\'employeur');?>
<?php echo $this->Form->input('VILLE_A_AFFICHER','Ville à afficher');?>
<?php echo $this->Form->input('ADRESSE_GOOGLE_MAP','Adresse google map');?>
<?php echo $this->Form->input('ID_CLIENT',false,array('type'=>'hidden'));?>
<?php echo $this->Form->input('ENVIRONNEMENT_TRAVAIL','Environnement de travail',array('type'=>'textarea','cols'=>10,'rows'=>5));?>

    <div class='form-group'>
        <div class='col-md-offset-4 col-md-3'>
            <button class='btn-lg btn-primary' type='submit'>Soumettre</button>
        </div>

    </div>
</form>
</div>