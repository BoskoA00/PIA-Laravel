<!doctype html>
<html lang="en">
  <head>
    <title>{{$kurs->ImeKursa}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\kurs-stranica.css">
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
      </div> 
    </div>
    <div class="main">
        <div class="main-levi">
          @auth
          <div>
          <a href="/promenas"><button>Promeni sifru</button></a>
          </div>
          @endauth
        </div>
        <div class="main-srednji">
            <div class="Kurs">
                <div class="Kurs1">
                    <h1>{{$kurs->ImeKursa}}</h1>
                </div>
                <div class="Kurs2">
                    <div class="ImeProfesora">
                    <h3>Profesor:{{$kurs->ImeProfesora}}</h3>
                    </div>
                    <div class="OpisKursa">
                    <h4>Opis kursa:</h4>
                    <p>{{$kurs->OpisKursa}}</p>
                    </div>
                    <div class="PrilozeniMaterijal">
                        @if($kurs->PrilozeniMaterijal!=null)
                        <a href="/kurs/{{$kurs->id}}/materijal">{{$kurs->PrilozeniMaterijal}}</a>
                        @else
                            <p>Nema prilozenog materijala</p>
                        @endif
                    </div>
                    <div class="Dugmad">
                     @auth
                      @if (auth()->user()->id == $kurs->Id_Profesora || auth()->user()->TipP=='Administrator')
                        <form action="/kurs/{{$kurs['id']}}/izbrisi" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="Izbrisi">Izbrisi</button>
                          </form>
                          <form action="/kurs/{{$kurs['id']}}/edit">
                            <button class="Izmeni">Izmeni</button>
                          </form>
                        @endif
                        @endauth
                        @auth
                          @if(count($Pitanja)>0)
                            @if(auth()->user())
                          <form action="/kurs/{{$kurs['id']}}/polaganje">
                            <button class="Pokusaj">Polaganje</button>
                          </form>
                            @endif
                          @else
                          @if((auth()->user()->id==$kurs->Id_Profesora) || auth()->user()->TipP=='Administrator')
                          <form action="/kurs/{{$kurs['id']}}/dodajP">
                            <button class="Pokusaj">Unos pitanja</button>
                          </form>
                          @endif
                          @endif
                          @endauth
                        </div>
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