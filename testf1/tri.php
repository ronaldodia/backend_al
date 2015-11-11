<!DOCTYPE html>
<html>
<head>

    <?php ini_set('default_charset', 'UTF-8');
    require ('../bd/fonctions.php');
    require_once('../control/src/isdk.php');
    ?>
    <link href="http://www.ancia.ca/css/styles2.css" rel="stylesheet" type="text/css" />
    <link href='../bootstrap-3.3.4-dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='../css/moncss.css' rel='stylesheet' type='text/css'>
    <link href='../css/bootstrap-multiselect.css' rel='stylesheet' type='text/css'>

    <script src='../js/jquery/jquery-2.1.3.min.js' type='text/javascript'></script>
  <script src="../js/select2.js"></script>
	<script src="../js/bootstrap-multiselect.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <link rel="stylesheet" href="../css/select2.css"/>
<style>
    .error{
        color: red !important;
        display: block;
        font-size: 12px !important;
        font-weight: normal !important;
    }
</style>

    <script>



        $().ready(function () {


            // validate signup form on keyup and submit
            $("#signupForm").validate({

                ignore: ':hidden:not("#secteurexperience,#formation")'

            });

        });

    </script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
</head>
<body>

<?php

if(!isset($_GET['email']))
{
    print_r("pas d'email");
    exit();
}
if(!isset($_GET['autre']))
{
    print_r("erreur dans l'url");
    exit();
}
$email=test_input(urldecode($_GET['email']));
$id=test_input($_GET['autre']);
$app = new iSDK;


if ($app->cfgCon("connectionName")) {

    if(find_email($id,$app)!=$email)
    {

        echo "erreur de chargement de données!";
        exit();
    }

    $returnFields = array('FirstName', 'LastName','Id','Email');

    $conDat = $app->dsLoad("Contact", $id, $returnFields);

}else {echo "Erreur de connexion ifst";
exit();}
?>


<div class="col-md-12 ">
<?php //include ('entete.html');?></div>
<?php if(isset($_GET['success']))
{
?>
<div class="container">
    <div class="alert alert-success">
        <strong>La mise  à été effectuée avec succès!</strong>
    </div>
</div><?php }?>
<div class='container'>
<div class='panel panel-primary dialog-panel'>
<div class='panel-heading'>
    <h5>Formulaire de mise à jour </h5>
</div>
<div class='panel-body'>
<form class='form-horizontal' id="signupForm" role='form' action='envoyer.php' method='POST' enctype="multipart/form-data">
<div class='form-group'>
    <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Nom du Candidat</label>

    <div class='col-md-8'>

        <div class='col-md-4'>
            <div class='form-group internal'>
                <input class='form-control' readonly="readonly" name="nom" placeholder='Prénom' type='text' value="<?php echo $conDat['FirstName'];?>" required>
            </div>
            <input type='hidden'  name="email"; value="<?php echo $conDat['Email'];?>">
        </div>
        <div class='col-md-4'>
            <div class='form-group internal'>
                <input class='form-control' readonly="readonly"id='id_last_name' name="prenom" placeholder='Nom' type='text'
                       required="requierd" value="<?php echo $conDat['LastName'];?>">

            </div>
        </div>
    </div>
</div>






<label class='control-label col-md-2 col-md-offset-2' for='id_email'>TAGS LF</label>

<div class='col-md-6'>
    <div class="form-group">
        <div class="col-md-11">
                <select class='form-control js-example-basic-single'
                        name="tagslf" style="width:100%" id='tagslf'>
                    <option value="" selected="">-- Aucun Tag choisi</option>

                    <?php $result=  find_tags_category_byID(49,$app);
                    for($x=0;$x<count($result);$x++){?>
                    <option value="<?php echo $result[$x]['Id']; ?>"><?php echo $result[$x]['GroupName'] ;?></option>
<?php }?>
                </select>
            </div>
        </div>
    </div>

<label class='control-label col-md-2 col-md-offset-2' for='id_email'>TAGS ANCIA</label>


    <div class='col-md-6'>
        <div class="form-group">
            <div class="col-md-11">
                <select class='form-control js-example-basic-single'
                        name="tagsancia" style="width:100%" id='tagsancia'>
                    <option value="" selected="">-- Aucun Tag choisi</option>

                    <?php $result=  find_tags_category_byID(51,$app);
                    for($x=0;$x<count($result);$x++){?>
                        <option value="<?php echo $result[$x]['Id']; ?>"><?php echo $result[$x]['GroupName'] ;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>
<label class='control-label col-md-2 col-md-offset-2' for='id_email'>Nurture TAGS</label>
    <div class='col-md-6'>
        <div class="form-group">
            <div class="col-md-11">
                <select class='form-control js-example-basic-multiple' multiple="multiple" id='nurturetags' required="required"
                        data-msg-required="Veuillez choisir une formation s'il vous plait"
                        style="width:100%" name="nurturetags[]">


                    <?php $result=  find_tags_category_byID(10,$app);
                    for($x=0;$x<count($result);$x++){?>
                        <option value="<?php echo $result[$x]['Id']; ?>"><?php echo $result[$x]['GroupName'] ;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>


<label class='control-label col-md-2 col-md-offset-2' for='id_email'>Notes</label>

<div class='col-md-6'>
    <div class="form-group">
        <div class="col-md-11">
                <textarea class='form-control' name="notes" rows="2" cols="50" maxlength="200"></textarea>
            </div>
        </div>
    </div>







    <div class='form-group'>
        <div class='col-md-offset-4 col-md-3'>
            <button class='btn-lg btn-primary' type='submit'>Mettre à jour</button>
        </div>

    </div>
</form>
</div>
<script>
    $(document).ready(function () {
        // $('#states').select2({});


        $(".js-example-basic-single").select2();
        $(".js-example-basic-multiple").select2();

    });


</script>

</body>
</html>