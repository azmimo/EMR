#include <WiFi.h>
#include <Wire.h>
#include "MAX30100_PulseOximeter.h"
#define REPORTING_PERIOD_MS     1000
int ID=1;
const char* ssid     = "**********";
const char* password = "**********";
const char* host"*********";
int hr;
int spo2;
PulseOximeter pox;

uint32_t tsLastReport = 0;

// Callback (registered below) fired when a pulse is detected
void onBeatDetected()
{
    Serial.println("Beat!");
}

void setup()
{
  
    Serial.begin(115200);

    Serial.print("Initializing pulse oximeter..");
    if (!pox.begin()) {
        Serial.println("FAILED");
        for(;;);
    } else {
        Serial.println("SUCCESS");
    }

    
    pox.setOnBeatDetectedCallback(onBeatDetected);
    WiFi.begin(ssid, password);
}

void loop()
{
    // Make sure to call update as fast as possible
    pox.update();

     
      if (millis() - tsLastReport > REPORTING_PERIOD_MS) {
        Serial.print("Heart rate:");
        hr = pox.getHeartRate();
        spo2 = pox.getSpO2();
        Serial.print(hr);
        Serial.print("bpm / SpO2:");
        Serial.print(spo2);
        Serial.println("%");

        tsLastReport = millis();
        }



    
   if (millis() == 60000)
   { 


    
     WiFiClient client;
    const int httpPort = 80;
    client.connect(host, httpPort);

    
    if (!client.connect(host, httpPort)) {

      
        Serial.println("connection failed");
        
    }

    
    client.print(String("GET http://localhost/wwwm/write_data.php?") + 
                          ("&ID=") + ID +
                          ("&HR=") + hr +
                          ("&SPO2=")+ spo2  + 
                          " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    client.stop();
   while (client.available() == 0) {
        if (millis() - timeout > 1000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            ESP.restart();
            return;
        }
    }
    
    while(client.available()) {
        String line = client.readStringUntil('\r');
    }
    
     ESP.restart(); 
   }
    
    
}
