<?php
require_once "header.php";
?>
  <section class="container-fluid citati text-dark">
    <div class="container">
      <div class="row">
        <?php

        $file = __DIR__ . "/zdravlje.txt";
        $f = fopen($file, "r");
        $Z = array();

        if ($f == true) {

          $Z = explode("\n", fread($f, filesize($file)));
        }


        $citatZ = array(); // array samo za citate;
        $AutorZ = array(); //array samo za autore;
        $i = 0; // iterator
        foreach ($Z as $key => $value) {
          if (++$i % 2 == 0) {
            $AutorZ[$key] = $value;
          }   //izdvajamo autore iz array //zbog ++i ide prvo od 1, prvo je dodato 1 pa deljeno
          else {
            $citatZ[$key] = $value;
          }    //izdvajamo citate iz array
        }

        $AutorZ=array_values($AutorZ);
        $citatZ =array_values($citatZ);

      

       $zdravljeSlike = ['autor1.jpg',
       'autor2.webp',
       'autor3.jfif',
       'autor4.jfif',
       'autor5.jpg',
       'autor6.jpg',
       'autor7.jpg',
       'autor8.jfif',
       'autor9.jpg',
       'autor10.jpg',
      ];
      // function mergeArrays($citati, $autori, $slike) {
      //   $result = array();
      //   foreach ($citati as $key=>$name) {
      //     $result[] = array('citat'=>$name, 'autor'=>$autori[$key], 'slika'=> $slike[$key]);
      //   }
      //   return $result;
      // }

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
    
     
      $mergedArray=mergeArrays( $citatZ,  $AutorZ, $zdravljeSlike);
      //print_r($mergedArray);

      $randomIndex=array_rand($mergedArray,1);
       // Prisupanje  random el
       $randomElement = $mergedArray[$randomIndex];

       // Prisupanje pojedinacnim vrednostima iz random el
       $randomCitat = $randomElement['citat'];
       $randomAutor = $randomElement['autor'];
       $randomSlika = $randomElement['slika'];
  
        
       // print
       echo "<div><q>" . $randomCitat . "</q>" . "<p><cite>" . $randomAutor . "</cite></p></div>";
       ?>
        <img src="<?php echo 'pageImages/health/' . $randomSlika; ?>" alt="" class="slikeAutora">
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