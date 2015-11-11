<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */



?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */


$title_for_layout=$page->TITRE_OFFRE;


echo 'Titre de l\'offre :<b>'. $page->TITRE_OFFRE."<br>";
if($page->TACHES_A_REALISER)
    echo '</b><br> Tache à réaliser:<br><b>'. add_puce($page->TACHES_A_REALISER);
if($page->SECTEUR_ACTIVITE)
    echo '</b><br> Secteur d\'activité:<br><b>'. add_puce($page->SECTEUR_ACTIVITE)."</b>";
if($page->RESPONSABILITE_SPECIFIQUE)
    echo '<br> Responsabilité spécifique:<br><b>'. add_puce($page->RESPONSABILITE_SPECIFIQUE);

if($page->PROFILE_RECHERCHE)
    echo '<br> Profile recherché:<br><b>'. add_puce($page->PROFILE_RECHERCHE)."</br>";
if($page->PHRASE_ACCROCHE)
    echo '<br> Phrase d\'accroche:<br><b>'. add_puce($page->PHRASE_ACCROCHE)."</br>";
if($page->INTRODUCTION_OFFRE)
    echo '<br> Introduction de l\'offre:<br><b>'. $page->INTRODUCTION_OFFRE."</br>";
if($page->ENVIRONNEMENT_TRAVAIL_EMPLOYEUR)
    echo '<br> Environnement de travail:<br><b>'. add_puce($page->ENVIRONNEMENT_TRAVAIL_EMPLOYEUR)."</br>";
if($page->NOM_EMPLOYEUR)
    echo '<br> Nom de l\'employeur<br><b>'. $page->NOM_EMPLOYEUR."</br>";
if($page->NOMBRE_POSTES)
    echo '<br> Nombre de postes<br><b>'. $page->NOMBRE_POSTES."</br>";
if($page->STATUT_POSTE)
    echo '<br> Statut poste :<br><b>'. $page->STATUT_POSTE."</br>";
if($page->SALAIRE)
    echo '<br> Salaire <i class=";&dollar"></i>:<br><b>'. $page->SALAIRE."</br>";


?>

