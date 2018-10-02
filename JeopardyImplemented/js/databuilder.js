/**
 * 
 */

$(function (){

$('#data').submit(function(e) {
    if ($.trim($("#Category").val()) === "" ||$.trim( $("#Clue").val()) === "" ||$.trim ($("#Solution").val()) ==="") {
       e.preventDefault();
    	alert('you did not fill out one of the fields');
        return false;
    }
});

});