<!doctype html>
<html lang="en">
  <head>
    <title><?php echo e($novost['Naslov']); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\novost-stranica.css">
    <link rel="icon" href="/images/learning.png" type="image/png">
 
    </head>
  <body>
    <div class="header">
      <div class="header1">
         <div class="logo"> 
          <img src="/images/learning.png" alt="LOGO">
          </div>
          <div class="naslov">
            <i><h1><a href="\">PsihoGuru</a></h1></i>
            </div>   
          </div>
          <div class="header2">
          <?php if(auth()->guard()->check()): ?>
          <div class="header2-1">
          <div class="izlogujse">
            <span><b><a href="/profil/<?php echo e(auth()->user()->id); ?>">Dobrodosli,<?php echo e(auth()->user()->Ime); ?></a></b></span>
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
              <i><li><a href="\obavestenja">Profili</a></li></i> 
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
          <?php if(auth()->user()->TipP=='Predavac' || auth()->user()->TipP=='Administrator'): ?>
        <a href="/vesti/create"><button><b>Nova vest</b></button></a>
          <?php endif; ?>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
          <div>
            <a href="\promenas"><button>Promeni sifru</button></a>
          </div>
          <?php endif; ?>
        </div>
        <div class="main-srednji">
            <h1 class="n1"><?php echo e($novost['Naslov']); ?></h1>
            <div class="novosti">
              <h3><?php echo e($novost['Opis']); ?></h3>
            </div>
            <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->TipP=='Administrator'): ?>
            <div class="novostD">
              <form action="/vesti/<?php echo e($novost['id']); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="izbrisi">Izbrisi</button>
              </form>
              <form action="/vesti/<?php echo e($novost['id']); ?>/edit">
                <button class="izmeni">Izmeni</button>
              </form>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/stranice/novost.blade.php ENDPATH**/ ?>