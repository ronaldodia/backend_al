<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * email:alassane-mpf@live.fr
 * Date: 28/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */




?>
<div class="container col-md-11">

    <h2 class="sub-header">Liste des offres</h2>
    <div class="page-header" ><a href="<?php echo Router::url('admin/posts/edit');?>" class="btn btn-primary">Ajouter un poste</a>
    </div>
    <table id="myTable" class="display table table-responsive "  >
        <thead>
        <tr>
            <th>Statut</th>
            <th>Numéro interne du poste</th>
            <th>Firme</th>
            <th>Client</th>
            <th>Titre du poste</th>
            <th>Date d'affichage</th>
            <th>Etat sur le web</th>
            <th>Actions</th>


        </tr>
        </thead>
        <tbody>

        <?php foreach($posteslf as $k=>$v):?>
            <tr>
                <td><?php echo($v->COMBLE==0)?'<span class="alert-success">Actif</span>':'<span class="alert-warning">comblé</span>';?></td>
                <td><a href="<?php echo Router::url('admin/offrelfs/view/'.$v->ID_OFFRE_LF)?>"><?php echo $v->NUMERO_INTERNE;?></a></td>
                <td><?php echo "Lefebvre & Fortier";?></td>
                <td><a href="<?php echo Router::url('admin/clients/view/'.$v->ID_CLIENT)?>"><?php echo $v->NOM_CLIENT;?></a></td>
                <td><?php echo$v->TITRE_OFFRE?></td>
                <td><?php echo$v->DATE_AFFICHAGE?></td>
                <td><?php echo($v->ACTIF_SUR_WEB==1)?'<span class="btn-success">Affiché</span>':'<span class="btn-danger">Caché</span>';?></td>

                <td><a onclick="return confirm('vous etes sur de vouloir supprimer');" href="<?php echo Router::url('admin/offrelfs/delete/'.$v->ID_OFFRE_LF)?>"><img title="supprimer" height="20" width="20" src="<?php echo Router::url('webroot/img/delete.png');?>"></a>
                    <a href="<?php echo Router::url('admin/offrelfs/edit/'.$v->ID_OFFRE_LF)?>"><img title="Editer" height="20" width="20" src="<?php echo Router::url('webroot/img/edit.png');?>"></a></td>

            </tr>


        <?php endforeach;?>
        <?php foreach($postesancia as $k=>$v):?>
            <tr>
                <td><?php echo($v->COMBLE==0)?'<span class="alert-success"> Actif</span>':'<span class="alert-warning">comblé</span>';?></td>
                <td><a href="<?php echo Router::url('admin/offreancias/view/'.$v->ID_OFFRE_ANCIA)?>"><?php echo $v->NUMERO_INTERNE;?></a></td>
                <td><?php echo "ANCIA";?></td>
                <td><a href="<?php echo Router::url('admin/clients/view/'.$v->ID_CLIENT)?>"><?php echo $v->NOM_CLIENT;?></a></td>
                <td><?php echo$v->TITRE_OFFRE?></td>
                <td><?php echo$v->DATE_AFFICHAGE?></td>
                <td><?php echo($v->ACTIF_SUR_WEB==1)?'<span class="btn-success">Affiché</span>':'<span class="btn-danger">Caché</span>';?></td>
                <td><a onclick="return confirm('vous etes sur de vouloir supprimer');" href="<?php echo Router::url('admin/offreancias/delete/'.$v->ID_OFFRE_ANCIA)?>"><img title="supprimer" height="20" width="20" src="<?php echo Router::url('webroot/img/delete.png');?>"></a>
                    <a href="<?php echo Router::url('admin/offreancias/edit/'.$v->ID_OFFRE_ANCIA)?>"><img title="Editer" height="20" width="20" src="<?php echo Router::url('webroot/img/edit.png');?>"></a></td>

            </tr>


        <?php endforeach;?>
        </tbody>
    </table>  </div>

<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>