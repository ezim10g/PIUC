class CircularProgressBar{

  constructor(valorMax, medida,idProgressBar, idValueProgress){
    this.medida = medida;
    this.graus = 360 / valorMax;
    this.idProgressBar = document.getElementById(idProgressBar);
    this.idValueProgress = document.getElementById(idValueProgress);
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

  getValue(){
     //pega o valor atual do card no html removendo da siglas colhendo somente os numeros
    return this.idValueProgress.textContent.replace(/(º)|( Rpm)|(V)|(Km)/,'',); 
  }

}

let circularProgressBarVento = new CircularProgressBar(100, " Km","circular-progress-vento","value-container-vento");
let circularProgressBarTensao = new CircularProgressBar(12, " V","circular-progress-tensao","value-container-tensao");
let circularProgressBarYAW = new CircularProgressBar(360, "º","circular-progress-yaw","value-container-yaw");
let circularProgressBarRPM = new CircularProgressBar(1500, " Rpm","circular-progress-rpm","value-container-rpm");
let circularProgressBarPitch = new CircularProgressBar(90, "º","circular-progress-pitch","value-container-pitch");


// Esta função envia um metodo get usando jquery  para a pagina php.ler, os dados são recebidos em um objeto "array" json.
//PS: Por questões de segurança o metodo get só responde se a pagina estiver no mesmo domínio
function atualizarLabel() {
  $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) {  
    circularProgressBarVento.setProgresso(data.vento);
    circularProgressBarTensao.setProgresso(data.tensao);    
    circularProgressBarYAW.setProgresso(data.yaw);
    circularProgressBarRPM.setProgresso(data.rpm);
    circularProgressBarPitch.setProgresso(data.pitch);

  });
  //EM CONSTRUÇÃO .............. 
  console.log(circularProgressBarRPM.getValue());
}

setInterval(atualizarLabel, 200);

