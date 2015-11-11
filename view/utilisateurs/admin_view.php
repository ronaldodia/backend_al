<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */


?>

<h2 class="sub-header">Détails de <?php echo $utilisateurs->NOM_UTILISATEUR ?></h2>

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
<a href="<?php echo Router::url('admin/utilisateurs/edit/'.$utilisateurs->ID_UTILISATEUR)?>">Editer</a>
        <h3> <span class=""> Nom de l'utilisateur: </span>
        <span class="text-info "><?php echo $utilisateurs->NOM_UTILISATEUR ?>  </span></h3>
        <h3> <span class=""> Courriel de l'utilisateur: </span>
        <span class="text-info "><?php echo $utilisateurs->COURRIEL_UTILISATEUR ?>  </span></h3>
        <?php if($utilisateurs->URL_LINKEDIN){?>
        <h3> <span class=""> URL LINKEDIN: </span>
        <span class="text-info "><?php echo $utilisateurs->URL_LINKEDIN?>  </span>
        </h3>
        <?php }?>
        <h3> <span class=""> Information pour les offres: </span>
        <span class="text-info "><?php echo $utilisateurs->INFORMATION_POUR_OFFRES ?>  </span></h3>
        <h3> <span class=""> Droit d'accès: </span>
                <span class="text-info "><?php echo ($utilisateurs->DROIT_ACCESS==1)?'ADMIN':'Utilisateur'; ?>  </span></h3>


    </div>
