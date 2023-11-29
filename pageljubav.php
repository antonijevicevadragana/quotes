<?php
require_once "header.php";
?>

<section class="container-fluid citati text-dark">
  <div class="container">
    <div class="row">
      <?php

      $file = __DIR__ . "/ljubav.txt";
      $f = fopen($file, "r");
      $L = array();

      if ($f == true) {

        $L = explode("\n", fread($f, filesize($file)));
      }


      $citatL = array(); // array samo za citate;
      $AutorL = array(); //array samo za autore;
      $i = 0; // iterator
      foreach ($L as $key => $value) {
        if (++$i % 2 == 0) {
          $AutorL[$key] = $value;
        }   //izdvajamo autore iz array //zbog ++i ide prvo od 1, prvo je dodato 1 pa deljeno
        else {
          $citatL[$key] = $value;
        }    //izdvajamo citate iz array
      }

      $AutorL = array_values($AutorL);
      $citatL = array_values($citatL);

      $ljubavSlike = [
        'autor1.jpg', 'autor2.jpg', 'autor3.jpg',
        'autor4.jpg',
        'autor5.jpg',
        'autor6.jpg',
        'autor7.jpg',
        'autor8.jpg',
        'autor9.jpg',
        'autor10.jpg'
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

      $mergedArray = mergeArrays($citatL, $AutorL, $ljubavSlike);
      //print_r($mergedArray);

      $randomIndex = array_rand($mergedArray, 1);
      //Pristupanje ramdnom elementu
      $randomElement = $mergedArray[$randomIndex];

      // Prisupanje pojedinacnim vrednostima iz radnom el
      $randomCitat = $randomElement['citat'];
      $randomAutor = $randomElement['autor'];
      $randomSlika = $randomElement['slika'];
      // $randomSlika1="<img src='$randomSlika' class='slikeAutora'></img>";



      // print
      echo "<div><q>" . $randomCitat . "</q>" . "<p><cite>" . $randomAutor . "</cite></p> </div>";
      ?>

      <img src="<?php echo 'pageImages/love/' . $randomSlika; ?>" alt="" class="slikeAutora">
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