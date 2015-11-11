<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 21/08/15
 * Time: 10:20
 * To change this template use File | Settings | File Templates.
 */

function debug($var){
    if(Conf::$debug>0){
        $debug=debug_backtrace();
          echo '<ol>';
        foreach($debug as $k=>$v){
            if($k>0)
                echo '<li><a href="#"><strong>'.$v['file'].'</strong> ligne '.$v['line'].'</a></li>';
        }
        echo '</ol>';
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

}

function add_ou_et($str){
    $arr=array();
    $arr=explode("ET ",$str);
    $str=implode("<br>ET ",$arr);
    $arr=explode("OU ",$str);
     $str=implode("<br>OU ",$arr);
    return $str;
}
function add_puce($str){
    if($str)
    $str=";".$str;
    $arr=array();
    $arr=explode(";",$str);
    $str=implode("<li>",$arr);

    return "<ul>".$str."</ul>";
}
/*

function findTagNameByID($tagId){
    $app = new iSDK;
    if ($app->cfgCon("connectionName")) {


        $fields = array('GroupName');
        $query = array('Id' => $tagId);
        $result = $app->dsQuery('ContactGroup', 1, 0, $query, $fields);
        return $result;
    }


}*/function uploadImage($image)
{
    $target_dir = "../webroot/uploads";
    $target_file = $target_dir . basename($_FILES[$image]["name"]);
    $uploadOk = 1;
    $retour=null;
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION) ;
// Check if image file is a actual image or fake image
    //if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES[$image]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $retour['ok']=true;
    } else {
        $retour['msg']= "Ce que vous avez sélectionnez n'est pas une image, ou l'extension est en majuscule!.";
        $uploadOk = 0;
        //return false;
        $retour['ok']=false;
    }
    //  }
// Check if file already exists
    if (file_exists($target_file)) {
        $retour['msg']= "ça existe ce fichier.";
        $uploadOk = 0;
        $retour['ok']=false;
    }
// Check file size
    if ($_FILES[$image]["size"] > 500000) {
        $retour['msg']= "Désolé, cette image est trop large.";
        $uploadOk = 0;
        $retour['ok']=false;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $retour['msg']= "Désolé, seulement JPG, JPEG, PNG & GIF sont autorisés. (les extensions doivent être en minuscules)";
        $uploadOk = 0;
        $retour['ok']=false;
    }
// Check if $uploadOk is set to 0 by an error
    if (!$retour['ok']) {
        $retour['ok']= "Sorry, your file was not uploaded.";
        $retour['ok']=false;
// if everything is ok, try to upload file
    } else {

        $fichier=uniqid().$_FILES[$image]['name'];
        if (move_uploaded_file($_FILES[$image]["tmp_name"],$target_dir.'/'.$fichier)) {
           // echo "The file ". basename( $_FILES[$image]["name"]). " has been uploaded.";

            $retour['ok']=true;
        $retour['chemin']=$fichier;
        } else {
            $retour['msg']= "Désolé, l'image n'a pas été téléversée!";
            $retour['ok']=false;
        }
    }
    return $retour;}