
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

      
    }else{
          
      console.log("-------- inicio --------- novos");
      if(recebido == this.valorAntigo && this.flag == true){
       
      }

        let delay = 4;

        if(recebido > this.valorAntigo && this.flag == true){
          this.flag = false;
          
          const intervalMais = setInterval(() => {

            if (recebido > this.valorAntigo) {     
              if(this == circularProgressBarRPM){                
                if(( recebido - this.valorAntigo) > 5){
                    this.setProgresso(this.valorAntigo += 5);                    
                }else{                 
                  this.setProgresso(this.valorAntigo +=  recebido - this.valorAntigo);                             
                }
                                             
              }else
              this.setProgresso(++this.valorAntigo);               
              console.log(this.valorAntigo + '++');
                         
            }else{
              clearInterval(intervalMais);  
              console.log("else mais");
              this.flag = true;                    
            }
          
          }, delay); 

        
        }else if(recebido < this.valorAntigo && this.flag == true){
          this.flag = false;
         
          const intervalMenos = setInterval(() => {

            if (recebido < this.valorAntigo) { 
              if(this == circularProgressBarRPM){
              
                if((this.valorAntigo - recebido) > 5){
                    this.setProgresso(this.valorAntigo -= 5);
                }else{                  
                  this.setProgresso(this.valorAntigo -= this.valorAntigo - recebido);                               
                }
              }else                       
              this.setProgresso(--this.valorAntigo);
              console.log(this.valorAntigo + '--'); 
                         
            }else{
              clearInterval(intervalMenos);
              console.log("else menos");  
              this.flag = true;                     
            }
           
          }, delay); 
        }
            
    }
    
           
  } 
}

let circularProgressBarVento = new CircularProgressBar(100, " Km","circular-progress-vento","value-container-vento");
let circularProgressBarTensao = new CircularProgressBar(6, " V","circular-progress-tensao","value-container-tensao");
let circularProgressBarYAW = new CircularProgressBar(360, "º","circular-progress-yaw","value-container-yaw");
let circularProgressBarRPM = new CircularProgressBar(1500, " Rpm","circular-progress-rpm","value-container-rpm");
let circularProgressBarPitch = new CircularProgressBar(90, "º","circular-progress-pitch","value-container-pitch");




function lerRedis() {

 // console.log("Request ");
  
 
  $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) {  
    circularProgressBarVento.getValue(data.vento);    
    circularProgressBarTensao.setProgresso(data.tensao);
    circularProgressBarRPM.getValue(data.rpm);    
    circularProgressBarYAW.getValue(data.yaw);    
    circularProgressBarPitch.getValue(data.pitch);
   // console.log("Response ok");
  });


}

const atualizarDados = setInterval(lerRedis, 1000);




