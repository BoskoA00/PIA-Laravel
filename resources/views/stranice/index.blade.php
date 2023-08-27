<!doctype html>
<html lang="en">
  <head>
    <title>PsihoGuru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\pocetna-stranica.css">
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
            <li><i><a style="color:white" href="\vesti">Sve novosti</a></i></li> 
            <li><i><a href="\kursevi">Svi kursevi</a></i></li> 
            <li><i><a href="\kontakti">Kontakti</a></i></li> 
            @auth
            @if(auth()->user()->TipP=='Administrator')
            <li><i><a href="\obavestenja">Profili</a></i></li> 
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
            @if(auth()->user()->TipP=='Predavac' || auth()->user()->TipP=='Administrator')
          <a href="/vesti/create"><button><b>Nova vest</b></button></a>
            @endif
          @endauth
          @auth
          <div>
            <a href="\promenas"><button>Promeni sifru</button></a>
          </div>
          @endauth
        </div>
        <div class="main-srednji">
          <div class="n1">
            <h1 >Novosti</h1>
          </div>
            <div class="Novosti">
            @unless(count($Novosti)==0)
            @foreach($Novosti as $n)
            <div class="novosti">
              <h1 class="naslovnovosti"><a href="/vesti/{{$n['id']}}">{{$n['Naslov']}}</a></h1>
              <div class="opisnovosti">
                <h3>{{$n->Opis}}</h3>
              </div>
            </div>
            @endforeach
            @else
            <div class="novosti">
              <h1 class="naslovnovosti"><a href="#">Nema novosti</a></h1>
          </div>
          @endunless
        </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html>