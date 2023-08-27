<!doctype html>
<html lang="en">
  <head>
    <title><?php echo e($kurs->ImeKursa); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\dodavanje-pitanja-stranica.css">
    <link rel="icon" href="/images/learning.png" type="image/png">
    <script src="\js\dodavanje-pitanja.js"></script>    
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
            <div class="DugmadZaPitanja">
                <button class="DodajP" id="dodajPitanjeBtn" onclick="DodajPitanje()">Dodaj pitanje</button>
            </div>
            <form method="POST" action="/kurs/<?php echo e($kurs->id); ?>/unesiP"  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <div class="Pitanja">
                    <div class="Pitanje">
                        <div class="TxtPitanja">
                        <label for="txtPitanja">Tekst pitanja:</label>
                        <input type="text" name="txtPitanja[]" id="txtPitanja" required/>
                    </div>
                    <div class="Odgovori">
                            <input type="text" name="Odgovor[]" id="Odgovor1" placeholder="Odgovor 1" required/>
                            <input type="text" name="Odgovor[]" id="Odgovor2" placeholder="Odgovor 2" required/>
                            <input type="text" name="Odgovor[]" id="Odgovor3" placeholder="Odgovor 3" required/>
                            <input type="text" name="Odgovor[]" id="Odgovor4" placeholder="Odgovor 4" required/>
                    </div>
                    <div class="IndexOdg">
                      <div>
                        <label for="Index">Indeks tacnog odgovora:</label>
                        <input type="number" name="Index[]" id="Index" max="4" min="1" required/>
                      </div>
                      <div class="Tezina">
                        <input type="range" min="1" max="3" name="Tezina[]" />
                    </div>
                    </div>
                </div>
             </div>
             <button type="submit" id="UnesiPitanjaBtn" class="UnesiP">Unesi pitanja</button>
            </form>
        </div>
        <div class="main-desni">
        </div>
    </div>
    <div class="futer">
    </div>
</body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/kursevi/dodavanje-pitanja.blade.php ENDPATH**/ ?>