<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 25/08/15
 * Time: 19:57
 * To change this template use File | Settings | File Templates.
 */
//debug($pages);
 //header("Access-Control-Allow-Origin: *");
?>

<script>
    function showUser(str) {
        $.ajax({
            url:"/fioufiouadmin/offreancias/ajax",
            type:'get',
            data:{ID_CLIENT:str},
            dataType:'json',
            success:function(data,status,xhr){
                document.getElementById("inputNOM_EMPLOYEUR").value =data.NOM_CLIENT;
                document.getElementById("inputVILLE_EMPLOYEUR").value =data.VILLE_A_AFFICHER;
                document.getElementById("inputADRESSE_MAP_EMPLOYEUR").value =data.ADRESSE_GOOGLE_MAP;
                document.getElementById("inputENVIRONNEMENT_TRAVAIL_EMPLOYEUR").value =data.ENVIRONNEMENT_TRAVAIL;
            },
            error:function(err){
                console.log(err);
            }
        });


    }
</script>


<div class="page-header">
    <h1>Editer une offre</h1>
</div>
<div class='panel-body'>
    <?php if(isset($client)){?>

        <script>alert("yes");</script>
        <?php debug(($client));}?>
    <?php  if(isset($_SESSION['flash']))echo $this->Session->flash();?>
<form action="<?php Router::url('/admin/offrelfs/edit/'.$id)?>" method="POST" enctype="multipart/form-data">



        <?php echo $this->Form->input('NUMERO_INTERNE','Numero interne du poste');?>
        <?php echo $this->Form->input('TAGS','TAG master');?>
        <?php echo $this->Form->input('NOMBRE_POSTES','Nombre de postes ');?>
        <?php echo $this->Form->input('ACTIF_SUR_WEB','Actif sur le we',array('type'=>'checkbox'));?>
        <?php echo $this->Form->input('COMBLE','Comblé',array('type'=>'checkbox'));?>
        <?php echo $this->Form->input('TACHES_A_REALISER','Description du poste',array('type'=>'textarea','cols'=>20,'rows'=>10));?>
        <?php echo $this->Form->input('INTRODUCTION_OFFRE','Introduction à l\'offre',array('type'=>'textarea','cols'=>20,'rows'=>10));?>
        <?php echo $this->Form->input('SECTEUR_ACTIVITE','Secteur d\'activité',array('type'=>'textarea','cols'=>20,'rows'=>10));?>
        <?php echo $this->Form->input('RESPONSABILITE_SPECIFIQUE','Responsablité spécifique',array('type'=>'textarea','cols'=>20,'rows'=>10));?>
        <?php echo $this->Form->input('PROFILE_RECHERCHE','Profile recherché',array('type'=>'textarea','cols'=>20,'rows'=>10));?>
        <?php echo $this->Form->input('DESCRIPTION_POSTE','Description du poste <div class="text-info" >Pour avoir des points de formes à l\'affichage, vous devriez utiliser le point virgule (;) comme séparateur</div>',array('type'=>'textarea','cols'=>20,'rows'=>10));?>
        <?php echo $this->Form->input('SALAIRE','Salaire offert');?>
        <?php echo $this->Form->input('ID_UTILISATEUR','Personne contact',array('type'=>'users_list','data'=>$utilisateurs));?>
        <?php echo $this->Form->input('ID_CLIENT','Client',array('type'=>'clients_list','data'=>$clients));?>
        <?php echo $this->Form->input('NOM_EMPLOYEUR','Nom de L\'employeur');?>
        <?php echo $this->Form->input('VILLE_EMPLOYEUR','Ville à afficher');?>
        <?php echo $this->Form->input('ADRESSE_MAP_EMPLOYEUR','Adresse google map');?>
        <?php echo $this->Form->input('ID_OFFRE_LF',false,array('type'=>'hidden'));?>
        <?php echo $this->Form->input('ENVIRONNEMENT_TRAVAIL_EMPLOYEUR','Environnement de travail',array('type'=>'textarea','cols'=>20,'rows'=>10));?>
        <div class="control-label col-md-12 text-info" ><h3>Marketing de recrutement</h3></div>
        <?php echo $this->Form->input('TITRE_PAGE','Titre de la page');?>
        <?php echo $this->Form->input('POST_URL_PERM_LINK','Adresse google map');?>
        <?php echo $this->Form->input('META_DESC_REF_WEB','Mots clés Google');?>
        <?php echo $this->Form->input('IMAGE','Image titre',array('type'=>'file','class'=>'input-file'));?>
        <?php echo $this->Form->input('NOTE_INTERNE','Note sur l\'affiche',array('type'=>'textarea','cols'=>20,'rows'=>10));?>



    <div class='form-group'>
        <div class='col-md-offset-4 col-md-3'>
            <button class='btn-lg btn-primary' type='submit'>Soumettre</button>
        </div>

    </div>
</form>
</div>