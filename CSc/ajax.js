

$('document').ready(function () {
    setInterval(function () {getRealData()}, 500);}); 
// Show All User
function getRealData() {
$.ajax({
    url: "allUsers.php",
    type: "POST",
    cache: false,
    success: function(data){
        // alert(data);
        $('#table').html(data); 
    }
});




}
var deletuser = function(id){
    $.ajax({    
        type: "GET",
        url: "deleteUser.php", 
        data:{deleteId:id},            
        dataType: "html",                  
        success: function(data){   
        $('#msg').html(data);
       $('#table-container').load('fetch-data.php');
           
        }
    });
};