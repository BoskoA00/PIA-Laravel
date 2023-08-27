<!doctype html>
<html lang="en">
  <head>
    <title>Nova vest</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\main.css">
    
    </head>
  <body>
    <div class="header">
        <div>
          <i><h1><a href="\">Pocetna stranica</a></h1></i>
        </div>
        <div class="navigacija">
            <ul>
              <i><li><a href="\vesti">Sve novosti</a></li></i> 
              <i><li><a href="#">Svi kursevi</a></li></i> 
              <i><li><a href="#">Link 3</a></li></i> 
               <i><li><a href="#">Link 4</a></li></i> 
            </ul>  
        </div>
        <div class="slika">
          <img src="\images\registracija.png" alt="registracija">
        </div>
        <div class="slika">
          <img src="\images\login.png" alt="registracija">
        </div>
    </div>
    <div class="main">
        <div class="main-levi">
        </div>
        <div class="main-srednji">
            <h1>Nova vest:</h1>
            <div>
            <div class="inputi">
                <form action="/vesti/creating" method="POST">
                <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                <div class="NN">
                 <label for="novinaslov"><h3>Naslov:</h3></label>
                 <input type="text" placeholder="Naslov" name="Naslov">
                 <?php $__errorArgs = ['Naslov'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: red;float:left;"><?php echo e($message); ?></p>
                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="NO">
                <label for="izmenaopisa"><h3>Novi opis:</h3></label>
                <textarea name="Opis"  placeholder="Opis"></textarea>
                <?php $__errorArgs = ['Opis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: red;float:left;"><?php echo e($message); ?></p>
                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button>Potvrdi</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        <div class="main-desni">
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html><?php /**PATH C:\Users\bobia\Desktop\Projekat iz PIA\Projekat\resources\views/create.blade.php ENDPATH**/ ?>