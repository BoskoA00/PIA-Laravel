<!doctype html>
<html lang="en">
  <head>
    <title><?php echo e(auth()->user()->Ime." ".auth()->user()->Prezime); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\profil-stranica.css">
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
            <span><b><a href="#">Dobrodosli,<?php echo e(auth()->user()->Ime); ?></a></b></span>
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
            <?php if(auth()->guard()->check()): ?>
            <div>
            <a href="/promenas"><button>Promeni sifru</button></a>
            </div>
            <?php endif; ?>
        </div>
        <div class="main-srednji">
           <div class="Profil"> 
                <div class="Slika">
                    <img src="\storage\Slike\<?php echo e(auth()->user()->Slika); ?>"  alt="<?php echo e(auth()->user()->Slika); ?>"/>
                </div>
                <div class="Podaci">
                    <div class="Ime">
                        <p><?php echo e(auth()->user()->Ime); ?> <?php echo e(auth()->user()->Prezime); ?>(<?php echo e(auth()->user()->Pol); ?>)</p>
                    </div>
                    <div class="Drzava">
                        <p><?php echo e(auth()->user()->DrzavaR); ?></p>
                    </div>
                    <div class="JMBG">
                        <p>JMBG: <?php echo e(auth()->user()->JMBG); ?></p>
                    </div>
                    <div class="DR">
                      <p>Datum rodjenja: <?php echo e($DatumR); ?></p>
                  </div>
                    <div class="BrT">
                        <p>Broj telefona: <?php echo e(auth()->user()->BrojT); ?></p>
                    </div>
                    <div class="EA">
                        <p>E-adresa: <?php echo e(auth()->user()->Eadresa); ?></p>
                    </div>
                    <div class="TP">
                        <p>Tip profila: <?php echo e(auth()->user()->TipP); ?></p>
                    </div>
                    <div class="PO">
                        <p>Prosecna ocena: <?php echo e($ProsecnaOcena); ?></p>
                    </div>
                    <div class="PR">
                        <p>Prosecna tacnost: <?php echo e($ProsecnaTacnost); ?></p>
                    </div>
                </div>
           </div>
           <div class="MojiP">
            <?php if($mojaPolaganja!=null && $mojaPolaganja>0): ?>
                <div class="Tekst">
                    <h4>Vasi pokusaji</h5>
                </div>
                <div class="TabelaMP">
                   <table class="T1">
                    <tr>
                        <th>Ime kursa</th>
                        <th>Ime profesora</th>
                        <th>Datum polaganja</th>
                        <th>Tacnost</th>
                        <th>Ocena</th>
                    </tr>
                    <?php $__currentLoopData = $mojaPolaganja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($m['Ime_kursa']); ?></td>
                        <td><?php echo e($m['Ime_Profesora']); ?></td>
                        <td><?php echo e($m['Datum_Polaganja']); ?></td>
                        <td><?php echo e($m['Rezultat']); ?></td>
                        <td><?php echo e($m['Ocena']); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </table>
                </div>
                <?php else: ?>
                <div>
                  <h4>Niste polagali kurseve</h4>
                </div>
                <?php endif; ?>
           </div>
           <?php if(auth()->user()->TipP=="Predavac" || auth()->user()->TipP=="Administrator"): ?>
           <div class="MojiK">
            <?php if($mojiKursevi!=null && count($mojiKursevi)>0): ?>
            <div class="Tekst">
                <h4>Vasi kursevi</h5>
            </div>
            <div class="TabelaMK">
               <table class="T">
                <tr>
                    <th>Ime kursa</th>
                    <th>Broj polaganja</th>
                    <th>Prosecna ocena</th>
                    <th>Prosecna tacnost</th>
                </tr>
                <?php $__currentLoopData = $mojiKursevi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php if($mk['Prosecna_Ocena']<6 || $mk['Prosecan_Rezultat']<60): ?>
                <tr style="color:Red">
                    <th><?php echo e($mk['Ime_Kursa']); ?></th>
                    <th><?php echo e($mk['brojPolaganja']); ?></th>
                    <th><?php echo e($mk['Prosecna_Ocena']); ?></th>
                    <th><?php echo e($mk['Prosecan_Rezultat']); ?></th>
                </tr>
                <?php else: ?>
                <tr>
                  <th><?php echo e($mk['Ime_Kursa']); ?></th>
                  <th><?php echo e($mk['brojPolaganja']); ?></th>
                  <th><?php echo e($mk['Prosecna_Ocena']); ?></th>
                  <th><?php echo e($mk['Prosecan_Rezultat']); ?></th>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </table>
            </div>
            <?php else: ?>
            <div>
              <h4>Nema vasih kurseva</h4>
            </div>
            <?php endif; ?>
          </div>
          <div class="PolaganjaPoStudentu">
            <?php if($PosebnaPolaganja!=null && count($PosebnaPolaganja)>0): ?>
            <div>
              <div>
                <h3>Posebna polaganja</h3>
              </div>
              <div>
                <table class="TabelaPP">
                  <tr>
                    <th>Student</th>
                    <th>Kurs</th>
                    <th>Datum polaganja</th>
                    <th>Rezultat</th>
                    <th>Ocena</th>
                  </tr>
                  <?php $__currentLoopData = $PosebnaPolaganja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th><?php echo e($p['Student']); ?></th>
                    <th><?php echo e($p['Kurs']); ?></th>
                    <th><?php echo e($p['DatumPolaganja']); ?></th>
                    <th><?php echo e($p['Rezultat']); ?></th>
                    <th><?php echo e($p['Ocena']); ?></th>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table> 
              </div>
            </div>
            <?php else: ?>
            <div>
              <h4>Niko nije pohadjao vase kurseve</h4>
            </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
    </div>
    <div class="main-desni">
    </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/korisnici/profil.blade.php ENDPATH**/ ?>