<?php
ini_set('default_charset', 'UTF-8');

###Include le XMLRPC Library###
require_once("../control/src/isdk.php");


require_once("../bd/fonctions.php");
$CID=0;
$contacttype="";
$app = new iSDK;
//les variables contenant des mulitple options
$email = test_input($_POST['email']);


$nom = test_input($_POST['nom']);
$prenom = test_input($_POST['prenom']);
$salutation = test_input($_POST['salutation']);
$post_offert = test_input($_POST['poste-offert']);


$note = test_input($_POST['notes']);

$lienoffre = test_input($_POST['lienoffre']);
$raison = test_input($_POST['preferenceoffre']);


$tagsancia = test_input($_POST['tagsancia']);
$tagslf = test_input($_POST['tagslf']);
$user = test_input($_POST['users']);


$app = new iSDK;


if ($app->cfgCon("connectionName")) {
    if( find_id_by_email($email,$app)!=0)
    {

        $contactLeadId='';
    }
    else
    {

        if($raison==221 || $raison==423)
            $contactLeadId=23;
        else
            $contactLeadId=10;


    }
if(in_array($raison,array(417,415,221,419,421)))
{
    $contacttype="ANCIA Candidat";
}
else{
    $contacttype="LF Candidat";
}

$contact = array(
    "FirstName" => $nom,
    "LastName" => $prenom,
    "Email" => $email,
    "_Posteoffertenchasse" => $post_offert,
    "_Offreproposeeenchasse" => $lienoffre,
    "ContactType" => $contacttype,
    "OwnerID" => intval($user),
    "LeadSourceId" =>$contactLeadId
);

   $CID = $app->addWithDupCheck($contact,'Email');
    $app->optIn($email,'Opt in par API');
    $app->optStatus($email,'Opt in par API');




    if ($CID > 0) {


if($tagsancia!="")
$app->grpAssign($CID, $tagsancia);
if($tagslf!="")
$app->grpAssign($CID, $tagslf);
        if(isset($_POST['nurturetags'])){
            $nurturetags = $_POST['nurturetags'];

foreach ($nurturetags as $selectValue) {
            $app->grpAssign($CID, $selectValue);
        }

    }

        if($raison!="")
 $app->grpAssign($CID, $raison);

        $aData = array('ContactId' => $CID,
            'ActionType' => 'Commentaires recruteur',
            'ActionDescription' => 'Commentaires recruteur',
            'CreationNotes' => $note,
        );

        if($note!="")
          $app->dsAdd("ContactAction", $aData);


            header('Location: index.php?success');



    } else echo "Le contact n'a pas été mis à jour";

//fin


} else {
    echo "connection échouée!<br/>";
}








//print_r($Col1_Array);


?>