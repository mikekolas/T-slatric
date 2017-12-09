#include <SimpleTimer.h>

#include <Ethernet.h>
#include "SPI.h"

// EmonLibrary examples openenergymonitor.org, Licence GNU GPL V3
#include "EmonLib.h"                   // Include Emon Library
EnergyMonitor energy;                   // Create an instance

SimpleTimer timer;

//server ip and device id
const char* host = "192.168.1.2"; //Web app server ip
String deviceID = "KRbOARYbVNLRtON"; 
const int httpPort = 80;

//======Ethernet parameters=========
EthernetClient client; 
byte mac[] = {
  0x90, 0xA2, 0xDB, 0x10, 0x8A, 0x52 };
IPAddress ip(192, 168, 1, 40);

void setup()
{  
  Serial.begin(9600);
  Ethernet.begin(mac, ip);
  energy.current(1, 55.5555556);             // Current: input pin, calibration.
  Serial.println(ip);
  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
  }
  delay(1000);
  Serial.println("connecting...");
  delay(1000);
  timer.setInterval(15000, sendData);
}

void loop()
{
    timer.run();
}

double getWatts()
{
  double Irms = energy.calcIrms(1480);  // Calculate Irms only
  return (Irms * 230.0);
}

void sendData()
{
  Serial.print("Establishing connection to ");
  Serial.println(host);
  double power = getWatts();
  String data ="power=" + String(power) + "&deviceID=" + deviceID;
  //Serial.println(data);
  
  if (!client.connect(host, httpPort)) {
    Serial.println("Connection failed");
    return;
  }
  else
  { // Send Post
    Serial.println("Connected to server");
    client.println("POST /receive HTTP/1.1");
    client.print("Host: ");
    client.println(host);
    client.println("Cache-Control: no-cache");
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(data.length());
    client.println();
    client.println(data);

    unsigned long timeout = millis();
    while (client.available() == 0)
    {
      if (millis() - timeout > 5000)
      {
        Serial.println("Timeout!!!");
        client.stop();
        return;
      }
    }
  
    // Read the server's reply
    while(client.available())
    {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    client.stop();
  }//connection else
}

