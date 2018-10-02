/**
 * 
 */

 $( function() {
	 
	 $('#savegame,#nextbuttons').click(function(e){
		 e.preventDefault();
		 var idClicked = e.target.id;
		 $('#buttonclicked').val(idClicked);
		 var filepattern = /^[a-zA-Z0-9_ ]*$/;
	     var isValid = 1; // will start at one
	     if ($("input:radio[name=scoring]").is(":checked")) {
	        
	    	 $('#savebarcontainer').removeClass('overlaybarshide');
    		 $('#savebarcontainer').addClass('overlaybarsshow');
            isValid = 1;
            console.log(isValid + " radio");
	     }
	 
	     
		 $(".textboxes,#gamename").each(function() {
	           var qty =  $(this).val();
	           if( (!(filepattern.test(qty)) ) || qty == ""){
	        	   isValid = isValid * 0;  // if one of these is false will equal 0
	        	   console.log(isValid);
	        	    }
	           else{  
	          
	            isValid = isValid* 1;
	            console.log(isValid)
	            }
	     });

		 if(isValid == 1){
		 $(function() {
			 $('#savebarcontainer').removeClass('overlaybarshide');
    		 $('#savebarcontainer').addClass('overlaybarsshow');
	         var progressbar = $( "#progressbar" );
	         progressLabel = $( ".progress-label" );
	         $( "#progressbar" ).progressbar({
	             value: false,
	             change: function() {
	                progressLabel.text( 
	                   progressbar.progressbar( "value" ) + "%" );
	             },
	             complete: function() {
	                 progressLabel.text( "Saved!" );
	                 $('#savebarcontainer').addClass('overlaybarshide');
	        		 $('#savebarcontainer').removeClass('overlaybarsshow');
	              }
	         });
	         function progress() {
	             var val = progressbar.progressbar( "value" ) || 0;
	             progressbar.progressbar( "value", val + 9 );
	             if ( val < 99 ) {
	                setTimeout( progress, 100 );
	             }
	          }
	          setTimeout( progress, 1000 );
		 });
		 
		 }else {} // nothing
	       });
	
		
	
 });