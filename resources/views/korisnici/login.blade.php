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
          @auth
          <div class="header2-1">
          <div class="izlogujse"> 
            <form action="/logout" method="POST">
              @csrf
              @method('POST')
              <button><img src="\images\logout.png" alt="logout"></button>
            </form>
          </div>
        </div>
          @else
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
          @endauth
          <div class="header2-2">
          <div class="navigacija">
            <ul>
              <i><li><a href="\vesti">Sve novosti</a></li></i> 
              <i><li><a href="\kursevi">Svi kursevi</a></li></i> 
              <i><li><a href="\kontakti">Kontakti</a></li></i> 
              @auth
              @if(auth()->user()->TipP=='Administrator')
              <i><li><a href="\obavestenja">Profili</a></li></i> 
              @endif
              @endauth
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
                @csrf
                  @method('POST')
                  <table class="podaci">
                  <tr>
                    <td>
                    <label for="email"><h3>E-adresa:</h3></label>
                    </td>
                    <td class="Input">
                  <div>
                      <input class="EmInput" type="text" placeholder="Email adresa" id="email" name="Eadresa" value="{{old('Eadresa')}}">
                  </div>
                    @error('Eadresa')
                <div>
                  <p style="color: red;float:left;">Neispravan e-mail</p>
                </div>
                  @enderror
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
                  @error('Lozinka')
                <div>    
                  <p>Neispravna lozinka</p>
                </div>  
                  @enderror
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
</html>