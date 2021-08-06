#include "../include/pcanFunctions.h"
#include "../include/databaseFunctions.h"
#include "../include/mainFunctions.h"
#include "../include/elevatorCar.h"

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h> 
#include <iostream>

using namespace std;

int main() {

	ElevatorCar elevatorCar;	

	printf("\nElevator now listening to commands from the website\n");
	// Synchronize elevator db and CAN (start at 1st floor)
	pcanTx(ID_SC_TO_EC, GO_TO_FLOOR1);
	db_setFloorNum(1);
	sleep(3);
	
	while(1){
	    elevatorCar.checkRequests();
	    sleep(1);
	}

	return(0);
}






	
