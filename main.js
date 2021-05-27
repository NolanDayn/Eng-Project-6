var musicPlayer = document.getElementById("music_player");

//0: floor 1, 1: floor 2, 2: floor 3, 3: door open, 4: door close, 5: music button
var elevatorDisplays = [document.getElementById("floor_1_display"),document.getElementById("floor_2_display"),document.getElementById("floor_3_display"),document.getElementById("door_open_display"),document.getElementById("door_close_display"),document.getElementById("music_display")];
var elevatorButtons = [document.getElementById("floor_1_button"),document.getElementById("floor_2_button"),document.getElementById("floor_3_button"),document.getElementById("door_open_button"),document.getElementById("door_close_button"),document.getElementById("music_button")];

//music button click
elevatorButtons[5].addEventListener('click', function (event) {
     musicPlayer.muted = !musicPlayer.muted;
	 musicPlayer.muted ? elevatorDisplays[5].classList.remove("display_active") : elevatorDisplays[5].classList.add("display_active");
});