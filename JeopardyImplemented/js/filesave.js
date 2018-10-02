/**
 * 
 */

$(function (){
	$("#gamename").on('keypress',function(e){
		 $('#filealertmessage').removeClass('showmessages');
		 $('#filealertmessage').addClass('hiddenmessages');
		 $('#filealertmessage2').removeClass('showmessages');
		 $('#filealertmessage2').addClass('hiddenmessages');
		 });
	
	 var creatorstatus = ['Filename','Scoring','Contestants','Categories','Questions'];
		$('#statusbarfilename').append('<tr></tr>');
		var table = $('#statusbarcontestants').children();
			for(j = 0; j < 5; j++){
				if(j==0){table.append('<td class = "progressbarmarked">' + (j+1) + '</td><td><img id= "dotarrow" src = "../images/dotarrow.png"></td>');
				$(".progressbarmarked").css("color" , "Black");
				}
				else if(j==4){table.append('<td>' + (j+1) + '</td>');}	
			else table.append('<td>' + (j+1) + '</td><td><img id= "dotarrow" src = "../images/dotarrow.png"></td>');
		   }
		$('#statusbarfilename').append('<tr></tr>');
			for(j = 0; j < 5; j++){
				if(j==0){table.append('<td class = "progressbarmarkedbelow">' + creatorstatus[j] + '</td><td>&nbsp;</td>');$(".progressbarmarkedbelow").css("color" , "Black");}
				else table.append('<td>' + creatorstatus[j] + '</td><td>&nbsp;</td>');
			 }

		
	/* for a submitting and valadation to move on the next section of game creator---------------------*/
	var filepattern = /^[a-zA-Z0-9_ ]+$/;
	$('#savegame,#nextbuttons').on('click', function(e){
		
    var input = $('#gamename').val();
	if(!(filepattern.test(input))) {
		 $('#filealertmessage').removeClass('hiddenmessages');
		 $('#filealertmessage').addClass('showmessages');
		 e.preventDefault();
		 
		 $("#gamename").on('keypress',function(e){
		 $('#filealertmessage').removeClass('showmessages');
		 $('#filealertmessage').addClass('hiddenmessages');
		 });
	}
	else
	{ 
		$('#filealertmessage').removeClass('showmessages');
		 $('#filealertmessage').addClass('hiddenmessages');
	}
	
	}); 
	//---------------------------------------------------------------------------
	
	/* for other buttons  and "main menu"----------------------*/
	 
	$('#backbuttons').on('click', function(e){
		 $('#areyousure').removeClass('hidealertbox');
		 $('#areyousure').addClass('showalertbox');
	});  
	
	$('#yesbutton').on('click', function(e){
		 location.href = 'openingmenu.php?name='+ $_GET['name'];
	});
	
	$('#nobutton').on('click', function(e){
		$('#areyousure').removeClass('showalertbox');
		 $('#areyousure').addClass('hidealertbox');
	});
	
	//get url stuff
	
	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
	    function decode(s) {
	        return decodeURIComponent(s.split("+").join(" "));
	    }

	    $_GET[decode(arguments[1])] = decode(arguments[2]);
	});
	/*---------------------------------------------------------------------------*/
}); // end of function