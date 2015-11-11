<?php
ini_set('default_charset', 'UTF-8');

###Include le XMLRPC Library###
require_once("src/isdk.php");


require_once("../bd/fonctions.php");
$offre_id=0;
$app = new iSDK;
//les variables contenant des mulitple options
$array_formation = array();
$array_certification = array();
$array_secteuractivite = array();
$array_niveaux_professionnel = array();

echo $nom = test_input($_POST['nom']);
$filename = 'fichiercv';
 $prenom = test_input($_POST['prenom']);
echo '<br>' . $email = test_input($_POST['email']);

echo '<br>' . $telephone1 = test_input($_POST['telephone1']);
echo '<br>' . $telephone2 = test_input($_POST['telephone2']);

echo '<br>' . $salutation = test_input($_POST['salutation']);
echo '<br>' . $ville = test_input($_POST['ville']);
echo '<br>' . $province = test_input($_POST['province']);
echo '<br>' . $adresse = test_input($_POST['adresse']);
echo '<br>' . $codepostal = test_input($_POST['codepostal']);
echo '<br>' . $preferenceoffre = test_input($_POST['preferenceoffre']);
echo '<br>' . $commentaire = test_input($_POST['commentaire']);
echo '<br>' . $pro_senior = test_input($_POST['pro_senior']);
echo '<br>' . $vice_presi = test_input($_POST['vice_presidence']);
echo '<br>' . $dg = test_input($_POST['direction']);
echo '<br>' . $presi_dg = test_input($_POST['president_dg']);
echo '<br>' . $anglais= test_input($_POST['anglais']);
$offre_id= test_input($_POST['offre_id']);

$formation = $_POST['diplomes'];
//$certification = $_POST['certifications'];
$departement = $_POST['fonctionentreprise'];
//$secteuractivite = $_POST['secteuractivite'];
$filename='fichiercv';
$f = ""; //formation pour le champ personnalisé
$niveau = ""; //niveau atteint pour le champ personnalisé
$certif_pro = ""; //certification professionnel pour le champ personnalisé
$tous_dpartement = ""; //departement pour le champ personnalisé
$secteur_activite = ""; //secteur d'activité pour le champ personnalisé
$anglais_champs="";
//parcourir toutes les formations selectionner et recuperer le dernier éléments de chaque ligne de
//$formation retourner, étant donné que le dernier élément de chaque ligne contient le nom de la formation,
//le reste contient des TAG ID

foreach ($formation as $selectValue) {
    $array_formation = explode(',', $selectValue);

    $f = $f . utf8_decode($array_formation[count($array_formation) - 1]) . ", ";
}
//recuperer toutes certifications dans le tableau $array_certification
/*foreach ($certification as $selectValue) {
    $array_certification = explode(',', $selectValue);
    $certif_pro = $certif_pro . test_input(utf8_decode($array_certification[count($array_certification) - 1]) ). ", ";

//recuperer tous les departements dans le tableau $array_secteuractivite
}*///recuperer toutes certifications dans le tableau $array_certification
foreach ($departement as $selectValue) {
    $array_departement = explode(',', $selectValue);
    $tous_dpartement = $tous_dpartement . test_input(utf8_decode($array_departement[count($array_departement) - 1]) ). ", ";

//recuperer tous secteur dans le tableau $array_secteuractivite
}

/*foreach ($secteuractivite as $selectValue) {
    $array_secteuractivite = explode(',', $selectValue);
    // echo "siez".count($array_secteuractivite);
    $secteur_activite = $secteur_activite . test_input(utf8_decode($array_secteuractivite[count($array_secteuractivite) - 1])) . ", ";
}
*/
//les niveaux profession :

if(isset($pro_senior))
{
    $array = explode(',', $pro_senior); //Extraire les éléments séprés par des virgule et les mettre dans un tableau
    $niveau = $niveau . $array[count($array) - 1]. ", "; //recuperer le dernier élément du tableau qui correspond au niveaux
}
if(isset($vice_presi))
{
$array = explode(',', $vice_presi); //Extraire les éléments séprés par des virgule et les mettre dans un tableau
$niveau = $niveau .$array[count($array) - 1]. ", "; //recuperer le dernier élément du tableau qui correspond au niveaux
}
if(isset($dg))
{
$array = explode(',', $dg); //Extraire les éléments séprés par des virgule et les mettre dans un tableau
$niveau = $niveau .$array[count($array) - 1] . ", "; //recuperer le dernier élément du tableau qui correspond au niveaux
}
if(isset($presi_dg))
{
$array = explode(',', $presi_dg); //Extraire les éléments séprés par des virgule et les mettre dans un tableau
$niveau = $niveau .$array[count($array) - 1]. ", "; //recuperer le dernier élément du tableau qui correspond au niveaux
}
//pour l'anglais
$array = explode(',', $anglais); //Extraire les éléments séprés par des virgule et les mettre dans un tableau
$anglais_champs = $anglais_champs . $array[count($array) - 1]. ", "; //recuperer le dernier élément du tableau qui correspond au niveaux


//echo "tous les niveaux".utf8_encode($niveau);



$app = new iSDK;


if ($app->cfgCon("connectionName")) {

    if( find_id_by_email($email,$app)!=0)
    {
        $exist=true;
        $contactLeadId='';
    }
    else
    {$exist=false;

        $contactLeadId=22;
    }

    if(is_uploaded_file($_FILES['fichiercv']['tmp_name'])){

        $url=file_upload($filename,enlever_accents($nom),enlever_accents($prenom),$telephone1);


    }
$contact = array(
    "FirstName" => $nom,
    "LastName" => $prenom,
    "Email" => $email,
    "Phone1" => $telephone1,
    "Phone2" => $telephone2,
    "State" => $province,
    "StreetAddress1" => $adresse,
    "PostalCode" => $codepostal,
    "City" => $ville,
    "ContactNotes" => $commentaire,
    "Website" => $url,
	"ContactType" => 'ANCIA Candidat',
	"LeadSourceId" =>$contactLeadId,
    "_Formation" => utf8_encode(remove_underscor($f)),
    "_Experienceprofessionnelle" => utf8_encode($tous_dpartement),
    "_Niveauhirarchique" => $niveau,
    "_Langue" =>$anglais_champs,
);
//$url_cv='http://emploi.lefebvrefortier.ca/'.file_upload($filename,$nom,$prenom,$telephone1);

//$CID=ajoutContact($contact);




//créer le tag pour postuler


    //check si c'est un nouveau candidat ou non

    //echo "le id". $CID = $app->addCon($contact);
    echo "<b>le id<br>". $CID = $app->addWithDupCheck($contact,'Email');

    $app->optIn($email,'Opt in par API');
    $app->optStatus($email,'Opt in par API');

//debut
    //echo "initialiser". $CID = 147;

    if ($CID >=!0) {
        echo "c'est !".$CID;
      //ajout des TAGS quand le candidat est créé:

//TAG POUR LA PROVENANCE
 $aData = array('ContactId' => $CID,
            'ActionType' => 'Notes de formulaire',
            'ActionDescription' => 'Note du formulaire',
            'CreationNotes' => $commentaire,
        );

if($commentaire!="")
      $note = $app->dsAdd("ContactAction", $aData);

        //créer et applicquer le tag pour postuler








        //enlever tous les TAGS di CID, pour la mise à jour
        removing_tags($CID,$app);
        $app->grpAssign($CID, 1816);
       // $app->grpAssign($CID, 431);

        //tags préférences
        $tags = array();
        $tags = explode(',', $preferenceoffre);
        // pour les tags
        for ($i = 0; $i <= count($tags) - 1; $i++) {
            $app->grpAssign($CID, $tags[$i]);

        }

        //Tags Formations
        foreach ($formation as $selectValue) {
            $tags = array();
            $tags = explode(',', $selectValue);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }

        //Tags certifications
       /* foreach ($certification as $selectValue) {
            $tags = array();
            $tags = explode(',', $selectValue);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }*/


// pour les departements
        foreach ($departement as $selectValue) {
            $tags = array();
            $tags = explode(',', $selectValue);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }
        //Tags secteurs d'activité
        /*foreach ($secteuractivite as $selectValue) {
            $tags = array();
            $tags = explode(',', $selectValue);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }*/


        // Tags pour le niveau professionnel-vice président
        if ($vice_presi != "") {
            $tags = explode(',', $vice_presi);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }
        // Tags pour le niveau professionnel: directeur général
        if ($dg != "") {
            $tags = explode(',', $dg);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }

        //// Tags pour le niveau professionnel- PDG
        if ($presi_dg != "") {
            $tags = explode(',', $presi_dg);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }

        // Tags pour le niveau professionnel: professionnel senior
        if ($pro_senior != "") {
            $tags = explode(',', $pro_senior);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }
        // Tags Anglais
        if ($anglais != "") {
            $tags = explode(',', $anglais);
            // pour les tags
            for ($i = 0; $i <= count($tags) - 2; $i++) {
                $app->grpAssign($CID, $tags[$i]);
            }
        }
        if($offre_id!=0)
        $app->grpAssign($CID, $offre_id);


if($offre_id!=0 ||$exist==false ){

            header('Location: ../confirm.php');
        }else
            header('Location: ../update_success.php');



    } else echo "Le contact n'a pas été créé";

//fin


} else {
    echo "connection échouée!<br/>";
}








//print_r($Col1_Array);


?>