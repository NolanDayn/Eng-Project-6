#ifndef DB_FUNCTIONS

#define DB_FUNCTIONS
int db_getFloorNum();
int db_checkIfRequested(int floorNum);
int db_getDestFloor();
int db_getReqFloor();
int db_setDestFloor(int floorNum);
int db_setFloorNum(int floorNum);
void db_deleteRequest(int floorNum);

#endif
