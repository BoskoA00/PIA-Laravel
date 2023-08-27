<!doctype html>
<html lang="en">
  <head>
    <title>Unos kontakta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\unoskontakta-stranica.css">
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
    <div class="main">
        <div class="main-levi">
          @auth
          <div>
            <a href="\promenas"><button>Promeni sifru</button></a>
          </div>
          @endauth
        </div>
        <div class="main-srednji">
            <h1>Unos kontakta</h1>
            <div>
                <form method="POST" action="\dodajk" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  <table>
                    <tr>
                    <td><label for="ime">Ime profesora:</label></td>
                    <td><input class="ImeK" type="text" placeholder="Ime profesora" name="ImeP" required></td>
                  </tr>
                  <tr>
                    <td><label for="prezime">Prezime profesora:</label></td>
                    <td><input  class="PrezimeK" type="text" placeholder="Prezime profesora" name="PrezimeP" required></td>                    
                  </tr>
                  <tr>
                  <td><label for="broj">Telefon profesora:</label></td>
                  <td><input class="BrojK" type="text" placeholder="Telefon profesora" name="BrojT" required></td>                    
                  </tr>
                  <tr> 
                    <td><label for="adresa">Eadresa profesora:</label></td>
                    <td><input class="EadrK" type="text" placeholder="Email profesora" name="Eadresa" required></td>
                  </tr>
                  <tr> 
                    <td><label for="adresa">Slika:</label></td>
                    <td><input class="SlK" type="file"  name="Slika" id="Slika"></td>
                  </tr>
                  </table>
                    <button>Unesi kontakt</button>
                </form>
            </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html>