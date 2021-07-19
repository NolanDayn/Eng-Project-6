function showStats(){

    var xmlhttpShow = new XMLHttpRequest();
    xmlhttpShow.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //readyState holds the status of the XMLHttpRequest
            //( 4 means finished request and server responce is ready)
            //status 200 for 'OK'
            var resp = this.responseText; //Text string returned from server in 'echo' statement
            console.log(resp);
        }
    };

    xmlhttpShow.open("GET", "http://142.156.193.130:50050/Eng-Project-6/charting/data.php", true);
    xmlhttpShow.send();
}

showStats();