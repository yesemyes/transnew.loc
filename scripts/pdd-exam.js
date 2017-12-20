var data_min_wrong_count = 2;
var data_test_id = 0;
var isClosed = true;
var imageType = 'image_default';
$(function() {
	$("#progressbar").progressbar({
		value : 0,
		max : 15 * 60 *1000
	});
	
	
	$(".radio").buttonset();
	data_min_wrong_count = $('#pdd-main-continer').attr('data-min-wrong-count');
	data_test_id = $('#pdd-main-continer').attr('data-test-id');
	$.fancybox({
				modal : false,
				width : 545,
				height : 315,
				autoDimensions : true,
				href : '/' + curLng + '/pdd/to-pass-the-exam',
				type : 'ajax',
				padding : 1,
				onCleanup:function(){ if(isClosed) { window.location.href='/' + curLng + '/pdd/to-pass-the-exam';}},
				'titleFormat' : function(title, currentArray, currentIndex,	currentOpts) {	return title;}
			});
});
var nextAnswer = function(self) 
{
		
	var current = $('.current');
	var checked = $(".question_radio:radio", current).filter(':checked');
	if (checked.length > 0) 
	{
		var form = $("form", current);
		submitForm(form, current,self);
	} else {
		alert(SELECT_ANSWER);
	}
	
	
};
var submitForm = function(form, current,trigger) {
	var url = form.attr('action');
	var data = form.serialize();
	var method = form.attr("method");
	$.ajax({
				url : url,
				data : data,
				type : method,
				context : current,
				dataType : 'json',
				padding : 0,
				beforeSend : function() {
				
					$(trigger).attr('disabled','disabled');
					$.fancybox.showActivity();
				},
				complete : function() {
				$(trigger).removeAttr('disabled');
					$.fancybox.hideActivity();
				},
				error : function() {
					finishExam();
				},
				success : function(data) {
					$("#data-question-" + data.ticket).removeClass('current_q');
					$("#data-question-" + data.ticket).next('li').addClass(
							'current_q');
					$("#data-question-" + data.ticket).addClass(data.status);
					$("#data-question-" + data.ticket).append($("<input>", {
						type : 'hidden',
						'name' : 'answers[' + data.ticket + ']',
						value : data.status,
						class : 'answer_status'
					}));
					$("#data-question-" + data.ticket).
					append($("<input>", 
							{
							type : 'hidden',
							'name' : 'client_answers[' + data.ticket + ']',
							value : data.answer,
							class : 'answer_status'
					}));
					;
					$(this).hide();
					var next = $(this).next('.exam-question');
					var wrongQty = 0;
					$(".answer_status").each(function(e, i) {
						if (i.value == 'wrong')
							wrongQty++;
					});
					if (wrongQty >= data_min_wrong_count) {
						return finishExam();
					}
					if (next.length > 0) {
						next.show().addClass('current');
						$(this).removeClass("current").addClass('passed');
					} else {

						finishExam();
					}
				}
			});
};
var finishExam = function() 
{
	var sendData = $("input.answer_status").serialize();
	var valueProgressbar = $("#progressbar").progressbar('value');
	sendData = sendData + "&duration=" + valueProgressbar+"&testId="+data_test_id;
	if (examTimeout) {
		clearTimeout(examTimeout);
	}
	/*$.fancybox({
		href : '/' + curLng + '/pdd/show-result',
		width : 500,
		padding : 1,
		onClosed : function() {
			window.location.href = '/' + curLng + '/pdd/to-pass-the-exam';
		},
		ajax : {
			type : "POST",
			data : sendData
		}
	});*/
	
	
	$.ajax({
		url : '/' + curLng + '/pdd/show-result',
		type : 'post',
		data : sendData + "&mode=exam",
		context : $('#pdd-main-continer'),
		beforeSend : function() {
			$.fancybox.showActivity();
		},
		success : function(data) {
			$(this).hide();
			$('#resultView').show().html(data);
			
			$('a.fancy-hint',$('#resultView')).fancybox({type:'ajax',padding:0,'titleFormat' : function(title, currentArray, currentIndex,	currentOpts) {	
			return title;
			
			}});
		},
		error : function() {
		},
		complete : function() {
			$.fancybox.hideActivity();
		}
	});
};

var examTimeout = null;

var startExam = function() 
{

	isClosed = false;
	var start = $("#progressbar").data("start");
	var maxValue = $("#progressbar").progressbar("option", "max");
	var maxMinutes = (maxValue / (60 * 1000)) - 1;
	var now = new Date();
	if (!start) 
	{
		imageType = $("input.image_type_main:checked").val();
		 
		$('.question_radio').click(function()
				{
					$("#next-btn").removeAttr('disabled');
				});
		$('.c'+imageType+':radio').attr('checked','checked');
		console.log($('.c'+imageType+':radio'));		
		
		$(".holder_image").hide();
		$("input.image_type:checked").each( function(e,i)
		{
			$("#holder_"+i.id).show();
		});
		
	$(".image_type:radio").click(function() 
	{
		
		$('.c'+this.value+':radio').attr('checked','checked');
		
		
		$(".holder_image").hide();
		$("input.image_type:checked").each( function(e,i)
		{
			$("#holder_"+i.id).show();
			imageType = i.value;
		});
		
		
	});
		
	
		if (imageType == 'image_default') {
			$(".image_default").show();
			$(".image_original").hide();
		} else {
			$(".image_default").hide();
			$(".image_original").show();
		}
		$(".c" + imageType).attr('checked', 'checked');
		console.log(imageType,$(".c" + imageType));
		$(".image_type").click(function() 
		{
					
					imageType = this.value;
					
					if(imageType == 'image_default')
					{
						$(".image_default",$(this).parent().parent().parent()).show();
						$(".image_original",$(this).parent().parent().parent()).hide();
					}
					if(imageType == 'image_original')
					{
						$(".image_default",$(this).parent().parent().parent()).hide();
						$(".image_original",$(this).parent().parent().parent()).show();
					}
		});

		start = new Date();
		var end = new Date();
		end.setTime(start.getTime() + maxValue);

		$("#progressbar").data("start", start);
		$("#progressbar").data("end", end);
		$('.exam-question:first').addClass("current").show();
		$("#pdd-main-continer").show();
		$("#next-btn").click(function() {nextAnswer(this);});

	} else {
		
		var end = $("#progressbar").data("end");
		if (now > end) {
			/*$.fancybox({
				'width' : '100%',
				'height' : '100%',
				'autoScale' : true,
				'transitionIn' : 'fade',
				'transitionOut' : 'fade',
				padding : 0,
				'modal' : false,
				'type' : 'ajax',
				'href' : '/' + curLng + '/pdd/show-timeout'

			});*/
			
			return finishExam();
			 
		}
		
		
	}

	var diff = now - start;
	var newValue = Math.round(diff / 1000);
	

	$("#progressbar").progressbar("option", "value", diff);

	var diffMin = Math.floor(newValue / 60);
	var diffSec = newValue % 60;

	var seconds = 59 - diffSec;

	var estSeconds = (seconds < 10 ? "0" : '') + seconds;
	
	var extMinutes = (maxMinutes - diffMin < 10 ? "0" : '')
			+ (maxMinutes - diffMin);
	$("#estimated").html(extMinutes + ":" + estSeconds);
	examTimeout = setTimeout(function() {
		startExam();
	}, 1000);
	
	$.fancybox.close();

};