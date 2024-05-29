#include "DHT.h"
#include <WiFi.h>
#include <HTTPClient.h>

#define DHTPIN 13
#define DHTTYPE DHT11
#define SOIL_MOISTURE_PIN 36

DHT dht(DHTPIN, DHTTYPE);

const char* ssid = "Senku";   
const char* password = "dahlahmales";

const char* server = "vinetracksrg.my.id";

void setup() {
  Serial.begin(9600);

  dht.begin();

  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();

  int soilMoisture = analogRead(SOIL_MOISTURE_PIN);
  int moisturePercentage = map(soilMoisture, 4095, 0, 0, 100); // Mengkonversi nilai analog ke persentase

  Serial.print("Suhu: ");
  Serial.print(temperature);
  Serial.print(" °C, Kelembaban: ");
  Serial.print(humidity);
  Serial.print("%, Kelembaban Tanah: ");
  Serial.print(moisturePercentage);
  Serial.println("%");

  WiFiClient wClient;

  const int httpPort = 80;
  if (!wClient.connect(server, httpPort)) {
    Serial.println("Gagal konek ke Web Server");
    return;
  }

  String url;
  HTTPClient http;
  url = "http://" + String(server) + "/dashboard" + "/simpan/" + String(temperature) + "/" + String(humidity) + "/" + String(moisturePercentage);
  // http://192.168.119.141/dashboard/simpan/20/20/20
  http.begin(wClient, url);
  http.GET();
  http.end();

  delay(2000);
}
