var btn_PieChart = document.getElementById("pieChartB");
var btn_BarGraph = document.getElementById("barGraphB");
var canvasContainer = document.getElementById("canvasContainer");

Initialize();

function createCanvas(){
	while (canvasContainer.firstChild) canvasContainer.removeChild(canvasContainer.firstChild);
	
	var canvas = document.createElement('canvas');
	canvas.width = 800;
	canvas.height = 600;
	canvas.id = 'mycanvas';
	canvasContainer.appendChild(canvas);
	return canvas;
}

function Initialize(){
	btn_PieChart.addEventListener("click", showRequestPieChart);
	btn_BarGraph.addEventListener("click", showBarGraph);
}

function showBarGraph(){
    var xmlhttpShow = new XMLHttpRequest();
    xmlhttpShow.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //readyState holds the status of the XMLHttpRequest
            //( 4 means finished request and server responce is ready)
            //status 200 for 'OK'
            var resp = JSON.parse(this.responseText); //Text string returned from server in 'echo' statement
            //console.log(resp);

            var date = [];
            var requestedFloor = [];

            for(var i in resp){
                date.push("Date " + resp[i].date)
                requestedFloor.push(resp[i].requestedFloor)
            }


            var chartData = {
                labels: date,
                datasets: [
                    {
                        label : 'Date',
                        backgroundColor: 'rgba(50,50,50,0.75)',
                        borderColor: 'rgba(50,50,50,0.75)',
                        hoverBackgroundColor: 'rgba(50,50,50,1)',
                        hoverBorderColor: 'rgba(50,50,50,1)',
                        data: requestedFloor
                    }
                ]
            };

			var canvas = createCanvas();

            var myChart = new Chart(canvas, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                      legend: {
                        position: 'top',
                      },
                      title: {
                        display: true,
                        text: 'Requested Floor Over Time'
                      }
                    }
                }
            });
        }
    };

    xmlhttpShow.open("GET", "http://142.156.193.130:50050/Eng-Project-6/data.php", true);
    xmlhttpShow.send();
}

function showRequestPieChart(){
    var xmlhttpShow = new XMLHttpRequest();
    xmlhttpShow.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //readyState holds the status of the XMLHttpRequest
            //( 4 means finished request and server responce is ready)
            //status 200 for 'OK'
            var resp = JSON.parse(this.responseText); //Text string returned from server in 'echo' statement

            //represents [floor1,floor2,floor3]
            var requestedFloor = [0,0,0];

            for(var i in resp){
                requestedFloor[(resp[i].requestedFloor-1)]++;
            }

            //console.log(requestedFloor);

            var chartData = {
                labels:["floor1","floor2", "floor3"],
                datasets:[
                    {
                        label: "Requested Floor",
                        data: requestedFloor,
                        backgroundColor: ['#E01606','#19BF06','#06A1E0'],
                        borderColor:['#616161','#616161','#616161'],
                        borderWidth: [1,1,1]
                    }
                ]
            }

			var canvas = createCanvas();

            myChart = new Chart(canvas, {
                type:"pie",
                data:chartData,
                options: {
                    responsive: true,
                    plugins: {
                      legend: {
                        position: 'top',
                      },
                      title: {
                        display: true,
                        text: 'Requested Floors'
                      }
                    }
                }
            })
        };
    }
    xmlhttpShow.open("GET", "http://142.156.193.130:50050/Eng-Project-6/data.php", true);
    xmlhttpShow.send();
}

