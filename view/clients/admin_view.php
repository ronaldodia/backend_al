<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */


?>

<h2 class="sub-header">Détails de <?php echo $clients->NOM_CLIENT_PRIVE ?></h2>

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
<a href="<?php echo Router::url('admin/clients/edit/'.$clients->ID_CLIENT)?>">Editer</a>
        <h3> <span class=""> Nom client: </span>
        <span class="text-info "><?php echo $clients->NOM_CLIENT ?>  </span></h3>
        <h3> <span class=""> Nom client (privé): </span>
        <span class="text-info "><?php echo $clients->NOM_CLIENT_PRIVE ?>  </span></h3>
        <?php if($clients->URL_CLIENT){?>
        <h3> <span class=""> Nom client (nom employeur): </span>
        <span class="text-info "><?php echo $clients->URL_CLIENT?>  </span>
        </h3>
        <?php }?>
        <h3> <span class=""> Ville à afficher: </span>
        <span class="text-info "><?php echo $clients->VILLE_A_AFFICHER ?>  </span></h3>
        <h3> <span class=""> Adresse google map: </span>
        <span class="text-info "><?php echo $clients->ADRESSE_GOOGLE_MAP ?>  </span></h3>
 <h3> <span class=""> Environnement de travail: </span>
        <span class="text-info "><?php echo $clients->ENVIRONNEMENT_TRAVAIL ?>  </span></h3>



    </div>
