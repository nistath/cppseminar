#include <SoftwareSerial.h>
SoftwareSerial ringSerial(10, 11); // RX (receive), TX (send)

const String clearToken = "t+";

#define Buffer_Size 20
char inData[Buffer_Size];
int index;

inline void readString(){
  index = 0;
  
  while(ringSerial.available()){
    if(index < Buffer_Size){
      char newRead = ringSerial.read(); // Read a character

      if(newRead == '+'){
        break;
      }

      inData[index] = newRead;

      index++;
      inData[index] = '\0';
    }
    else{
      break;
    }
  }

  return;
}

void setup() {
  // put your setup code here, to run once:

  Serial.begin(9600);
  //while(!Serial){} // Wait for Serial to USB to open.

  Serial.println("Connected to computer!");

  ringSerial.begin(4800);atom://config
}

void loop() {
  // put your main code here, to run repeatedly:

  if(Serial.available()){
    int pc = Serial.parseInt();

    ringSerial.print(pc);
  }
  else if(ringSerial.available()){
    char res = ringSerial.read();
    
    Serial.print("Rc: ");
    Serial.println(res);

    delay(1000);

    if(res<=47) res=58;
    ringSerial.print(--res);
  }
}
