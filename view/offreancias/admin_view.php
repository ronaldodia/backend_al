<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */


$title_for_layout=$page->TITRE_OFFRE;


echo 'Titre de l\'offre :<b>'. $page->TITRE_OFFRE;
if($page->TACHES_A_REALISER)
echo '</b><br> Tache à réaliser:<b>'. add_puce($page->TACHES_A_REALISER);
if($page->FORMATION_REQUISE)
echo '</b><br> Expérience:<br><b>'. add_ou_et($page->FORMATION_REQUISE)."</b>";
if($page->COMPETENCES_REQUISES)
echo '<br> Cométences requises:<br><b>'. add_ou_et($page->COMPETENCES_REQUISES);
if($page->CARACTERISTIQUES_PERSONNELLES)
echo '<br> On dit que vous êtes:<br><b>'. add_puce($page->CARACTERISTIQUES_PERSONNELLES)."</br>";
if($page->EXEMPLE_TACHES_A_REALISER)
echo '<br> Exemple de tâches à réaliser:<br><b>'. add_puce($page->EXEMPLE_TACHES_A_REALISER)."</br>";
if($page->EXEMPLE_TACHES_A_REALISER)
echo '<br> Conditions d\'emploi:<br><b>'. add_puce($page->CONDITIONS_EMPLOI)."</br>";
if($page->NOM_UTILISATEUR)
echo '<br> Personne contact:<br><b>'. $page->NOM_UTILISATEUR."</br>";
if($page->ENVIRONNEMENT_TRAVAIL_EMPLOYEUR)
echo '<br> Environnement de travail:<br><b>'. add_puce($page->ENVIRONNEMENT_TRAVAIL_EMPLOYEUR)."</br>";
if($page->NOM_EMPLOYEUR)
echo '<br> Nom de l\'employeur<br><b>'. $page->NOM_EMPLOYEUR."</br>";
if($page->NOMBRE_POSTES)
echo '<br> Nombre de postes<br><b>'. $page->NOMBRE_POSTES."</br>";
if($page->STATUT_POSTE)
{echo '<br> Statut poste :<br><b>';
    if($page->STATUT_POSTE==1) echo 'Long terme'."</br>";
    if($page->STATUT_POSTE==2) echo 'Moyen terme'."</br>";}
if($page->SALAIRE)
echo '<br> Salaire :<br><b>'. $page->SALAIRE."</br>";

?>
