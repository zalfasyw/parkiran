<?php
session_start();
$nama  = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/
    all.min.css">

    <link rel="stylesheet" href="css/style1.css">


</head>
<body>



<header>

    <div class="user">
        <img src="images/pic.jpg" alt="">
        <h3 class="name">Halo, <?php echo $nama ?>!</h3>
        <p class="post">front end developer</p>
    </div>

    <nav class="navbar">
        <ul>
            <!-- <li><a href="?page=denah">DENAH PARKIR</a></li> -->
            <li><a href="?page=history">HISTORY</a></li>
        </ul>
    </nav>
    <section>
        <?php if (isset($_GET["page"]))
                include "konten/$_GET[page].php";
        ?>
    </section>

</header>



<!-- header section ends

<div id="menu" class="fas fa-bars"></div>


home section starts
<section class="home" id="home"> -->

</body>
</html>