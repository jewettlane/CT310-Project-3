
$(document).ready(function () {

    
    //master status
    var cartMasterList = $.ajax({
        dataType: "json",
        url: "/~ct310/yr2018sp/master.json",
        type: 'POST',
        cache: false,
    });

	cartMasterList.then(function (data) {
        
        for (var i = 0; i < data.length; i++) {
         var name =  data[i].nameShort; 
		 var eid = data[i].eid;
         var eidStatus =   $.ajax({
                        url: "/~" + eid + "/ct310/index.php/federation/status",
                        dataType: "json",
                       
                        cache: false,
                        success: gettingOption(name),
                     
            
                    })

		}

    });

    function gettingOption(name){
		return function(responsedata){

   if (responsedata.status === "open"){
      var option = "<option id = "+name+">"+name+"</option>";
	  $('#brochure').append(option);
                       		
					}
						
				
			}
		
		
	}

  

});
