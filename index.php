<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Full Slider - Verder met je Toekomst Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="material/css/ripples.min.css" rel="stylesheet">
    <link href="material/css/material-wfont.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Verder met je Toekomst</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Bedrijven</a>
                    </li>
                    <li>
                        <a href="#">Studenten</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
<!--        <ol class="carousel-indicators">-->
<!--            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
<!--            <li data-target="#myCarousel" data-slide-to="1"></li>-->
<!--            <li data-target="#myCarousel" data-slide-to="2"></li>-->
<!--        </ol>-->

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/bg1.jpg');"></div>
                <div class="carousel-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 well">
                                <h1>Zoek jouw nieuwe stage of stagiares!</h1>
                                <p>Begin hier met kiezen</p>
                                <button class="btn btn-lg btn-primary btn-slide" data-target="#myCarousel" data-slide-to="1">Bedrijf</button>
                                &nbsp;
                                &nbsp;
                                <button class="btn btn-lg btn-primary btn-slide" data-target="#myCarousel" data-slide-to="2">Student</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Bedrijf');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Student');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>
    </header>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="material/js/ripples.min.js"></script>
    <script src="material/js/material.min.js"></script>
    <script>
        //Init Material Scripts
        $(document).ready(function() {
            $.material.init();
        });

        //Init Carousel
        $('.carousel').carousel({
            interval: 0 //changes the speed
        })
    </script>

</body>

</html>
