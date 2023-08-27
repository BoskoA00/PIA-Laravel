<!doctype html>
<html lang="en">
  <head>
    <title>{{$kurs->ImeKursa}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\dodavanje-pitanja-stranica.css">
    <link rel="icon" href="/images/learning.png" type="image/png">
 
    <script src="\js\polaganje-pitanja.js"></script>    
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
       </div>
        <div class="main-srednji">
            <form method="POST" action="/kurs/{{$kurs->id}}/rezultati"  enctype="multipart/form-data">
                @csrf
               @method('POST')
                <div class="Pitanja">
                   @foreach($pitanja as $p)
                    <div class="Pitanje">
                        <div class="TxtPitanja">
                          <div>
                          <label for="txtPitanja">{{$p->Pitanje}}</label>
                        </div>
                       <div>
                        <button class="pomoc" type="button" onclick="Pola_Pola(this)">Pomoc</button>
                       </div>
                        </div>
                    <div class="Odgovori">
                            <label for="Odg1">{{$p->Odgovor1}}</label>
                            <input type="radio" id="Odg1" name="Odgovor[{{$p->id}}]" value="1" />   
                            <label for="Odg2">{{$p->Odgovor2}}</label>
                            <input type="radio" id="Odg2" name="Odgovor[{{$p->id}}]" value="2"/>   
                            <label for="Odg3">{{$p->Odgovor3}}</label>
                            <input type="radio" id="Odg3" name="Odgovor[{{$p->id}}]" value="3"/>   
                            <label for="Odg4">{{$p->Odgovor4}}</label>
                            <input type="radio" id="Odg4" name="Odgovor[{{$p->id}}]" value="4"/>   
                    </div>
                    <div>
                        <input type="hidden" id="idPitanja" name="idPitanja[]" value="{{$p->id}}" />
                        <input type="hidden" id="TacanIndex" name="TacanIndex[]" value="{{$p->TacanOdgovor}}" />
                        <input type="hidden" id="Pomoc" name="Pomoc[{{$p->id}}]" value="0" />
                    </div>
                </div>
                @endforeach
             </div>
             <button type="submit" id="UnesiPitanjaBtn" class="UnesiP">Potvrdi polaganje</button>
            </form>
        </div>
        <div class="main-desni">
        </div>
    </div>
    <div class="futer">
    </div>
</body>
</html>