#include <WiFi.h>
#include <WebServer.h>
#define LED 2

const char* ssid = "TFG_RICO";
const char* pass = "TFG_RICO_1234";


WebServer server(80);
IPAddress ip(192,168,1,41);     
IPAddress gateway(192,168,1,1);   
IPAddress subnet(255,255,255,0);

void controlLuces(int led){
  server.send(200, "text/plain", "Hola mundo!");
   if (digitalRead(led) == HIGH){
    digitalWrite(led , LOW);
   }else{
    digitalWrite(led , HIGH);
   }
}

// 
 
// Funcion que se ejecutara en URI desconocida
void handleNotFound() 
{
   server.send(404, "text/plain", "Not found");
}

void setup() {
Serial.begin(115200);
delay(10);
WiFi.mode(WIFI_STA);
WiFi.config(ip, gateway, subnet);
WiFi.begin(ssid,pass);
Serial.print("Conectando a:\t");
  Serial.println(ssid); 

  // Esperar a que nos conectemos
  while (WiFi.status() != WL_CONNECTED) 
  {
    delay(200);
  Serial.print('.');
  }

  // Mostrar mensaje de exito y dirección IP asignada
  Serial.println();
  Serial.print("Conectado a:\t");
  Serial.println(WiFi.SSID()); 
  Serial.print("IP address:\t");
  Serial.println(WiFi.localIP());

 // Ruteo para las habitaciones interiores 
  server.on("/h1", [](){ controlLuces(15); });
  server.on("/h2", [](){ controlLuces(4); });
  server.on("/h3", [](){ controlLuces(16); });
  server.on("/h4", [](){ controlLuces(17); });

  // Ruteo para las zonas exteriores
  server.on("/z1", [](){ controlLuces(5); });
  server.on("/z2", [](){ controlLuces(19); });
  server.on("/z3", [](){ controlLuces(21); });
  server.on("/z4", [](){ controlLuces(22); });
 

   // Ruteo para URI desconocida
   server.onNotFound(handleNotFound);
 
   // Iniciar servidor
   server.begin();
   Serial.println("HTTP server started");

   pinMode(LED,OUTPUT);
   pinMode(15,OUTPUT);
   pinMode(4,OUTPUT);
   pinMode(16,OUTPUT);
   pinMode(17,OUTPUT);
   pinMode(5,OUTPUT);
   pinMode(19,OUTPUT);
   pinMode(21,OUTPUT);
   pinMode(22,OUTPUT);
}
  
  // put your setup code here, to run once:}

void loop() {

  server.handleClient();
  // put your main code here, to run repeatedly:

}
