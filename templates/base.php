<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Yohann Durand">

    <title><?= $title ?></title>
    <!-- Composer Boostrap -->
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- mobile for boostrap -->
    <!-- add Font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link href="boostrap_theme/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="boostrap_theme/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- add Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>



<!-- ------------------------------------------- -->
<body id="page-top" class="index">

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">Yohann Durand</a>
           <!-- <img class="img-responsive" src="boostrap_theme/img/logo.png" alt=""> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=home">portfolio</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php#about">A propos</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php#contact">Contact</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=displayBlog">Blog</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="boostrap_theme/img/profile1.png" alt="">
                <div class="intro-text">
                    <span class="name">Yohann Durand</span>

                    <hr class="star-light">
                    <span class="skills">Web Developer - Back-end -  Le développeur qu’il vous faut !</span>
                    <!-- Logo -->
                    <img class="" src="boostrap_theme/img/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ------------------------------------------ -->
<div id="content">
    <?= $content ?>
</div>
<!-- --------------------------------------- -->
<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Se connecter</h3>
                    <?php if ($this->session->get('user')&&  $this->session->get('user') == 'admin' )  { ?>
                        <a href="../public/index.php?route=Déconnexion">Déconnexion</a><br/>
                        <a href="../public/index.php?route=displayAdmin">page Admin</a>
                    <?php }

                    else if ($this->session->get('user') &&  $this->session->get('user') == 'membre' ){ ?>
                        <a href="../public/index.php?route=Déconnexion">Déconnexion</a>
                    <?php }

                    else { ?>
                        <a href="../public/index.php?route=connection">Connection</a>
                    <?php }?>



                </div>
                <div class="footer-col col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="https://github.com/Yohann76"
                               class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/yohann-durand-a20b7714a/"
                               class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/yohann.durand.14"
                               class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/yohann_durand"
                               class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>


                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About Freelancer</h3>
                    <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Your Website 2016
                </div>
            </div>
        </div>
    </div>
</footer>

<!--------------------------------------- -->
<!-- jQuery -->
<script src="boostrap_theme/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="boostrap_theme/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


<!-- Contact Form JavaScript -->
<script src="boostrap_theme/js/jqBootstrapValidation.js"></script>
<script src="boostrap_theme/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="boostrap_theme/js/freelancer.min.js"></script>

<!-- Sweet alert  Script-->
<script src="boostrap_theme/js/sweetAlert.js"></script>

<!-- ------------------- -->

</body>
</html>