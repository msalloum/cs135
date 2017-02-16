
var statesArr;

function getData() {
	$.getJSON('http://localhost:8000/data.json', function(data) {
       
        var output="<table class='table table-hover'>";
        output += "<tr> " +
        		  "<th> Name </th> " +
        		  "<th>Abbr</th>" + 
        		  "<th>Nickname</th>" +
        		  "<th>Capital</th>" +
        		  "<th>Pic</th> " + 
        		  "</tr> ";
        for (var i in data.states) {
            output+=  "<td>" + data.states[i].state + " </td> " + 
                      "<td>" + data.states[i].abbreviation + " </td> " + 
                      "<td>" + data.states[i].nickname + " </td> " + 
                      "<td>" + data.states[i].capital + " </td> " + 
                      "<td>" + "<img width='20%' height='20%' src='images/" + data.states[i].image + "'/>" + " </td> " + 
                      "</tr>" ;
        }

        output+="</table>";
        $("#placeholder").html(output );;
        statesArr = data;
    });

}

var buttonpressed = false;
function play() {

		buttonpressed = false;
		// Get random element
		var item = statesArr.states[Math.floor(Math.random()*statesArr.states.length)];
		
		var output="<div class='row' >";
	        output+="<img width='20%' height='20%' src='images/" + item.image + "'/>" ;
	        output+="</div>";
	       
	    $("#placeholder").html(output);
		$("#placeholder2").css("display", "none");
	    $("#placeholder").click(function() {
	    	$("#placeholder2").html(item.state + " is called the '" + item.nickname + "'")
	    	//			      .fadeIn(3000);
	    	 				  .slideDown("slow");
	        buttonpressed = true;

	    });
	    
	    customAlert(play);
			
}

function customAlert(callback) {

	console.log("timeout ... " );
	if(buttonpressed) {
		callback();
	
	} else{
		setTimeout(customAlert, 3000, callback);	
	}   
}

