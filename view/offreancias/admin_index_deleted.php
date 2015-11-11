<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */



?>
<div class="container">
    <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
        <h5>Emplois récents</h5>
        <h2><span><?php echo count($offreancia); ?></span> Emplois disponibles</h2>
    </div>
    <div class="row jobs">
        <div class="col-md-9">
            <div class="job-posts table-responsive">
                <table class="table">
                   <?php
                  // debug($offreancia);
                   foreach($offreancia as $k=>$v):?>

                        <tr><td class=""><img src="http://localhost/ancialf/img/job-logo1.png" alt="">
                        <h3><i><?php echo $v->NOM_EMPLOYEUR?></i></h3>
                        </td><td class="tbl-title"><h4><?php echo $v->TITRE_OFFRE?> <br><span class="job-type"><?php echo $v->STATUT_POSTE ?></span></h4></td>
                      <td><p> Salaire :&dollar;<?php echo $v->SALAIRE ?> </p></td><td><a href="<?php echo Router::url('admin/offreancias/view/'.$v->ID_OFFRE_ANCIA);?>"> Détails </a></td>';

                    <td><p><i class="icon-location"></i><?php echo $v->VILLE_EMPLOYEUR?></p></td>
                     <td><p> Date d\'affichage <?php echo $v->DATE_AFFICHAGE?></p></td>
                   <td class="tbl-apply"><a href="#">Postuler</a></td>
                    </tr>

                   <?php endforeach;?>






                   <!-- <tr class="even hide-jobs">
                        <td class="tbl-logo"><img src="http://localhost/ancialf/img/job-logo4.png" alt=""></td>
                        <td class="tbl-title"><h4>Internship Designer <br><span class="job-type">full time</span></h4></td>
                        <td><p>Google</p></td>
                        <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                        <td><p>&dollar; 14000</p></td>
                        <td class="tbl-apply"><a href="#">Apply now</a></td>
                    </tr>
                    <tr class="odd hide-jobs">
                        <td class="tbl-logo"><img src="http://localhost/ancialf/img/job-logo5.png" alt=""></td>
                        <td class="tbl-title"><h4>Software Designer <br><span class="job-type">full time</span></h4></td>
                        <td><p>Microsoft</p></td>
                        <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                        <td><p>&dollar; 14000</p></td>
                        <td class="tbl-apply"><a href="#">Apply now</a></td>
                    </tr>
                    <tr class="even hide-jobs">
                        <td class="tbl-logo"><img src="http://localhost/ancialf/img/job-logo4.png" alt=""></td>
                        <td class="tbl-title"><h4>Internship Designer <br><span class="job-type">full time</span></h4></td>
                        <td><p>Google</p></td>
                        <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                        <td><p>&dollar; 14000</p></td>
                        <td class="tbl-apply"><a href="#">Apply now</a></td>
                    </tr>
                    <tr class="odd hide-jobs">
                        <td class="tbl-logo"><img src="http://localhost/ancialf/img/job-logo5.png" alt=""></td>
                        <td class="tbl-title"><h4>Software Designer <br><span class="job-type">full time</span></h4></td>
                        <td><p>Microsoft</p></td>
                        <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                        <td><p>&dollar; 14000</p></td>
                        <td class="tbl-apply"><a href="#">Apply now</a></td>
                    </tr>-->
                </table>
            </div>

        </div>

    </div>
</div>