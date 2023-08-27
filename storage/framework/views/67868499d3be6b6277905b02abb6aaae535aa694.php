<!doctype html>
<html lang="en">
  <head>
    <title>Nova vest</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\main.css">
    
    </head>
  <body>
    <div class="header">
      <div class="header1">
         <div class="logo"> 
          <img src="/images/learning.png" alt="LOGO">
          </div>
          <div class="naslov">
            <i><h1><a href="\">Pocetna stranica</a></h1></i>
            </div>   
          </div>
          <div class="header2">
          <?php if(auth()->guard()->check()): ?>
          <div class="header2-1">
          <div class="izlogujse">
            <span><b>Dobrodosli,<?php echo e(auth()->user()->Ime); ?></b></span>
            <form action="/logout" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('POST'); ?>
              <button><img src="\images\logout.png" alt="logout"></button>
            </form>
          </div>
        </div>
          <?php else: ?>
          <div class="header2-1">
          <div class="RegistracijaSlika">
          <a href="/registracija">
              <img src="\images\registracija.png" alt="registracija">
            </a>
          </div>
          <div class="LoginSlika">
          <a href="/login">
              <img src="\images\login.png" alt="login">
            </a>
          </div>
        </div>
          <?php endif; ?>
          <div class="header2-2">
          <div class="navigacija">
            <ul>
              <i><li><a href="\vesti">Sve novosti</a></li></i> 
              <i><li><a href="\kursevi">Svi kursevi</a></li></i> 
              <i><li><a href="\kontakti">Kontakti</a></li></i> 
              <?php if(auth()->guard()->check()): ?>
              <?php if(auth()->user()->TipP=='Administrator'): ?>
              <i><li><a href="\obavestenja">Obavestenja</a></li></i> 
              <?php endif; ?>
              <?php endif; ?>
            </ul>  
          </div>
          </div>
        </div>
        </div>
    <div class="main">
        <div class="main-levi">
          <?php if(auth()->guard()->check()): ?>
          <div>
            <a href="#"><button>Dodaj</button></a>
          </div>
        <div>
          <a href="/promenas"><button>Promeni sifru</button></a>
        </div>
          <?php endif; ?>
        </div>
        <div class="main-srednji">
            <h1>Svi ponudjeni kursevi:</h1>
            <div>
            <div>
                <h1>Kursevi</h1>
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
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/kursevi/index.blade.php ENDPATH**/ ?>