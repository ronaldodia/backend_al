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

    <h2 class="sub-header">Liste des clients</h2>
    <div class="page-header" ><a href="<?php echo Router::url('admin/clients/edit');?>" class="btn btn-primary">Ajouter un client</a>
</div>
        <table id="myTable" class="display table " width="90%" >
        <thead>
        <tr>
            <th>N° Client</th>
            <th>Nom Client</th>
            <th>Nom Employeur</th>
            <th>Actions</th>


        </tr>
        </thead>
        <tbody>

        <?php foreach($clients as $k=>$v):?>
            <tr>
                <td><?php echo $v->ID_CLIENT;?></td>
                <td><?php echo $v->NOM_CLIENT_PRIVE;?></td>
                <td><a href="<?php echo Router::url('admin/clients/view/'.$v->ID_CLIENT)?>"><?php echo $v->NOM_CLIENT;?></a></td>
                <td><a onclick="return confirm('vous etes sur de vouloir supprimer');" href="<?php echo Router::url('admin/clients/delete/'.$v->ID_CLIENT)?>"><img title="supprimer" height="20" width="20" src="<?php echo Router::url('webroot/img/delete.png');?>"></a>
                    <a href="<?php echo Router::url('admin/clients/edit/'.$v->ID_CLIENT)?>"><img title="Editer" height="20" width="20" src="<?php echo Router::url('webroot/img/edit.png');?>"></a></td>

            </tr>


        <?php endforeach;?>
        </tbody>
    </table>  </div>

<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>