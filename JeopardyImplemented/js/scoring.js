/**
 * <td>1</td><td><img id= "dotarrow" src = "images/dotarrow.png"></td><td>2</td><td><img id= "dotarrow" src = "images/dotarrow.png"><td>3</td><td><img id= "dotarrow" src = "images/dotarrow.png"><td>4</td><td><img id= "dotarrow" src = "images/dotarrow.png"><td>5</td></tr>
<tr><td>Filename</td><td>&nbsp;</td><td>Scoring</td><td>&nbsp;</td><td>Contestants</td><td>&nbsp;</td><td>Categories</td><td>&nbsp;</td><td>Questions</td>

 */

$(function (){ 
	if($('#radiobutton1').is(':checked')){
		$('select[name =increment]').prop("disabled", true); 
		$('select[name =startingvalue]').prop("disabled", true); 
	}
	
	 var creatorstatus = ['Filename','Scoring','Contestants','Categories','Questions'];
		$('#statusbarscoring').append('<tr></tr>');
		var table = $('#statusbarscoring').children();
			for(j = 0; j < 5; j++){
				if(j==1){table.append('<td class = "progressbarmarked">' + (j+1) + '</td><td><img id= "dotarrow" src = "../images/dotarrow.png"></td>');
				$(".progressbarmarked").css("color" , "Black");
				}
				else if(j==4){table.append('<td>' + (j+1) + '</td>');}	
			else table.append('<td>' + (j+1) + '</td><td><img id= "dotarrow" src = "../images/dotarrow.png"></td>');
		   }
		$('#statusbarscoring').append('<tr></tr>');
			for(j = 0; j < 5; j++){
				if(j==1){table.append('<td class = "progressbarmarkedbelow">' + creatorstatus[j] + '</td><td>&nbsp;</td>');$(".progressbarmarkedbelow").css("color" , "Black");}
				else table.append('<td>' + creatorstatus[j] + '</td><td>&nbsp;</td>');
			 }

		
		//for preloading stored data--======================================================================
		
		var data = $('#hiddendata').text();
		var ret = data.split(",");
		var init = ret[0];
		var incr = ret[1];
		console.log( init + incr);
		if(init == 100 && incr == 100){
			$('#radiobutton1').attr('checked', 'checked');
			$('select[name =increment]').prop("disabled", true); 
			$('select[name =startingvalue]').prop("disabled", true);
			$('#radiobuttoncontainer1').removeClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer1').addClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').addClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer3').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer3').addClass('radiobuttonsdeselected')
			if($('#radiobutton2').is(':checked')){
				$('label[for =increment]').removeClass('optionsdeselected') 
				$('label[for =increment]').addClass('optionsselected')
				$('label[for =startingvalue]').removeClass('optionsdeselected')
				$('label[for =startingvalue]').addClass('optionsselected')
			}else{
				$('label[for =increment]').removeClass('optionsselected') 
				$('label[for =increment]').addClass('optionsdeselected')
				$('label[for =startingvalue]').removeClass('optionsselected')
				$('label[for =startingvalue]').addClass('optionsdeselected')
				}
			   
		}else if(init== 0 && incr ==0){
			$('#radiobutton3').attr('checked', 'checked');
			$('select[name =increment]').prop("disabled", true); 
			$('select[name =startingvalue]').prop("disabled", true);
			$('#radiobuttoncontainer3').removeClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer3').addClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').addClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer1').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer1').addClass('radiobuttonsdeselected')
			if($('#radiobutton2').is(':checked')){
				$('label[for =increment]').removeClass('optionsdeselected') 
				$('label[for =increment]').addClass('optionsselected')
				$('label[for =startingvalue]').removeClass('optionsdeselected')
				$('label[for =startingvalue]').addClass('optionsselected')
			}else{
				$('label[for =increment]').removeClass('optionsselected') 
				$('label[for =increment]').addClass('optionsdeselected')
				$('label[for =startingvalue]').removeClass('optionsselected')
				$('label[for =startingvalue]').addClass('optionsdeselected')
				}
		}else {$('#radiobutton2').attr('checked', 'checked');
		$('#radiobutton2').attr('checked', 'checked');
		$('select[name = startingvalue]').val(init);
		$('select[name = increment]').val(incr);
		$('select[name =increment]').prop("disabled", false); 
		$('select[name =startingvalue]').prop("disabled", false); 
		
		$('#radiobuttoncontainer2').removeClass('radiobuttonsdeselected')
		$('#radiobuttoncontainer2').addClass('radiobuttonsselected')
		$('#radiobuttoncontainer1').removeClass('radiobuttonsselected')
		$('#radiobuttoncontainer1').addClass('radiobuttonsdeselected')
		$('#radiobuttoncontainer3').removeClass('radiobuttonsselected')
		$('#radiobuttoncontainer3').addClass('radiobuttonsdeselected')
		if($('#radiobutton2').is(':checked')){
			$('label[for =increment]').removeClass('optionsdeselected') 
			$('label[for =increment]').addClass('optionsselected')
			$('label[for =startingvalue]').removeClass('optionsdeselected')
			$('label[for =startingvalue]').addClass('optionsselected')
		}else{
			$('label[for =increment]').removeClass('optionsselected') 
			$('label[for =increment]').addClass('optionsdeselected')
			$('label[for =startingvalue]').removeClass('optionsselected')
			$('label[for =startingvalue]').addClass('optionsdeselected')
			}
		}
		//=====================================================================================================
			
	//for disabling drop down buttons when radio is not selected
		$('#radiobutton1').on('change',function(e){
			$('select[name =increment]').prop("disabled", true); 
			$('select[name =startingvalue]').prop("disabled", true);
			$('#radiobuttoncontainer1').removeClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer1').addClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').addClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer3').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer3').addClass('radiobuttonsdeselected')
			if($('#radiobutton2').is(':checked')){
				$('label[for =increment]').removeClass('optionsdeselected') 
				$('label[for =increment]').addClass('optionsselected')
				$('label[for =startingvalue]').removeClass('optionsdeselected')
				$('label[for =startingvalue]').addClass('optionsselected')
			}else{
				$('label[for =increment]').removeClass('optionsselected') 
				$('label[for =increment]').addClass('optionsdeselected')
				$('label[for =startingvalue]').removeClass('optionsselected')
				$('label[for =startingvalue]').addClass('optionsdeselected')
				}
			   
			});
		
		$('#radiobutton3').on('change',function(e){
			  
			$('select[name =increment]').prop("disabled", true); 
			$('select[name =startingvalue]').prop("disabled", true);
			$('#radiobuttoncontainer3').removeClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer3').addClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer2').addClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer1').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer1').addClass('radiobuttonsdeselected')
			if($('#radiobutton2').is(':checked')){
				$('label[for =increment]').removeClass('optionsdeselected') 
				$('label[for =increment]').addClass('optionsselected')
				$('label[for =startingvalue]').removeClass('optionsdeselected')
				$('label[for =startingvalue]').addClass('optionsselected')
			}else{
				$('label[for =increment]').removeClass('optionsselected') 
				$('label[for =increment]').addClass('optionsdeselected')
				$('label[for =startingvalue]').removeClass('optionsselected')
				$('label[for =startingvalue]').addClass('optionsdeselected')
				}
			
			});
		
		$('#radiobutton2').on('change',function(e){
			$('select[name =increment]').prop("disabled", false); 
			$('select[name =startingvalue]').prop("disabled", false); 
			
			$('#radiobuttoncontainer2').removeClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer2').addClass('radiobuttonsselected')
			$('#radiobuttoncontainer1').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer1').addClass('radiobuttonsdeselected')
			$('#radiobuttoncontainer3').removeClass('radiobuttonsselected')
			$('#radiobuttoncontainer3').addClass('radiobuttonsdeselected')
			if($('#radiobutton2').is(':checked')){
				$('label[for =increment]').removeClass('optionsdeselected') 
				$('label[for =increment]').addClass('optionsselected')
				$('label[for =startingvalue]').removeClass('optionsdeselected')
				$('label[for =startingvalue]').addClass('optionsselected')
			}else{
				$('label[for =increment]').removeClass('optionsselected') 
				$('label[for =increment]').addClass('optionsdeselected')
				$('label[for =startingvalue]').removeClass('optionsselected')
				$('label[for =startingvalue]').addClass('optionsdeselected')
				}
			});	
		
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
});