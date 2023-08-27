function Pola_Pola(dugme){
    const pitanje=dugme.parentNode.parentNode.parentNode;
    const odgovoriKontejner = pitanje.querySelector('.Odgovori');
    const odgovori=odgovoriKontejner.querySelectorAll("input[type='radio']");
    var i=0;
    const pitanje1=dugme.parentNode.parentNode.parentNode;
    const TacanIndex=pitanje1.querySelector('#TacanIndex');
    while (i<2) {
        const sb=Math.round(Math.random()*3);
        if(odgovori[sb].value!=TacanIndex.value && odgovori[sb].disabled==false){
            odgovori[sb].disabled=true;
            i++;
        }
    }
    pitanje1.querySelector('#Pomoc').value=1;
    dugme.style.display='none';
}