<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */
/*

foreach($offrelf as $k=>$v):
    echo $v->TITRE_OFFRE;

endforeach;*/

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
        <h2><span>12</span> Emplois disponibles</h2>
    </div>
    <div class="row jobs">
        <div class="col-md-9">
            <div class="job-posts table-responsive">
                <table class="table">
                    <?php $cpt=0;
                    // debug($offreancia);
                    $class="odd wow fadeInUp";foreach($offrelf as $k=>$v):
                        if($cpt>1)$class="odd hide-jobs";
                        echo '<tr class="'.$class.'" data-wow-delay="1s">';
                        echo '<td class="tbl-logo"><img src="http://localhost/ancialf/img/job-logo1.png" alt=""></td>';
                        echo ' <td class="tbl-title"><h4>'.$v->TITRE_OFFRE.' <br><span class="job-type">'.$v->STATUT_POSTE.'</span></h4></td>
                      ';
                        echo '<td><p> Salaire :&dollar;'.$v->SALAIRE.' </p></td>';
                        //echo '<td><a href="http://localhost/ancialf_git/offreancias/view/'.$v->ID_OFFRE_ANCIA.'"> Détails </a></td>';
                        echo '<td><a href="'.Router::url("offrelfs/view/id:{$v->ID_OFFRE_LF}/slug:{$v->TITRE_PAGE}").'"> Détails </a></td>';
                        echo '<td><p><i class=""></i>'.$v->SECTEUR_ACTIVITE.'</p></td>
                      ';
                        echo '<td><p> Date d\'affichage '.$v->DATE_AFFICHAGE.'</p></td>';
                        echo '<td class="tbl-apply"><a href="#">Postuler</a></td>
                    </tr>';
                        $cpt++;
                    endforeach;?>






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
            <div class="more-jobs">
                <a href=""> <i class="fa fa-refresh"></i>Voir plus</a>
            </div>
        </div>
        <div class="col-md-3 hidden-sm">
            <div class="job-add wow fadeInRight" data-wow-delay="1.5s">
                <h2>Vous chercher un emploi?</h2>
                <!--<a href="#">,</a>-->
            </div>
        </div>
    </div>
</div>