//variable de activación
export let iniciar = false;
var intervalo;
//variables para el tiempo
var h = 0;
var m = 0;
var s = 0;
var hAux, mAux, sAux;
export let tiempo_Transcurrido;


//validar si ya puede empezar a contar
export function tiempo_Cargado() {
    if (!iniciar){
        cronometrar();
        document.getElementById("hms").innerHTML="00:00:00";
        iniciar = true;
    }
}
//iniciar tiempo y escritura
export function cronometrar(){
    escribir();
    intervalo = setInterval(escribir,1000);
}
//
function escribir(){
    
    s++;
    if (s>59){m++;s=0;}
    if (m>59){h++;m=0;}
    if (h>24){h=0;}

    if (s<10){sAux="0"+s;}else{sAux=s;}
    if (m<10){mAux="0"+m;}else{mAux=m;}
    if (h<10){hAux="0"+h;}else{hAux=h;}
    //escritura del cronometro
    tiempo_Transcurrido = hAux + ":" + mAux + ":" + sAux;
    document.getElementById("hms").innerHTML = tiempo_Transcurrido; 
}


//----------------------------

export function parar(){
    clearInterval(intervalo);
}
export function reiniciar(){
    clearInterval(intervalo);
    document.getElementById("hms").innerHTML="00:00:00";
    h=0;m=0;s=0;
    iniciar = false;
}