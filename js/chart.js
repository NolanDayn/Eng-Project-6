var btn_PieChart = document.getElementById("pieChartB");
var btn_BarGraph = document.getElementById("barGraphB");
var canvas = document.getElementById("mycanvas");

Initialize();

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
            console.log(resp);

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
                        backgroundColor: 'rgba(200,200,200,0.75)',
                        borderColor: 'rgba(200,200,200,0.75)',
                        hoverBackgroundColor: 'rgba(200,200,200,1)',
                        hoverBorderColor: 'rgba(200,200,200,1)',
                        data: requestedFloor
                    }
                ]
            };

            var barGraph = new Chart(canvas, {
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
	alert("hi");
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

            console.log(requestedFloor);

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

            var chart1 = new Chart(canvas, {
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

