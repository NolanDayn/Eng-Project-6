var currentFloor = 1;
var doorState = 1; //1: closed 0:open
var direction = 0; //1: up, 0: none, -1:down
var image = document.getElementById("sprite-image");

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

window.addEventListener('load', (event) => {
  AddEventListeners();
});

function AddEventListeners(){
	var floor1 = document.getElementsByClassName("get_floor_1");
	var floor2 = document.getElementsByClassName("get_floor_2");
	var floor3 = document.getElementsByClassName("get_floor_3");
	for (var i = 0; i < floor1.length; i++) {
		alert("hi");
		floor1[i].addEventListener('click', function(){RequestFloor(1);}, false);
		floor2[i].addEventListener('click', function(){RequestFloor(2);}, false);
		floor3[i].addEventListener('click', function(){RequestFloor(3);}, false);
	}
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
	
	//var url = `http://142.156.193.130:50050/Eng-Project-6/AddFloor.php?floor=${floor}`;
	//let xhr = new XMLHttpRequest();
	//xhr.open('GET', url, true);
	//xhr.send();
	//xhr.addEventListener("readystatechange", PrintResults, false);
}

function PrintResults(var results){
	alert("hi");
}



async function OpenDoors(open){
	//0:open, 1:close
	if (doorState === open) return;
	image.style.animation = animationStrings[currentFloor * 2 + 2 + open];
	image.style.animationFillMode = "forwards";
	await new Promise(function(resolve) { setTimeout(resolve, 900); });
	doorState === 1 ? doorState = 0 : doorState = 1;
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