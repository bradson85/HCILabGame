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
var points;

//get url stuff

var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});

$(function (){ 
	//-======================================================================
	
	 var name =$_GET['gamename'];
     var round =$("#round").html();
     $.post("loadCategories.php",
	        {
	          gamename: name,
	          jeopardy: round
	        },
	        function(result){
	            catdata = result;
	        	cateach = catdata.split(",");
	         	catlist = cateach.length -1;	
	
	        });
	
	
	var index = 0;
	console.log(index);
	if (index == 0){
		everything(index);
		index ++;
	}else if(index >= catlist) {
		
	}else{ 
		$('#nextbuttons').on('click',  function (e){
		everything(index);    
	});
	}
	function everything(index){
		console.log(index);
	   var data;
		var ret;
		var list = 0;
          var v=$("#catround").html();
         var category = index;
		
		
		// load page data stuff
		//=======================================================================================	
		 var name =$_GET['gamename'];
	        var round =$("#round").html();
	        $.post("loadCategories.php",
		        {
		          gamename: name,
		          jeopardy: round
		        },
		        function(result){
		            catdata = result;
		        	cateach = catdata.split(",");
		         	catlist = cateach.length -1;	// because it counts 1 after comma blank
		 
		        	
		            $('#subtitle').html("Enter " + cateach[category] + " Clues:")
		             $('#nextbuttons').val( cateach[category +1] + " Clues:")
		             
		          $.post("loadClues.php",
		        {
		          category: cateach[category],
		          jeopardy: round
		        },
		        function(info){
		        	   data = info;
		        	   console.log(data);
			        	first = data.split("/");
			         	firstlist = first.length -1;	// because it counts 1 after comma blank
			        	cluelist = first[0].split(',');
			        	sollist = first[1].split(',');
			        	list = cluelist.length-1;
		   
		             if (list > 4 && list <=6){
						 $('#inputs').removeClass('questionssmall').removeClass('questionslarge').addClass('questionsmedium');
					 }
					 else if (list > 7){
						 $('#inputs').removeClass('questionssmall').removeClass('questionsmedium').addClass('questionslarge');
					 }
					 else{      $('#inputs').removeClass('questionsmedium').removeClass('questionslarge').addClass('questionssmall');                  
					 } 
					
						         
					
		        	 
	        if (list <= 3){
	    		 value =3;
	    	 }else if (list >= 10){
	    		 value =10;
	    	 }
	    	 else value=list; 
	    	 for (i=1; i <= value; i++){
                     $('#boxentrycontainer').append('<label for="textboxes">Clue ' + i +' Name: &nbsp;</label>'
	     				 + '<input type = "text" id = textbox'+i+' class= "textboxes"'
	     				 + 'placeholder= "Enter Clue ' + i +' Name" maxlength="100" name = "clue'+ i +'"><br>'
                      + '<label for="textboxes">Solution ' + i +' Name: &nbsp;</label>'
    	     				 + '<input type = "text" id = stextbox'+i+' class= "textboxes"'
    	     				 + 'placeholder= "Enter Solution ' + i +' Name" maxlength="100" name = "solution'+ i +'"> <br>' );
}
	    	 
	    	 for(j = 1; j <= list ; j++){
	    		 
	    			$('#textbox'+[j]).val(cluelist[j-1]);
	    			$('#stextbox'+[j]).val(sollist[j-1]);
	    	    
	    	}
	    	 console.log('here');
	    	 
	    	 $('#nextbuttons').on('click',  function (e){
	    		
           	  var clues = [];
           	  var solutions=[];
           	  	for (i=1; i <= catlist; i++){
           	        clues[i-1] = $('#textbox'+[i]).val();
           	  		solutions[i-1]=$('#stextbox'+[i]).val();
          
         	  
                 }  
           	  nextCategory(clues, solutions, cateach[category],$("#round").html(),'nextbutton',category, 1 ,catlist );
             });
	    	 
	    	
	    	
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
					    	 for (i=1; i < (value +1) ; i++){
					    		 if( i == 10){
					    			  $('#boxentrycontainer').append('<label for="textboxes">Clue ' + i +' Name: &nbsp;</label>'
					 	     				 + '<input type = "text" id = textbox'+i+' class= "textboxes"'
					 	     				 + 'placeholder= "Enter Clue ' + i +' Name" maxlength="100" name = "clue'+ i +'"><br>'
					                       + '<label for="textboxes">Solution ' + i +' Name: &nbsp;</label>'
					     	     				 + '<input type = "text" id = stextbox'+i+' class= "textboxes"'
					     	     				 + 'placeholder= "Enter Solution ' + i +' Name" maxlength="100" name = "solution'+ i +'"> <br>' );
					    		 }
					    		 else {	  $('#boxentrycontainer').append('<label for="textboxes">Clue  ' + i +' Name: &nbsp;</label>'
					     				 + '<input type = "text" id = textbox'+i+' class= "textboxes"'
					     				 + 'placeholder= "Enter Clue ' + i +' Name" maxlength="100" name = "clue'+ i +'"><br>'
				                      + '<label for="textboxes">Solution ' + i +' Name: &nbsp;</label>'
				    	     				 + '<input type = "text" id = stextbox'+i+' class= "textboxes"'
				    	     				 + 'placeholder= "Enter Solution  ' + i +' Name" maxlength="100" name = "solution'+ i +'"> <br>' );
					    			 }}
					    	 for(j = 1; j <= list ; j++){

					    			$('#textbox'+[j]).val(cluelist[j-1]);
					    			$('#stextbox'+[j]).val(sollist[j-1]);
					    
					     	}
					    	 
					    	  if (value > 3 && value <=6){
									 $('#inputs').removeClass('questionssmall').removeClass('questionslarge').addClass('questionsmedium');
								 }
								 else if (value >= 7){
									 $('#inputs').removeClass('questionssmall').removeClass('questionsmedium').addClass('questionslarge');
								 }
								 else{    $('#inputs').removeClass('questionsmedium').removeClass('questionslarge').addClass('questionssmall');                  
								 } 
					    }     
				 });
		        });     
	});
				//=======================================================================================
			 
			 var creatorstatus = ['Filename','Scoring','Contestants','Categories','Questions'];
				$('#statusbarcategories').append('<tr></tr>');
				var table = $('#statusbarcategories').children();
					for(j = 0; j < 5; j++){
						if(j==4){table.append('<td class = "progressbarmarked">' + (j+1) + '</td>');
						$(".progressbarmarked").css("color" , "Black");
						}
						
					else table.append('<td>' + (j+1) + '</td><td><img id= "dotarrow" src = "../images/dotarrow.png"></td>');
				   }
				$('#statusbarcategories').append('<tr></tr>');
					for(j = 0; j < 5; j++){
						if(j==4){table.append('<td class = "progressbarmarkedbelow">' + creatorstatus[j] + '</td><td>&nbsp;</td>');$(".progressbarmarkedbelow").css("color" , "Black");}
						else table.append('<td>' + creatorstatus[j] + '</td><td>&nbsp;</td>');
					 }

				
			
				
				
				 var filepattern =  /^[a-zA-Z0-9_ ]+$/;
					$('#savegame,#nextbuttons').on('click', function(e){
				    $('input[type="text"]').each(function(){
					if(!(filepattern.test(this.value))&& ($.trim($(this).val()) == '')) {
						  e.preventDefault();
						 $('#textalertmessage').removeClass('hiddenmessages');
						 $('#textalertmessage').addClass('showmessages');
				
						 $('.textboxes').on('keypress',function(e){
						 $('#textalertmessage').removeClass('showmessages');
						 $('#textalertmessage').addClass('hiddenmessages');
						 $('#notify').removeClass('showalertbox');
						 $('#notify').addClass('hidealertbox');
						 });
					
					}
					
					else
					{ 
						$('#textalertmessage').removeClass('showmessages');
						 $('#textalertmessage').addClass('hiddenmessages');
					}
					
					}); 
				
					});
					
			//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
					// most ajax funcions here
					
					
					
					
					
				function nextCategory (clues, solutions, currentCategory,round,buttonClicked,catindex, roundindex ,totalcategories){
					$.post("findScoring.php",
					        {
					          category: currentCategory
					          
					        },
					        function(data){
					   points = data;     	
					    point = points.split(",");
					 var catpoint =point[0]*roundindex + point[1]*index;
					 
					var index=catindex+1;
					$("#catround").html(index);
					$.post("saveclues.php",
							        {
							          category: currentCategory,
							          round: round,
							          pointValue : points,
							          numbercategories: totalcategories,
							          clue: clues,
							          solution: solutions
							          
							        },
							        function(data){
							        	
							       if(catindex< totalcategories ){
							    	   index+1;
							    	   $("textboxes").val("");
							       }
			        });
					       });
					
				}
		
				
			
					
					
	
			 /* for other buttons  and "main menu"----------------------*/
			 
				$('#previewgame').on('click', function(e){
					 $('#areyousure').removeClass('hidealertbox');
					 $('#areyousure').addClass('showalertbox');
				});  
				
				$('#backbuttons').on('click', function(e){
					 location.href = 'contestants.php?name='+ $_GET['name']+'&gamename='+ $_GET['gamename'];
				});  
				
				$('#backbuttons[value="Double Jeopardy"]').on('click', function(e){
					 location.href = 'DoubleJeopardycategories.php?name='+ $_GET['name']+'&gamename='+ $_GET['gamename'];
				});  
				$('#backbuttons[value="Single Jeopardy"]').on('click', function(e){
					 location.href = 'categories.php?name='+ $_GET['name']+'&gamename='+ $_GET['gamename'];
				});  
				
				
				$('#yesbutton').on('click', function(e){
					 location.href = 'openingmenu.php?name='+ $_GET['name'];
				});
				
				$('#continue').on('click', function(e){
					 location.href = 'DoubleJeopardycategories.php?name='+ $_GET['name']+'&gamename='+ $_GET['gamename'];
				});
				$('#continuefinal').on('click', function(e){
					 location.href = 'FinalJeopardycategories.php?name='+ $_GET['name']+'&gamename='+ $_GET['gamename'];
				});
				
				$('#nobutton').on('click', function(e){
					$('#areyousure').removeClass('showalertbox');
					 $('#areyousure').addClass('hidealertbox');
					 $('#notify').removeClass('showalertbox');
					 $('#notify').addClass('hidealertbox');
				});

	}		
				/*---------------------------------------------------------------------------*/		 
});