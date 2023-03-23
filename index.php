<?php require('storydome.php');
$sql = "select * from stories where headline = 'Top' limit 1";
$gettopstory = mysqli_query($storydome, $sql) or die(mysqli_error($storydome));
$row_gettopstory = mysqli_fetch_array($gettopstory);
$totalRow_gettopstory = mysqli_num_rows($gettopstory);

$sql = "select * from stories where topic = 'HOT' limit 2";
$gethottopic = mysqli_query($storydome, $sql) or die(mysqli_error($storydome));
$row_gethottopic = mysqli_fetch_array($gethottopic);
$totalRow_gethottopic = mysqli_num_rows($gethottopic);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/dome.png" type="image/x-icon">
    <title>Story Dome</title>
    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <!-- jQuery CDN -->
    <link rel="stylesheet" href="thumbnail-gallery.css">
    <link rel="stylesheet" href="gallery-clean.css">
    <link rel="stylesheet" href="gallery-grid.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style5.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloock&family=Tilt+Neon&family=Tilt+Warp&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>




</head>

<body>

    <nav class="navbar navbar-expand-lg bg-info pb-4 pt-5  mb-4  text-white">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#"><img src="images/dome.png" width="50" height="44" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">LOGIN</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            CATEGORIES
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="category.php?category=Education">EDUCATIONAL</a></li>
                            <li><a class="dropdown-item" href="category.php?category=Technology">TECHNOLOGY</a></li>
                            <li><a class="dropdown-item" href="category.php?category=Business">BUSINESS</a></li>
                            <li><a class="dropdown-item" href="category.php?category=Social">SOCIAL VICES</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <section class="container">
        <h6 class="top-heading">TOP HEADING</h6>
        <h1><?php echo $row_gettopstory['title'];?></h1>
        <P>Written by <?php echo $row_gettopstory['author'];?> on <?php echo $row_gettopstory['date'];?></P>
        <div class="row">
            <div class=" col-12 col-md-8 ">
                <div class="pic-img">
                    <img src="dashboard/coverphoto/<?php echo $row_gettopstory['coverphoto'];?>" class="w-100" alt="">

                </div>

            </div>
            <div class="col-12 col-md-4">
                <p class="black"><?php echo $row_gettopstory['body'];?>
                </p>
                <a href="single-page.php?q=<?php echo $row_gettopstory['id'];?>"> <button class="btn btn-outline-info">Read more</button></a>
            </div>
        </div>

    </section>


    <section class="mt-5 mb-5">
        <div class="container">
            <h6 class="top-heading mb-4">HOT TOPICS</h6>
            <div class="row">
                <?php do{;?>
                <div class="col-md-6 mb-4">
                    <div class="item">
                        <div class="card">
                            <img src="dashboard/coverphoto/<?php echo $row_gethottopic['coverphoto'];?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row_gethottopic['title'];?></h5>
                                <p class="card-text"><?php echo $row_gethottopic['body'];?></p>
                                <a href="single-page.php?q=<?php echo $row_gethottopic['id'];?>" class="btn btn-info">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }while($row_gethottopic = mysqli_fetch_array($gethottopic));?>
                
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <h6 class="top-heading mb-4">MORE STORIES</h6>
<?php
$sql = "select * from stories order by date desc";
$getallstories = mysqli_query($storydome, $sql) or die(mysqli_error($storydome));
$row_getallstories = mysqli_fetch_array($getallstories);
?>

            <div class="owl-carousel owl-theme categories__slider slider-display ">
                <?php do {;?>
                <div class="item" style="margin: 10px;">
                    <div class="card" style="width: 16rem;">
                        <img src="dashboard/coverphoto/<?php echo $row_getallstories['coverphoto'];?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row_getallstories['category'];?></h5>
                            <p class="card-text"><?php echo $row_getallstories['title'];?></p>
                            <a href="single-page.php?q=<?php echo $row_getallstories['id'];?>" class="btn btn-info">Read more</a>
                        </div>
                    </div>
                </div>
            <?php }while($row_getallstories = mysqli_fetch_array($getallstories));?>

            </div>
        </div>
    </section>


    <section>
        <div class=" mt-5 pb-4 pt-4 text-center text-white footer text-md-left ">

            <hr>
            <div class="footer-copyright text-center py-2">
                <a href="tel:+234 803-749-0332">
                    &copy; 2021 Copyright: Story dome
                </a>
            </div>
        </div>
    </section>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script>
        // ScrollReveal().reveal('section', {delay:10, reset:true});
        // ScrollReveal().reveal('h1', { delay: 500 });
        // ScrollReveal().reveal('p', { delay: 1000 });
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>