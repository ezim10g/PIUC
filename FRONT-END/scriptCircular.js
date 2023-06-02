
class CircularProgressBar{
  
  constructor(valorMax, medida,idProgressBar, idValueProgress, lineVento){
    this.medida = medida;
    this.graus = 360 / valorMax;
    this.grausDark = 100 / valorMax;
    this.idProgressBar = document.getElementById(idProgressBar);
    this.idValueProgress = document.getElementById(idValueProgress);
    this.lineVento = document.getElementById(lineVento);
    this.valorAntigo = "-";// this.idValueProgress.textContent.replace(/(º)|( Rpm)|(V)|(Km)/,'',);
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
  setProgressoDark(progress){
    this.idValueProgress.textContent = progress + this.medida;    //define valor h2 100km   
    this.idProgressBar.style.setProperty('--num', this.grausDark * progress);  //define ao ponto            
    this.lineVento.style.setProperty('--num', this.grausDark * progress); // define a linha 
 }

  getValue(recebido){
  

    if(this.valorAntigo === '-'){
      this.valorAntigo = 0;
      this.setProgresso(0);

      
    }else{
          
      //console.log("-------- inicio --------- novos");
      if(recebido == this.valorAntigo && this.flag == true){
       
      }
        let delay = 4;

        if(recebido > this.valorAntigo && this.flag == true){
          this.flag = false;
          
          const intervalMais = setInterval(() => {

            if (recebido > this.valorAntigo) {     
              if(this == circularProgressBarTensao){                
                if(( recebido - this.valorAntigo) > 0.02){
                    this.setProgresso((this.valorAntigo += 0.02).toFixed(2));                    
                }else{                 
                  this.setProgresso(this.valorAntigo +=  recebido - this.valorAntigo);                             
                }                                            
              }else          
              this.setProgresso(++this.valorAntigo);               
           //   console.log(this.valorAntigo + '++');
                         
            }else{
              clearInterval(intervalMais);  
             // console.log("else mais");
              this.flag = true;                    
            }
          
          }, delay); 

        
        }else if(recebido < this.valorAntigo && this.flag == true){
          this.flag = false;
         
          const intervalMenos = setInterval(() => {

            if (recebido < this.valorAntigo) { 
              if(this == circularProgressBarTensao){              
                if((this.valorAntigo - recebido) > 0.02){
                    this.setProgresso((this.valorAntigo -= 0.02).toFixed(2));
                }else{                  
                  this.setProgresso(this.valorAntigo -= this.valorAntigo - recebido);                               
                }
              }else                         
              this.setProgresso(--this.valorAntigo);
             // console.log(this.valorAntigo + '--'); 
                         
            }else{
              clearInterval(intervalMenos);
           //   console.log("else menos");  
              this.flag = true;                     
            }
           
          }, delay); 
        }
            
    }
    
           
  } 
  //////////// get value dark ///////////////////

  getValueDark(recebido){
  

    if(this.valorAntigo === '-'){
      this.valorAntigo = 0;
      this.setProgressoDark(0);

      
    }else{
          
      //console.log("-------- inicio --------- novos");
      if(recebido == this.valorAntigo && this.flag == true){
       
      }
        let delay = 4;

        if(recebido > this.valorAntigo && this.flag == true){
          this.flag = false;
          
          const intervalMais = setInterval(() => {

            if (recebido > this.valorAntigo) {     
              if(this == circularProgressBarTensaoDark){                
                if(( recebido - this.valorAntigo) > 0.02){
                    this.setProgressoDark((this.valorAntigo += 0.02).toFixed(2));                    
                }else{                 
                  this.setProgressoDark(this.valorAntigo +=  recebido - this.valorAntigo);                             
                }                                            
              }else          
              this.setProgressoDark(++this.valorAntigo);               
           //   console.log(this.valorAntigo + '++');
                         
            }else{
              clearInterval(intervalMais);  
             // console.log("else mais");
              this.flag = true;                    
            }
          
          }, delay); 

        
        }else if(recebido < this.valorAntigo && this.flag == true){
          this.flag = false;
         
          const intervalMenos = setInterval(() => {

            if (recebido < this.valorAntigo) { 
              if(this == circularProgressBarTensaoDark){              
                if((this.valorAntigo - recebido) > 0.02){
                    this.setProgressoDark((this.valorAntigo -= 0.02).toFixed(2));
                }else{                  
                  this.setProgressoDark(this.valorAntigo -= this.valorAntigo - recebido);                               
                }
              }else                         
              this.setProgressoDark(--this.valorAntigo);
             // console.log(this.valorAntigo + '--'); 
                         
            }else{
              clearInterval(intervalMenos);
           //   console.log("else menos");  
              this.flag = true;                     
            }
           
          }, delay); 
        }
            
    }
    
           
  } 

}

let circularProgressBarVento = new CircularProgressBar(100, " Km","circular-progress-vento","value-container-vento",'');
let circularProgressBarTensao = new CircularProgressBar(6, " V","circular-progress-tensao","value-container-tensao",'');
let circularProgressBarYAW = new CircularProgressBar(360, "º","circular-progress-yaw","value-container-yaw",'');
let circularProgressBarRPM = new CircularProgressBar(1500, " Rpm","circular-progress-rpm","value-container-rpm",'');
let circularProgressBarPitch = new CircularProgressBar(90, "º","circular-progress-pitch","value-container-pitch",'');


let circularProgressBarVentoDark = new CircularProgressBar(100, "","dot-vento","valor-vento", "line-vento");
let circularProgressBarTensaoDark = new CircularProgressBar(12, "","dot-tensao","valor-tensao", "line-tensao");
let circularProgressBarYAWDark = new CircularProgressBar(360, " º","dot-yaw","valor-yaw", "line-yaw");
let circularProgressBarRPMDark = new CircularProgressBar(1500, "","dot-rpm","valor-rpm", "line-rpm");
let circularProgressBarPitchDark = new CircularProgressBar(90, " º","dot-pitch","valor-pitch", "line-pitch");

//razão de 12 = 8.34  manda circularProgressBarVentoDark.setProgresso(8.34*12)


function lerRedis() {

 // console.log("Request ");
  
 if(tema == 'claro'){
    $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) {  
      circularProgressBarVento.getValue(data.vento);    
      circularProgressBarTensao.getValue(data.tensao);
      circularProgressBarRPM.getValue(data.rpm);    
      circularProgressBarYAW.getValue(data.yaw);    
      circularProgressBarPitch.getValue(data.pitch);
    });
 }else if(tema == 'escuro'){
    $.get( "../BACK-END/IOT/ler.php/?mostrar", function( data) {  
      circularProgressBarVentoDark.getValueDark(data.vento);
      circularProgressBarTensaoDark.getValueDark(data.tensao);
      circularProgressBarRPMDark.getValueDark(data.rpm);
      circularProgressBarYAWDark.getValueDark(data.yaw);      
      circularProgressBarPitchDark.getValueDark(data.pitch);
    });
    
 }


  // console.log("Response ok");

}

//const atualizarDados = setInterval(lerRedis, 1000);



