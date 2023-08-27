<!doctype html>
<html lang="en">
  <head>
    <title>Registracija korisnika</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\registracija-stranica.css">
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
    <div class="main">
        <div class="main-levi">
        </div>
        <div class="main-srednji">
            <h1>Unesite podatke:</h1>
            <div>
            <div class="FormaRegistracije">
                <form action="/stvaranje" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                <table>
                <tr>
                    
                <td class="Tekst"><label for="ime"><h3>Ime:</h3></label></td>
                <td class="Input">
                <div>
                    <input class="ImeIn" id="ime" type="text" name="Ime" value="<?php echo e(old('Ime')); ?>">
                </div>
                    <?php $__errorArgs = ['Ime'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div>
                    <p>Neispravno ime</p>
                <div>
                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
                </tr>
                <tr>
                    <td class="Tekst"><label for="prezime"><h3>Prezime:</h3></label></td>
                    <td class="Input">
                        <div>
                        <input class="PrezimeIn" type="text" id="prezime" name="Prezime" value="<?php echo e(old('Prezime')); ?>">
                        </div>
                <?php $__errorArgs = ['Prezime'];
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
                        <td class="Tekst"><label for="lozinka"><h3>Lozinka:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input class="LoIn" type="password" id="lozinka" name="password">
                        </div>
                         <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div>
                             <p>Neodgovarajuca lozinka</p>
                            </div>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                </tr>
                <tr>
                    <td class="Tekst"><label for="lozinka2"><h3>Potvrda lozinke:</h3></label></td>
                    <td class="Input">
                        <div>
                        <input class="LoIn" type="password" placeholder="Unesite ponovo lozinku" id="lozinka2" name="password_confirmation" >
                        <div>
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>    
                    <p>Neodgovarajuca lozinka</p>
                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
                </tr>
                <tr>
                    <td class="Tekst"><label class="pol"><h3>Pol:</h3></label></td>
                    <td class="Input"> 
                    <div class="Polovi">
                    <div class="PolM">
                        <label for="M">Musko</label>
                        <input type="radio" id="M" name="Pol" value="M">
                    </div>
                    <div class="PolZ">
                        <label for="Z">Zensko</label>
                        <input type="radio" id="Z" name="Pol" value="Z">
                    </div>
                    </div>
                    <?php $__errorArgs = ['Pol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div>
                    <p>Niste odabrali pol</p>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
                </tr>
                    <tr>
                        <td class="Tekst"><label for="drzava"><h3>Drzava rodjenja:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input type="text" id="drzava" name="DrzavaR" value="<?php echo e(old('DrzavaR')); ?>">
                        <div>
                            <?php $__errorArgs = ['Drzava'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <p>Obavezno unesite drzavu</p>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                </tr>
                    <tr>
                        <td class="Tekst"><label for="datum"><h3>Datum rodjenja:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input class="DatumR" max="2004-12-31" type="date" id="datum" name="DatumR" value="<?php echo e(old('DatumR')); ?>">
                        
                        </div>
                            <?php $__errorArgs = ['Datum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div>
                            <p>Neodgovarajuci datum</p>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label for="jmbg"><h3>JMBG</h3></label></td>
                        <td class="Input">
                        <div>
                            <input  type="text" placeholder="Jedinstveni maticni broj" id="jmbg" name="JMBG" value="<?php echo e(old('JMBG')); ?>">
                        </div>
                            <?php $__errorArgs = ['JMBG'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <p>Neisrpavno uneti JMBG</p>
                        </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label for="brojt"><h3>Broj telefona:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input  type="text"  id="brojt" name="BrojT" value="<?php echo e(old('BrojT')); ?>">
                        </div>
                            <?php $__errorArgs = ['BrojT'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <p>Unesite ispravan broj</p>
                        </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label for="email"><h3>Email adresa:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input  type="text"  id="email" name="Eadresa" value="<?php echo e(old('Eadresa')); ?>">
                        <div>
                            <?php $__errorArgs = ['Eadresa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <p>Unesite odgovarajucu e-adresu</p>
                        <div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label class="SlikaLabel" for="slika"><h3>Slika:</h3></label></td>
                        <td class="Input">
                            <div>
                            <input class="SlikaIn" type="file" id="slika" name="Slika"></td>
                            </div>
                            <?php $__errorArgs = ['Slika'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <p>Neispravan podatak</p>
                        </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label class="TipProfila"><h3>Tip profila:</h3></label>
                        <td class="Input">
                        <div class="Uloge">
                            <div class="UlogaPol">
                                <label for="polaznik">Polaznik</label>
                                <input  type="radio" id="polaznik" name="TipP" value="Polaznik" >
                            </div>
                            <div class="UlogaPr">
                                <label for="predavac">Predavac</label>
                                <input  type="radio" id="predavac" name="TipP" value="Predavac">
                            </div>
                        </div>
                        <?php $__errorArgs = ['TipP'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div>
                            <p>Odaberite tip profila</p>
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
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/korisnici/registracija.blade.php ENDPATH**/ ?>