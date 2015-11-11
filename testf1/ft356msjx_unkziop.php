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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
    .error{
        color: red !important;
        display: block;
        font-size: 12px !important;
        font-weight: normal !important;
    }
</style>

    <script>

        $.validator.addMethod('customphone', function (value, element) {
            return this.optional(element) || /^\d{3}-\d{3}-\d{4}$/.test(value) ||/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/.test(value);
        }, "<label class='error'>Format requis (000) 000-0000</label>");

        $.validator.addMethod('customadresse', function (value, element) {
            return this.optional(element) || /^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/.test(value);
        }, "<label class='error'>Format requis G5X 9X9</label> ");


        $().ready(function () {
            // validate the comment form when it is submitted
            $("#commentForm").validate();

            // validate signup form on keyup and submit
            $("#signupForm").validate({
                rules: {
                    nom: {
                        required: true,
                        minlength: 2},
                    prenom: {
                        required: true,
                        minlength: 2},

                    email: {
                        required: true,
                        email: true
                    },
                    lienoffre: {
                        required: false,
                        url: true
                    }

                },
                messages: {
                    nom: {
                        required: "Veuillez entrer votre Prénom s'il vous plait",
                        minlength: "Le Nom doit être supérieur ou égal à deux caractères."    },
                    prenom: {
                        required: "Veuillez entrer votre Nom s'il vous plait",
                        minlength: "Le prénom doit être supérieur ou égal à deux caractères."    },

                    email: "l'email est invalide",
                    lienoffre: "Veuillez fournir un lien web contenant 'http'",

                    preferenceoffre: {
                        required: "Sélectionnez un élément SVP"}
                }

            });

        });

    </script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
</head>
<body>

<?php




$app = new iSDK;


if ($app->cfgCon("connectionName")) {


}else {echo "Erreur de connexion ifst";
exit();}
?>


<div class="col-md-12 ">
<?php include ('entete.html');?></div>
<?php if(isset($_GET['success']))
{
?>
<div class="container">
    <div class="alert alert-success">
        <strong>Le formulaire à été envoyé avec succès</strong>
    </div>
</div><?php }?>
<div class='container'>
<div class='panel panel-primary dialog-panel'>
<div class='panel-heading'>
    <h5>Formulaire de mise à jour </h5>
</div>
<div class='panel-body'>
<form class='form-horizontal' onsubmit="return checkSelect()" id="signupForm" role='form' action='envoyerft.php' method='POST' enctype="multipart/form-data">
    <div class='form-group'>
        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Nom *</label>

        <div class='col-md-8'>
            <div class='col-md-2'>
                <div class='form-group internal'>
                    <select class='form-control' name="salutation">
                        <option value="Monsieur">Monsieur</option>
                        <option value="Madame">Madame</option>
                    </select>
                </div>
            </div>
            <div class='col-md-3 indent-small'>
                <div class='form-group internal'>
                    <input class='form-control' name="nom" placeholder='Prénom' type='text' required>
                </div>
            </div>
            <div class='col-md-3 indent-small'>
                <div class='form-group internal'>
                    <input class='form-control' id='id_last_name' name="prenom" placeholder='Nom' type='text'
                           required="requierd">

                </div>
            </div>
        </div>
    </div>


    <div class='form-group'>
        <label class='control-label col-md-2 col-md-offset-2' for='id_email'
               id="cemail">Email *</label>

        <div class='col-md-6'>
            <div class='form-group'>
                <div class='col-md-11'>
                    <input class='form-control' id='id_email' name="email" placeholder='Courriel' type='text'
                           required="requierd">
                </div>
            </div>
        </div>
</div>
        <div class='form-group'>
        <label class='control-label col-md-2 col-md-offset-2'>Nom du poste offert</label>

        <div class='col-md-6'>
            <div class='form-group'>
                <div class='col-md-11'>
                    <input class='form-control' id='id_post-offert' name="poste-offert" placeholder='Poste offert' type='text'
                           >
                </div>
            </div>
        </div></div>


<div class='form-group'>
        <label class='control-label col-md-2 col-md-offset-2'>Lien vers l'offre d'emploi </label>

        <div class='col-md-6'>
            <div class='form-group'>
                <div class='col-md-11'>
                    <input class='form-control' id='lienoffre' name="lienoffre" placeholder="Lien vers l'offre"type='url'
                           >
                </div>
            </div>
        </div></div>
<hr>
    <label class='control-label col-md-2 col-md-offset-2'>ANCIA </label>
    <div class='form-group'>
        <div class='col-md-12'>
            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="417">
                <label> Visite en personne</label>
            </div>
            <br>

            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="415">
                <label>Transfert de ANCIA vers LF</label>
            </div>
            <br>

            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="221">
                <label> Approche de chasse</label>
            </div>
            <br>

            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="419">
                <label>Appel téléphonique.</label>
            </div>
            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="421">
                <label>CV par courriel</label>
            </div>
        </div>
    </div>
<hr>
    <label class='control-label col-md-2 col-md-offset-2'>Lefebvre & Fortier </label>
    <div class='form-group'>
        <div class='col-md-12'>
            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="429">
                <label> Visite en personne</label>
            </div>
            <br>

            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="437">
                <label>Transfert de LF vers ANCIA</label>
            </div>
            <br>

            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="423">
                <label> Approche de chasse</label>
            </div>
            <br>

            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="427">
                <label>Appel téléphonique.</label>
            </div>
            <div class='col-md-8 col-md-offset-4'>
                <input type="radio" name="preferenceoffre" required="requierd" value="425">
                <label>CV par courriel</label>
            </div>
        </div>
    </div>
    <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Notes du recruteur</label>

    <div class='col-md-6'>
        <div class="form-group">
            <div class="col-md-11">
                <textarea class='form-control' name="notes" rows="2" cols="50" maxlength="200"></textarea>
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


<label class='control-label col-md-2 col-md-offset-2' for='id_email'>UTILISATEUR *</label>


    <div class='col-md-6'>
        <div class="form-group">
            <div class="col-md-11">
                <select class='form-control js-example-basic-single'
                        name="users" style="width:100%" id='users' required="required">
                    <option value="" selected="">-- Aucun utilisateur choisi</option>

                    <?php $result=  find_users($app);
                    for($x=0;$x<count($result);$x++){?>
                        <option value="<?php echo $result[$x]['Id']; ?>"><?php echo  strtoupper(enlever_accents2($result[$x]['FirstName'].' '.$result[$x]['LastName'] ));?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>








    <div class='form-group'>
        <div class='col-md-offset-4 col-md-3'>
            <button class='btn-lg btn-primary' type='submit'>Soumettre</button>
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
<script type="text/javascript">
    function checkSelect()
    {
        var input = document.getElementById("users");

            if (input.value=="" )
            {
                alert("Veuillez chois un utilisateur ");
                return false;
            }






        return true;
    }
</script>
</body>
</html>