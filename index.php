<?php
require_once "./config.php";
require_once "./App/Core/Route.php";
$RouteUrl = new route();
$url = $RouteUrl->UrlProcess();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Boostrap | Owl Carousel | Jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Base CSS -->
    <link rel="stylesheet" href="<?php echo PRONAME ?>/public/css/Index.css">
    <link rel="stylesheet" href="<?php echo PRONAME ?>/public/css/NavBar.css">
    <link rel="stylesheet" href="<?php echo PRONAME ?>/public/css/NavBarAdmin.css">
    <link rel="stylesheet" href="<?php echo PRONAME ?>/public/css/Footer.css">
    <?php
    // Xử lý  css và title của trang
    $ctrl = [];
    if (isset($url[0])) {
        $ctrl = $RouteUrl->route[$url[0]];
    } else $ctrl = $RouteUrl->route["trang-chu"];
    echo "<link rel='stylesheet' href='" . PRONAME . "/public/css/" . $ctrl[0] . ".css'>";
    echo "<title>BOYCINEMA | " . $ctrl[1] . "</title>"
    ?>

</head>

<body>
    <!-- Boostrap | Owl Carousel | Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- PHP CODE -->
    <?php
    session_start();
    // Hiện thị Nav
    if (isset($url[0])) {
        if ($url[0] != "admin") {
            require_once __DIR__ . "/Share/NavBar.php";
        }
        else require_once __DIR__ . "/Share/NavBarAdmin.php";
    } else require_once __DIR__ . "/Share/NavBar.php";
    //Hiện thị Views
    require_once __DIR__ . "/App/bridge.php";
    ?>
    <?php
    if (isset($url[0])) {
        if ($url[0] != "admin") {
            require_once __DIR__ . "/Share/Footer.php";
        }
    } else require_once __DIR__ . "/Share/Footer.php";
    ?>
</body>
</html>