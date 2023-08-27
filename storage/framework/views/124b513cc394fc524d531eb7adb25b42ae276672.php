<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\login-stranica.css">
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
            <h1>Unesite podatke:</h1>
            <div class="UnosInformacija">
            <div class="FormaLogovanja">
                <form action="/logging" method="POST">
                <?php echo csrf_field(); ?>
                  <?php echo method_field('POST'); ?>
                  <table class="podaci">
                  <tr>
                    <td>
                    <label for="email"><h3>E-adresa:</h3></label>
                    </td>
                    <td class="Input">
                  <div>
                      <input class="EmInput" type="text" placeholder="Email adresa" id="email" name="Eadresa" value="<?php echo e(old('Eadresa')); ?>">
                  </div>
                    <?php $__errorArgs = ['Eadresa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div>
                  <p style="color: red;float:left;">Neispravan e-mail</p>
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
                  <td class="Input">
                  <div >
                  <input class="LoInput" type="password" placeholder="Lozinka" id="lozinka" name="password">
                </div>  
                  <?php $__errorArgs = ['Lozinka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div>    
                  <p>Neispravna lozinka</p>
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
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/korisnici/login.blade.php ENDPATH**/ ?>