<!doctype html>
<html lang="en">
  <head>
    <title>Kontakti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\kontakti-stranica.css">
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
              <i><li style="background-color: #7c5db9"><a style="color:white" href="\kontakti">Kontakti</a></li></i> 
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
          <div class="kontaktiT">
            @unless(count($kontakti)==0)
            <h1 class="n1">Kontakti</h1>
            <div class="tabela">
            <table>
                <tr>
                    <th>Slika</th>
                    <th>Ime </th>
                    <th>Prezime </th>
                    <th>Telefon </th>
                    <th>Email </th>
                </tr>
            @foreach($kontakti as $k) 
            <tr>
                    @if($k->Slika==null)
                    <td><img src="\images\avatar.png"/></td>
                    @else
                    <td><img src="storage\Slike\{{$k->Slika}}"  alt="Slika lika"/></td>
                    @endif
                    <td><a href="\kontakti\{{$k->id}}">{{$k->ImeP}}</a></td>
                    <td><a href="\kontakti\{{$k->id}}">{{$k->PrezimeP}}</a></td>
                    <td><a href="\kontakti\{{$k->id}}">{{$k->BrojT}}</a></td>
                    <td><a href="\kontakti\{{$k->id}}">{{$k->Eadresa}}</a></td>
            </tr>
            @endforeach
            </table>
          </div>
            @else
            <div class="novosti">
              <h1 class="naslovnovosti">Trenutno nema dostupnih informacija o kontaktima</h1>
          </div>
          @endunless
          @auth
            @if(auth()->user()->TipP=='Administrator')
          <a href="\formakontakta">
                <button>Dodaj kontakt</button>
          </a>
            @endif
          @endauth
        </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html>