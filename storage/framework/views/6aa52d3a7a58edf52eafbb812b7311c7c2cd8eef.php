<!doctype html>
<html lang="en">
  <head>
    <title>PsihoGuru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\pocetna-stranica.css">
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
            <li><i><a style="color:white" href="\vesti">Sve novosti</a></i></li> 
            <li><i><a href="\kursevi">Svi kursevi</a></i></li> 
            <li><i><a href="\kontakti">Kontakti</a></i></li> 
            <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->TipP=='Administrator'): ?>
            <li><i><a href="\obavestenja">Profili</a></i></li> 
            <?php endif; ?>
            <?php endif; ?>
          </ul>  
        </div>
        </div>
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
          <div class="n1">
            <h1 >Novosti</h1>
          </div>
            <div class="Novosti">
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
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/stranice/index.blade.php ENDPATH**/ ?>