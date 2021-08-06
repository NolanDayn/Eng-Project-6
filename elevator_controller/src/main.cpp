#include "../include/pcanFunctions.h"
#include "../include/databaseFunctions.h"
#include "../include/mainFunctions.h"

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h> 
#include <iostream>

using namespace std;

int main() {

	int ID; 
	int data; 
	int numRx;
	int floorNumber = 1, dest_floorNumber = 1, req_floorNum=1;	
		
	printf("\nElevator now listening to commands from the website\n");
	// Synchronize elevator db and CAN (start at 1st floor)
	pcanTx(ID_SC_TO_EC, GO_TO_FLOOR1);
	db_setFloorNum(1);
				
	while(1){

		//Get current floor number		
		floorNumber = db_getFloorNum();
		
		//TODO Add State Machine that uses requests Queue to set next floor in elevatorStatus
		//For this week we will just handle requests table like a queue
		req_floorNum = db_getReqFloor();

		//No new requests
		if(req_floorNum == 0){
			continue;
		}


		dest_floorNumber = req_floorNum;
		db_setDestFloor(req_floorNum);

		//Get destination floor number
		//dest_floorNumber = db_getDestFloor();

		if (dest_floorNumber != floorNumber) {	// If floor number changes in database
			printf("SHOULD MOVE\n");
			pcanTx(ID_SC_TO_EC, HexFromFloor(dest_floorNumber));	// change floor number in elevator - send command over CAN
			sleep(3);
		}

		//Set new floor number in the database once reached
		db_setFloorNum(dest_floorNumber);	
		sleep(1);	// poll database once every second to check for change in floor number
	}
			
	
	return(0);
}






	
