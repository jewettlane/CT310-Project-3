
$(document).ready(function () {

    
    //master status
    var attMasterList = $.ajax({
        dataType: "json",
        url: "/~ct310/yr2018sp/master.json",
        type: 'POST',
        cache: false,
    });
    
   

    attMasterList.then(function (data) {
        
        for (var i = 0; i < data.length; i++) {
         var atteid =  data[i].eid; 
         var eidStatus =   $.ajax({
                        url: "/~" + atteid + "/ct310/index.php/federation/status",
                        dataType: "json",
                       
                        cache: false,
                      success: gettingStatus(atteid),
                     
            
                    })
           
		}

    });

    function gettingStatus(atteid){
		return function(responsedata){

   if (responsedata.status === "open"){

      var attList = $.ajax({
        dataType: "json",
        url: "/~" + atteid +"/ct310/index.php/federation/listing",
          cache: false,
          success: getList(atteid),
          });
       
                       
					
					}
						
				
			}
		
		
	}
	function getList(atteid){
		return function(listData){
			for (var i = 0; i < listData.length; i++){
              var attname = listData[i].name;
              var attID = listData[i].id;
              var attRow = "<tr id ='" + attID + atteid + "row" + "'>";
              var attNameData = "<td id ="+ attID + attname + atteid +">" + "<a  href = '" + "/~" + "sbhuju" + "/ct310/index.php/federation/viewAtt/"  + attID + "/"  + atteid + "/" + "' "  + ">" + atteid + " " + attID + " " + attname + "</a>"+"</td>";
           
            
            $('#otherAttractions').append(attRow);
            $("#" + attID + atteid + "row" ).append(attNameData);
              
            }

            
					
				
					
				
			}
		
		
	}


  

});
