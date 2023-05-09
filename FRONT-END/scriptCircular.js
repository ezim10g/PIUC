class CircularProgressBar{

  constructor(valorMax, medida,idProgressBar, idValueProgress){
    this.medida = medida;
    this.graus = 360 / valorMax;
    this.idProgressBar = document.getElementById(idProgressBar);
    this.idValueProgress = document.getElementById(idValueProgress);
    this.valorAntigo = this.idValueProgress.textContent.replace(/(º)|( Rpm)|(V)|(Km)/,'',);
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

  getValue(valorAtual){
     //pega o valor atual do card no html removendo da siglas colhendo somente os numeros
    if(this.valorAntigo === '-'){this.valorAntigo = 0}
    //console.log(this.valorAntigo);
    
    let count = Math.abs(valorAtual - this.valorAntigo);
    console.log("count " + count + " valor Atual " + valorAtual);

    if(count != valorAtual){
    
      while (count < valorAtual) {
          this.setProgresso(++count);
          console.log(count + '++');
      }
      
      while(count > valorAtual){
        this.setProgresso(--count);
        console.log(count + '--');
      }
        
      count = valorAtual;
    } else this.setProgresso(count)   

  } 

}

let circularProgressBarVento = new CircularProgressBar(100, " Km","circular-progress-vento","value-container-vento");
let circularProgressBarTensao = new CircularProgressBar(12, " V","circular-progress-tensao","value-container-tensao");
let circularProgressBarYAW = new CircularProgressBar(360, "º","circular-progress-yaw","value-container-yaw");
let circularProgressBarRPM = new CircularProgressBar(1500, " Rpm","circular-progress-rpm","value-container-rpm");
let circularProgressBarPitch = new CircularProgressBar(90, "º","circular-progress-pitch","value-container-pitch");


// Esta função envia um metodo get usando jquery  para a pagina php.ler, os dados são recebidos em um objeto "array" json.
//PS: Por questões de segurança o metodo get só responde se a pagina estiver no mesmo domínio

function lerRedis() {
  $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) {  
    circularProgressBarVento.getValue(data.vento);
  //  circularProgressBarTensao.getValue(data.tensao);
   // circularProgressBarRPM.getValue(data.rpm);    
   // circularProgressBarYAW.getValue(data.yaw);    
   // circularProgressBarPitch.getValue(data.pitch);

  });
  //EM CONSTRUÇÃO .............. 
 
}

setInterval(lerRedis, 3000);


