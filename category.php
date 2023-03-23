<?php require('storydome.php');
$category = $_REQUEST['category'];
//echo "category = $category<br />";

$sql = "select * from stories where category = '$category'";
$getcategory = mysqli_query($storydome, $sql) or die(mysqli_error($storydome));
$row_getcategory = mysqli_fetch_array($getcategory);
$totalRow_getcategory = mysqli_num_rows($getcategory);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/dome.png" type="image/x-icon">
    <title>Story dome</title>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="thumbnail-gallery.css">
    <link rel="stylesheet" href="gallery-clean.css">
    <link rel="stylesheet" href="gallery-grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Gloock&family=Tilt+Neon&family=Tilt+Warp&display=swap"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style5.css">

<!-- 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg bg-info pb-4 pt-5  mb-4  text-white">
            <div class="container-fluid container">
                <a class="navbar-brand" href="index.html"><img src="images/dome.png" width="50" height="44" alt=""></a>
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
    </section>
    <section class="">
        <div class="row jumbotron pb-0">
            <div class="col-lg-12 text-center w-100">
                <h2 class="text-dark">Read stories on <?php if(isset($row_getcategory['category'])){echo $row_getcategory['category'];}?></h2>
            </div>
        </div>
    </section>

    <br>



    <div class="container">
        <br>
        <!-- <h1 class="topp">Education</h1> -->
        <div class="" id="">
            <div class="row">
                <?php if($totalRow_getcategory > 0){;?>
                <?php do{;?>
                <div class="col-sm-6 col-md-4">
                    <a class="" href="single-page.php?q=<?php echo $row_getcategory['id'];?>">
                        <img src="dashboard/coverphoto/<?php echo $row_getcategory['coverphoto'];?>" class="w-100" alt="">
                    </a>
                    <p style="align-content: center;"><?php echo $row_getcategory['title'];?>
                        <br />By: <?php echo $row_getcategory['author'];?>&nbsp;<small style="color: red; font-size: 10px; font-style: italic;"><?php echo $row_getcategory['date'];?> <?php echo $row_getcategory['time'];?></small>
                    </p>

                </div>  
<?php }while($row_getcategory = mysqli_fetch_array($getcategory));?>
                <?php };?>

                <?php if($totalRow_getcategory == 0){;?>

<div align="center" style="margin: 1rem; color: red;">
    No Match found for the selected category.
</div>
                <?php }?>
            </div>

        </div>
       

    </div>


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

    <script src="app.js"></script>
   

</body>

</html>