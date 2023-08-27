<!doctype html>
<html lang="en">
  <head>
    <title>Pocenta</title>
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
          <a href="/registracija">
          <div class="slika">
            <img src="\images\registracija.png" alt="registracija">
          </div>
        </a>
          <div class="slika">
            <img src="\images\login.png" alt="registracija">
          </div>
    </div>
    <div class="main">
        <div class="main-levi">
          <a href="/vesti/create"><button>Nova vest</button></a>
        </div>
        <div class="main-srednji">
            <h1>Novosti</h1>
            <div>
            <?php if (! (count($Novosti)==0)): ?>
            <?php $__currentLoopData = $Novosti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="novosti">
              <h1 class="naslovnovosti"><a href="/vesti/<?php echo e($n['id']); ?>"><?php echo e($n['Naslov']); ?></a></h1>
              <div class="opisnovosti">
                <h3><?php echo e($n->Opis); ?></h3>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="novosti">
              <h1 class="naslovnovosti"><a href="#">Nema novosti</a></h1>
          </div>
          <?php endif; ?>
        </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/index.blade.php ENDPATH**/ ?>