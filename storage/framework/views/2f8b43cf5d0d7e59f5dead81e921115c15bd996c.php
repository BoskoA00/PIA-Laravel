<!doctype html>
<html lang="en">
  <head>
    <title>Promena sifre</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\promenas-stranica.css">
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
  </a>
    <div class="main">
        <div class="main-levi">
        </div>
        <div class="main-srednji">
            <h1>Unesite podatke</h1>
            <div>
            <div class="FormaRegistracije">
                <form action="/promena" method="POST">
                <?php echo csrf_field(); ?>
                  <?php echo method_field('POST'); ?>
                  <table class="podaci">
                  <tr>
                    <td>
                    <label for="email"><h3>E-adresa:</h3></label>
                    </td>
                    <td class="txtInput">
                    <div>
                      <input type="text" required  id="email" name="Eadresa" value="<?php echo e(auth()->user()->Eadresa); ?>">
                    </div>
                      <?php $__errorArgs = ['Eadresa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                      <p style="color: red;float:left;">Losa adresa</p>
                    </div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                </tr>
                <tr>
                  <td>
                    <label for="lozinka"><h3>Lozinka:</h3></label>
                  </td>
                  <td class="txtInput">
                  <div>
                    <input type="password"  placeholder="Nova lozinka" id="lozinka" name="password">
                  </div>
                  <?php $__errorArgs = ['Lozinka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div>
                        <p style="color:red;float:left;margin-left:55px;">Lozinka ne sme biti sastavljena od razmaka!</p>
                      </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <?php $__errorArgs = ['Lozinka1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div>
                        <p style="color:red;float:left;margin-left:55px;">Nova lozinka mora biti razlicita od prethodne tri!</p>
                      </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </td>
                </tr>
                    </table>
                <button>Potvrdi</button>
                </form>
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
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/korisnici/promenas.blade.php ENDPATH**/ ?>