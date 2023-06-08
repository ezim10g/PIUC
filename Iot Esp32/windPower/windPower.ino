 

#include <Arduino.h>
#include <WiFi.h>
#include <WiFiMulti.h>
#include <HTTPClient.h>

   //criar os objetos para conexão
   WiFiMulti wifiMulti;
   HTTPClient http;
   
  ////// VARIAVEIS GLOBAIS //////////////////////////////
 
  volatile int rpmCount = 0; // Variável para contar as marcações
  unsigned long lastTime = 0; // Momento da última marcação  
  const int debounceTime = 20; // debounce time in milliseconds
  unsigned long lastInterruptTime = 0;

  int vento = 0;
  float tensao = 0;
  int rpm = 0; // Velocidade em RPM
  int yaw; // direção yaw 0 - 360 º
  int pitch; //angulo de ataque  0-90º

   

    
void setup() {

   
    
    ledcAttachPin(4, 0);//Atribuimos o pino 4 ao canal 0 pwm.
    ledcSetup(0, 3000, 8);//Atribuimos ao canal 0 a frequencia de 1000Hz com resolucao de 8bits.
    
    pinMode(2, OUTPUT);//Definimos o pino 2 como saída de status led azul.
    pinMode(34, INPUT);//entrada do potenciometro de velocidade do motor  
    pinMode(35, INPUT);//leitura da tensão
    pinMode(32, INPUT); //leitura do yaw    
    pinMode(33, INPUT); //leitura do pitch    
    
    Serial.begin(115200);
    Serial.println();

    for(int t = 4; t > 0; t--) {
        Serial.printf("[SETUP] Aguarde %d...\n", t);
        Serial.flush();
        delay(1000);
    }

    wifiMulti.addAP("Waifai", "11223344");


    //conectando
     if((wifiMulti.run() == WL_CONNECTED)) {               
        Serial.print("[HTTP]conectado...\n"); 
   
    }
  
}

void loop() {
 
          controleDoMotor(); 
                      
          pegarTensao();
         
          pegarYaw();            
          
          pegarPitch();
                   
          lerRPM();


          //debug
          /*
          Serial.print(vento);
          Serial.print(", ");
          Serial.print(tensao,2);
          Serial.print(", ");
          Serial.print(yaw);    
          Serial.print(", ");
          Serial.print(pitch);    
          Serial.print(", ");  
          Serial.println(rpm); 
          */

        enviarDados();
        
    delay(40);
          
    
} //FIM DO LOOP()



////////////////////////////////////////////////////////////////////////////////////////////////
void enviarDados(){

   
        digitalWrite(2, LOW);
        //PREPARA O METODO GET NA URL COM OS PARAMETROS        
        http.begin("https://windpower.eziore.com.br/PIUC-master/BACK-END/IOT/gravar.php?gravar=&vento="
          +String(vento)+
          "&tensao="+String(tensao)+
          "&rpm="+String(rpm)+
          "&yaw="+String(yaw)+
          "&pitch="+String(pitch)); 

         //Melhoria
         http.setReuse(true); // Define a conexão como persistente
         //Isso faz com que os envios seja mais rapidos, uma vez que a conexão se mantem entre os requests
         
        //ENVIA O REQUEST
        http.GET();
        
       // http.end(); //comentando essa linha para manter a conexção
        digitalWrite(2, HIGH);
   

  
     
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////

void controleDoMotor(){ //Lê a entrada do potenciometro pin 34 e gera um sinal pwm no pin 2
  for (int i = 0; i < 20; i++) {
    vento += analogRead(34); //´pegar 20 amostras
  }
  vento = vento / 20; //considera a media das 20 amostras

  vento = map(vento,0,4095,0,100); //(valor a ser mapeado, min, max, para min, para max)  
  ledcWrite(0, vento); //envia um pwm entre 0 e 100, o max seria 255
}

//////////////////////////////////////////////////////////////////////////////////////////////////////

//Faz a leitura no pino 35 da tensao gerada pelo motor
void pegarTensao(){
      
    const int qtdAmostra = 100;// numero de amostras que queremos pegar para fazer a media de suavização
    static float amostras[qtdAmostra]; //faz a leitura de n amostras para calcular a media
    
    int sinalGerado = 0;
    for(int i = 0 ; i < qtdAmostra; i++){
      sinalGerado = analogRead(35);
      amostras[i] = (sinalGerado * 12) / 4095.0; // Converte o valor da entrada analógica em uma tensão   
    }

    //calcula a média
    float soma = 0;
    for(int i = 0 ; i < qtdAmostra ; i++){
      soma += amostras[i];
    }
    tensao = soma / qtdAmostra;
}    
//////////////////////////////////////////////////////////////////////

void lerRPM(){  
   attachInterrupt(digitalPinToInterrupt(15), rpmInterrupt, RISING ); //liga o interrupt 
   delay(500); //aguarda 250milis para colher as leituras das laminas
      // Calcula a velocidade em RPM
      rpm = rpmCount * 120 / 3; //seria 60segundos 1 lamina por segundo = 60rpm    
      // Zera o contador de marcações
      rpmCount = 0;    
  detachInterrupt(digitalPinToInterrupt(15)); //desativa o interrupt para enviar     
}

/////////////////////////////////////////////////////////////////////////

// Função de interrupção chamada quando o sensor detecta uma marcação
void rpmInterrupt() {
 unsigned long interruptTime = millis();
  if (interruptTime - lastInterruptTime > debounceTime) {      
      rpmCount++; 
      lastInterruptTime = interruptTime;        
  }
  
}

/////////////////////////////////////////////////////////
void pegarYaw(){
  delay(10);
  for (int i = 0 ; i < 20 ; i++){
    yaw += analogRead(32);  
  }
  yaw /= 20;
  
  yaw = map(yaw,0,4095,0,360);  
}

     
////////////////////////////////////////////////////////     
void pegarPitch(){
      delay(10);
      for (int i = 0 ; i < 20 ; i++){
        pitch += analogRead(33); 
      }
      pitch /= 20;      
      
      pitch = map(pitch,0,4095,0,90); 
}