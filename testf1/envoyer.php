<?php
ini_set('default_charset', 'UTF-8');

###Include le XMLRPC Library###
require_once("../control/src/isdk.php");


require_once("../bd/fonctions.php");
$CID=0;
$app = new iSDK;
//les variables contenant des mulitple options

echo '<br>' . $email = test_input($_POST['email']);


echo '<br> ancia' . $tagsancia = test_input($_POST['tagsancia']);
echo '<br> lf' . $tagslf = test_input($_POST['tagslf']);

echo '<br>' . $note = test_input($_POST['notes']);

$nurturetags = $_POST['nurturetags'];


$app = new iSDK;


if ($app->cfgCon("connectionName")) {




/*$contact = array(
    "Email" => $email,
    "ContactNotes" => $note
);

   $CID = $app->addWithDupCheck($contact,'Email');

*/

    $CID=find_id_by_email($email,$app);


    $aData = array('ContactId' => $CID,
        'ActionType' => 'Commentaires recruteur',
        'ActionDescription' => 'Commentaires recruteur',
        'CreationNotes' => $note,
    );

    if($note!="")
        $note = $app->dsAdd("ContactAction", $aData);



    $app->optIn($email,'Opt in par API');
    $app->optStatus($email,'Opt in par API');




    if ($CID >0) {

if($tagsancia!="")
$app->grpAssign($CID, $tagsancia);
if($tagslf!="")
$app->grpAssign($CID, $tagslf);
 foreach ($nurturetags as $selectValue) {
     $app->grpAssign($CID, $selectValue);
        }


 //echo '<script>alert("Mise à jour réuissie!");</script>';
            header('Location: tri.php?email='.$email.'&autre='.$CID.'&success');



    } else echo "Le contact n'a pas été mis à jour";

//fin


} else {
    echo "connection échouée!<br/>";
}








//print_r($Col1_Array);


?>