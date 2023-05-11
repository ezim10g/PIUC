let intervaloMais;
let intervaloMenos;
     

class CircularProgressBar{

  constructor(valorMax, medida,idProgressBar, idValueProgress){
    this.medida = medida;
    this.graus = 360 / valorMax;
    this.idProgressBar = document.getElementById(idProgressBar);
    this.idValueProgress = document.getElementById(idValueProgress);
    this.valorAntigo = 0;
    
  }

  setProgresso(progress){
    this.idValueProgress.textContent = progress + this.medida;
 
    this.idProgressBar.style.backgroundImage = `conic-gradient(
      #DC143C ${progress * this.graus -270 }deg,
       #4936f5  ${progress * this.graus -50 }deg,
       #1fc1de ${progress * this.graus}deg,
       #cadcff ${progress * this.graus+50}deg            
  )`;
  
  }


 
}

let circularProgressBarVento = new CircularProgressBar(100, " Km","circular-progress-vento","value-container-vento");
let circularProgressBarTensao = new CircularProgressBar(12, " V","circular-progress-tensao","value-container-tensao");
let circularProgressBarYAW = new CircularProgressBar(360, "º","circular-progress-yaw","value-container-yaw");
let circularProgressBarRPM = new CircularProgressBar(1500, " Rpm","circular-progress-rpm","value-container-rpm");
let circularProgressBarPitch = new CircularProgressBar(90, "º","circular-progress-pitch","value-container-pitch");


var anterior = {"vento" : 0, "tensao" : 0, "rpm" : 0 , "yaw" : 0 , "pitch" : 0};

function lerRedis() {

    $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) { 
  
      circularProgressBarVento.setProgresso(data.vento); 
      circularProgressBarTensao.setProgresso(data.tensao);
      circularProgressBarRPM.setProgresso(data.rpm);   
      circularProgressBarYAW.setProgresso(data.yaw);     
      circularProgressBarPitch.setProgresso(data.pitch);
      
     // setTimeout(lerRedis,500);
      
      

      lerRedis();

    });
  
  

}


function gravarAleatorio(){
  let vento = (Math.floor(Math.random() *100));
  let tensao = (Math.floor(Math.random() *12));
  let rpm = (Math.floor(Math.random() *1500));   
  let yaw = (Math.floor(Math.random() *360)); 
  let pitch = (Math.floor(Math.random() *90)); 

  $.get( "../BACK-END/IOT/gravar.php/?gravar=&vento="+vento+"&tensao="+tensao+"&rpm="+rpm+"&yaw="+yaw+"&pitch"+pitch, function( data) { 
  
   
  });



}
