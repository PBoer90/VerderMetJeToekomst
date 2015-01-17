<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Verder met je Toekomst</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsiveCarousel.css" rel="stylesheet">
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
                <a class="navbar-brand"  data-target="#mainCarousel" data-slide-to="0" >Verder met je Toekomst</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#company-dialog">Bedrijven</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#student-dialog">Studenten</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="mainCarousel" class="carousel slide">
        <!-- Indicators -->
<!--        <ol class="carousel-indicators">-->
<!--            <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>-->
<!--            <li data-target="#mainCarousel" data-slide-to="1"></li>-->
<!--            <li data-target="#mainCarousel" data-slide-to="2"></li>-->
<!--        </ol>-->

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="carousel-content">
                    <div class="container-fluid">
                        <div class="row well">
                            <div class ="col-lg-12 ">
                                <h1>Zoek jouw nieuwe stage of stagiares!</h1>
                                <p>Begin hier met kiezen</p>
                            </div>
                            <div class="col-sm-5">
                                <button class="btn btn-lg btn-primary btn-slide" data-target="#mainCarousel" data-slide-to="1">Bedrijf</button>
                            </div>
                                <div class="col-sm-2">&nbsp;</div>
                            <div class="col-sm-5">
                                <button class="btn btn-lg btn-primary btn-slide" data-target="#mainCarousel" data-slide-to="2">Student</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/bg1.jpg');"></div>
                <div class="carousel-caption">
                    Gemaakt door Timo de Jong en Koen Hendriks. &copy; <?php echo date("Y",time()); ?><br/>
                    <a href="http://serioushomebrew.eu" target="_blank"><img src="img/shb.png"/> </a>
                </div>

            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/bg3.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/bg2.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>
    </header>

    <div id="company-dialog" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Bedrijven</h4>
                </div>
                <div class="modal-body">
                    <p>Informatie voor bedrijven enzo, varias reprehenderit deserunt quem offendit,
                        cillum proident ne reprehenderit, quem ad laborum, quo possumus praetermissum,
                        si ne illustriora, hic appellat coniunctione, do labore aliqua quo probant. In
                        probant voluptatibus quo mentitum est laboris. Quorum mandaremus graviterque.
                        Mentitum id velit, dolor aut litteris, ea varias illustriora, ita commodo ita
                        ingeniis, iis nulla appellat incurreret, aut irure amet summis pariatur ita ubi
                        quis dolore veniam proident, consequat sed ingeniis.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Sluit</button>
                </div>
            </div>
        </div>
    </div>

    <div id="student-dialog" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Dialog</h4>
                </div>
                <div class="modal-body">
                    <p>Extra help info voor studenten enzo, varias reprehenderit deserunt quem offendit,
                        cillum proident ne reprehenderit, quem ad laborum, quo possumus praetermissum,
                        si ne illustriora, hic appellat coniunctione, do labore aliqua quo probant. In
                        probant voluptatibus quo mentitum est laboris. Quorum mandaremus graviterque.
                        Mentitum id velit, dolor aut litteris, ea varias illustriora, ita commodo ita
                        ingeniis, iis nulla appellat incurreret, aut irure amet summis pariatur ita ubi
                        quis dolore veniam proident, consequat sed ingeniis.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Sluit</button>
                </div>
            </div>
        </div>
    </div>

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

        //Slide listener
        $('#mainCarousel').on('slide.bs.carousel', function () {
            console.log('their was a disturbance in the force...');
        })
    </script>

</body>

</html>
