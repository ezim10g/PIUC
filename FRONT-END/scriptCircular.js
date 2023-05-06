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


let circularProgressBarTensao = new CircularProgressBar(12, "V","circular-progress-tensao","value-container-tensao");
let circularProgressBarVento = new CircularProgressBar(12, "km","circular-progress-vento","value-container-vento");
let circularProgressBarYAW = new CircularProgressBar(12, "º","circular-progress-yaw","value-container-yaw");
let circularProgressBarRPM = new CircularProgressBar(12, "rpm","circular-progress-rpm","value-container-rpm");
let circularProgressBarPitch = new CircularProgressBar(12, "º","circular-progress-pitch","value-container-pitch");