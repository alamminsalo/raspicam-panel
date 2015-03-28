#include <wiringPi.h>
#include <unistd.h>
#include <string>
#include <stdlib.h>
#include <iostream>
#include <fstream>

bool video = false;
unsigned int videolen = 5000;
unsigned int timer = 60;
std::string email, videoparam, stillparam;

bool load_config(const char *path){
	std::ifstream file(path);
	if (!file.is_open()){
		return false;
	}
	std::string line;
	while (getline(file, line)){
		if (line[0] != '#'){
			std::string var = line.substr(0, line.find('='));
			std::string val = line.substr(line.find('=')+1);
			if (var == "cameramode"){
				if (val == "video"){
					video = true;
					std::cout << "Set video mode ON\n";
				}	
				else video = false;
			}
			else if (var == "videolength"){
				videolen = atoi(val.c_str());
				std::cout << "Changed video lenght mode!\n";
			}
			else if (var == "email"){
				email = val;
			}
			else if (var == "timer"){
				timer = atoi (val.c_str());
			}
		}
		
	}
	file.close();

	videoparam = "./takevid.sh ";
	videoparam += email;
	videoparam += " ";
	videoparam += std::to_string(videolen);

	stillparam = "./takepic.sh "+email;

	std::cout << "Read config file.\n";
	return true;
};

int main(){

	wiringPiSetupGpio();
	
	//Our PIR-sensor is at pin 17
	int pin = 17;
	pinMode(pin,INPUT);

	while(1){
		if (digitalRead(pin)){
			//Load config for possible admin panel changes
			load_config("./config.txt");

			if (!video) system(stillparam.c_str());
			else system(videoparam.c_str());

			sleep(timer);
		}
		sleep(1);
	}	

	return 0;
}
