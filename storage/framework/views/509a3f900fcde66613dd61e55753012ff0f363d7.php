<!doctype html>
<html lang="en">
  <head>
    <title><?php echo e($novost['Naslov']); ?></title>
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
            <h1><?php echo e($novost['Naslov']); ?></h1>
            <div>
            <div class="novosti">
              <h1 class="naslovnovosti"><?php echo e($novost['Opis']); ?></h1>
            </div>
              <form action="/vesti/<?php echo e($novost['id']); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button>Delete</button>
              </form>
        
              <form action="/vesti/<?php echo e($novost['id']); ?>/edit">
                <button>Izmeni</button>
              </form>
              
              
              

        </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/novost.blade.php ENDPATH**/ ?>