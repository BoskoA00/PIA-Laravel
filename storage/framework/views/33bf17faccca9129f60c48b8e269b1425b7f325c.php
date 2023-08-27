<!doctype html>
<html lang="en">
  <head>
    <title>Izmena kontakta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\editkontakt-stranica.css">
    
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
          <div>
            <a href="\promenas"><button>Promeni sifru</button></a>
          </div>
          <?php endif; ?>
        </div>
        <div class="main-srednji">
            <h1>Unos kontakta</h1>
            <div class="tabela">
                <form method="POST" action="\kontakti\<?php echo e($k->id); ?>\editing">
                  <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                  <table>
                    <tr>
                    <td><label for="ime">Ime profesora:</label></td>
                    <td>
                      <div>
                      <input type="text" value="<?php echo e($k->ImeP); ?>" name="ImeP">
                    </div>  
                    <?php $__errorArgs = ['ImeP'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <p>Neispravno ime</p>
                    </div>                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </td>
                  </tr>
                  <tr>
                    <td><label for="prezime">Prezime profesora:</label></td>
                    <td>
                    <div>
                      <input type="text" value="<?php echo e($k->PrezimeP); ?>" name="PrezimeP">
                    </div>
                    <?php $__errorArgs = ['PrezimeP'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <p>Neispravno prezime</p>
                    </div>                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                  </tr>
                  <tr>
                  <td><label for="broj">Telefon profesora:</label></td>
                  <td>
                    <div>
                    <input type="text" value="<?php echo e($k->BrojT); ?>" name="BrojT">
                    </div>
                    <?php $__errorArgs = ['BrojT'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                        <p>Neispravan broj</p>
                    </div>                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </td>                    
                  </tr>
                  <tr> 
                    <td><label for="adresa">Eadresa profesora:</label></td>
                    <td>
                      <div>
                      <input type="text" value="<?php echo e($k->Eadresa); ?>" name="Eadresa">
                      </div>
                      <?php $__errorArgs = ['Eadresa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div>
                          <p>Neispravna eadresa</p>
                      </div>    
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>       
                    </td>
                  </tr>
                  </table>
                    <button>Potvrdi kontakt</button>
                </form>
                
            </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/kontakti/kontaktedit.blade.php ENDPATH**/ ?>