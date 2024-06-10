#include <SPI.h>
#include <MFRC522.h>
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>

#define RST_PIN 9
#define SS_PIN 10

byte readCard[4];
String MasterTag = "11F1D447";  // REPLACE this Tag ID with your Tag ID!!!
String tagID = "";

MFRC522 mfrc522(SS_PIN, RST_PIN);
LiquidCrystal_I2C lcd(0x27,20,4);  // set the LCD address to 0x27 for a 16 chars and 2 line display

const int ldrPin = A2;
const int ledPin = 6;    // select the pin for the LED
int ldrValue = 0;
int acceso = 0;
const int pinoff = 2;
int valor = 0;
boolean i = false;
boolean getID() 
{
  // Getting ready for Reading PICCs
  if ( ! mfrc522.PICC_IsNewCardPresent()) { //If a new PICC placed to RFID reader continue
  return false;
  }
  if ( ! mfrc522.PICC_ReadCardSerial()) { //Since a PICC placed get Serial and continue
  return false;
  }
  tagID = "";
  for ( uint8_t i = 0; i < 4; i++) { // The MIFARE PICCs that we use have 4 byte UID
  //readCard[i] = mfrc522.uid.uidByte[i];
  tagID.concat(String(mfrc522.uid.uidByte[i], HEX)); // Adds the 4 bytes in a single String variable
  }
  tagID.toUpperCase();
  mfrc522.PICC_HaltA(); // Stop reading
  acceso = 1;
  return true;
}



void setup() {
  
  pinMode(pinoff, INPUT);
  pinMode(ledPin, OUTPUT);
  Serial.begin(9600);
  SPI.begin(); // SPI bus
  mfrc522.PCD_Init(); // MFRC522
  lcd.init();                      // initialize the lcd
  // Print a message to the LCD.
  lcd.backlight();
  lcd.setCursor(0,0);
  lcd.print("CONTROL ACCESO");

}

void loop() {
  inicio:
  if(!i){
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("CONTROL ACCESO");
  i = true;
  }



  
  //Wait until new tag is available
  while (getID()) 
  {
    Serial.print(digitalRead(2));
    lcd.clear();
    lcd.setCursor(0, 0);
    
    if (tagID == MasterTag) 
    {
      
      lcd.print("Acceso Correcto");
      delay(1000);
      lcd.clear();
      // You can write any code here like opening doors, switching on a relay, lighting up an LED, or anything else you can think of.
      lcd.setCursor(0,0);
      lcd.print("BIENVENIDO");
      lcd.setCursor(0,1);
      lcd.print("Nivel Luz ->");
      while(true){
        ldrValue=analogRead(ldrPin);
        if(700 > ldrValue)
        digitalWrite(ledPin,HIGH);
        else
        digitalWrite(ledPin,LOW);
        delay(500);
        lcd.setCursor(12,1);
        lcd.print(ldrValue);
        valor = digitalRead(pinoff);
        Serial.print(valor);
        if(digitalRead(2) == HIGH){
          lcd.clear();
          lcd.setCursor(0,0);
          lcd.print("HASTA LUEGO");
          delay(5000);
          i = false;
          digitalWrite(6,LOW);
          goto inicio;
        }
        
      }
    }
    else
    {
      lcd.print("ACCESO DENEGADO");
    }
    
      lcd.setCursor(0, 1);
      lcd.print(" ID : ");
      lcd.print(tagID);
      
    delay(2000);

    lcd.clear();
    lcd.print(" CONTROL ACCESO ");


}
}
