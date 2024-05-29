<!DOCTYPE html>
<html>
<head>
    <title>IRA SKINCARE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        require('includes/dependencies.php');
    ?>
    <link rel="stylesheet" href = "styles/carousel.css">
    
</head>

<body>

    <?php
        include('utils/navigationbar.php');
    ?>

    <div>
        <div class="jumbotron jumbotron-fluid" background-color = "#e3d0cf">
            <div class = "carousel-container">
                <div class="container">
                    <h1 class="display-1"> Hello Glow! </h1>
                    <p class="lead"> Goodbye Dark Circles </p> 

                    <div id="carouselExampleIndicators" class="carousel slide parent" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner child">
            
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/IMG 1.webp" alt="First slide">
                            </div>

                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/IMG 2.png" alt="Second slide">
                            </div>
    
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/IMG 3.jpg" alt="Third slide">
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
            
    <section class="my-5">
        <div class="py-5">
            <h3 class=text-center>About Us</h3>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="images/IMG 4.jpg" class=img-fluid>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <h1>IRA SKINCARE</h1>
                    <p>Welcome to IRA SKINCARE! We are a small team passionate about helping you achieve healthy, beautiful skin.</p>
                    <a href="about.php" class=btn btn-success>check more</a>
                </div>
            </div>
        </div>
    </section>

    <?php
        require('utils/footer.php');
    ?>


    <script>
        $('#carouselExampleIndicators').on('slide.bs.carousel', function (e) {
        var index = $(e.relatedTarget).index();
        $('.caption').removeClass('active');
        $('#caption' + (index + 1)).removeClass('d-none');
        $('#caption' + (index + 1)).addClass('active');
        });
    </script>
</body>
</html>

