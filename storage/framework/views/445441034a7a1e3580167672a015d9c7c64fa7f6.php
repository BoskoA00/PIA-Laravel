<!doctype html>
<html lang="en">
  <head>
    <title><?php echo e($kurs->ImeKursa); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\kurs-stranica.css">
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
      </div> 
    </div>
    <div class="main">
        <div class="main-levi">
          <?php if(auth()->guard()->check()): ?>
          <div>
          <a href="/promenas"><button>Promeni sifru</button></a>
          </div>
          <?php endif; ?>
        </div>
        <div class="main-srednji">
            <div class="Kurs">
                <div class="Kurs1">
                    <h1><?php echo e($kurs->ImeKursa); ?></h1>
                </div>
                <div class="Kurs2">
                    <div class="ImeProfesora">
                    <h3>Profesor:<?php echo e($kurs->ImeProfesora); ?></h3>
                    </div>
                    <div class="OpisKursa">
                    <h4>Opis kursa:</h4>
                    <p><?php echo e($kurs->OpisKursa); ?></p>
                    </div>
                    <div class="PrilozeniMaterijal">
                        <?php if($kurs->PrilozeniMaterijal!=null): ?>
                        <a href="/kurs/<?php echo e($kurs->id); ?>/materijal"><?php echo e($kurs->PrilozeniMaterijal); ?></a>
                        <?php else: ?>
                            <p>Nema prilozenog materijala</p>
                        <?php endif; ?>
                    </div>
                    <div class="Dugmad">
                     <?php if(auth()->guard()->check()): ?>
                      <?php if(auth()->user()->id == $kurs->Id_Profesora || auth()->user()->TipP=='Administrator'): ?>
                        <form action="/kurs/<?php echo e($kurs['id']); ?>/izbrisi" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="Izbrisi">Izbrisi</button>
                          </form>
                          <form action="/kurs/<?php echo e($kurs['id']); ?>/edit">
                            <button class="Izmeni">Izmeni</button>
                          </form>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                          <?php if(count($Pitanja)>0): ?>
                            <?php if(auth()->user()): ?>
                          <form action="/kurs/<?php echo e($kurs['id']); ?>/polaganje">
                            <button class="Pokusaj">Polaganje</button>
                          </form>
                            <?php endif; ?>
                          <?php else: ?>
                          <?php if((auth()->user()->id==$kurs->Id_Profesora) || auth()->user()->TipP=='Administrator'): ?>
                          <form action="/kurs/<?php echo e($kurs['id']); ?>/dodajP">
                            <button class="Pokusaj">Unos pitanja</button>
                          </form>
                          <?php endif; ?>
                          <?php endif; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-desni">
            </div>
          </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/kursevi/kurs.blade.php ENDPATH**/ ?>