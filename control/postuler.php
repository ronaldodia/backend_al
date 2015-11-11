<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 04/05/15
 * Time: 11:01
 * To change this template use File | Settings | File Templates.
 */



require_once("../bd/fonctions.php");
require_once("src/isdk.php");

$app = new iSDK;
$email=test_input($_POST['email']);
$id_poste=test_input($_POST['id-poste']);

if ($app->cfgCon("connectionName")) {
$cid=find_id_by_email($email,$app);
 if(find_id_by_email($email,$app)!=null||find_id_by_email($email,$app)!="")
 {
     //post id pour le test
 //$app->grpAssign($cid,1803);
 $app->grpAssign($cid,$id_poste);
     $app->grpRemove($cid,1817);
 $app->grpAssign($cid,1817);

    // echo utf8_decode("Merci d'avoir postulé, vous recevrez un courriel dans quelques instants");


     header('Location: ../adejapostule.php');
 }
    else
        header('Location: ../index.php?post='.$id_poste.'');


}
else {
    echo "erreur de connexion";
    exit();
}