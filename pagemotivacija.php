<?php
require_once "header.php";
?>

<section class="container-fluid citati text-dark">
  <div class="container">
    <div class="row">

      <?php
      $file = __DIR__ . "/motivacija.txt";
      $f = fopen($file, "r");
      $Motiv = array();

      if ($f == true) {
        $Motiv = explode("\n", fread($f, filesize($file)));  //"\n" je da pravi novi red; pravi se array ako $f postoji napraviti array koji je velicine samog file-a
      }

    //od array1 pravimo dva array jedna za citate jedan za autore//////////

      $citatM = array(); // array samo za citate;
      $AutorM = array(); //array samo za autore;
      $i = 0; //iterator
      foreach ($Motiv as $key => $val) {
        if (++$i % 2 == 0) {
          $AutorM[$key] = $val;
        }   //izdvajamo autore iz array //zbog ++i ide prvo od 1, prvo je dodato 1 pa deljeno
        else {
          $citatM[$key] = $val;
        }    //izdvajamo citate iz array
      }
      $citatM  = array_values($citatM);
      //print_r($citatM);
      $AutorM = array_values($AutorM);



      $motivSlike = ['autor1.jfif', 'autor2.jpg', 'autor3.jpg', 'autor4.jpg', 'autor5.jpg', 'autor6.jpg', 'autor7.jpg', 'autor8.jpg', 'autor9.jpg', 'autor10.webp'];
      //kombinujemo 3 array(citati, autori, slike) zbog lakseg prisupa pojdenacnim el. kljuc ce biti citat, autor, slika
  // ako se dodaju u dokument .txt citat i autor ali se ne doda slika, onda da i dalje moze da se kombinuju nizovi i da se ispise citat i autor i slika gde ima a gde nema da se ispisu samo podaci koji imaju
  function mergeArrays($citati, $autori, $slike) {
    $result = array();
    foreach ($citati as $key => $citat) {
        $autor = isset($autori[$key]) ? $autori[$key] : '';
        $slika = isset($slike[$key]) ? $slike[$key] : '';
        $result[] = array('citat' => $citat, 'autor' => $autor, 'slika' => $slika);
    }
    return $result;
}

      $mergedArray = mergeArrays($citatM, $AutorM, $motivSlike);
      //print_r($mergedArray);

      $randomIndex = array_rand($mergedArray, 1);

      // Pristupanje randnom elementu
      $randomElement = $mergedArray[$randomIndex];

      // Pristupanje pojedinacnim vrednostima iz random elementa
      $randomCitat = $randomElement['citat'];
      $randomAutor = $randomElement['autor'];
      $randomSlika = $randomElement['slika'];

      // print
      echo "<div><q>" . $randomCitat . "</q>" . "<p><cite>" . $randomAutor . "</cite></p></div>";
      ?>

<img src="<?php echo 'pageImages/imgMotivacija/' . $randomSlika; ?>" alt="" class="slikeAutora">


    </div>

    <!-- <img src="pageImages/imgMotivacija/autor1.jfif" alt=""> -->
    <div class="container paragraf">
      <div class="row">
        <p><br>Za više citata učitaj stranicu ponovo <br></p>
      </div>
    </div>
  </div>
</section>

<?php
require_once "footer.php";
?>