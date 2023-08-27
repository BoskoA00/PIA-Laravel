<!doctype html>
<html lang="en">
  <head>
    <title>Kontakti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\kontakti-stranica.css">
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
              <i><li style="background-color: #7c5db9"><a style="color:white" href="\kontakti">Kontakti</a></li></i> 
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
          <div>
            <a href="\promenas"><button>Promeni sifru</button></a>
          </div>
          <?php endif; ?>
        </div>
        <div class="main-srednji">
          <div class="kontaktiT">
            <?php if (! (count($kontakti)==0)): ?>
            <h1 class="n1">Kontakti</h1>
            <div class="tabela">
            <table>
                <tr>
                    <th>Slika</th>
                    <th>Ime </th>
                    <th>Prezime </th>
                    <th>Telefon </th>
                    <th>Email </th>
                </tr>
            <?php $__currentLoopData = $kontakti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr>
                    <?php if($k->Slika==null): ?>
                    <td><img src="\images\avatar.png"/></td>
                    <?php else: ?>
                    <td><img src="storage\Slike\<?php echo e($k->Slika); ?>"  alt="Slika lika"/></td>
                    <?php endif; ?>
                    <td><a href="\kontakti\<?php echo e($k->id); ?>"><?php echo e($k->ImeP); ?></a></td>
                    <td><a href="\kontakti\<?php echo e($k->id); ?>"><?php echo e($k->PrezimeP); ?></a></td>
                    <td><a href="\kontakti\<?php echo e($k->id); ?>"><?php echo e($k->BrojT); ?></a></td>
                    <td><a href="\kontakti\<?php echo e($k->id); ?>"><?php echo e($k->Eadresa); ?></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div>
            <?php else: ?>
            <div class="novosti">
              <h1 class="naslovnovosti">Trenutno nema dostupnih informacija o kontaktima</h1>
          </div>
          <?php endif; ?>
          <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->TipP=='Administrator'): ?>
          <a href="\formakontakta">
                <button>Dodaj kontakt</button>
          </a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/kontakti/kontakti.blade.php ENDPATH**/ ?>