<?php
require_once "header.php";
?>
<section class="container-fluid citati text-dark">
  <div class="container">
    <div class="row">
      <?php

      $file = __DIR__ . "/posao.txt";
      $f = fopen($file, "r");
      $P = array();

      if ($f == true) {

        $P = explode("\n", fread($f, filesize($file)));
      }


      $citatP = array(); // array samo za citate;
      $AutorP = array(); //array samo za autore;
      $i = 0; //iterator
      foreach ($P as $key => $val) {
        if (++$i % 2 == 0) {
          $AutorP[$key] = $val;
        }   //izdvajamo autore iz array //zbog ++i ide prvo od 1, prvo je dodato 1 pa deljeno
        else {
          $citatP[$key] = $val;
        }    //izdvajamo citate iz array
      }

      $AutorP = array_values($AutorP);
      $citatP = array_values($citatP);

      $posaoSLike = [
        'autor1.jpg',
        'autor2.jpg',
        'autor3.jfif',
        'autor4.jpg',
        'autor5.jpg',
        'autor6.jpg',
        'autor7.jpg',
        'autor8.jpg',
        'autor9.webp',
        'autor10.jpg',
      ];

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

      $mergedArray = mergeArrays($citatP, $AutorP,  $posaoSLike);
      $randomIndex = array_rand($mergedArray, 1);
      // Pristupanje random el
      $randomElement = $mergedArray[$randomIndex];

      //  // Prisupanje pojedinacnim vrednostima iz random el
      $randomCitat = $randomElement['citat'];
      $randomAutor = $randomElement['autor'];
      $randomSlika = $randomElement['slika'];




      // print
      echo "<div><q>" . $randomCitat . "</q>" . "<p><cite>" . $randomAutor . "</cite></p></div>";
      ?>

      <img src="<?php echo 'pageImages/job/' . $randomSlika; ?>" alt="" class="slikeAutora">
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