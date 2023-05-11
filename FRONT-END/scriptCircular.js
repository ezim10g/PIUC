class CircularProgressBar{

  constructor(valorMax, medida,idProgressBar, idValueProgress){
    this.medida = medida;
    this.graus = 360 / valorMax;
    this.idProgressBar = document.getElementById(idProgressBar);
    this.idValueProgress = document.getElementById(idValueProgress);
    this.valorAntigo = this.idValueProgress.textContent.replace(/(º)|( Rpm)|(V)|(Km)/,'',);
    this.flag = true;
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


  getValue(recebido){
    
    
    if(this.valorAntigo === '-'){
      this.valorAntigo = 0;
      this.setProgresso(0);
     
      if(this.valorMax == 90) {lerRedis();}
    }else{
      //console.log("era:"+ this.valorAntigo +"agora é recebido:"+ recebido)
      
     
      console.log("-------- inicio --------- novos");
      if(recebido == this.valorAntigo && this.flag == true){
        if(this.valorMax == 90) {lerRedis();}
      }

        let delay = 5;

        if(recebido > this.valorAntigo && this.flag == true){
          this.flag = false;

          const intervalMais = setInterval(() => {

            if (recebido > this.valorAntigo) {     
              this.setProgresso(++this.valorAntigo);
              console.log(this.valorAntigo + '++');
              
            }else{
              clearInterval(intervalMais);  
              console.log("else mais");
              this.flag = true;
              if(this.valorMax == 90) {lerRedis();}
      
            }
          
          }, delay); 

        
        }else if(recebido < this.valorAntigo && this.flag == true){
          this.flag = false;

          const intervalMenos = setInterval(() => {

            if (recebido < this.valorAntigo) {                         
              this.setProgresso(--this.valorAntigo);
              console.log(this.valorAntigo + '--');
              
            }else{
              clearInterval(intervalMenos);
              console.log("else menos");  
              this.flag = true;
              if(this.valorMax == 90) {lerRedis();}
             
            }
           
          }, delay); 
        }

        
        
    }
    
    
    
     
  } 
}

let circularProgressBarVento = new CircularProgressBar(100, " Km","circular-progress-vento","value-container-vento");
let circularProgressBarTensao = new CircularProgressBar(12, " V","circular-progress-tensao","value-container-tensao");
let circularProgressBarYAW = new CircularProgressBar(360, "º","circular-progress-yaw","value-container-yaw");
let circularProgressBarRPM = new CircularProgressBar(1500, " Rpm","circular-progress-rpm","value-container-rpm");
let circularProgressBarPitch = new CircularProgressBar(90, "º","circular-progress-pitch","value-container-pitch");




function lerRedis() {


  
  $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) {  
    circularProgressBarVento.getValue(data.vento);
    circularProgressBarTensao.getValue(data.tensao);
    circularProgressBarRPM.getValue(data.rpm);    
    circularProgressBarYAW.getValue(data.yaw);    
    circularProgressBarPitch.getValue(data.pitch);

  });


}






