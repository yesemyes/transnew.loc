// JavaScript Document

(function($) {
	$.fn.colorPicker = function() {
		var color_options = $('option', this);
		var vcount = 5;//Math.ceil(Math.sqrt(color_options.length));
		var hcount = 7;//Math.ceil(color_options.length / vcount);
		$(this).hide();
		var self = this;

		var holder = $("<div>", {
			id : $(self).attr('id') + '_cpicker'
		}).css({
			position : 'absolute',
			width : vcount * 17,
			height : hcount * 17,
			display : 'block',
			'background-color' : 'black',
			'border' : '1px solid #07a7e3',
            'z-index':'10'
		}).insertBefore(this).hide();
		$(color_options).each(function(u, i) {
			var selected = $(i).attr('selected');
			var selectedClass = selected ? 'selected' : 'non-selected';
			$("<div>", {
				title : $(i).text(),
				'data-value' : $(i).attr('value')
			}).css({
				width : 13,
				cursor : 'pointer',
				height : 13,
				float : 'left',
				'border' : '2px solid #fff',
				'background-color' : $(i).attr("hexcode")

			}).addClass('color-item').addClass(selectedClass).hover(function() {
				$(this).css({
					'border' : '2px solid red'
				});
			}, function() {
				if (!$(this).hasClass('selected')) {
					$(this).css({
						'border' : '2px solid #fff'
					});
				}
			}).appendTo(holder);

		});

		var viewPort = $("<div>", {
			title : '',
			id : $(self).attr('id') + 'view-port',
			'data-value' : 0
		}).css({
			width : 80,
			cursor : 'pointer',
			height : 28,
			float : 'left',
			/*'border' : '2px solid #fff',
			'background-color' : $('.selected', holder).css('background-color')*/

		}).click(function() {

			$('#' + $(self).attr('id') + '_cpicker').show();
		}).addClass('view-port').insertBefore(holder);

		$('.color-item').find('selected').css({
			'border' : '2px solid red'
		});
		$('.color-item').click(function() {
			$(self).val($(this).attr('data-value'));
			$('.color-item').removeClass('selected');
			$('.color-item').css({
				'border' : '2px solid #fff'
			});
			$(this).addClass('selected');
			$(this).css({
				'border' : '2px solid red'
			});
			$("#" + $(self).attr('id') + '_cpicker').hide();
			$('#' + $(self).attr('id') + 'view-port').css({
				'background-color' : $(this).css('background-color')
			});
		});

		/*
		 * $(holder).position( { of : $(viewPort), my : "right top", at : "left
		 * bottom", offset : "0 0", collision : "fit fit" })
		 */
		return this;
	};
})(jQuery);

function LockState(thisEl) {
	if (thisEl.checked) {
		$("#filed_milage").attr('disabled', 'disabled');
		$("#filed_state").attr('disabled', 'disabled');
	} else {
		$("#filed_milage").attr('disabled', '');
		$("#filed_state").attr('disabled', '');
	}
}
function changeProceStatus(elem) {

	if (elem.checked) {
	    $(elem).val('1');
		$("#filed_price").attr('disabled', 'disabled');
		$("#filed_currency").attr('disabled', 'disabled');
	} else {
	    $(elem).val('0');
		$("#filed_price").removeAttr('disabled');
		$("#filed_currency").removeAttr('disabled');

	}
}
var rules = {};
rules["main[filed_car_brand]"] = {
	required : true,
 min : 1
};
rules["main[filed_car_brand_model]"] = {
	required : true,
min : 1
};
// rules["main[filed_modification]"] ={required:true};
// rules["main[filed_bargaining]"] ={required:true};
/*
 * rules["main[filed_engine]"] = { required : true, range : [ 0.1, 1500 ] };
 * rules["main[filed_engine_power]"] = { required : true, range : [ 0.1, 1500 ] };
 * 
 * rules["main[filed_body]"] = { required : true, min : 1 };
 * 
 * rules["main[filed_drive]"] = { required : true, min : 1 };
 * rules["main[filed_rudder]"] = { required : true, min : 1 };
 */
rules["main[filed_gearbox]"] = {
	required : true,
	min : 1
};
rules["main[filed_fuel]"] = {
	required : true,
	min : 1
};

rules["main[filed_release_date_year]"] = {
	required : true,
    min: 1
};
rules["main[filed_duration]"] = {
	required : true
};

// rules["main[filed_release_date_month]"] ={required:true};
rules["main[filed_milage]"] = {
	required : true,// "#isnew:unchecked",
    digits : true,
	range : [ 0, 999999999 ],
    
};
rules["main[filed_state]"] = {
	required : '#isnew:unchecked'
};
rules["main[filed_price]"] = {
	required : true,// '#filed_contract:unchecked',
    maxlength : 12
    
};
rules["main[filed_currency]"] = {
	required : '#filed_contract:unchecked'
};
// rules["main[filed_color]"] ={required:true,min:1};
rules["main[filed_options]"] = {
	required : true,
	min : 1
};
// rules["main[filed_customs]"] ={required:true,min:1};
/*rules["main[user_phone1"] = {
	digits : true,
	maxlength : 3,
	required : true
};
rules["main[user_phone2]"] = {
	digits : true,
	maxlength : 3
};*/
rules["user_phone1"] = {
	digits : true,
	required : true
};
rules["user_phone2"] = {
	digits : true,
    required: false,
};

$(document).ready(function() 
		{
$("#filed_engine").mask("9.9");
$("#filed_price").mask("900.000.000", {reverse: true});
		  $("#add-offer-tabs").tabs();
		  $("#add-offer-tabs").tabs('disable');
          $("#add-offer-tabs").tabs('enable',0);
          
          //$("#add-offer-tabs").tabs('disable');
	try {
		__initOptions3Lavel();
		$("#filed_color").colorPicker();
		var container = $('div.container');

		$("#signupForm").validate({
			submitHandler:function(form)
			{
				
                //$("#add-offer-tabs").tabs("option", "disabled", [ 1, 2, 3 ]);
				
				var tabCount = $("#add-offer-tabs").tabs("length");
                var active = $("#add-offer-tabs").tabs('option','active');
          
                next = active+1;
				if(next  > 0)
				{
				    if(next == 1)
                    {
                        $("#add-offer-tabs").tabs('enable');
                        $("#add-offer-tabs").tabs('option','disabled',[0,2,3]);
                    }
                    else if(next == 2)
                    {
                        $("#add-offer-tabs").tabs('enable');
                        $("#add-offer-tabs").tabs('option','disabled',[1,3,0]);
                    }
                    else if(next == 3)
                    {
                        $("#add-offer-tabs").tabs('enable');
                        $("#add-offer-tabs").tabs('option','disabled',[2,0,1]);
                    }
					$("#user_prev").show();
				}
				if(next == tabCount-1)
				{
					$("#user_next").hide();
					$("#user_submit").show();
				}
				else
				{
				    if(tabCount != 4)
                    {
				        $("#user_next").show();
					$("#user_submit").hide();
				    }
                    else
                    {
                    //$("#user_next").show();
                    
					$("#user_submit").hide();

                    }
						
				}
				if(next < tabCount)
				{
					
					$("#add-offer-tabs").tabs('option','active',next);
					return false;
				}else
				{
				    $("#user_prev").hide();
					form.submit();
					return true;
				}
				
			},
			rules : rules,
			messages : _messages,

			errorPlacement : function(error, element) 
			{
				var atPos = $(element).attr('data-position');
				var myPos = "left bottom";
				if (atPos == undefined) 
				{
					atPos = "left top";
				}
				if (atPos == 'right top') 
				{
					myPos = "left bottom";
				}
				$(error).css(
				{
					position : 'absolute',
					//width : 150
				})
				.insertAfter(element);
				
				var positionSettings = 
				{
					of : $(element),
					my : myPos,
					at : atPos,
					offset : "200 20",
					collision : "fit fit"
				};
				var s = $(error).position(positionSettings);

			}
		});

		
		$("#user_prev").click(function()
				{
					var active = $("#add-offer-tabs").tabs('option','active');	
					prev = active-1;
					if(prev < 1)
					{
					   
						$(this).hide()
					}
                    if(prev == 2)
                       {    
                        $("#add-offer-tabs").tabs('enable');
                        $("#add-offer-tabs").tabs('option','disabled',[0,1,3]);
                       }
                       if(prev == 1)
                       {    
                        $("#add-offer-tabs").tabs('enable');
                        $("#add-offer-tabs").tabs('option','disabled',[0,2,3]);
                       }
                       if(prev == 0)
                       {    
                        $("#add-offer-tabs").tabs('enable');
                        $("#add-offer-tabs").tabs('option','disabled',[1,2,3]);
                       }
					$("#add-offer-tabs").tabs('option','active',prev);
					
					$("#user_next").show();
					$("#user_submit").hide();
				});
	} catch (e) {
		alert(e.message);
	}
	;
});
var __initOptions3Lavel = function() {
	$(".unlocker").each(function(e, i) {
		callBackOptions3Lavel(e, i)
	});
};

var callBackOptions3Lavel = function(e, i) {
	$(i).click(function() {
		var _subsClassName = "." + this.id;
		var _subRadios = $(_subsClassName);
		if (this.checked) {
			_subRadios.removeAttr('disabled');

		} else {
			_subRadios.attr('disabled', 'disabled');
		}
	});
}
