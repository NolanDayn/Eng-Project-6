var currentFloor = 1;
var doorState = 1; //1: closed 0:open
var direction = 0; //1: up, 0: none, -1:down
var image = document.getElementById("sprite-image");
var alarmButton = document.getElementById('alarmButton');
var requestTable = document.getElementById("requestTable");
var statusTable = document.getElementById("statusTable");

var animationStrings = ["Up_One .25s steps(7) 1", "Up_Two .25s steps(7) 1","Down_Two .25s steps(7) 1","Down_One .25s steps(7) 1","One_Open .25s steps(6) 1","One_Close .25s steps(6) 1","Two_Open .25s steps(6) 1","Two_Close .25s steps(6) 1","Three_Open .25s steps(6) 1","Three_Close .25s steps(6) 1"];
// 0: 1 to 2
// 1: 2 to 3
// 2: 3 to 2
// 3: 2 to 1
// 4: 1 open
// 5: 1 close
// 6: 2 open
// 7: 2 close
// 8: 3 open
// 9: 3 close

const called_floors = new Set();

AddListeners();

function AddListeners(){
	var floor1 = document.getElementsByClassName("get_floor_1");
	var floor2 = document.getElementsByClassName("get_floor_2");
	var floor3 = document.getElementsByClassName("get_floor_3");
	for (var i = 0; i < floor1.length; i++) {
		floor1[i].addEventListener('click', function(){RequestFloor(1);}, false);
		
		floor2[i].addEventListener('click', function(){RequestFloor(2);}, false);
		floor3[i].addEventListener('click', function(){RequestFloor(3);}, false);
	}
	alarmButton.addEventListener('click', CallNumber, false);
}

function FillTable(table, data){
	//clear table
	while (table.firstChild) table.removeChild(table.firstChild);
	
	if (data.length == 0) return;

	//headers
	const row = document.createElement("tr");
	for (var key in data[0]) {
		const header = document.createElement("th");
		const node = document.createTextNode(key);
		header.appendChild(node);
		row.appendChild(header);
	}
	table.appendChild(row);

	//data
	data.forEach( function (arrayItem) {
		const row = document.createElement("tr");
		for (var key in arrayItem) {
			const data = document.createElement("td");
			const node = document.createTextNode(arrayItem[key]);
			data.appendChild(node);
			row.appendChild(data);
		}
		table.appendChild(row);
	});
	
}

function CallNumber(){
	var url = `http://142.156.193.130:50050/Eng-Project-6/twilio/sendsms.php`;
	var xhr = new XMLHttpRequest();
	xhr.open('GET', url, true);
	xhr.send();
}

async function Set_Dest(){
	var dest_found = 0;
	if (called_floors.has(currentFloor)){
		await OpenDoors(0);
		await OpenDoors(1);
		called_floors.delete(currentFloor);
	}
	for(var i = currentFloor + 1; i <= 3; i++){
		if(called_floors.has(i)){
			await Move(1);
			dest_found = 1;
			break;
		}
	}
	if (!dest_found){
		for(var i = currentFloor - 1; i >= 1; i--){
			if(called_floors.has(i)){
				await Move(-1);
				dest_found = 1;
				break;
			}
		}
	}
	
	if (dest_found) Set_Dest();
}

async function RequestFloor(floor){
	called_floors.add(floor);
	Set_Dest();
	//Request
	
	var url = `http://142.156.193.130:50050/Eng-Project-6/AddFloor.php?floor=${floor}`;
	var xhr = new XMLHttpRequest();
	xhr.open('GET', url, true);
	xhr.send();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			PrintResults(this.responseText);
		}
	}
	sound = new Audio(`../Eng-Project-6/music/${floor}.mp3`);
	sound.play();
};

function PrintResults(results){
	var endPos = results.indexOf(']') + 1;
	const firstTable = JSON.parse( results.substring(0,endPos) );
	const secondTable = JSON.parse( results.substring(endPos, results.length) );
	FillTable(requestTable, firstTable);
	FillTable(statusTable, secondTable);
}



async function OpenDoors(open){
	//0:open, 1:close
	if (doorState === open) return;
	image.style.animation = animationStrings[currentFloor * 2 + 2 + open];
	image.style.animationFillMode = "forwards";
	await new Promise(function(resolve) { setTimeout(resolve, 900); });
	doorState === 1 ? doorState = 0 : doorState = 1;

	if (open===0){
		
		sound = new Audio("../Eng-Project-6/music/o.mp3");
		sound.play();
		
	}
	else {
		sound = new Audio("../Eng-Project-6/music/c.mp3");
		sound.play();
		
	}
	
}

async function Move(dir){
	if (dir == 1){
		image.style.animation = animationStrings[currentFloor - 1];
		image.style.animationFillMode = "forwards";
		doorState = 1;
		currentFloor++;
		await new Promise(function(resolve) { setTimeout(resolve, 900); });
	} else if (dir == -1){
		image.style.animation = animationStrings[currentFloor == 3 ? 2 : 3];
		image.style.animationFillMode = "forwards";
		doorState = 1;
		currentFloor--;
		await new Promise(function(resolve) { setTimeout(resolve, 900); });
	}
}