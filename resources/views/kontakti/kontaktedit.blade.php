<!doctype html>
<html lang="en">
  <head>
    <title>Izmena kontakta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\editkontakt-stranica.css">
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
            <div class="tabela">
                <form method="POST" action="\kontakti\{{$k->id}}\editing">
                  @csrf
                    @method('PUT')
                  <table>
                    <tr>
                    <td><label for="ime">Ime profesora:</label></td>
                    <td>
                      <div>
                      <input type="text" value="{{$k->ImeP}}" name="ImeP">
                    </div>  
                    @error('ImeP')
                    <div>
                        <p>Neispravno ime</p>
                    </div>                
                        @enderror
                      </td>
                  </tr>
                  <tr>
                    <td><label for="prezime">Prezime profesora:</label></td>
                    <td>
                    <div>
                      <input type="text" value="{{$k->PrezimeP}}" name="PrezimeP">
                    </div>
                    @error('PrezimeP')
                    <div>
                        <p>Neispravno prezime</p>
                    </div>                
                        @enderror
                    </td>
                  </tr>
                  <tr>
                  <td><label for="broj">Telefon profesora:</label></td>
                  <td>
                    <div>
                    <input type="text" value="{{$k->BrojT}}" name="BrojT">
                    </div>
                    @error('BrojT')
                    <div>
                        <p>Neispravan broj</p>
                    </div>                
                        @enderror
                  </td>                    
                  </tr>
                  <tr> 
                    <td><label for="adresa">Eadresa profesora:</label></td>
                    <td>
                      <div>
                      <input type="text" value="{{$k->Eadresa}}" name="Eadresa">
                      </div>
                      @error('Eadresa')
                      <div>
                          <p>Neispravna eadresa</p>
                      </div>    
                      @enderror       
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
</html>