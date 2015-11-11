<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * email:alassane-mpf@live.fr
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */




?>
<div class="table-responsive container container-fluid">
    <table id="myTable" class="display table" width="90%" >
    <thead>
    <tr>
        <th>N° Client</th>
        <th>Nom Client</th>
        <th>Nom Employeur</th>

    </tr>
    </thead>
    <tbody>

   <?php foreach($clients as $k=>$v):?>
    <tr>
        <td><?php echo $v->ID_CLIENT;?></td>
        <td><?php echo $v->NOM_CLIENT_PRIVE;?></td>
        <td><?php echo $v->NOM_CLIENT;?></td>

    </tr>


<?php endforeach;?>
    </tbody>
</table>  </div>

