var api;
var showHints;
var imageType = 'image_default';
$(function () {

    $(".image_default").hide();
    $('.exam-question:first').addClass("current").show();
    $('.marathone-questions:first').addClass("current_q").show();

    $("#next-btn").click(function () {

        nextAnswer(this);



    });


    $("#finish-btn").click(function () {
        finishExam();
    })
    $("#fake-next-btn").click(function () {
        fakeNextAnswer(this);
    });
    initTooltips();
    api = $('.scroll-pane')
	.jScrollPane({
        showArrows: false,
        maintainPosition: true,
        stickToBottom: true,
        autoReinitialise: true
    }).data('jsp');
    $('.scroll-pane').bind(
        'jsp-initialised', function (event, isScrollable) {
        if (isScrollable) 
		{
            
			if($("li.current_q", this).length)
			{
				api.scrollToElement($("li.current_q", this), false, false);
			}
        }
    });


    $(".holder_image").hide();
    $("input.image_type:checked").each(function (e, i) {
        $("#holder_" + i.id).show();
        imageType = i.value;
    });

    $(".image_type:radio").click(function () {

        $('.c' + this.value + ':radio').attr('checked', 'checked');
        $(".holder_image").hide();
        $("input.image_type:checked").each(function (e, i) {
            $("#holder_" + i.id).show();
            imageType = i.value;
        });


    });

    $("#turn-off-hints").click(function () {
        showHints = $(this).attr('checked');
        if (showHints == 'checked') {
            $('.showHint').removeAttr('title');
        } else {
            $('.showHint').each(function () {
                var self = this;
                var contentId = $(self).attr('data-id');
                $(self).attr('title', $("#" + contentId).html());
            });
        }
    });

});
var nextAnswer = function (trigger) {

    if (ttip) {
        ttip.tooltip('close');

    }
    var current = $('.current');

    var checked = $(".question_blok :radio", current).filter(':checked');

    if (checked.length > 0) {

        var form = $("form", current);
        submitForm(form, current, trigger);

    } else {
        alert(SELECT_ANSWER);
    }
};
var fakeNextAnswer = function (fakeButton) {
    var self = $(fakeButton).data("self");
    var next = $(fakeButton).data("next");
    var respData = $(fakeButton).data("respData");


    if (self && next) {
        swapQuestion(self, next, respData);
        $("#next-btn").show();
        $("#fake-next-btn").hide();
    }
};
var submitForm = function (form, current, trigger) {
    var next = $(current).next('.exam-question');
    if (next.length < 1) {
        loadNextBlock(this, next, data);
    }
    var url = form.attr('action');
    var data = form.serialize();
    var method = form.attr("method");
    $.ajax({
        url: url,
        data: data,
        type: method,
        context: current,
        dataType: 'json',
        beforeSend: function () {
            $(trigger).attr("disabled", "disabled");
            $.fancybox.showActivity();
        },
        complete: function () {

            $(trigger).removeAttr("disabled");
            $.fancybox.hideActivity();
        },
        error: function () {
            finishExam();
        },
        success: function (data) {

            var next = $(this).next('.exam-question');
            console.log("next", next);
            var wrongQty = 0;

            $(".answer_status").each(function (e, i) {
                if (i.value == 'wrong')
                    wrongQty++;
            });



            if (data.status == "true") {
                swapQuestion(this, next, data);
            } else {

                if (!showHints) {
                    if (data.hint_for_correct_answer != '') {
                        $('.place-for-hint', this).show();
                        var hint = $();

                        $('.place-for-hint-continer', this).html(data.hint_for_correct_answer);

                        var tttip = $('a', $('.place-for-hint-continer', this));
						tttip.each(function()
						{
							var src = $(this).attr("href");
							var img = new Image();	
							img.onload = function()
							{
							     var pos = $(this).parent().position();
								$(this).css({"margin-top":-1*this.height-15,'z-index':99999,"left":(pos.left - this.width/2) });
                                
							}
							
							img.src = src;
							$(img).hide().css({"position":"absolute"}).appendTo(this);
							 $(this).removeAttr("href").css('cursor','pointer');
                             
						 
						});
						
						tttip.hover(function(){ $("img",this).fadeIn()},function(){ $("img",this).fadeOut()});
                    }
                }
                $("#fake-next-btn").data("self", this);
                $("#fake-next-btn").data("next", next);
                $("#fake-next-btn").data("respData", data);
                $("#next-btn").hide();
                $("#fake-next-btn").show();
                $(':radio', this)
                    .attr('disabled', "disabled");
                $("#radio_" + data.ticket + "_" + data.correct_answer)
                    .before($('<span>', {
                    class: 'true_viewer'
                }))
                    .parent()
                    .addClass('true_selection');

                $(".question_radio:checked", this)
                    .before($('<span>', {
                    class: 'wrong_viewer'
                }))
                    .parent()
                    .addClass('wrong_selection');

            }

            if (next.length < 1) {
                finishExam(this, next, data);
            }


        }
    });
};
var loadNextBlock = function (me, next, data) {
    var nextBlockUrl = $(".numbers").attr("data-load");
    $.ajax({
        url: nextBlockUrl,
        dataType: 'json',
        async: false,
        success: function (json) 
		{
			
            $(".numbers").attr("data-load", json.loadLink);
            var offset = json.offset * 1;
			console.clear();
            for (var ii in json.quetions) {
                var $quetion = json.quetions[ii]
                $('<li id="data-question-' + $quetion.id + '" class="marathone-questions"><span>' + (offset++) + '</span></li>').appendTo($("ul", $(".numbers")));

                var q = $($quetion.html);
				
				
                $(".holder_image", q).hide();
				
				console.log("loadNextBlock--->");
				console.log(q);
				console.log(".c"+imageType,$(".c"+imageType,q));
				console.log("div."+imageType,$("div."+imageType,q));
				console.log("<----------------loadNextBlock");
				
				 $(".image_type:radio",q).click(function () {

					$('.c' + this.value + ':radio').attr('checked', 'checked');
					$(".holder_image").hide();
					$("input.image_type:checked").each(function (e, i) {
						$("#holder_" + i.id).show();
						imageType = i.value;
					});


					});
	
				$(".c"+imageType,q).attr("checked",'checked');
				$("div."+imageType,q).show();				
				$("#marathon-questions-holder").append(q);
            }



        }
    })
    //finishExam(me, next, data);
}
var swapQuestion = function (self, next, data) {


    $(self).hide();
    next.show().addClass('current');
    $(self).removeClass("current").addClass('passed');
    var indexC = $(".current_q");
    indexC.next('li.marathone-questions').show().addClass("current_q");
    indexC.removeClass('current_q');
    api.reinitialise();

    $("#data-question-" + data.ticket).addClass(data.status);
    $("#data-question-" + data.ticket)
        .append($("<input>", {
        type: 'hidden',
        'name': 'answers[' + data.ticket + ']',
        value: data.status,
        class: 'answer_status'
    }))
        .append($("<input>", {
        type: 'hidden',
        'name': 'client_answers[' + data.ticket + ']',
        value: data.answer,
        class: 'answer_status'
    }));


};

var continueExam = function () {
    $('#pdd-main-continer').show();
    $('#resultView').hide();
}
var finishExam = function (self, next, data) {


    if (self && next) {
        swapQuestion(self, next, data);
    }
    var sendData = $("input.answer_status").serialize();
    $.ajax({
        url: '/' + curLng + '/pdd/show-result',
        type: 'post',
        data: sendData + "&mode=marathon&imageType=" + imageType,
        context: $('#pdd-main-continer'),
        beforeSend: function () {
            $.fancybox.showActivity();
        },
        success: function (data) {
            $(this).hide();
            $('#resultView').show().html(data);

            $('a.fancy-hint', $('#resultView')).fancybox({
                type: 'ajax',
                padding: 0,
                'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                    return title;

                }
            });
        },
        error: function () {},
        complete: function () {
            $.fancybox.hideActivity();
        }
    });
};
var ttip = null;
var initTooltips = function () {
    $('.showHint')
        .each(function () {
        var self = this;
        var contentId = $(self).attr('data-id');
        $(self).attr('title', $("#" + contentId).html());
        if (ttip) {
            ttip.tooltip('close');
        }
        $("#" + $(this).attr('for'))
            .click(function () {

            var rel = $(this).attr("rel");

            $(".cAnswer" + rel)
                .effect(
                'highlight', {},
                800, function () {
                $(this)
                    .css({
                    "background-color": '#ffe78b',
                    'color': '#333'
                });

            });
            if (showHints == "checked") {
                return true;
            }
            $(self).tooltip({
                track: true,
                position: {
                    my: "center bottom-20",
                    at: "center top",
                    using: function (
                        position,
                        feedback) {
                        $(this)
                            .css(
                            position);
                        $(
                            "<div>")
                            .addClass(
                            "arrow")
                            .addClass(
                            feedback.vertical)
                            .addClass(
                            feedback.horizontal)
                            .appendTo(
                            this);
                    }
                },
                create: function (
                    event,
                    ui) {
                    $(this)
                        .tooltip(
                        "open");
                },
                close: function (
                    event,
                    ui) {
                    $(this)
                        .tooltip(
                        "destroy");
                    ttip = null;
                }
            });
            ttip = $(self).tooltip("widget");
        });
    });
};

function saveResult() {
    $.ajax({
        url: '/' + curLng + '/users/save-result?action=saveMarathonResult',
        type: 'post',
        dataType: 'json',
        date: {
            'action': 'saveMarathonResult'
        },
        beforeSend: function () {
            $.fancybox.showActivity();
        },

        success: function (data) {

            if (data.exec_tatus) {
                window.location = '/' + curLng + '/users/marathon-result';
                $.fancybox.hideActivity();
            } else {
                window.location = '/' + curLng + '/404';
                $.fancybox.hideActivity();
            }
        },
        error: function (a, b, c) {
            $.fancybox.hideActivity();
            if (a.status == 401) {
                window.location = '/' + curLng + '/users/login';
            } else {
                window.location = '/' + curLng + '/404';
            }
        }
    });
}