<!doctype html>
<html lang="en">
  <head>
    <title>Kursevi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\kursevi-stranica.css">
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
            <i><li style="background-color:#7c5db9"><a style="color:white" href="\kursevi">Svi kursevi</a></li></i> 
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
      </div> 
    </div>
    <div class="main">
        <div class="main-levi">
          @auth
          @if(auth()->user()->TipP=='Administrator' || auth()->user()->TipP=='Predavac')
          <div>
            <a href="/dodavanjekursa"><button>Dodaj</button></a>
          </div>
          @endif
          <div>
          <a href="/promenas"><button>Promeni sifru</button></a>
          </div>
          @endauth
        </div>
        <div class="main-srednji">
          @unless(count($kursevi)==0)
          <h1 class="h1">Svi ponudjeni kursevi:</h1>
          <div class="SviKursevi">
          @foreach ($kursevi as $item)
                  <div class="Kurs">
                    <div class="Kurs1">
                      <div class="ImeKursa">
                      <h1><a  href="/kursevi/{{$item['id']}}">{{$item->ImeKursa}}</a></h1>
                    </div>
                   </div>
                    <div class="Kurs2">
                      <div class="ImeProfesora">
                      <h2>{{$item->ImeProfesora}}</h2>
                    </div>
                    <div class="OpisKursa">
                      <p>{{$item->OpisKursa}}</p>
                    </div>
                    <div class="PrilozeniMaterijal">
                      <p>{{$item->PrilozeniMaterijal}}</p>
                    </div>
                    </div>
                    </div>
                    @endforeach
                  </div>
              @else
              <div class="nemaK">
                  <h1 class="h1">Trenutno nema kurseva</h1>
              </div>
              @endif
        </div>
        <div class="main-desni">
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html>