#include <wiringPi.h>
#include <unistd.h>
#include <string>
#include <stdlib.h>
#include <iostream>
#include <fstream>

bool video = false;
unsigned int videolen = 5;
std::string email;

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
					video= true;
					std::cout << "Set video mode ON\n";
				}	
			}
			else if (var == "videolength"){
				videolen = atoi(val.c_str());
				std::cout << "Changed video lenght mode!\n";
			}
			else if (var == "email"){
				email = val;
			}
		}
		
	}
	file.close();
	std::cout << "Read config file.\n";
	return true;
};

int main(){
	load_config("./config.txt");

	std::string videoparam = "./takevid.sh ";
	videoparam += email;
	videoparam += " ";
	videoparam += std::to_string(videolen);

	std::string stillparam = "./takepic.sh "+email;

	wiringPiSetupGpio();
	int pin = 17;
	pinMode(pin,INPUT);

	while(1){
		if (digitalRead(pin)){
			printf("Pin %d is HIGH\n",pin);

			if (!video) system(stillparam.c_str());
			else system(videoparam.c_str());

			sleep(80);
		}
		else printf("\n");
		sleep(1);
	}	

	return 0;
}
