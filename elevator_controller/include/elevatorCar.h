#ifndef __ELEVATOR_CAR__
#define __ELEVATOR_CAR__

//TODO add door logic?

#define TOP_FLOOR 3
#define BOTTOM_FLOOR 1
const int FLOOR_CODES[] = {5,6,7};

class ElevatorCar{
	private:
		bool intransit;
		unsigned int helpFlag;
		int currentFloor;
		int destinationFloor;
		int direction;

	public:

		//Getters
		bool checkIfMoving();
		unsigned int getHelpFlag();
		int getDestinationFloor();
		int getDirection();

		//methods
		bool checkRequests();
		void move(int floorNumber);
		void determineNextStop();
};

#endif

