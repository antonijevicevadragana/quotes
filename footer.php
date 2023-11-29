<footer class="container-fluid fixed-bottom  bg-dark text-center text-white-50">
    <div class="container">
      <?php
      date_default_timezone_set('Europe/Belgrade');
      $day = date("d/m/Y");
      $time = date("H:i:s");
      $danUnedelji = date("w");
      switch ($danUnedelji) {
        case '0':
          $rez = "Nedelja";
          break;
        case '1':
          $rez = "Ponedeljak";
          break;
        case '2':
          $rez = "Utorak";
          break;
        case '3':
          $rez = "Sreda";
          break;
        case '4':
          $rez = "Četvrtak";
          break;
        case '5':
          $rez = "Petak";
          break;
        case '6':
          $rez = "Subota";
          break;
      }
      echo "<p>$rez $day</p>";
      echo "<p>$time</p>";
      ?>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>