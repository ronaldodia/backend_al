<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 18/08/15
 * Time: 18:01
 * To change this template use File | Settings | File Templates.
 */?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php  echo isset($title_for_layout)? $title_for_layout:'ANCIA';?></title>
    <meta name="description" content="company is a free job board template">
    <meta name="author" content="Ohidul">
    <meta name="keyword" content="html, css, bootstrap, job-board">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet"href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="http://localhost/ancialf/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://localhost/ancialf/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href=http://localhost/ancialf/css/normalize.css
    ">
    <link rel="stylesheet" href="http://localhost/ancialf/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/ancialf/css/fontello.css">
    <link rel="stylesheet" href="http://localhost/ancialf/css/animate.css">
    <link rel="stylesheet" href="http://localhost/ancialf/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/ancialf/css/owl.carousel.css">
    <link rel="stylesheet" href="http://localhost/ancialf/css/owl.theme.css">
    <link rel="stylesheet" href="http://localhost/ancialf/css/owl.transitions.css">
    <link rel="stylesheet" href="http://localhost/ancialf/style.css">
    <link rel="stylesheet" href="http://localhost/ancialf/responsive.css">
    <script src="http://localhost/ancialf/js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- Body content -->

<div class="header-connect">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-8 col-xs-8">
                <div class="header-half header-call">
                    <p>
                        <span><i class="icon-cloud"></i>+1 123 456 2222</span>
                        <span><i class="icon-mail"></i>contact@ancia.com</span>
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-3  col-xs-offset-1">
                <div class="header-half header-social">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-vine"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="http://localhost/ancialf/img/logo.png" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="button navbar-right">
                <button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.8s">Login</button>
                <button class="navbar-btn nav-button wow fadeInRight" data-wow-delay="0.6s">Sign up</button>
            </div>-->
            <ul class="main-nav nav navbar-nav navbar-right">
                <li class="wow fadeInDown" data-wow-delay="0s"><a class="active" href="#">Accueil</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="#">Candidats</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.2s"><a href="#">Employeurs</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.3s"><a href="#">Qui sommes nous</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.4s"><a href="#">Notre blog</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="#">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="http://localhost/ancialf/img/slider-image-3.jpg" alt="Mirror Edge"></div>
            <div class="item"><img src="http://localhost/ancialf/img/slider-image-2.jpg" alt="The Last of us"></div>
            <div class="item"><img src="http://localhost/ancialf/img/slider-image-1.jpg" alt="GTA V"></div>

        </div>
    </div>
    <div class="container slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                <h2>ANCIA, un service clé en main pour trouver des candidats de qualité</h2>
                <p>ANCIA est une agence de recrutement offrant des services de qualité aux entreprises des régions de Québec et de Chaudière-Appalaches. Des entreprises de tous les secteurs et de toutes les tailles font appel à nos services: les très petites entreprises, les PME, les organisations publiques et parapubliques ainsi que les multinationales. Nos services sont adaptés aux besoins particuliers et à la réalité de chacun de nos clients.</p>
                <div class="search-form wow pulse" data-wow-delay="0.8s">
                    <form action="" class=" form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mot clé">
                        </div>
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option selected>Selectionnez une ville</option>
                                <option >Ville de Québec</option>
                                <option>Ville de Québec</option>
                                <option>Lévis</option>
                                <option>Montréal</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <select name="d" id="" class="form-control">
                                <option selected>Selectionnez une catégorie</option>
                                <option >Graphiste</option>
                                <option>Mécanicien auto</option>
                                <option>Soudeur</option>
                            </select>
                        </div>
                        <input type="submit" class="btn" value="Chercher">


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-area">
<div class="container">

    <div class="row page-title text-center wow zoomInDown" data-wow-delay="1s">
        <h5>Processus de candidature </h5>
        <h2>Comment ça marche?</h2>
        <p>
            Consultez nos offres d'emploi et postulez en ligne... c'est gratuit!  Si vous n'êtes pas à l'aise avec Internet, appelez-nous, il nous fera plaisir de vous aider!
        </p>
    </div>

</div>
    <?php  if(isset($_SESSION['flash']))echo $this->Session->flash();?>
<?php echo $content_for_layout;?>
<hr>

<div class="container">
    <div class="row page-title text-center  wow bounce"  data-wow-delay=".7s">
        <h5>Témoignage</h5>
        <h2>Qu'est ce que les gens disent de nous? </h2>
    </div>
    <div class="row testimonial">
        <div class="col-md-12">
            <div id="testimonial-slider">
                <div class="item">
                    <div class="client-text">
                        <p>Excellent service, j'ai décroché mon emploi de rève!</p>
                        <h4><strong>Alassane, </strong><i>Programmeur Web</i></h4>
                    </div>
                    <div class="client-face wow fadeInRight" data-wow-delay=".9s">
                        <img src="http://localhost/ancialf/img/client-face1.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="client-text">
                        <p>Ancia offer an amazing service and I couldn’t be happier! They
                            are dedicated to helping recruiters find great candidates, wonderful service!</p>
                        <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                    </div>
                    <div class="client-face">
                        <img src="http://localhost/ancialf/img/client-face2.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="client-text">
                        <p>Parfait!</p>
                        <h4><strong>Michel, </strong><i>Directeur Marketing</i></h4>
                    </div>
                    <div class="client-face">
                        <img src="http://localhost/ancialf/img/client-face1.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row how-it-work text-center">
    <div class="col-md-4">
        <div class="single-work wow fadeInUp" data-wow-delay="0.8s">
            <img src="http://localhost/ancialf/img/how-work1.png" alt="">
            <h3>Chercher le meilleur emploi? </h3>
            <p>Ensemble nous y arriverons.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="single-work  wow fadeInUp"  data-wow-delay="0.9s">
            <img src="http://localhost/ancialf/img/how-work2.png" alt="">
            <h3>Chercher le meilleur emploi?</h3>
            <p>Ensemble nous y arriverons.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="single-work wow fadeInUp"  data-wow-delay="1s">
            <img src="http://localhost/ancialf/img/how-work3.png" alt="">
            <h3>Chercher le meilleur emploi?</h3>
            <p>Ensemble nous y arriverons.</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row job-posting wow fadeInUp" data-wow-delay="1s">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#job-seekers" aria-controls="home" role="tab" data-toggle="tab">Candidats</a></li>
                <li role="presentation"><a href="#employeers" aria-controls="profile" role="tab" data-toggle="tab">Employeurs</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="job-seekers">
                    <ul class="list-inline job-seeker">
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/team-small-5.jpg" alt="">
                                <div class="overlay"><h3>Alassane</h3><p>Développeur Web</p></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/team-small-6.jpg" alt="">
                                <div class="overlay"><h3>Mohidul Islam</h3><p>CEO</p></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/team-small-3.jpg" alt="">
                                <div class="overlay"><h3>Chela</h3><p>Graphiste</p></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/team-small-4.jpg" alt="">
                                <div class="overlay"><h3>Eftakher Alam</h3><p>Technicien réseau</p></div>
                            </a>
                        </li>
                      <!-- <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/team-small-2.jpg" alt="">
                                <div class="overlay"><h3>Mark Otto</h3><p>Founder</p></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/team-small-1.jpg" alt="">
                                <div class="overlay"><h3>Rasel Ahmed</h3><p>Web Developer</p></div>
                            </a>
                        </li>-->
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="employeers">
                    <ul class="list-inline">
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/employee4.png" alt="">
                                <div class="overlay"><h3>Instagram</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/employee5.png" alt="">
                                <div class="overlay"><h3>Microsoft</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/employee6.png" alt="">
                                <div class="overlay"><h3>Dribbble</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/employee1.png" alt="">
                                <div class="overlay"><h3>Beats Music</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/employee2.png" alt="">
                                <div class="overlay"><h3>Facebook</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="http://localhost/ancialf/img/employee3.png" alt="">
                                <div class="overlay"><h3>Twitter</h3></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<div class="footer-area">
    <div class="container">
        <div class="row footer">
            <div class="col-md-4">
                <div class="single-footer">
                    <img src="http://localhost/ancialf/img/footer-logo.png" alt="" class="wow pulse" data-wow-delay="1s">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati architecto quaerat facere blanditiis tempora sequi nulla accusamus, possimus cum necessitatibus suscipit quia autem mollitia, similique quisquam molestias. Vel unde, blanditiis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-footer">
                    <h4>Twitter update</h4>
                    <div class="twitter-updates">
                        <div class="single-tweets">
                            <h5>ABOUT 9 HOURS</h5>
                            <p><strong>AGOMeet Aldous</strong> - a Brave New World for #rails with more cohesion, less coupling and greater dev speed <a href="http://t.co/rsekglotzs">http://t.co/rsekglotzs</a></p>
                        </div>
                        <div class="single-tweets">
                            <h5>ABOUT 9 HOURS</h5>
                            <p><strong>AGOMeet Aldous</strong> - a Brave New World for #rails with more cohesion, less coupling and greater dev speed <a href="http://t.co/rsekglotzs">http://t.co/rsekglotzs</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-footer">
                    <h4>Useful lnks</h4>
                    <div class="footer-links">
                        <ul class="list-unstyled">
                            <li><a href="">About Us</a></li>
                            <li><a href="" class="active">Services</a></li>
                            <li><a href="">Work</a></li>
                            <li><a href="">Our Blog</a></li>
                            <li><a href="">Customers Testimonials</a></li>
                            <li><a href="">Affliate</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-copy">
            <p><span>(C) webstie, All rights reserved</span> | <span>Graphic Designed by <a href="https://dribbble.com/siblu">Eftakher Alam</a></span> | <span> Web Designed by <a href="http://ohidul.me">Ohidul Islam</a></span> </p>
        </div>
    </div>
</div>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="http://localhost/ancialf/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="http://localhost/ancialf/js/bootstrap.min.js"></script>
<script src="http://localhost/ancialf/js/owl.carousel.min.js"></script>
<script src="http://localhost/ancialf/js/wow.js"></script>
<script src=<?php echo Router::url("js/main.js")?>></script>

<script src=<?php echo Router::url("js/jquery.dataTables.min.js");?>></script>
<script type="text/javascript"
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
