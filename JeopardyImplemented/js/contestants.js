/**
 * <td>1</td><td><img id= "dotarrow" src = "images/dotarrow.png"></td><td>2</td><td><img id= "dotarrow" src = "images/dotarrow.png"><td>3</td><td><img id= "dotarrow" src = "images/dotarrow.png"><td>4</td><td><img id= "dotarrow" src = "images/dotarrow.png"><td>5</td></tr>
<tr><td>Filename</td><td>&nbsp;</td><td>Scoring</td><td>&nbsp;</td><td>Contestants</td><td>&nbsp;</td><td>Categories</td><td>&nbsp;</td><td>Questions</td>

  <label for="textboxes">Team 1 Name: &nbsp;</label>
 				<input type = "text" class= "textboxes" placeholder= "Enter Team 1 Name" maxlength="25" name = "Team1"> <br>
 				<label for="textboxes">Team 2 Name: &nbsp;</label>
 				<input type = "text" class= "textboxes" placeholder= "Enter Team 2 Name" maxlength="25" name = "Team2"> <br>
 				<label for="textboxes">Team 3 Name: &nbsp;</label>
 				<input type = "text" class= "textboxes" placeholder= "Enter Team 3 Name" maxlength="25" name = "Team3"> <br>

 */
//for preloading stored data--======================================================================
	
var data;
	var ret;
	var list = 0;
	var value =3;
$(function (){ 
	
	//get url stuff
	
	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
	    function decode(s) {
	        return decodeURIComponent(s.split("+").join(" "));
	    }

	    $_GET[decode(arguments[1])] = decode(arguments[2]);
	});
	// load page data stuff
	//=======================================================================================	
        var name =$_GET['gamename'];
        $.post("loadContestants.php",
	        {
	          gamename: name 
	        },
	        function(result){
	            data = result;
	            console.log(result);
	        	ret = data.split(",");
	         	list = ret.length-1;	// because it counts 1 after comma blank
	        	 console.log(list);
	        	    if (list > 5 && list <=8){
						 $('#inputs').removeClass('inputs').removeClass('inputsexpandmore').addClass('inputsexpand');
					 }
					 else if (list > 7){
						 $('#inputs').removeClass('inputs').removeClass('inputsexpand').addClass('inputsexpandmore');
					 }
					 else{      $('#inputs').removeClass('inputsexpand').removeClass('inputsexpandmore').addClass('inputs');                  
					 } 
	        	 
	        	 
	        	 
        if (list <= 3){
    		 value =3;
    	 }else if (list >= 10){
    		 value =10;
    	 }
    	 else value=list; 
    	 for (i=1; i <= value; i++){
    	$('#boxentrycontainer').append('<label for="textboxes">Team ' + i +' Name: &nbsp;</label>'
     				 + '<input type = "text" id = textbox'+i+' class= "textboxes"'
     				 + 'placeholder= "Enter Team ' + i +' Name" maxlength="25" name = "team'+ i +'"> <br>' );
    	 }
    	 
    	 for(j = 1; j <= list ; j++){
    		$('#textbox'+[j]).val(ret[j-1]);
    	    
    	}
    	 var slidervalue =0;
		 if(list>= 3 && list<=10){
			 slidervalue = list;
		 }else if(list >= 10){
			 slidervalue = 10;
		 }
		 else slidervalue = 3;
	 
			
			//=======================================================================================
		var handle = $( "#custom-handle" );
			 $( "#slider" ).slider({
			   create: function(event,ui) {
			   handle.text( slidervalue );
			   },
			   slide: function( event, ui ) {
			     handle.text( ui.value );
			      }
			    });
			 
			 $( "#slider" ).slider( "option", "value", slidervalue );
			  
			 $( "#slider" ).slider({
				  max: 10
				});
			
			 $( "#slider" ).slider({
				  min: 3
				});
			 $("#slider" ).slider({
				  animate: "slow"
				});
			 
			 $('#slider').slider({
				    change: function(event, ui) {
				    	value = ui.value;
				    	$('#boxentrycontainer').empty();
				    	 for (i=1; i < value +1 ; i++){
				    		 if( i == 10){
				    			 $('#boxentrycontainer').append('<label for="textboxes">Team ' + i +' Name:</label>'
			    		 				 + '<input type = "text" class= "textboxes"'
			    		 				 + 'placeholder= "Enter Team ' + i +' Name" maxlength="25" name = "Team'+ i +'"> <br>' );
				    		 }
				    		 else {	$('#boxentrycontainer').append('<label for="textboxes">Team ' + i +' Name:&nbsp;&nbsp;</label>'
				    		 				 + '<input type = "text"  id= "textbox' +i+'"class= "textboxes"'
				    		 				 + 'placeholder= "Enter Team ' + i +' Name" maxlength="25" name = "team'+ i +'"> <br>' );
				    			 }}
				    	 for(j = 1; j <= list ; j++){
				     		$('#textbox'+[j]).val(ret[j-1]);
				     	    
				     	}
				     if(value > 5 && value <=8){
				 $('#inputs').removeClass('inputs').removeClass('inputsexpandmore').addClass('inputsexpand');
			 }
			 else if (value >7){
				 $('#inputs').removeClass('inputs').removeClass('inputsexpand').addClass('inputsexpandmore');
			 }
			 else{      $('#inputs').removeClass('inputsexpand').removeClass('inputsexpandmore').addClass('inputs');                  
			 } 
				    }     
			 });
	        }); 
			//=======================================================================================
			 var creatorstatus = ['Filename','Scoring','Contestants','Categories','Questions'];
			$('#statusbarcontestants').append('<tr></tr>');
			var table = $('#statusbarcontestants').children();
				for(j = 0; j < 5; j++){
					if(j==2){table.append('<td class = "progressbarmarked">' + (j+1) + '</td><td><img id= "dotarrow" src = "../images/dotarrow.png"></td>');
					$(".progressbarmarked").css("color" , "Black");
					}
					else if(j==4){table.append('<td>' + (j+1) + '</td>');}	
				else table.append('<td>' + (j+1) + '</td><td><img id= "dotarrow" src = "../images/dotarrow.png"></td>');
			   }
			$('#statusbarcontestants').append('<tr></tr>');
				for(j = 0; j < 5; j++){
					if(j==2){table.append('<td class = "progressbarmarkedbelow">' + creatorstatus[j] + '</td><td>&nbsp;</td>');$(".progressbarmarkedbelow").css("color" , "Black");}
					else table.append('<td>' + creatorstatus[j] + '</td><td>&nbsp;</td>');
				 }

				 var filepattern = /^[a-zA-Z0-9_ ]+$/;
					$('#savegame,#nextbuttons').on('click', function(e){
				    $('input[type="text"]').each(function(){
					if(!(filepattern.test(this.value))&& ($.trim($(this).val()) == '')) {
						  e.preventDefault();
						 $('#textalertmessage').removeClass('hiddenmessages');
						 $('#textalertmessage').addClass('showmessages');
				
						 $('.textboxes').on('keypress',function(e){
						 $('#textalertmessage').removeClass('showmessages');
						 $('#textalertmessage').addClass('hiddenmessages');
						 });
					
					}
					
					else
					{ 
						$('#textalertmessage').removeClass('showmessages');
						 $('#textalertmessage').addClass('hiddenmessages');
					}
					
					}); 
				
					});
 /* for other buttons  and "main menu"----------------------*/
			 
				$('#previewgame').on('click', function(e){
					 $('#areyousure').removeClass('hidealertbox');
					 $('#areyousure').addClass('showalertbox');
				});  
				
				$('#backbuttons').on('click', function(e){
					 location.href = 'scoringoptions.php?name='+ $_GET['name']+'&gamename='+ $_GET['gamename'];
				});  
				
				
				
				$('#yesbutton').on('click', function(e){
					 location.href = 'openingmenu.php?name='+ $_GET['name'];
				});
				
				$('#nobutton').on('click', function(e){
					$('#areyousure').removeClass('showalertbox');
					 $('#areyousure').addClass('hidealertbox');
				});
				
			
				/*---------------------------------------------------------------------------*/		 
			
				
});