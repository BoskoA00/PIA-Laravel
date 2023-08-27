function DodajPitanje(){
    var glavniDiv=document.getElementsByClassName('Pitanja')[0];
    var noviDiv=document.createElement('div');
    noviDiv.className='Pitanje';
    noviDiv.innerHTML=`
    <div class="TxtPitanja">
    <label for="txtPitanja">Tekst pitanja:</label>
    <input type="text" name="txtPitanja[]" id="txtPitanja"/>
</div>
<div class="Odgovori">
<input type="text" name="Odgovor[]" id="Odgovor1" placeholder="Odgovor 1" required/>
<input type="text" name="Odgovor[]" id="Odgovor2" placeholder="Odgovor 2" required/>
<input type="text" name="Odgovor[]" id="Odgovor3" placeholder="Odgovor 3" required/>
<input type="text" name="Odgovor[]" id="Odgovor4" placeholder="Odgovor 4" required/>
</div>
<div class="IndexOdg">
<div>
<label for="Index">Broj tacnog odgovora:</label>
<input type="number" name="Index[]" id="Index"/>
</div>
<div class="Tezina">
<input type="range" min="1" max="3" name="Tezina[]" />
</div>
</div>`;
 glavniDiv.appendChild(noviDiv);
}
  
  
  
  