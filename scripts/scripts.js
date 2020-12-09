$(document).ready(function(){
	$(".collapsefunction").click(function(){
		$(".events").toggleClass("collapsed"); 
		$(".eventschat").toggleClass("collapsed"); 
	});
});

$(document).ready(function(){
	$("#list a").click(function(){
		$(".events").toggleClass("collapsed"); 
		$(".eventschat").toggleClass("collapsed"); 
	});
});

function populatePubList(){
	console.log("hey"); 
	var xhttp = new XMLHttpRequest(); 
	var url = "http://maps.googleapis.com/maps/api/place/textsearch/xml?query=pubs+in+Dublin+24&key=AIzaSyAUzBG6_XlJi4ijq_hS3rg0A8vD3djUowE";
	
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = JSON.parse(this.responseText); 
			console.log(response); 
			console.log("hey"); 
		}
	}
	
	xhttp.open("GET", url, true); 
	xhttp.send(); 
	
	
}

function displayPubs(){
	var map = document.getElementById("messagedisplay"); 
	
	var request = {
		query: "Bars in Dublin 1",
		fields: ["name"],
	};
	
	var service = new google.maps.places.PlacesService(map); 
	service.textSearch(request, callback);
}

function callback(results, status) {
	var txt = ""; 
	if(status == google.maps.places.PlacesServiceStatus.OK){
		console.log(results);
		console.log(results[0].name); 
		for(var i=0; i<results.length; i++){
		txt = txt + '<a class= "list-group-item-action align-items-start nopadding collapsefunction">'
		txt = txt + '<div class = "col-md-12 eventdisplay nopadding d-flex w-100 justify-content-between collapsefunction" id="eventdesc" value= "' + results[i].name + '">'
		txt = txt + "<p>" +  results[i].name + "</p>" + '<br>'
		txt = txt + "<p>" + results[i].formatted_address + "</p>";
		txt = txt +  '</div> </a>' 
	///	document.getElementById("eventlist").innerHTML = txt; 
		console.log(txt); 
		}
		
		document.getElementById("eventlist").innerHTML = txt;
		
		
		

	}
}
