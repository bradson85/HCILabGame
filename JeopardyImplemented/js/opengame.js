/**
 * 
 */

$(function (){
	var gamename="";
	var teamnumber= 0;
	//get url stuff
	
	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
	    function decode(s) {
	        return decodeURIComponent(s.split("+").join(" "));
	    }

	    $_GET[decode(arguments[1])] = decode(arguments[2]);
	});
	
	$('#opengame').on('click', function(e){
	    var name = $_GET['name'];
	     if($( "#filestoopen" ).find('tr').hasClass( "tablerowselected" )){
	    	 location.href = 'inc-openfile.php?name='+name+'&gamename='+gamename+'&teamnumber='+teamnumber;
	     }else{ $('#textalertmessage').removeClass('hiddenmessages');
	            $('#textalertmessage').addClass('showmessages'); 
	     }
	});

	$('#filestoopen').find('tr').click(function() {
		   $('tr').removeClass("tablerowselected");
		   $('tr').addClass("tablerowdeselected");
		   $('#textalertmessage').removeClass('showmessages');
           $('#textalertmessage').addClass('hiddenmessages'); 
	        $(this).addClass("tablerowselected", this.clicked);
	        $(this).removeClass("tablerowdeselected", this.clicked);
	        var data= $(this).find('td:nth-child(5)').text();
	        console.log(data);
		     var ret = data.split(",");
	      	 teamnumber= ret.length;	
	      	 console.log(teamnumber);
	        $('tr:nth-child(1)').removeClass("tablerowdeselected");
	        gamename= $(this).find('td:nth-child(2)').text();
	        
		  
	});
	
	$('[id= "editbutton"]').on('click', function(e){
		  gamename= $(this).parent().parent().find('td:nth-child(2)').text();
		 location.href = 'scoringoptions.php?name=' + $_GET['name'] +' &gamename='+ gamename;
	});
	$('#previewgame').on('click', function(e){
		 location.href = 'openingmenu.php?name='+ $_GET['name'];
	});
});