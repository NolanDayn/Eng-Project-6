var musicPlayer = document.getElementById("music_player");

//0: floor 1, 1: floor 2, 2: floor 3, 3: door open, 4: door close, 5: music button
var elevatorDisplays = [document.getElementById("floor_1_display"),document.getElementById("floor_2_display"),document.getElementById("floor_3_display"),document.getElementById("door_open_display"),document.getElementById("door_close_display"),document.getElementById("music_display")];
var elevatorButtons = [document.getElementById("floor_1_button"),document.getElementById("floor_2_button"),document.getElementById("floor_3_button"),document.getElementById("door_open_button"),document.getElementById("door_close_button"),document.getElementById("music_button")];


function ToggleMusic(){
     musicPlayer.muted = !musicPlayer.muted;
	 musicPlayer.muted ? elevatorDisplays[5].classList.remove("display_active") : elevatorDisplays[5].classList.add("display_active");
	 musicPlayer.play();
}

function MoveDoors(open) {
	if (open){
		elevatorDisplays[3].classList.add("display_active");
		elevatorDisplays[4].classList.remove("display_active");
	} else {
		elevatorDisplays[4].classList.add("display_active");
		elevatorDisplays[3].classList.remove("display_active");
	}
}

function SetFloor(floorNumber){
	for(var i = 0; i < 3; i++){
		if (i == floorNumber) continue;
		elevatorDisplays[i].classList.remove("display_active");
	}
	elevatorDisplays[floorNumber].classList.add("display_active");
}