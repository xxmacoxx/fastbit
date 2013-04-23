$(document).ready(function () {
    $.getJSON("data.json", function(data){
        for(var key in data){
        $("#actibity_buttons").append('<button id="' + key + '" class="btn btn-large" type="button" onClick="location.href=\'logActivity.php?activity=' + key + '\'">' + key + '</button>');
        }
    });
});


