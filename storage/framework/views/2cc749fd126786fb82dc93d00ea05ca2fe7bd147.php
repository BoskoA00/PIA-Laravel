<!doctype html>
<html lang="en">
  <head>
    <title>Profili</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\obavestenja-stranica.css">
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
              <i><li style="background-color: #7c5db9"><a style="color:white" href="\obavestenja">Profili</a></li></i> 
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
            <h1 class="n1">Profili</h1>
            <div class="Profili">
            <table>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Uloga</th>
                    <th>Opcije</th>
                </tr>
            <?php $__currentLoopData = $obavestenja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php if($o->TipP!="Administrator"): ?>
            <tr>
                    <td><?php echo e($o->Ime); ?></td>
                    <td><?php echo e($o->Prezime); ?></td>
                    <td><?php echo e($o->BrojT); ?></td>
                    <td><?php echo e($o->Eadresa); ?></td>
                    <td><?php echo e($o->TipP); ?></td>
                    <td>
                      <?php if($o->Odobren=='Ne'): ?>
                      <a href="/obavestenja/<?php echo e($o->id); ?>/da"><button class="Dugmad Da">Da</button></a>
                      <a href="/obavestenja/<?php echo e($o->id); ?>/ne"><button class="Dugmad Ne">Ne</button></a>
                      <?php else: ?>
                      <a href="/obavestenja/<?php echo e($o->id); ?>/izbrisi"><button class="Dugmad Izbrisi">Izbrisi</button>
                      <?php endif; ?>
                    </td>
            </tr>
              <?php endif; ?>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
                 </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/stranice/obavestenja.blade.php ENDPATH**/ ?>