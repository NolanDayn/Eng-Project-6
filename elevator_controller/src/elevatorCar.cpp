#include "../include/elevatorCar.h"
#include "../include/databaseFunctions.h"
#include "../include/mainFunctions.h"
#include "../include/pcanFunctions.h"

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

bool ElevatorCar::checkRequests(){
		
	//get current floor
	this->currentFloor = db_getFloorNum();

	//first request is just from top of queue
	int req_floorNum = db_getReqFloor();

	if(req_floorNum == 0){
		//no requests at this time return false
		db_setMovementVals(this->currentFloor,0,0,0);
		return false;
	}

	if(req_floorNum == this->currentFloor){
		db_deleteRequest(req_floorNum);
	}	

	printf("Requested Floor %d\n", req_floorNum);
	this->destinationFloor = req_floorNum;

	this->direction = this->destinationFloor - this->currentFloor;

	if(this->direction != 0){
		this->direction /= abs(this->direction);
	}

	//Check if other floors on the way
	this->determineNextStop();
	
}

void ElevatorCar::determineNextStop(){

	int target = this->currentFloor + this->direction;
	int requestedFloor = 0;

	while(target <= TOP_FLOOR && target >= BOTTOM_FLOOR){

		//look if there is a floor in request that has that value
		requestedFloor = db_checkIfRequested(target);
			
		if(requestedFloor == 0){
			//this floor was not requested move on to check next
		}
		else{
			db_setMovementVals(requestedFloor, 1, 0, this->direction);
			move(requestedFloor);
		}

		target = target + this->direction;
	}
}

void ElevatorCar::move(int floorNumber){

		pcanTx(ID_SC_TO_EC, HexFromFloor(floorNumber));

		//wait for can message to signify we are at that floor
		printf("Elevator Moving ");
		int canFloorMsg = 0;
		while(canFloorMsg != FLOOR_CODES[floorNumber-1]){
			canFloorMsg = pcanRx(1);
			printf("CAN FLOOR MESSAGE %d FLOOR CODE %d\n", canFloorMsg,FLOOR_CODES[floorNumber-1]);
		}
		printf("\n");

		//Pause to compensate for elevator travel time / door simulation
		sleep(3);
		
		//update current floor
		this->currentFloor = floorNumber;
		db_setFloorNum(this->currentFloor);

		db_setMovementVals(this->currentFloor,0,0, this->direction);

		//Delete floor request with moves value
		db_deleteRequest(floorNumber);
}
