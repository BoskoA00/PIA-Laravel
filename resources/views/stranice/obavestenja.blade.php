<!doctype html>
<html lang="en">
  <head>
    <title>Profili</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\obavestenja-stranica.css">
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
              <i><li style="background-color: #7c5db9"><a style="color:white" href="\obavestenja">Profili</a></li></i> 
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
            <h1 class="n1">Profili</h1>
            <div class="Profili">
            <table>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Uloga</th>
                    <th>Opcije</th>
                </tr>
            @foreach($obavestenja as $o) 
                @if($o->TipP!="Administrator")
            <tr>
                    <td>{{$o->Ime}}</td>
                    <td>{{$o->Prezime}}</td>
                    <td>{{$o->BrojT}}</td>
                    <td>{{$o->Eadresa}}</td>
                    <td>{{$o->TipP}}</td>
                    <td>
                      @if($o->Odobren=='Ne')
                      <a href="/obavestenja/{{$o->id}}/da"><button class="Dugmad Da">Da</button></a>
                      <a href="/obavestenja/{{$o->id}}/ne"><button class="Dugmad Ne">Ne</button></a>
                      @else
                      <a href="/obavestenja/{{$o->id}}/izbrisi"><button class="Dugmad Izbrisi">Izbrisi</button>
                      @endif
                    </td>
            </tr>
              @endif
            </a>
            @endforeach
            </table>
                 </div>
        </div>
        <div class="main-desni">
         
        </div>
    </div>
    <div class="futer">
    </div>
  </body>
</html>