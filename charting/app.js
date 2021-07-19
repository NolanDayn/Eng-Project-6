document.onload = function(){
    $.ajax({
        url:"http://142.156.193.130:50050/Eng-Project-6/charting/data.php",
        method: "GET",
        success: function(data){
            console.log(data);
        },
        error: function(data){
            console.log(data);
        }
    });
});