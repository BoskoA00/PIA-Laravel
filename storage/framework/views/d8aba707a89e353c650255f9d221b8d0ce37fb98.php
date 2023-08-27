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
      <div class="logo"> 
        <img src="/images/learning.png" alt="LOGO">
      </div>
        <div>
        <i><h1><a href="\">Pocetna stranica</a></h1></i>
        </div>
        <div class="navigacija">
            <ul>
               <i><li><a href="\vesti">Sve novosti</a></li></i> 
               <i><li><a href="#">Svi kursevi</a></li></i> 
               <i><li><a href="\kontakti">Svi kontakti</a></li></i> 
               <i><li><a href="#">Link 4</a></li></i> 
            </ul>  
          </div>
          <?php if(auth()->guard()->check()): ?>
          <div class="izlogujse">
              <span><b>Dobrodosli,<?php echo e(auth()->user()->Ime); ?></b></span>
            <form action="/logout" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('POST'); ?>
              <button><img src="\images\logout.png" alt="logout"></button>
            </form>
          </div>
          <?php else: ?>
          <a href="/registracija">
          <div class="slika">
            <img src="\images\registracija.png" alt="registracija">
          </div>
        </a>
        <a href="/login">
          <div class="slika">
            <img src="\images\login.png" alt="login">
          </div>
        </a>
        <?php endif; ?>
    </div>
    <div class="main">
        <div class="main-levi">
          <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->TipP=='Predavac' || auth()->user()->TipP=='Administrator'): ?>
          <a href="/vesti/create"><button><b>Nova vest</b></button></a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="main-srednji">
            <h1>Unos kontakta</h1>
            <div>
                <form method="GET" action="\dodajk" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                    <label for="ime">Ime profesora:</label>
                    <input type="text" placeholder="Ime profesora" name="ImeP"><br>
                    <label for="prezime">Prezime profesora:</label>
                    <input type="text" placeholder="Prezime profesora" name="PrezimeP"><br>                    
                    <label for="broj">Telefon profesora:</label>
                    <input type="text" placeholder="Telefon profesora" name="BrojT"><br>                    
                    <label for="adresa">Eadresa profesora:</label>
                    <input type="text" placeholder="Email profesora" name="Eadresa"><br>

                    <button>Unesi kontakt</button>
                </form>
                
            </div>
          <a href="\dodajk">
                <button>Dodaj kontakt</button>
          </a>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/stranice/unoskontakta.blade.php ENDPATH**/ ?>