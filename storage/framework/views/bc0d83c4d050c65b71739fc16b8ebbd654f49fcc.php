<!doctype html>
<html lang="en">
  <head>
    <title><?php echo e($kurs->ImeKursa); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\dodavanje-pitanja-stranica.css">
    <link rel="icon" href="/images/learning.png" type="image/png">
 
    <script src="\js\polaganje-pitanja.js"></script>    
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
      </div> 
    </div>
    <div class="main">
        <div class="main-levi">
       </div>
        <div class="main-srednji">
            <form method="POST" action="/kurs/<?php echo e($kurs->id); ?>/rezultati"  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
               <?php echo method_field('POST'); ?>
                <div class="Pitanja">
                   <?php $__currentLoopData = $pitanja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="Pitanje">
                        <div class="TxtPitanja">
                          <div>
                          <label for="txtPitanja"><?php echo e($p->Pitanje); ?></label>
                        </div>
                       <div>
                        <button class="pomoc" type="button" onclick="Pola_Pola(this)">Pomoc</button>
                       </div>
                        </div>
                    <div class="Odgovori">
                            <label for="Odg1"><?php echo e($p->Odgovor1); ?></label>
                            <input type="radio" id="Odg1" name="Odgovor[<?php echo e($p->id); ?>]" value="1" />   
                            <label for="Odg2"><?php echo e($p->Odgovor2); ?></label>
                            <input type="radio" id="Odg2" name="Odgovor[<?php echo e($p->id); ?>]" value="2"/>   
                            <label for="Odg3"><?php echo e($p->Odgovor3); ?></label>
                            <input type="radio" id="Odg3" name="Odgovor[<?php echo e($p->id); ?>]" value="3"/>   
                            <label for="Odg4"><?php echo e($p->Odgovor4); ?></label>
                            <input type="radio" id="Odg4" name="Odgovor[<?php echo e($p->id); ?>]" value="4"/>   
                    </div>
                    <div>
                        <input type="hidden" id="idPitanja" name="idPitanja[]" value="<?php echo e($p->id); ?>" />
                        <input type="hidden" id="TacanIndex" name="TacanIndex[]" value="<?php echo e($p->TacanOdgovor); ?>" />
                        <input type="hidden" id="Pomoc" name="Pomoc[<?php echo e($p->id); ?>]" value="0" />
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
             <button type="submit" id="UnesiPitanjaBtn" class="UnesiP">Potvrdi polaganje</button>
            </form>
        </div>
        <div class="main-desni">
        </div>
    </div>
    <div class="futer">
    </div>
</body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/kursevi/polaganje.blade.php ENDPATH**/ ?>