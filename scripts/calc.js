// JavaScript Document
  $(document).ready(function() {
    $(".accordion").accordion( { active: 0 } );
  }); 


//alert(_LNG_TOTAL_PRICE);
//alert(_LNG_AMD);


  var currentTrensportTypes=1;
  
  var TRANSPORT_TYPES={};
  
  TRANSPORT_TYPES.PASSENGER=1;
  TRANSPORT_TYPES.TRUCK=2;
  TRANSPORT_TYPES.BUS=3;
  TRANSPORT_TYPES.MOTO=4;
  TRANSPORT_TYPES.OTHER=5;
  
  function calculateTotalSum( type )
  {
	  
	currentTrensportTypes=type;
	var useType=$("#type_of_use_"+type).val();
	var driverAgeAndExperience=$("#driver_age_experience_"+type).val();
	var motorPower=$("#motor_power_1").val();

	var coeficent=$("#coefficents_"+type).val();
	
//	var 
	
	if( type==TRANSPORT_TYPES.PASSENGER )
	{
	   
		var trailer = $(".trailer_1:checked").val();
		
		//var sendData="useType="+useType+"&driverInfo="+driverAgeAndExperience+"&motorPower="+motorPower+"&carType="+TRANSPORT_TYPES.PASSENGER+"&coef="+coeficent+"&trailer="+trailer;
		var sendData = {'useType':useType,'driverInfo':driverAgeAndExperience,'motorPower':motorPower,'coef':coeficent,'trailer':trailer,'carType':TRANSPORT_TYPES.PASSENGER}
		
		 //createLoader(  );
		 $.ajax({  
			 type: "POST",  
			 url: "/calculators/appaprice", 
             data: sendData,  
             dataType: "json",
			 success: function(data){
				 	$("#resultBlock_"+type).html(data + pox);  
                       
			 }  
		 });
	}
	if( type==TRANSPORT_TYPES.TRUCK )
	{
		var motorPowerT=$("#motor_power_2").val();

		var trailer = $(".trailer_2:checked").val();
	
		//var sendData="useType="+useType+"&driverInfo="+driverAgeAndExperience+"&motorPower="+motorPowerT+"&carType="+type+"&coef="+coeficent+"&trailer="+trailer;
		var sendData = {'useType':useType,'driverInfo':driverAgeAndExperience,'motorPower':motorPowerT,'coef':coeficent,'trailer':trailer,'carType':TRANSPORT_TYPES.TRUCK}
		 //createLoader(  );
		 $.ajax({  
		 type: "POST",  
		 url: "/calculators/appaprice",
         data: sendData,  
		 dataType: "json",  
		 success: function(data){
			 		$("#resultBlock_"+type).html(data + pox);   
		}  
		   
		});
	}
	if( type==TRANSPORT_TYPES.BUS )
	{		
		//var sendData="useType="+useType+"&driverInfo="+driverAgeAndExperience+"&carType="+type+"&coef="+coeficent;
		var sendData = {'useType':useType,'driverInfo':driverAgeAndExperience,'motorPower':motorPower,'coef':coeficent,'trailer':trailer,'carType':TRANSPORT_TYPES.BUS}
		 //createLoader(  );
		 $.ajax({  
		 type: "POST",  
		 url: "/calculators/appaprice",
         data: sendData,  
		 dataType: "json",    
		 success: function(data){
			 	$("#resultBlock_"+type).html(data + pox);   
		}  
		   
		});
	}
	if( type==TRANSPORT_TYPES.MOTO )
	{		
	//	var sendData="useType="+useType+"&driverInfo="+driverAgeAndExperience+"&carType="+type+"&coef="+coeficent;
		var sendData = {'useType':useType,'driverInfo':driverAgeAndExperience,'motorPower':motorPower,'coef':coeficent,'trailer':trailer,'carType':TRANSPORT_TYPES.MOTO}
		 //createLoader(  );
		 $.ajax({  
		 type: "POST",  
		 url: "/calculators/appaprice", 
         data: sendData,  
		 dataType: "json",    
		 success: function(data){
			 		$("#resultBlock_"+type).html(data + pox);
		}  
		   
		});
	}
	if( type==TRANSPORT_TYPES.OTHER )
	{		
		var trailer = $(".trailer_5:checked").val();
		//var sendData="useType="+useType+"&driverInfo="+driverAgeAndExperience+"&carType="+type;
		//var sendData={useType:useType,driverInfo:driverAgeAndExperience,carType:type, coef:coeficent ,   trailer:trailer  };
        var sendData = {'useType':useType,'driverInfo':driverAgeAndExperience,'motorPower':motorPower,'coef':coeficent,'trailer':trailer,'carType':TRANSPORT_TYPES.OTHER}
		 //createLoader(  );
		 $.ajax({  
		 type: "POST",  
		 url: "/calculators/appaprice",  
		 data: sendData,  
		 dataType: "json",   
		 success: function(data){
			 		$("#resultBlock_"+type).html(data + pox);  
		}  
		});
	}
	
  }
  
  function createLoader()
  {
	var loaderHTML="<img src=\"/img/loaders.gif\" alt=\"loading...\" />";
	$("#resultBlock_"+currentTrensportTypes).html( loaderHTML );
  }
  
  