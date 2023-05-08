class CircularProgressBar{

  constructor(valorMax, medida,idProgressBar, idValueProgress){
    this.medida = medida;
    this.graus = 360 / valorMax;
    this.idProgressBar = document.getElementById(idProgressBar);
    this.idValueProgress = document.getElementById(idValueProgress);
  }

  setProgresso(progress){
    this.idValueProgress.textContent = progress + this.medida;
    this.idProgressBar.style.background = `conic-gradient(
      #4d5bf9 ${progress * this.graus}deg,
      #cadcff ${progress * this.graus}deg
  )`;
  }

}





let circularProgressBarTensao = new CircularProgressBar(12, " V","circular-progress-tensao","value-container-tensao");
let circularProgressBarVento = new CircularProgressBar(100, " km","circular-progress-vento","value-container-vento");
let circularProgressBarYAW = new CircularProgressBar(360, "º","circular-progress-yaw","value-container-yaw");
let circularProgressBarRPM = new CircularProgressBar(800, " rpm","circular-progress-rpm","value-container-rpm");
let circularProgressBarPitch = new CircularProgressBar(90, "º","circular-progress-pitch","value-container-pitch");




/* Esta função envia um metodo get para a pagina php.ler, os dados são retornado via json
esses dados são inseridos nos elementos html através do id usando jquery
*/
function atualizarLabel() {
  $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) {  
    circularProgressBarTensao.setProgresso(data.tensao);
    circularProgressBarVento.setProgresso(data.vento);
    circularProgressBarYAW.setProgresso(data.yaw);
    circularProgressBarRPM.setProgresso(data.rpm);
    circularProgressBarPitch.setProgresso(data.pitch);

  });
}

setInterval(atualizarLabel, 200);