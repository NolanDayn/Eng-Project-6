var currentFloor = 1;
var doorState = 1; //1: closed 0:open
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

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

function OpenDoors(open){
	//0:open, 1:close
	if (doorState === open) return;
	image.style.animation = animationStrings[currentFloor * 2 + 2 + open];
	doorState === 1 ? doorState = 0 : doorState = 1;
	image.style.animationFillMode = "forwards";
}

function Move(dir){
	if (dir == 1 && currentFloor < 3){
		//OpenDoors(1);
		//await sleep(500);
		image.style.animation = animationStrings[currentFloor - 1];
		currentFloor++;
		doorState = 1;
	} else if (dir == -1 && currentFloor > 1){
		image.style.animation = animationStrings[currentFloor == 3 ? 2 : 3];
		currentFloor--;
		doorState = 1;
	}
	image.style.animationFillMode = "forwards";
}