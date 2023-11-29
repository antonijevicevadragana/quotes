<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <div class="col-12">
      <div id="demo" class="carousel slide okvir" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- php array -->
        <?php
        $slike = ["images/1.jpg", "images/2.jpg", "images/3.jpg", "images/4.jpg", "images/5.jpg", "images/6.jpg", "images/7.jpg", "images/8.jpg", "images/9.jpg", "images/10.jpg", "images/11.jpg", "images/12.jpg", "images/13.jpg"];

        // $randomImg = $slike[array_rand($slike)];
        // $randomImg2 = $slike[array_rand($slike)];
        // $randomImg3 = $slike[array_rand($slike)];
        $randomImg = array_rand($slike, 3);   //izabere randum 3 slike koje se ne ponavljaju
        $randomImg1 = $slike[$randomImg[0]];
        $randomImg2 = $slike[$randomImg[1]];
        $randomImg3 = $slike[$randomImg[2]];

        ?>

        <!-- The slideshow -->
        <div class="carousel-inner">

          <div class="carousel-item active change-item">
            <?php
            echo "<img src='$randomImg1' class='d-block images'>";

            ?>
            <div class="carousel-caption">
              <h2 class="animate__animated  animate__backInRight">Najlepši Citati</h2>
              <p class="animate__animated animate__backInRight">Dobrodošli na sajt</p>
            </div>
          </div>

          <div class="carousel-item change-item">
            <?php
            echo "<img src='$randomImg2' class='d-block images '>";
            ?>
            <div class="carousel-caption">
              <h2 class="animate__animated  animate__backInRight">Najlepši Citati</h2>
              <p class="animate__animated animate__backInRight">Dobrodočli na sajt</p>
            </div>
          </div>

          <div class="carousel-item change-item">
            <?php
            echo "<img src='$randomImg3' class='d-block images'>";
            ?>
            <div class="carousel-caption">
              <h2 class="animate__animated  animate__backInRight">Najlepši Citati</h2>
              <p class="animate__animated animate__backInRight">Dobrodošli na sajt</p>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>

  </header>

  <nav class=" navbar  navbar-expand-md"> <!--Kada je navbra-expand* tad je vertikalan navbar-->
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <?php
        echo "<a  class='nav-link' href='pageposao.php' target='_self'>Posao</a>";
        ?>
      </li>
      <li class="nav-item ">
        <?php
        echo "<a  class='nav-link' href='pagezdravlje.php' target='_self'>Zdravlje</a>";
        ?>

      </li>
      <li class="nav-item ">
        <?php
        echo "<a  class='nav-link' href='pageljubav.php' target='_self'>Ljubav</a>";
        ?>
      </li>

      <li class="nav-item ">

        <?php
        echo "  <a  class='nav-link' href='pagemotivacija.php' target='_self'>Motivacija</a>";
        ?>

      </li>
    </ul>
  </nav>