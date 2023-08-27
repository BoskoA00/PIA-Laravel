<!doctype html>
<html lang="en">
  <head>
    <title>Registracija korisnika</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="\css\registracija-stranica.css">
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
    <div class="main">
        <div class="main-levi">
        </div>
        <div class="main-srednji">
            <h1>Unesite podatke:</h1>
            <div>
            <div class="FormaRegistracije">
                <form action="/stvaranje" method="POST" enctype="multipart/form-data">
                @csrf
                    @method('POST')
                <table>
                <tr>
                    
                <td class="Tekst"><label for="ime"><h3>Ime:</h3></label></td>
                <td class="Input">
                <div>
                    <input class="ImeIn" id="ime" type="text" name="Ime" value="{{old('Ime')}}">
                </div>
                    @error('Ime')
                <div>
                    <p>Neispravno ime</p>
                <div>
                 @enderror
                </td>
                </tr>
                <tr>
                    <td class="Tekst"><label for="prezime"><h3>Prezime:</h3></label></td>
                    <td class="Input">
                        <div>
                        <input class="PrezimeIn" type="text" id="prezime" name="Prezime" value="{{old('Prezime')}}">
                        </div>
                @error('Prezime')
            <div>
                <p>Neispravno prezime</p>
            </div>                
                @enderror
                </td>
                </tr>
                <tr>
                        <td class="Tekst"><label for="lozinka"><h3>Lozinka:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input class="LoIn" type="password" id="lozinka" name="password">
                        </div>
                         @error('password')
                            <div>
                             <p>Neodgovarajuca lozinka</p>
                            </div>
                         @enderror
                    </td>
                </tr>
                <tr>
                    <td class="Tekst"><label for="lozinka2"><h3>Potvrda lozinke:</h3></label></td>
                    <td class="Input">
                        <div>
                        <input class="LoIn" type="password" placeholder="Unesite ponovo lozinku" id="lozinka2" name="password_confirmation" >
                        <div>
                    @error('password_confirmation')
                        <div>    
                    <p>Neodgovarajuca lozinka</p>
                        </div>
                    @enderror
                </td>
                </tr>
                <tr>
                    <td class="Tekst"><label class="pol"><h3>Pol:</h3></label></td>
                    <td class="Input"> 
                    <div class="Polovi">
                    <div class="PolM">
                        <label for="M">Musko</label>
                        <input type="radio" id="M" name="Pol" value="M">
                    </div>
                    <div class="PolZ">
                        <label for="Z">Zensko</label>
                        <input type="radio" id="Z" name="Pol" value="Z">
                    </div>
                    </div>
                    @error('Pol')
                    <div>
                    <p>Niste odabrali pol</p>
                    </div>
                    @enderror
                </td>
                </tr>
                    <tr>
                        <td class="Tekst"><label for="drzava"><h3>Drzava rodjenja:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input type="text" id="drzava" name="DrzavaR" value="{{old('DrzavaR')}}">
                        <div>
                            @error('Drzava')
                        <div>
                            <p>Obavezno unesite drzavu</p>
                        </div>
                        @enderror
                    </td>
                </tr>
                    <tr>
                        <td class="Tekst"><label for="datum"><h3>Datum rodjenja:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input class="DatumR" max="2004-12-31" type="date" id="datum" name="DatumR" value="{{old('DatumR')}}">
                        
                        </div>
                            @error('Datum')
                            <div>
                            <p>Neodgovarajuci datum</p>
                            </div>
                        @enderror
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label for="jmbg"><h3>JMBG</h3></label></td>
                        <td class="Input">
                        <div>
                            <input  type="text" placeholder="Jedinstveni maticni broj" id="jmbg" name="JMBG" value="{{old('JMBG')}}">
                        </div>
                            @error('JMBG')
                        <div>
                            <p>Neisrpavno uneti JMBG</p>
                        </div>
                            @enderror
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label for="brojt"><h3>Broj telefona:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input  type="text"  id="brojt" name="BrojT" value="{{old('BrojT')}}">
                        </div>
                            @error('BrojT')
                        <div>
                            <p>Unesite ispravan broj</p>
                        </div>
                            @enderror
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label for="email"><h3>Email adresa:</h3></label></td>
                        <td class="Input">
                        <div>
                            <input  type="text"  id="email" name="Eadresa" value="{{old('Eadresa')}}">
                        <div>
                            @error('Eadresa')
                        <div>
                            <p>Unesite odgovarajucu e-adresu</p>
                        <div>
                        @enderror
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label class="SlikaLabel" for="slika"><h3>Slika:</h3></label></td>
                        <td class="Input">
                            <div>
                            <input class="SlikaIn" type="file" id="slika" name="Slika"></td>
                            </div>
                            @error('Slika')
                        <div>
                            <p>Neispravan podatak</p>
                        </div>
                            @enderror
                    </td>
                    </tr>
                    <tr>
                        <td class="Tekst"><label class="TipProfila"><h3>Tip profila:</h3></label>
                        <td class="Input">
                        <div class="Uloge">
                            <div class="UlogaPol">
                                <label for="polaznik">Polaznik</label>
                                <input  type="radio" id="polaznik" name="TipP" value="Polaznik" >
                            </div>
                            <div class="UlogaPr">
                                <label for="predavac">Predavac</label>
                                <input  type="radio" id="predavac" name="TipP" value="Predavac">
                            </div>
                        </div>
                        @error('TipP')
                        <div>
                            <p>Odaberite tip profila</p>
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