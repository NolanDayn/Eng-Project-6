// Includes required (headers located in /usr/include) 
#include "../include/databaseFunctions.h"
#include <stdlib.h>
#include <iostream>
#include <mysql_connection.h>
#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>
 
using namespace std; 
 
int db_getFloorNum() {
	sql::Driver *driver; 			// Create a pointer to a MySQL driver object
	sql::Connection *con; 			// Create a pointer to a database connection object
	sql::Statement *stmt;			// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;			// Create a pointer to a ResultSet object to hold results 
	int floorNum;					// Floor number 
	
	// Create a connection 
	driver = get_driver_instance();
	con = driver->connect("tcp://127.0.0.1:3306", "root", "password");
	con->setSchema("elevator");		
	
	// Query database
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT currentFloor FROM elevatorStatus LIMIT 1");	// message query
	while(res->next()){
		floorNum = res->getInt("currentFloor");
	}
	
	// Clean up pointers 
	delete res;
	delete stmt;
	delete con;
	
	return floorNum;
}

int db_getReqFloor(){

	sql::Driver *driver;	//Create a pointer to a MySQL driver object
	sql::Connection *con;	//Create a pointer to a database connection object
	sql::Statement *stmt;	//Create a pointer to a statement object
	sql::ResultSet *res;	//Create a pointer to a ResultSet object to hold results
	int reqFloor = 0;		//Requested Floor Number

	//create connection
	driver = get_driver_instance();
       	con = driver->connect("tcp://127.0.0.1:3306", "root", "password");
	con->setSchema("elevator");
	
	//Query Database
	// *************************
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT floor FROM requests LIMIT 1");

	while(res->next()){
		reqFloor = res->getInt("floor");
	}

	if(reqFloor != 0){
		printf("REQUESTED FLOOR : %d\n", reqFloor);
		stmt->execute("DELETE FROM requests ORDER BY requestNumber DESC LIMIT 1");
	}

	//Clean up pointers
	delete res;
	delete stmt;
	delete con;

	return reqFloor;
}

int db_getDestFloor(){

	sql::Driver *driver;	//Create a pointer to a MySQL driver object
	sql::Connection *con;	//Create a pointer to a database connection object
	sql::Statement *stmt;	//Create a pointer to a statement object
	sql::ResultSet *res;	//Create a pointer to a ResultSet object to hold results
	int destFloor;		//Requested Floor Number

	//create connection
	driver = get_driver_instance();
       	con = driver->connect("tcp://127.0.0.1:3306", "root", "password");
	con->setSchema("elevator");
	
	//Query Database
	// *************************
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT destinationFloor FROM elevatorStatus LIMIT 1");
	
	while(res->next()){
		destFloor = res->getInt("destinationFloor");
	}

	//Clean up pointers
	delete res;
	delete stmt;
	delete con;

	return destFloor;
}

int db_setDestFloor(int floorNum) {
	sql::Driver *driver; 	// Create a pointer to a MySQL driver object
	sql::Connection *con;	// Create a pointer to a database connection object
	sql::Statement *stmt;	// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;	// Create a pointer to a ResultSet object to hold results 
	sql::PreparedStatement *pstmt; 	// Create a pointer to a prepared statement	
	
	// Create a connection 
	driver = get_driver_instance();
	con = driver->connect("tcp://127.0.0.1:3306", "root", "password");	
	con->setSchema("elevator");										
	
	// Query database (possibly not necessary)
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT destinationFloor FROM elevatorStatus LIMIT 1");	// message query
	while(res->next()){
		res->getInt("destinationFloor");
	}
		
	// Update database
	// *****************************
	pstmt = con->prepareStatement("UPDATE elevatorStatus SET destinationFloor = ? LIMIT 1");
	pstmt->setInt(1,floorNum);
	pstmt->executeUpdate();
		
	// Clean up pointers 
	delete res;
	delete pstmt;
	delete stmt;
	delete con;
} 
 

int db_setFloorNum(int floorNum) {
	sql::Driver *driver; 				// Create a pointer to a MySQL driver object
	sql::Connection *con; 				// Create a pointer to a database connection object
	sql::Statement *stmt;				// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;				// Create a pointer to a ResultSet object to hold results 
	sql::PreparedStatement *pstmt; 		// Create a pointer to a prepared statement	
	
	// Create a connection 
	driver = get_driver_instance();
	con = driver->connect("tcp://127.0.0.1:3306", "root", "password");	
	con->setSchema("elevator");										
	
	// Query database (possibly not necessary)
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT currentFloor FROM elevatorStatus LIMIT 1");	// message query
	while(res->next()){
		res->getInt("currentFloor");
	}
		
	// Update database
	// *****************************
	pstmt = con->prepareStatement("UPDATE elevatorStatus SET currentFloor = ? LIMIT 1");
	pstmt->setInt(1, floorNum);
	pstmt->executeUpdate();
		
	// Clean up pointers 
	delete res;
	delete pstmt;
	delete stmt;
	delete con;
} 
 
