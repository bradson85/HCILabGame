/**
 * 
 */
 
 var myTimer;
 var amount;

$(function (){ 
	var id;
	var teams;
	var currscore;
	round =$('#roundname').html();
	var gamename= $('#gamename').html();
	
//get url stuff
	
	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
	    function decode(s) {
	        return decodeURIComponent(s.split("+").join(" "));
	    }

	    $_GET[decode(arguments[1])] = decode(arguments[2]);
	});
	$.post("scoreboard.php",
  		    {
  		  answered: 0,
  		  teamnumber: $('#teamnumber').html(),
  		  type: 'load',
          scoreupdate: 0
  		    },
  		    function(data,status){
  		    	console.log(data);
  		    	$('#score').html(data)	;	
  		    			
  		    });
	
	$( document ).ready(function() {
		
		$.post("inc-gameplay.php?loadtype=first",
		        {
		          gamename: gamename,
		          round: $('#roundname').html()
		       
		        },
		        function(result){
		        	 $("#boardcontainer").append(result).find('#gameboard').show();
		        	

	    });
		
		
		
	});
	
	$("html").css("background", 'black');
	
	
	$('#boardcontainer').on('click', 'td', function (){
		   var checkEmpty = 0;
		   var count =0;
		   var tds = $('#gameboard').children('tbody').children('tr').children('td').length; // count of cells
		   checkEmpty ++;
		   if(checkEmpty == tds ){
	    		
	    		nextRound();
	    		
	    	
	    	}
		
		if (!($(this).html() == '&nbsp;')){  
		id = $(this).attr('id');
           console.log(id);
           amount = $(this).html();
          
		$('#cluebox').removeClass("hidden");
       $('#cluebox').addClass("show");
       $.post("inc-gameplay.php",
		        {
		          typeclue: "clue",
		          teamanswer: "none",
		          cellid:   id,
		          round:    $('#roundname').html(),
		          gamename: $('#gamename').html()
		        },
		        function(result){
		        	$("#clue").find('tr:nth-child(1)').html("Press the correct key to answer");
		            $("#clue").find('tr:nth-child(2)').html(result);

	            	 var c = 15;
		             myTimer = setInterval(myCounter, 1000)
		            
		            
     function myCounter() {
        $("#countdown").html (--c);
         if(c <= 0){
        	 round ='Jeopardy'
         	clearInterval(myTimer);
         	console.log(round);
            $("#clue").find('tr:nth-child(1)').html("Press Any Key To Continue");
            $.post("inc-gameplay.php",
    		        {
    		          typeclue: "solution",
    		          cellid:   id,
    		          round:    $('#roundname').html(),
    		          gamename: $('#gamename').html()
    		        },
    		        function(result){
    		        	c=15;
    		            $("#clue").find('tr:nth-child(2)').html(result);
    		            $("#clue").find('tr:nth-child(3)').html("<input type = \"button\" class = 'buttons' id = \"continue\" Value = \"Continue\">");
    		            $('#continue').click(function() {
    		           	 $('#cluebox').removeClass("show");
	      		    	  $('#cluebox').addClass("hidden");
	      		    	 finishquestion();
    		            });
    		        }); 
         
         }
       
         $('body').one( "keypress", function(e){
   		  clearInterval(myTimer);
   		console.log(typeof e.keyCode);
   		  var pressed = e.keyCode;
 //==========================which key is pressed handle for how may teams playing=================
   		var keys =$('#teamnumber').html();
   		switch (keys){
   		case '3':
   		   if(e.keyCode == 49){
               pressed = 1; 
               solution(pressed);
           }
           else if(e.keyCode == 53){
               pressed = 2;
               solution(pressed);
           }
           else if(e.keyCode == 56){
               pressed = 3;
               solution(pressed);
           }
   		
   		case '4':

   		   if(e.keyCode == 49){
               pressed = 1; 
               solution(pressed);
           }
           else if(e.keyCode == 53){
               pressed = 2;
               solution(pressed);
           }
           else if(e.keyCode == 56){
               pressed = 3;
               solution(pressed);
           }
	           else if(e.keyCode == 65){
	               pressed = 4;
	               solution(pressed);
	           } 
   	   		break;
   		case '5':
   		   if(e.keyCode == 49){
               pressed = 1; 
               solution(pressed);
           }
           else if(e.keyCode == 53){
               pressed = 2;
               solution(pressed);
           }
           else if(e.keyCode == 56){
               pressed = 3;
               solution(pressed);
           }
          else if(e.keyCode == 65){
              pressed = 4;
              solution(pressed);
          } else if(e.keyCode == 71){
              pressed = 5;
              solution(pressed);
          }   			
   	   		break;
   		case '6':
   		   if(e.keyCode == 49){
               pressed = 1; 
               solution(pressed);
           }
           else if(e.keyCode == 53){
               pressed = 2;
               solution(pressed);
           }
           else if(e.keyCode == 56){
               pressed = 3;
               solution(pressed);
           }
           else if(e.keyCode == 65){
               pressed = 4;
               solution(pressed);
           } else if(e.keyCode == 71){
               pressed = 5;
               solution(pressed);
           } else if(e.keyCode == 76){
               pressed = 6;
               solution(pressed);
           }
   	   		break;
   		case '7':

   		   if(e.keyCode == 49){
               pressed = 1; 
               solution(pressed);
           }
           else if(e.keyCode == 53){
               pressed = 2;
               solution(pressed);
           }
           else if(e.keyCode == 56){
               pressed = 3;
               solution(pressed);
           }
           else if(e.keyCode == 65){
               pressed = 4;
               solution(pressed);
           } else if(e.keyCode == 71){
               pressed = 5;
               solution(pressed);
           } else if(e.keyCode == 76){
               pressed = 6;
               solution(pressed);
           }
	           else if(e.keyCode == 90){
	            pressed = 7;
	            solution(pressed);
	           }
   	   		break;
   		case '8':

   		   if(e.keyCode == 49){
               pressed = 1; 
               solution(pressed);
           }
           else if(e.keyCode == 53){
               pressed = 2;
               solution(pressed);
           }
           else if(e.keyCode == 56){
               pressed = 3;
               solution(pressed);
           }
           else if(e.keyCode == 65){
               pressed = 4;
               solution(pressed);
           } else if(e.keyCode == 71){
               pressed = 5;
               solution(pressed);
           } else if(e.keyCode == 76){
               pressed = 6;
               solution(pressed);
           }
	           else if(e.keyCode == 90){
	            pressed = 7;
	            solution(pressed);
	           } else if(e.keyCode == 32){
	               pressed = 8;
	               solution(pressed);
	           } 
   	   		break;
   		case '9':

   		   if(e.keyCode == 49){
               pressed = 1; 
               solution(pressed);
           }
           else if(e.keyCode == 53){
               pressed = 2;
               solution(pressed);
           }
           else if(e.keyCode == 56){
               pressed = 3;
               solution(pressed);
           }
           else if(e.keyCode == 65){
               pressed = 4;
               solution(pressed);
           } else if(e.keyCode == 71){
               pressed = 5;
               solution(pressed);
           } else if(e.keyCode == 76){
               pressed = 6;
               solution(pressed);
           }
	           else if(e.keyCode == 90){
	            pressed = 7;
	            solution(pressed);
	           } else if(e.keyCode == 32){
	               pressed = 8;
	               solution(pressed);
	           } else if(e.keyCode == 190){
	               pressed = 9;
	               solution(pressed);
	           } 
   	   		break;
   	   		case '10':

   	   		   if(e.keyCode == 49){
   	               pressed = 1; 
   	               solution(pressed);
   	           }
   	           else if(e.keyCode == 53){
   	               pressed = 2;
   	               solution(pressed);
   	           }
   	           else if(e.keyCode == 56){
   	               pressed = 3;
   	               solution(pressed);
   	           }
   	           else if(e.keyCode == 65){
   	               pressed = 4;
   	               solution(pressed);
   	           } else if(e.keyCode == 71){
   	               pressed = 5;
   	               solution(pressed);
   	           } else if(e.keyCode == 76){
   	               pressed = 6;
   	               solution(pressed);
   	           }
   		           else if(e.keyCode == 90){
   		            pressed = 7;
   		            solution(pressed);
   		           } else if(e.keyCode == 32){
   		               pressed = 8;
   		               solution(pressed);
   		           } else if(e.keyCode == 190){
   		               pressed = 9;
   		               solution(pressed);
   		           }  else if(e.keyCode == 37){
              pressed = 10;
              solution(pressed);
          }
   	    		break;
   		}
   		
	         //========================================================================
	      
  });
         
         }
		        });   
	          
	   
	}
	}); 
	
    function solution(pressed){ 
         $("#clue").find('tr:nth-child(3)').html("<input type = \"button\" class = 'buttons' id = \"continue\" Value = \"See Answer\">");
	      $("#clue").find('tr:nth-child(1)').html( pressed + "&nbsp;You Buzzed In");
	     	c=15;
	     	round ='Jeopardy'
	      $('#continue').click(function() {
	    	 $.post("inc-gameplay.php",
      		        {
      		          typeclue: "solution",
      		          cellid:   id,
      		        round:    $('#roundname').html(),
  		          gamename: $('#gamename').html()
      		        
      		        },
      		        function(result){
      		        $("#clue").find('tr:nth-child(2)').html(result);
      		       $("#clue").find('tr:nth-child(3)').html("<input type = \"button\"  class = 'buttons' id = \"correct\" Value = \"Correct\"> <input type = \"button\" class = 'buttons' id = \"incorrect\"  Value = \"Incorrect\">" );
      		   	
      		      $('#correct').click(function() {
      		    	 $('#cluebox').removeClass("show");
	      		    	  $('#cluebox').addClass("hidden");
	      		    
      		    	 teams= getScoreBoardValues().length;
      		  	     currscore = getScoreBoardValues();
      		  	     var newScore=currscore[pressed];
      		  	  
      		  	 $.post("scoreboard.php",
      		  		    {
      		  		  answered: pressed,
      		  		  currscore: newScore,
      		  		 teamnumber: $('#teamnumber').html(),
      		  		  type: 'update',
      		         scoreupdate: amount
      		  		    },
      		  		    function(data,status){
      		  		    	console.log(data);
      		  		    $.post("scoreboard.php",
      	      		  		    {
      	      		  		  answered: pressed,
      	      		  		  currscore: newScore,
      	      		  		 teamnumber: $('#teamnumber').html(),
      	      		  		  type: 'read',
      	      		         scoreupdate: amount
      	      		  		    },
      	      		  		    function(data,status){
      	                               collect(data);
      	      		  		    });
      		  		    });
      		    });

        		    $('#incorrect').click(function() {
        		    	 $('#cluebox').removeClass("show");
	      		    	  $('#cluebox').addClass("hidden");
	      		    	 finishquestion();
        		      });
  	     
      		      
      		      
      		  		});

      		  		function collect(data){
      		  		 $("#score").html(data);
      		  	      finishquestion();
      		  		}

	      });
      }
    
    function getScoreBoardValues(){
    	 var scores = [];
        $("#score td").each(function() {
    	  var table = ($(this).html());
    	  var afterColon = table.substr(table.indexOf(":") + 1); 
    	   scores.push(afterColon);
    	
    	});
    return scores;
    }
    
    function finishquestion(){
    	$.post("inc-gameplay.php",
    		        {
    		          typeclue: "finished",
    		          cellid:   id,
    		          round:    $('#roundname').html(),
    		          gamename: $('#gamename').html()
    		        
    		        },
    		        function(result){  
    		        	
    		    		  location.reload(true);

    		    	    
    		        });
    	
    }
    
    
    function nextRound(){
    	var value =$('#roundname').html();
    	if (value == 'Jeopardy'){
    		roundnumber = 1
    	}else if (value == 'Double Jeopardy'){
    		roundnumber = 2
    	}else roundnumber = 3
    	
    	location.href="roundchange.php?name="+$_GET['name'] +"&round="+roundnumber +"&teamnumber="+$('#teamnumber').html()+"&gamename=" +$('#gamename').html();
    	
    }
    //=================================================buttons at bottom=================
    $('#saveandexitbuttons').on('click', function(e){
    	$('#areyousure').addClass('showalertbox');
		 $('#areyousure').removeClass('hidealertbox');
	});
    
    $('#nobutton').on('click', function(e){
		$('#areyousure').removeClass('showalertbox');
		 $('#areyousure').addClass('hidealertbox');
			
	});
    
    $('#returnmainbuttons').on('click', function(e){
    	$('#areyousure').addClass('showalertbox');
		 $('#areyousure').removeClass('hidealertbox');
	});
    

	$('#yesbutton').on('click', function(e){
		$.post("inc-gameplay.php",
  		        {
  		          typeclue: "done",
  		          cellid:   id,
  		          round:    $('#roundname').html(),
		          gamename: $('#gamename').html()
  		        
  		        },
  		        function(result){
		           
  		      });
		
		location.href='openingmenu.php?name='+ $_GET['name'];
	});
	
	});
		        	     


