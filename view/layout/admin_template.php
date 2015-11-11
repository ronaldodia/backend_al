<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 28/08/15
 * Time: 18:01
 * To change this template use File | Settings | File Templates.
 */
$active='';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Administration</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo Router::url("webroot/css/bootstrap.min.css")?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo Router::url("html5.js")?>"></script>
    <![endif]-->
    <link href="<?php echo Router::url("webroot/css/styles.css");?>" rel="stylesheet">
    <link href="<?php echo Router::url("webroot/css/bootstrap-tagsinput.css");?>" rel="stylesheet">
    <link href="<?php echo Router::url("webroot/css/jsDatePick_ltr.css");?>" rel="stylesheet">
    <!--<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
    <link rel="stylesheet"
          href="<?php echo Router::url("webroot/css/jquery.dataTables.min.css")?>">
    <script src="<?php echo Router::url("webroot/js/jquery-2.1.3.min.js")?>"></script>
    <script src="<?php echo Router::url("webroot/js/bootstrap-tagsinput.min.js")?>"></script>
    <script src="<?php echo Router::url("webroot/js/jsDatePick.jquery.min.1.3.js")?>"></script>


</head>
<body>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"inputDATE_AFFICHAGE",
            dateFormat:"%Y-%m-%d"
            /*selectedDate:{				This is an example of what the full configuration offers.
             day:5,						For full documentation about these settings please see the full version of the code.
             month:9,
             year:2006
             },
             yearsRange:[1978,2020],
             limitToToday:false,
             cellColorScheme:"beige",
             dateFormat:"%m-%d-%Y",
             imgPath:"img/",
             weekStartDay:1*/
        });
    };
</script>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ancia & LF</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Mon compte</a></li>
                <li><a href="#" target="_blank">Voir le site ANCIA</a></li>
                <li><a href="#" target="_blank">Voir le site LF</a></li>
                <!--<li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>-->
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">

    <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">

            <ul class="nav nav-sidebar">
                <li class=""><a href="<?php echo Router::url('admin/clients/index')?>">Clients</a></li>
                <li class=""><a href="<?php echo Router::url('admin/utilisateurs/index')?>">Utilisateur</a></li>
                <li class=""><a href="<?php echo Router::url('admin/posts/index')?>">Postes</a></li>

            </ul>

        </div><!--/span-->

        <div class="col-sm-9 col-md-10 main">

            <!--toggle sidebar button-->
            <p class="visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
            </p>

            <h1 class="page-header">
               Tableau de bord ANCIA & LF

            </h1>



            <hr>



            <?php  if(isset($_SESSION['flash']))echo $this->Session->flash();?>

                <?php echo $content_for_layout;?>





        </div><!--/row-->
    </div>
</div><!--/.container-->

<footer>
    <p class="pull-right">©2015 ANCIA LF</p>
</footer>

<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type="text/javascript"
        src="<?php echo Router::url("webroot/js/jquery.dataTables.min.js");?>"></script>
<script type="text/javascript"
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?php echo Router::url("webroot/js/bootstrap.min.js")?>"></script>
<script src="<?php echo Router::url("webroot/js/scripts.js");?>"></script>
</body>
</html>