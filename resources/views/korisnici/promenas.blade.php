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
          @auth
          <div class="header2-1">
          <div class="izlogujse">
            <span><b><a href="/profil/{{auth()->user()->id}}">Dobrodosli,{{auth()->user()->Ime}}</a></b></span>
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
            <h1>Unesite podatke</h1>
            <div>
            <div class="FormaRegistracije">
                <form action="/promena" method="POST">
                @csrf
                  @method('POST')
                  <table class="podaci">
                  <tr>
                    <td>
                    <label for="email"><h3>E-adresa:</h3></label>
                    </td>
                    <td class="txtInput">
                    <div>
                      <input type="text" required  id="email" name="Eadresa" value="{{auth()->user()->Eadresa}}">
                    </div>
                      @error('Eadresa')
                    <div>
                      <p style="color: red;float:left;">Losa adresa</p>
                    </div>
                      @enderror
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
                  @error('Lozinka')
                  <div>
                        <p style="color:red;float:left;margin-left:55px;">Lozinka ne sme biti sastavljena od razmaka!</p>
                      </div>
                  @enderror
                  @error('Lozinka1')
                  <div>
                        <p style="color:red;float:left;margin-left:55px;">Nova lozinka mora biti razlicita od prethodne tri!</p>
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