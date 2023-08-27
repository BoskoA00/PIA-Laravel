<!doctype html>
<html lang="en">
  <head>
    <title>Izmena</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\main.css">
    
    </head>
  <body>
    <div class="header">
        <div>
          <i><h1><a href="\">Pocetna stranica</a></h1></i>
        </div>
        <div class="navigacija">
            <ul>
              <i><li><a href="\vesti">Sve novosti</a></li></i> 
              <i><li><a href="#">Svi kursevi</a></li></i> 
              <i><li><a href="#">Link 3</a></li></i> 
               <i><li><a href="#">Link 4</a></li></i> 
            </ul>  
        </div>
        <div class="slika">
          <img src="\images\registracija.png" alt="registracija">
        </div>
        <div class="slika">
          <img src="\images\login.png" alt="registracija">
        </div>
    </div>
    <div class="main">
        <div class="main-levi">
        </div>
        <div class="main-srednji">
            <h1>Izmena novosti:<?php echo e($novost['Naslov']); ?></h1>
            <div>
            <div class="inputi">
                <form action="/vesti/<?php echo e($novost['id']); ?>/editing" method="POST">
                <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                <div class="NN">
                 <label for="novinaslov"><h3>Novi naslov:</h3></label>
                 <input type="text" value="<?php echo e($novost['Naslov']); ?>" placeholder="<?php echo e($novost['Naslov']); ?>" name="Naslov">
                </div>
                <div class="NO">
                <label for="izmenaopisa"><h3>Novi opis:</h3></label>
                <textarea name="Opis"  placeholder="<?php echo e($novost['Opis']); ?>"><?php echo e($novost['Opis']); ?></textarea>
                </div>
                <button>Potvrdi</button>
            </div>
            </div>
        </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/edit.blade.php ENDPATH**/ ?>