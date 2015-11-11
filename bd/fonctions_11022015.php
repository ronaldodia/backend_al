
<?php

mb_internal_encoding('UTF-8');
/*
 * Following code will list all the personnels
 */

// array for JSON response
$response = array();

// include db connect class
require_once ('db_connect.php');

//require_once('../control/src/isdk.php');

// connecting to db
$db = new DB_CONNECT();

// get all formations from diplome table
 function liste_diplome($id){
    $result = mysql_query("SELECT * FROM diplome, niveau_programme WHERE diplome.id_niveau=niveau_programme.id_niveau AND diplome.id_niveau=$id") or die(mysql_error());
   return $result;

}


// get all formations from diplome table
function tags_diplome($diplome){
    $diplome=utf8_decode($diplome);

    //$result = mysql_query("SELECT * FROM diplome, niveau_programme WHERE diplome.id_niveau=niveau_programme.id_niveau AND diplome.diplome=\"".$diplome."\" ") or die(mysql_error());
    $result = mysql_query("SELECT * FROM diplome, niveau_programme WHERE diplome.id_niveau=niveau_programme.id_niveau AND diplome.diplome=\"".$diplome."\"") or die(mysql_error());
return $result;
}

function file_upload($filename,$nom,$prenom,$telephone){
$noerror=0;

    $list_types=array("application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/x-pdf","application/acrobat","applications/vnd.pdf","text/pdf","text/x-pdf");
    // création de l'objet finfo
    $infos = new finfo(FILEINFO_MIME);
    //récupération des infos du fichier
    $type = $infos->file($_FILES[$filename]['tmp_name']);

    //extraction du type MIME
    $mime = substr($type, 0, strpos($type, ';'));

    if ($_FILES[$filename]["size"] > 500000) {
        print "desolé, veuillez sélectionner un fichier moins que 500kb";
        $noerror=1;
    }



    if(in_array($mime,$list_types)) { // c'est un PDF

        // notez qu'il est  sans doute préférable de renommer
if($noerror==0){

    if(file_exists('/uploads/'.$nom.'_'.$prenom.'_'.$telephone.'.'.trouverExtension($mime))) unlink('/uploads/'.$nom.'_'.$prenom.'_'.$telephone.'.'.trouverExtension($mime));
    if(move_uploaded_file($_FILES[$filename]['tmp_name'],'../uploads/'.$nom.'_'.$prenom.'_'.$telephone.'.'.trouverExtension($mime)))
    {
        echo " fichier uploadé ";
        return urldecode('http://emploi.ancia.ca/uploads/'.$nom.'_'.$prenom.'_'.$telephone.'.'.trouverExtension($mime));

    }

    else {"une erreur est produite lors de l'upload";
    return '';}
}
        else{
            return '';
        }
    }
    else{
        // ce n'est pas un PDF
        print "Veuillez envoyer un fichier pdf ou word, s'il vous plaît!";
        return '';
    }

 }
function trouverExtension($type){
    $extension='';
    switch ($type){
        case 'application/pdf':
            $extension='pdf';
            break;
        case 'application/msword':
            $extension='doc';
            break;
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            $extension='docx';
            break;
        default:
            $extension='';

    }
    return $extension;
}



function remove_underscor($var){
    return str_replace("_", " ", $var);
}
function remove_comma($var){
    return str_replace(",", "", $var);
}
function remove_blank($var){
return $var = preg_replace('/\s+/', '', $var);}


function enlever_accents($str, $charset='utf-8'){
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

    return $str;

}
function enlever_accents2($str, $charset='utf-8'){
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    $str=str_replace("'", "", $str);
    $str=str_replace("#039;", "", $str);
    return $str;

}

/*
function select($cid){
    $app = new iSDK;
    echo "created object!<br/>";

    if ($app->cfgCon("connectionName")) {
    $returnFields = array('Email', 'FirstName', 'LastName','_Formation');
    return $conDat = $app->dsLoad("Contact", $cid, $returnFields);

}else return "erreur de chargement";
}*/

function find_email($id,$app){

    $returnFields = array('Email');
    $query = array('Id' => $id);
    $contacts = $app->dsQuery("Contact",1,0,$query,$returnFields);

    return $contacts[0]['Email'];

}


function find_id_by_email($email,$app){
    $fields = array('Id');
    $query = array('Email' => $email);
    $result = $app->dsQuery('Contact', 1, 0, $query, $fields);
    if($result!=null || $result!="")
return  $result[0]['Id'];
    else
        return 0;

}


function removing_tags($cid,$app){
if(find_email($cid,$app)!=""){
    $fields = array('GroupId','ContactGroup');
    $query = array('ContactId' => $cid);
    $result = $app->dsQuery('ContactGroupAssign', 1000, 0, $query, $fields);
    $count=count($result);
echo $result[9]['ContactGroup'];

    for( $x = 0; $x < $count; $x++ ) {
        //echo $result[$x]['Id'] . "<br>";
        //echo $result[$x]['GroupId'] . "<br>";
        if(!find_tags_category($result[$x]['GroupId'],$app))
        //echo $result[$x]['ContactGroup'];

       $app->grpRemove($cid,$result[$x]['GroupId']);
    }
}}
function find_tags_category($tagid,$app){

    $fields = array('GroupCategoryId','GroupName');
    $query = array('Id' => $tagid);
    $result = $app->dsQuery('ContactGroup', 1000, 0, $query, $fields);
   // $count=count($result);
//echo $result[9]['ContactGroup'];

        //echo $result[$x]['Id'] . "<br>";
        //echo $result[$x]['GroupId'] . "<br>";
      //  if($result[$x]['ContactGroup']=='Postes LF' ||$result[$x]['ContactGroup']=='Postes ANCIA'||$result[$x]['ContactGroup']=='Nurture Tags')

        if( $result[0]['GroupCategoryId']==57||$result[0]['GroupCategoryId']==49||$result[0]['GroupCategoryId']==51||$result[0]['GroupCategoryId']==10)
            return true;
    else return false;

        //$app->grpRemove($cid,$result[$x]['GroupId']);

}
function tags_by_id($cid,$app){
if(find_email($cid,$app)!=""){
    $fields = array('GroupId');
    $query = array('ContactId' => $cid);
   return $result = $app->dsQuery('ContactGroupAssign', 1000, 0, $query, $fields);

}


}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data =  htmlspecialchars($data,ENT_QUOTES,'ISO-8859-1');
    //htmlspecialchars($data);

    return $data;
}
