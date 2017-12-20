var successCallBack = function(data) {
	alert(data)
}
$(document).ready(function() {
	$("#add-offer-tabs").tabs();
    $('#add-offer-tabs').tabs('disable');
	var loader = $('#signupFormLaoder');
	loader.hide();
	$().ajaxStart(function() {

		loader.show();
	}).ajaxStop(function() {

		loader.hide();
	}).ajaxError(function(a, b, e) {
		throw e;
	});
});

var nextTab = function(self,preview) 
{
	if(preview)
	{
		$.ajax(
				{
					url:$(self.form).attr('action'),
					data:$(self.form).serialize(),
					type:'post',
					context:self.form,
					complete:function()
					{
						
					},
					beforeSend:function()
					{
						$('#add-offer-tabs').tabs('disable');
                        $('label',this)
						.removeClass('error')
						.attr('title','');
					},
					dataType:'json',
					success:function(jsonData)
					{
					
					if(jsonData.status == 'OK')
					{
						$('#view-port').html(jsonData.html);
						$('#add-offer-tabs').tabs('enable');
						var currentIndex = $('#add-offer-tabs').tabs('option', 'active');
						if (currentIndex < 2) 
						{
							$('#add-offer-tabs').tabs('option', 'active', currentIndex + 1);
						}
					}
					if(jsonData.status == 'ERROR')
					{
						var currentIndex = $('#add-offer-tabs').tabs('option', 'active');
						if (currentIndex > 0) 
						{
							$('#add-offer-tabs').tabs('option', 'active', currentIndex - 1);
						}
						console.log(jsonData);
						for (error in jsonData.errors)
						{
							var terror = jsonData.errors[error];
							
							$('label[for="company_'+error+'"]').addClass("error").attr('title',terror);
							$('#company_'+error).addClass("error");
						}
					}
					}
				});
		return false;
	}
	else
	{
		var currentIndex = $('#add-offer-tabs').tabs('option', 'active');
		if (currentIndex < 2) {
			$('#add-offer-tabs').tabs('option', 'active', currentIndex + 1);
		}
	}
}
var prevTab = function() {
	var currentIndex = $('#add-offer-tabs').tabs('option', 'active');

	if (currentIndex > 0) {
		$('#add-offer-tabs').tabs('option', 'active', currentIndex - 1);
	}
};

var loadSubCategory = function(self) {

	$.ajax({
		url : $(self.form).attr('action'),
		data : {
			category : self.value,
			"method" : "loadSubCategory"
		},
		context : $('#sub_servicescategory'),
		beforeSend : function() {
		  $('#sub_servicescategory').hide();
		  $('#uniform-sub_servicescategory').css('visibility','hidden');		  
			$('option:not(:first)', this).remove();
		},
		dataType : 'json',
		success : function(jsonData) {

			for ( var i in jsonData) {
				$(this).append($("<option>", {
					value : jsonData[i].id,
					text : jsonData[i].name
				}));
                $('#uniform-sub_servicescategory').css('visibility','visible');                
                $('#sub_servicescategory').show();
			}

		}           
                
	})
}
