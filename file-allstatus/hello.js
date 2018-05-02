
$(document).ready(function () {

    
    //master status
    var masterList = $.ajax({
        dataType: "json",
        url: "/~ct310/yr2018sp/master.json",
        type: 'POST',
        cache: false,
    });
    
    masterList.then(function (data) {
        
        for (var i = 0; i < data.length; i++) {
            
            var team = "<td>" + data[i].team + "</td>";
            var shortName = "<td>" + data[i].nameShort + "</td>";
            var longName = "<td>" + data[i].nameLong + "</td>";
            var pageStatus = "<td id ="+ data[i].eid+ "pageStatus"+">" + "</td>";
            var row = "<tr id =" + data[i].eid + ">";
            
            $('#allAttractions').append(row);
            $("#" + data[i].eid).append(team, shortName, longName,pageStatus);
        }

    });

    masterList.then(function (data) {
        
        for (var i = 0; i < data.length; i++) {
         var eid =  data[i].eid; 
         var eidStatus =   $.ajax({
                        url: "/~" + eid + "/ct310/index.php/federation/status",
                        dataType: "json",
                       
                        cache: false,
                      success: gettingStatus(eid),
                      error: failStatus(eid),
            
                    })
           
		}

    })

    function gettingStatus(eid){
		return function(responsedata){

            
					
					if (responsedata.status === "open"){
					$("#" + eid + "pageStatus" ).html(responsedata.status);
					$("#" + eid + "pageStatus" ).addClass("green");
					}
					
					else if (responsedata.status === "closed"){
					$("#" + eid + "pageStatus" ).html(responsedata.status);
					$("#" + eid + "pageStatus" ).addClass("red");
                    }
                    
                    else if (responsedata.status !== "open" && responsedata.status !== "closed") {
                        $("#" + eid + "pageStatus" ).html("ERROR");
                        $("#" + eid + "pageStatus" ).addClass("yellow");
                        }
					
				
			}
		
		
	}
	
	function failStatus(eid){
		return function(responsedata){
					
					
					$("#" + eid + "pageStatus" ).html("ERROR");
					$("#" + eid + "pageStatus" ).addClass("yellow");
                    
					
				
			}
		
		
	}



});
