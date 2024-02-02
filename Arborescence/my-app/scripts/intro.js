function Init(){
    setTimeout(
        function(){
            document.getElementById("ex1").style.color = "Blue";
    },5000)

    horologe();

}

function horologe(){
    var temps = new Date();
    var heure = temps.getHours();
    var minute = temps.getMinutes();
    var seconde = temps.getSeconds();

    heure = (heure < 10 ? "0" : "") + heure;
    minute = (minute < 10 ? "0" : "") + minute;
    seconde = (seconde < 10 ? "0" : "") + seconde;

    document.getElementById("horlo").innerText =  heure + ":" + minute + ":" + seconde;
    setTimeout(horologe,1000);

}

function Numero2(){
    var choix = prompt("Pire choix a ton repechage de fantasy","Tee higgins");
    document.getElementById("choix1").innerText = choix;
}

function Shaq(){
    document.getElementById("shaquille").src = "img/open.jpg";
}

function ShaqClose(){
    document.getElementById("shaquille").src = "img/close.jpg";
}
function Compteur(){
    var nb = document.getElementById("textbox").value;
    alert("La boite contient "+ nb.length + " caracteres");
    
    
}
function Inverter(){
    document.getElementById("inversion").innerText = Invertisseur(document.getElementById("textbox5").value);
}

function Invertisseur(str){
    var lesplit = str.split("");

    var reverse = lesplit.reverse();

    var lestr = reverse.join("");

    return lestr;
}

function Mult(){
    var tb1 = document.getElementById("nb1").value;
    var tb2 = document.getElementById("nb2").value;

    console.log(tb1);
    console.log(tb2);

    if( !isNaN(tb1)&&!isNaN(tb2) && tb1.length > 0 && tb2.length > 0 ){
        document.getElementById("resultat").innerText = tb1 * tb2; 
    }
    else
    {
        document.getElementById("resultat").innerText = "Pas un nombre";
    }
}

function change(){
    var choix = document.getElementById("auto").value;

    alert(choix);
}
function checkCheckbox(){
    
}

