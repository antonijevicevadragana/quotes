<?php require_once "header.php" ?>
<section class="container-fluid citati text-dark">
  <div class="container">
    <div class="row">
      <?php
      
      $file1 = __DIR__ . "/posao.txt";
      $f1 = fopen($file1, "r");
      $P = array();

      if ($f1 == true) {

        $P = explode("\n", fread($f1, filesize($file1)));
      }

      //var_dump($P);
      //echo "<hr>";

      $file2 = __DIR__ . "/zdravlje.txt";
      $f2 = fopen($file2, "r");
      $Z = array();

      if ($f2 == true) {

        $Z = explode("\n", fread($f2, filesize($file2)));
      }

      //var_dump($Z);
      //echo "<hr>";

      $file3 = __DIR__ . "/ljubav.txt";
      $f3 = fopen($file3, "r");
      $L = array();

      if ($f3 == true) {

        $L = explode("\n", fread($f3, filesize($file3)));
      }

      //var_dump($L);
      //echo "<hr>";

      $file4 = __DIR__ . "/motivacija.txt";
      $f4 = fopen($file4, "r");
      $M = array();

      if ($f4 == true) {

        $M = explode("\n", fread($f4, filesize($file4)));
      }

      //var_dump($M);
      //echo "<hr>";

      //ucitani su svi filovi kao array sad ih treba povezati u jedan array

      $Ukupno = array_merge($P, $Z, $L, $M);
      //var_dump($Ukupno);

      //kad smo dobili jedna array sad ih delimo u dva: u jednom svi citati a u drugom svi autori

      $SviCitati = array(); // array samo za citate;
      $SviAutori = array(); //array samo za autore;
      $i = 0; //  iterator
      foreach ($Ukupno as $key => $value) {
        if (++$i % 2 == 0) {
          $SviAutori[$key] = $value;
        }   //izdvajamo autore iz array //zbog ++i ide prvo od 1, prvo je dodato 1 pa deljeno
        else {
          $SviCitati[$key] = $value;
        }    //izdvajamo citate iz array
      }
      $SviCitati = array_values($SviCitati); //indexirani niz zbog lakseg kombinovanja nizova
      $SviAutori = array_values($SviAutori);

      //sad imamo posebne array za citate i autore sad ih kombinujemo u jedan asocijativne array
      function comUkupno($prviArray, $drugiArray)
      {
        $result = array_combine($prviArray, $drugiArray);
        return $result;
      }

      $CitatiAutori = comUkupno($SviCitati, $SviAutori,);

      //sad randum od svih $CitatiAutori

      $UkupnoCA = array_keys($CitatiAutori); //kljuc tj. citati
      //print_r($UkupnoCA);
      $random = $UkupnoCA[array_rand($UkupnoCA, 1)]; //radndom jedan citat

      echo "<div ><p><q>" . $random . "</q></p>" . "<p><cite>" . $CitatiAutori[$random] . "</cite></p></div>";
      // $random je jedan citat iz CitatiAutori, a autor tog citata dobijamo $CitatiAutori[$random]

      ?>
    </div>

    <div class="container paragraf">
      <div class="row">
        <p>Za više citata učitaj stranicu ponovo</p>
      </div>
    </div>
  </div>
</section>
<?php
require_once "footer.php";
?>