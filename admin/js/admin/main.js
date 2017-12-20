window.onpopstate = function(event) {

	if (window.console) {
		console.log(event)
	}

};

function objectParser(X) {
	str = "";
	for ( var I in X) {
		str += I + "-" + (typeof X[I]) + ";\n";
	}
	alert(str);
}
Array.prototype.find = function(searchStr) {
	var returnArray = false;
	for (i = 0; i < this.length; i++) {
		if (typeof (searchStr) == 'function') {
			if (searchStr.test(this[i])) {
				if (!returnArray) {
					returnArray = []
				}
				returnArray.push(i);
			}
		} else {
			if (this[i] === searchStr) {
				if (!returnArray) {
					returnArray = []
				}
				returnArray.push(i);
			}
		}
	}
	return returnArray;
}

$(document).ready(function() {

	__initAjaxLoader();
	getSessionLife();
	$.fn.clickMenu.setDefaults({
		arrowSrc : '/admin/images/admin/arrow_right.gif',
		subArrowSrc : '/admin/images/admin/arrow_down-menu.png'
	});
	//viewUserInfo();
	$('.list').clickMenu();
	$("#tabs").tabs({
		cache : true,
		fx : {
			opacity : 'toggle'
		},
		load : function(event, ui) {

			if ((ui == undefined) || (event == undefined)) {
				return false;
			}
			try {
				loadModuleJs(myTabs[ui.index], ui);
				getSessionLife();

				var active = $("#tabs").tabs("option", "active");

				history.replaceState({}, ui.tab.text, ui.tab.baseURI);

			} catch (e) {
				if (window.console) {
					console.log("Error", event, ui);
					console.error(e);
				}
			}
		},
		add : function(event, ui) {
			addCloseButton(ui, '#tabs', 'myTabs');
		},
		select : function(event, ui) {

		}
	});
	var pathname = window.location.pathname;
	var search = window.location.search;

	if (pathname != '/admin' && search != '') {
		var searchParams = new Array();
		parse_str(search, searchParams);
		if (window.console) {
			console.log('searchParams', searchParams);
		}
		if (searchParams['_rel']) {
			getView(pathname, searchParams['_rel'], searchParams['_title']);
		} else {
			window.location.href = '/admin';
		}

	}

});

function togg1(e) {
	$(e).animate({
		width : '1000px'
	}, 500);
}

function togg2(e) {
	$(e).animate({
		width : "16px"
	}, 150);
}

var myTabs = new Array();
function getView(__href, rel, title) {

	var tabHref = __href + "?tpl=view.tpl&viewAjax=1&_rel=" + rel + "&_title="
			+ title;
	try {

		var r = myTabs.find(rel);
		var selIndex = -1;
		if (r === false) {

			myTabs[myTabs.length] = rel;
			var newIndex = myTabs.length - 1;
			if ($("#tabs").hasClass("hide"))
				$("#tabs").removeClass("hide");
			$("#tabs").tabs('add', tabHref, title, newIndex);
			selIndex = myTabs.length - 1;

		} else {
			selIndex = r;
		}

		history.pushState({
			page : selIndex
		}, title, tabHref);
		if (window.console) {
			console.log('history.pushState', {
				page : selIndex
			}, title, tabHref);
		}
		$("#tabs").tabs('select', selIndex);

	} catch (e) {
		alert(e.message + " getView");
	}
}

var removeLog = function(_id) {

	$('#' + _id).remove();

}

function orderCascad() {
	$('.tdialog').each(function(i, e) {
		$(e).dialog('option', 'position', [ i * 20 + 150, i * 75 + 350 ]);
		$(e).dialog('option', 'height', 250);
	})
}

var focusLog = function(_id) {
	$('.loger').css('color', '#000000');
	$('#' + _id).css('color', '#ff0000');

}

var myFormTabs = new Array();

/*
 function openFromDialog2(_p,_a,_id,dialog,pid,_flabel)
 {


 ft= myFormTabs.find(dialog);

 if(ft !== false)
 {

 $("#displayDialog").tabs( 'remove' , ft );
 myFormTabs.splice(ft,1);


 }
 myFormTabs[myFormTabs.length] = dialog;
 _p=_p+"?tpl=formView.tpl&viewAjax=1&action="+_a+"&id="+_id;

 if(pid )
 {
 _p=_p+"&pid="+pid;
 }



 $("#displayDialog").tabs( 'add' , _p , _flabel+": Form",myFormTabs.length-1);
 var r= myTabs.find(dialog);
 $("#tabs").tabs( 'select' , r );


 $("#displayDialog").tabs( 'select' , myFormTabs.length-1 );
 }

 */

function openFromDialog(_p, _a, _id, dialog, pid, _flabel) {

	_p = _p + "?tpl=formView.tpl&viewAjax=1&action=" + _a + "&id=" + _id;
	if (pid >= 0)
		_p += "&pid=" + pid;

	viewForm = "#viewForm-" + dialog;
	$(viewForm).html('<img src="/admin/images/ajax-loader.gif" alt="" />');
	$.get(_p, function(data) {

		getSessionLife();
		$(viewForm).html(data);

		minimazeThis(dialog);
		_initFormControls($(viewForm));
		$.scrollTo(0, 800);
	});
}

var _initFormControls = function(continer) {
	if (window.console) {
		console.log("continer--->", continer);
	}
	initUpoaders(continer);
	window.onbeforeunload = function() {

		return "You have not saved data";

	};

	$(continer).bind('keypress', function(e) {

		console.log(e);
		if (e.ctrlKey && (e.which == 115)) {
			e.preventDefault();
			$('input.saveBtn:first', continer).trigger('click');

			return false;
		}

	});
};
var addNewUploader = function(continer) {

	$(continer).hide();
	alert(continer);

	$(".multy-uploader:first").clone().appendTo(continer);
	$(continer).show();

}
function ShowFormDialog(msg, d, dd, _p) {
	_msg = msg.split("[:]")
	$('#' + rel).dialog('option', 'title', _msg[0]);
	$('#' + rel).html(_msg[1]);
	InitFormJqueryControls(dd);
	$('#' + rel).dialog('option', 'buttons', {
		"Save" : function() {
			sendFom(d, dd, _p);
		},
		"Reset" : function() {
			document.getElementById('main_form').reset();
		}
	})
}

function sendFom(d, dd, _p) {

	_data = $('#main_form').serialize();
	_path = $('#main_form').attr('action');

	var init = {
		url : _path,
		data : _data,
		type : 'post',
		success : function(msg) {

			_msg = msg.split("[:]");
			$(d).html(_msg[1]);
			$(d).dialog('option', 'title', _msg[0]);

			$(d).dialog('moveToTop');
			$(d).dialog('enable');
			getSessionLife();
		},
		error : function(a, b, c) {
			alert(b);
		}
	};

	$(d).dialog('option', 'title',
			'<img src="/admin/images/ajax-loader.gif" alt="" />')
	$(d).dialog('disable');

	$.ajax(init);

}

function DeleteItemThis(dd, iD, _path) {

	if (confirm(jsLngdata.CONFIRM_DELETE)) {
		$("#treeNode-" + dd + '-' + iD).hide(150, function() {
			ajaxDelete(dd, iD, _path);
		});
	}
}

function ajaxDelete(table, _id, _p) {
	//alert(_p);
	_path = _p + '?viewAjax=1&action=delete&tpl=view.tpl';
	_data = {
		viewAjax : 1,
		id : _id
	}
	var init = {
		url : _path,
		data : _data,
		type : 'post',
		success : function(msg) {
			getSessionLife();
		},
		error : function(msg, e) {
			alert(e)
		}
	}
	$.ajax(init);
}
var filterReset = function(form_id, _path) {
	document.getElementById('main_filter_form_' + form_id).reset();
	$('#' + form_id + '_limit_page').val(1);
	filterThis(form_id, _path);
}
var filterThis = function(form_id, _path) {

	if (form_id) {
		_data = $('#main_filter_form_' + form_id).serialize();
	} else {
		_data = null;
	}
	$('#list-' + form_id).prepend(
			'<img src="/admin/images/ajax-loader.gif" alt="" />');

	_path = _path + "?viewAjax=1&tpl=list.tpl"
	var init = {
		url : _path,
		data : _data,
		type : 'get',
		success : function(msg) {
			$('#list-' + form_id).html(msg);
			__initList();
			getSessionLife();
		},
		error : function(msg, e) {
			alert(e)
		}
	}
	$.ajax(init);
}
function toggleCell(t, classs) {

	if (t.checked)
		$('.' + classs).show(150);
	else
		$('.' + classs).hide(150);
}

function ShowTab(id, cl, t, e) {
	$('.' + cl).hide();
	$("#" + id).show();
	$(e).removeClass('lng-tab-active');
	$(e).removeClass('lng-tab');
	$(e).addClass('lng-tab');
	$(t).removeClass('lng-tab');
	$(t).addClass('lng-tab-active');

}

function loadModuleJs(moduleJS, ui) {
	try {
		var str = "";
		for ( var X in ui) {
			str += X + "\t";
		}
		if (ui)
			$(ui.panel).prepend(
					'<img src="/admin/images/ajax-loader.gif" id="loader-'
							+ moduleJS + '"/>');

		var url = "admin/specJS/?viewAjax=1&tpl=dinamicJS.tpl&moduleJS="
				+ moduleJS;

		$.getScript(url, function(data) {
			$('#loader-' + moduleJS).remove();
		});
		__initM();
		__initList();
	} catch (e) {
		alert(e.message + '-' + 'ShowTab')
	}
}

function saveMe(elem, content) {

	$('.tinymce').each(function() {

		try {
			$(this).css({
				border : "1px solid #EcEcEc"
			})

			var x = tinyMCE.get(this.id);

			if (x) {
				var _val = x.getContent();
				$("#" + this.id).val(_val);
			}
			tinyMCE.remove(x);

		} catch (e) { /*alert(e.message)*/
		}
	})

	var _form = elem.form;
	var _datContent = content.replace("form-cont-", '#reload-button-');
	
	_data = $(_form).serialize();
	_path = $(_form).attr('action');

	//if(!confirm(_path)){return false};
	var init = {
		url : _path,
		data : _data,
		type : 'post',
		success : function(msg) {
			$.noty.closeAll();
			$("#" + content).html(msg);

			var tableContTableErrors = $('.tableContTableErrors', $("#"
					+ content));
			if (tableContTableErrors.length > 0) {
				generateNoty('top', jsLngdata["NOY_ERROR_DURING_SAVE"],
						'error', false);

			} else {
				generateNoty('top', jsLngdata["NOY_SAVE_SUCCESS"], 'success',
						2000);

				$('.topOpen').trigger('click');

				$(_datContent).trigger('click');
			}

			_initFormControls($("#" + content));
			getSessionLife();

		},
		error : function(a, b, c) {
			alert(b);
		}
	};

	$("#" + content).prepend(
			'<img src="/admin/images/ajax-loader.gif" id="loader-' + content
					+ '"/>');
	$.ajax(init);

}

function addCloseButton(elem, t, array) {

	if (array == 'myTabs')
		var _tabName = myTabs[elem.index];
	if (array == 'myFormTabs')
		var _tabName = myFormTabs[elem.index];

	$(elem.tab)
			.after(
					'<img src="/admin/images/admin/tab_delete.png" align="right" style="padding:1px"'
							+ 'onclick="removeTab(\''
							+ _tabName
							+ '\',\''
							+ t
							+ '\',\'' + array + '\')"/>');

}
function removeTab(indexN, tab, array) {

	var _x = "#tab-path-" + indexN;

	deleteCookie(indexN + "treeNodes", -1, $(_x).val());

	if (array == 'myFormTabs')
		index = myFormTabs.find(indexN);
	if (array == 'myTabs')
		index = myTabs.find(indexN);

	if (jsLngdata.CLOSE_TAB_CONFIRM) {
		var CLOSE_TAB_CONFIRM = jsLngdata.CLOSE_TAB_CONFIRM;
	} else {
		CLOSE_TAB_CONFIRM = 'CLOSE_TAB_CONFIRM';
	}

	if (confirm(CLOSE_TAB_CONFIRM)) {

		if (array == 'myFormTabs')
			//myFormTabs[index] = myFormTabs[index]+"closed";
			myFormTabs.splice(index, 1);

		if (array == 'myTabs') {

			name = myTabs[index];
			f = myFormTabs.find(name);

			if (f !== false) {
				$('#displayDialog').tabs('remove', f);
				//myFormTabs[index] = myFormTabs[index]+"closed";
				myFormTabs.splice(index, 1);
			}
			myTabs.splice(index, 1)
			//;[index] = myTabs[index]+"-closed";
		}

		$(tab).tabs('remove', index);

		history.replaceState('Object', '', '/admin/');
	}
}

function orderBy(filed, module, _path, type) {
	var _sform = "main_filter_form_" + module;

	$('#' + module + '_order_by').val(filed);
	$('#' + module + '_order_type').val(type);
	filterThis(module, _path);
}

function gotoPage(module, _path, page) {
	$('#' + module + '_limit_page').val(page);
	filterThis(module, _path);
}

function swapStatus(group, type, elem) {
	var _id = "#group-" + type + "-" + group;

	var e_id = $(_id);

	if (e_id.hasClass('hide')) {
		e_id.removeClass('hide');
		$(elem).removeClass('open_sub2');
		$(elem).addClass('open_sub2Open');
	} else {
		e_id.addClass('hide');
		$(elem).removeClass('open_sub2Open');
		$(elem).addClass('open_sub2');

	}
}

var setElementValue = function(elem, value) {
	alert(elem);
	alert(value);

	$(elem).val(value);
}

var viewThisImage = function(module, path, iamge, e) {
	$('.poup_image').remove();
	var img_src = "/img/" + module + "/" + path + "/" + iamge;
	var name = iamge.split('.');
	var img_id = "img" + module + "-" + path + "-" + name[0];

	var position = $(e).position();
	$(e).before(

			"<div id='" + img_id + "' class='poup_image' style='top:"
					+ position.top + "px;left:" + parseInt(position.left + 16)
					+ "px'>" + "<div onclick='$(\"#" + img_id
					+ "\").remove()'>X</div >" + "<img  src='" + img_src
					+ "'/>" + "</div>");
}

// JavaScript Document
function loadImages(p, place) {
	_place = "#" + place;
	$.get(p, function(data) {
		$(_place).replaceWith(data)
	});
}
orderSavedSuccess = function(data, _idArray) {

	reload_button = "#reload-button-" + _idArray;
	//$(reload_button).trigger('click');
	var _loader = "#" + _idArray + "loader";
	$(_loader).remove();
}
var __initList = function() {
	//listItem
	$(".inlineEditCheckbox").click(function() {
		inlineEdit(this, "checkbox")
	})
	$(".list_tableBody").sortable(
			{
				delay : 30,
				placeholder : 'ui-state-highlight',
				items : 'tr',
				opacity : 0.8,
				'stop' : function(event, ui) {

					path = ui.item.attr('rel');
					_id = ui.item.attr("id");

					_idArray = _id.split("-");
					_module = "#viewPlace-" + _idArray[1];
					$(_module).before(
							'<img src="/admin/images/ajax-loader.gif" id="'
									+ _idArray[1] + 'loader" alt="" />');
					var _post = $(this).sortable('serialize');

					$.ajax({
						url : path,
						type : 'post',
						data : _post,
						success : function(data) {
							orderSavedSuccess(data, _idArray[1]);
							getSessionLife()
						}
					})

				}

			});

}
var __initM = function() {

	$('.divh15').hover(function() {
		mover(this, 1)
	}, function() {
		mover(this, 0)
	});

	/*
	Sortable
	 */
	$(".treeView").sortable(
			{
				delay : 300,
				placeholder : 'ui-state-highlight',
				opacity : 0.6,
				'stop' : function(event, ui) {

					path = ui.item.attr('rel');
					_id = ui.item.attr("id");

					_idArray = _id.split("-");
					_module = "#viewPlace-" + _idArray[1];
					$(_module).before(
							'<img src="/admin/images/ajax-loader.gif" id="'
									+ _idArray[1] + 'loader" alt="" />');
					var _post = $(this).sortable('serialize');
					$.ajax({
						url : path,
						type : 'post',
						data : _post,
						success : function(data) {
							orderSavedSuccess(data, _idArray[1]);
							getSessionLife()
						}
					})

				}

			});
	$(".treeView").disableSelection();

}

var mover = function(_this_id, s) {

	var _x = "#action-buttons-" + _this_id.id;

	if (s) {

		$(_x).slideDown(250);
	} else {

		$(_x).slideUp(150);
	}
}
var deleteCookie = function(cookieName, tblId, _URL) {

	$.get(_URL, {
		action : 'getJson',
		'function' : 'deleteCookie',
		'cname' : cookieName,
		'eid' : tblId,
		'viewAjax' : 1,
		'tpl' : 'json.tpl'
	}, function(data) {
	});
}
var getSub = function(this_id, lvl, t, _URL, table) {

	var thisId = this_id;
	var tblId = "#" + table;
	var _sub = "P-" + thisId;
	var tableSplited = table.split('-');
	var module = tableSplited[0];
	var cookieName = module + "treeNodes";

	var exist = document.getElementById(_sub);
	if (exist != null) {
		$(t).removeClass('close_sub');
		$(t).addClass('open_sub');
		$(exist).remove();
		deleteCookie(cookieName, tableSplited[1], _URL);
		return;
	}
	;

	var _postURL = _URL + '';
	$(t).removeClass('open_sub');
	$(t).addClass('loading_sub');

	var init = {
		url : _postURL,
		data : {
			tpl : 'treeNode.tpl',
			pid : thisId,
			_lavel : lvl,
			viewAjax : 1
		},
		success : function(msg) {

			$(t).removeClass('loading_sub');
			if (msg.length > 1)
				$(t).addClass('close_sub');
			else {

				$(t).addClass('open_sub');
			}

			$(tblId).after(msg);
			__initM();
			getSessionLife();

		},
		error : function(x, m) {
			alert(x)
		}
	};
	$.ajax(init);
}

var loginFormSubmit = function(elem) {

	_data = $(elem).serialize();
	var _path = "/admin/?viewAjax=1&tpl=loginResult.tpl";
	$.ajax({
		url : _path,
		type : 'post',
		data : _data,
		success : loginSuccess
	});

}
var loginSuccess = function(_data) {
	if (_data) {
		$('#login_form_div').replaceWith(_data);
		getSessionLife();
	} else {
		window.location.href = window.location.href;
	}
}

function changePassword(elem) {
	_form = elem.form;

	_data = $(_form).serialize();
	var _path = $(_form).attr("action");
	$.ajax({
		url : _path,
		type : 'post',
		data : _data,
		success : changePasswordSuccess
	});

}
var changePasswordSuccess = function(data) {
	$('#chpas-content').html(data);
	getSessionLife();
}
var __timer = null;
function viewUserInfo(expair, count) {

	try {

		var d = new Date();

		_m = d.getMonth();
		_d = d.getDate();
		_y = d.getFullYear();
		_h = d.getHours();
		_i = d.getMinutes();
		_s = d.getSeconds();
		_m = _m < 10 ? "0" + _m : _m;
		_d = _d < 10 ? "0" + _d : _d;
		_h = _h < 10 ? "0" + _h : _h;
		_i = _i < 10 ? "0" + _i : _i;
		_s = _s < 10 ? "0" + _s : _s;
		var ExpSession = expair - count;

		var _r = $('#timer');
		if (!_r.length)
			return;

		if (ExpSession <= 0) {

			/*window.location = '/admin/';/*
			 * 
			 */
			return;
		}
		ExpSessionStr = Math.floor(ExpSession / 60) + ":" + ExpSession % 60;

		$('#timer').html(ExpSessionStr);

		__timer = setTimeout("viewUserInfo(" + expair + ","
				+ parseInt(count + 1) + ")", 1000);

		_s = parseInt(_s);

		/*if(_s % 25 == 0)
		{
			_data = {'viewAjax':1,'tpl':'json.tpl'};
			_path = '/admin/getUser';
			$('#timer_user').html('...');
			$.ajax({ 
				   	  url:_path,
				     data:_data,
					 dataType:'json',
					 success:displayUserInfo
					 }
					 );
		}
		 */

	} catch (e) {
		alert(e.message)
	}
}
var _SessionLife = null;
function getSessionLife() {
	_data = {
		'viewAjax' : 1,
		'tpl' : 'json.tpl'
	};
	_path = '/admin/getSessionLife';
	if (__timer > 0)
		clearTimeout(__timer)
	$.ajax({
		url : _path,
		data : _data,
		dataType : 'json',
		context : '#timer',
		success : function(data) {
			_SessionLife = data;

			_timer = setTimeout("viewUserInfo(" + data + ",0)", 1000)
		}
	});

}
function displayUserInfo(data) {

	if (data && data.name)
		$('#timer_user').html(data.name);
	else {

		window.location = "/admin/login";
		clearTimeout(__timer);
	}
}

function reloadThis(pl, path) {

	try {
		var buttonId = pl.replace("viewPlaceContent-", "filter_form_button");
		if ($(buttonId).length > 0) {
			$(buttonId).trigger('click');
		} else {
			$(pl).html(
					'<img src=' + panel_base
							+ '"images/ajax-loader.gif" alt="" />');
			$.get(path, function(data) {
				$(pl).html(data);
				__initM();
				__initList();
				var m = pl.replace('#viewPlaceContent-', '');
				loadModuleJs(m);
			});
		}

	} catch (e) {
		alert(e.message)
	}
};
function minimazeThis(pl, e) {
	_pl = $("#viewPlaceContent-" + pl);

	if (_pl.hasClass('hide')) {
		_pl.show(250, function() {
			_pl.removeClass('hide')
		});
		$(e).removeClass("topClose");
		$(e).addClass("topOpen");
	} else {
		_pl.hide(250, function() {
			_pl.addClass('hide')
		});
		$(e).removeClass("topOpen");
		$(e).addClass("topClose");
	}
};

function closeThis(place) {
	$(place).html('');
	window.onbeforeunload = null;
	$(place).unbind('keypress');
}

function inlineEdit(_this, _control) {
	if (_control == "checkbox") {
		_thisId = _this.id;

		_path = $(_this).attr("rel");
		$(_this).replaceWith(
				'<img src="/admin/images/ajax-loader.gif" alt="" id="'
						+ _thisId + '"/>');
		_this = $("#" + _thisId);
		$.post(_path, function(data) {
			$(_this).replaceWith(data);
			$(".inlineEditCheckbox").die('click');
			$(".inlineEditCheckbox").click(function() {
				inlineEdit(this, "checkbox")
			})
		});
	}
}

function deleteThisImage(_path, _field, id, file, cont) {
	if (confirm(jsLngdata.CONFIRM_DELETE)) {
		var _data = {
			'deleteFile' : 'deleteFile',
			'field' : _field,
			'id' : id,
			image : file
		}
		var _ajax = {};
		_ajax.url = _path;
		_ajax.data = _data;
		_ajax.type = "post";
		_ajax.success = function(data) {
			getSessionLife();
		}
		$(cont).hide(150, function() {
			$(this).remove()
		});
		$.ajax(_ajax);
	}

}

function fillThisFromDepended(path, value, _self) {
	//alert(path);
	//$.get(path,{'value':value},function(data){ alert(data)});
	var _ajax = {};
	_ajax.url = path;
	_ajax.data = {
		'value' : value
	};
	_ajax.dataType = "json";
	_ajax.success = function(data) {
		processDependedOPtions(data, _self);
		getSessionLife()
	};
	_ajax.error = function(x, e, s) {
		objectParser(x);
	}
	$.ajax(_ajax);
}

function addOptionsGroup(parent, subs, self) {
	//alert(self);
	var elSel = document.getElementById(self);
	var opgr = document.createElement('optgroup');
	opgr.label = parent.xLabel;
	for (s in subs) {
		var _option = new Option(subs[s].xLabel, subs[s].id, false, false);

		opgr.appendChild(_option);
	}
	elSel.appendChild(opgr);
}
var processDependedOPtions = function(data, _self) {

	if (data.tree) {
		var self = _self;
		removeOptions(self);
		_options = data.options;

		//alert(data.pid);

		for ( var X in data.options[data.pid]) {
			pid = data.options[data.pid][X].id;
			if (data.options[pid]) {
				addOptionsGroup(data.options[data.pid][X], data.options[pid],
						_self)

			} else {
				data.options[data.pid][X].id;

				addOption(_self, data.options[data.pid][X].xLabel,
						data.options[data.pid][X].id);
			}

		}
	} else {
		var self = _self;
		removeOptions(self);
		for ( var i in data) {
			Z = typeof data[i];

			if (Z == 'string')
				addOption(_self, data[i], i);
		}
	}
}
function removeOptions(selectX) {
	var elSel = document.getElementById(selectX);
	var i;
	for (i = elSel.length - 1; i > 0; i--) {

		elSel.remove(i);

	}

	var _optgroup = elSel.getElementsByTagName("optgroup");

	if (_optgroup.length > 0) {
		for (i = _optgroup.length - 1; i >= 0; i--) {
			elSel.removeChild(_optgroup[i]);
		}
	}
}
function addOption(selectControl, option_text, option_value) {

	selectElemObj = document.getElementById(selectControl);
	selectElemObj.options[selectElemObj.options.length] = new Option(
			option_text, option_value, false, false);

}

function convertAlias(value, tabel, other) {
	var OtherObject = "#f_" + tabel + "_" + other;
	//$(OtherObject).val(value);
}

function initUpoaders(continer) {
	$('.uploaders', continer).each(function(item, ui) {
		var _paraxis = ui.id.replace("up_", '');
		uploaderInit(_paraxis);
	});
}

function uploaderInit(_prefix) {

	try {

		var fileExts = $("#" + _prefix + "_fileExt").val();
		var _multiple = $("#" + _prefix + "_multiple").val();

		if (_multiple > 0)
			_multiple = true;
		else
			_multiple = false;

		$("#" + _prefix + "_uploadify").uploadify({
			'uploader' : '/admin/js/uploader/uploadify.swf',
			'script' : '/admin/js/uploader/uploadify.php',
            'scriptData': {
					'PHPSESSID'      : SSid,
					},
			'cancelImg' : '/admin/images/cancel.png',
			'folder' : '../../img/tmp',
			'queueID' : _prefix + '_fileQueue',
			'auto' : true,

			'fileExt' : fileExts,
			"multi" : _multiple,
			'onComplete' : function(event, queueID, fileObj, response, data) {
				onCompletef(event, queueID, fileObj, response, data, _prefix);
			}

		});

	} catch (e) {
		alert(e)
	}
}

function onCompletef(event, queueID, fileObj, response, data, _prefix) {
	try 
	{
		console.log("rawResponse--->",response);
		var responseObj = $.parseJSON(response);
		console.log("responseObj--->",responseObj);
		
		
		if (!responseObj.success) {
			alert(responseObj.Error);
			return false;
		}

		var _file = '/img/tmp/' + responseObj.Filename;
		var _name = $("#" + _prefix + "_name").val();
		var _existinImages = $("#" + _prefix + "_existinImages");
		var _multiple = $("#" + _prefix + "_multiple").val();

		if (_multiple > 0) {
			_name = _name + "[]";
		}

		_name = encodeURI(_name);
		var _path = $("#" + _prefix + "_path").val();
		var postBackPath = _path
				+ "?viewAjax=1&tpl=controls/imageItem.tpl&_imagePath=" + _file
				+ "&_value=" + _file + "&_min=" + 150 + "&_name=" + _name;

		$.post(postBackPath, responseObj, function(data) 
		{
			if (_multiple > 0)
				_existinImages.append(data);
			else
				_existinImages.html(data);
			generateNoty('top', jsLngdata['NOTY_MUST_SAVE'], 'warning');
		});

	} catch (e) {
		console.log(e);
	}
}

function getUploaded(_respones) {
}

var unlinkThisImage = function(elem) {
	var _parent = $(elem).parent();
	_parent.css({
		opacity : "0.5"
	});
	if (confirm(jsLngdata.CONFIRM_DELETE)) {
		_parent.hide(250, function() {

			$(this).remove();
			generateNoty('top', jsLngdata['NOTY_MUST_SAVE'], 'warning');

		})
		return;
	}
	_parent.css({
		opacity : "1"
	});
}

function generateNoty(layout, text, type, timeout) {
	var n = noty({
		text : text,
		type : type,
		dismissQueue : true,
		closeWith : [ 'click' ],
		layout : layout,
		theme : 'defaultTheme',
		timeout : timeout
	});

}
function __initAjaxLoader() {

	/*$().ajaxSend(function(vent, XMLHttpRequest, ajaxOptions) { if(!ajaxOptions.context)	getSessionLife();else{ alert(ajaxOptions.context)} })
	.ajaxStop(function() { 		})
	.ajaxError(function(a, b, e) {alert(b)});*/
}
var marker = null;
var map = null;
var controls = {
	latitude : null,
	longitude : null,
	angle : null
};
function rotateLatLng(pointLat, pointLng, angle) {
	var pos = marker.getPosition();
	var theX = pointLat;
	var theY = pointLng;
	var rotationTheta = angle;
	var rotationThetaRad = rotationTheta * (Math.PI / 180);
	var rotationOriginX = pos.lat();
	var rotationOriginY = pos.lng();

	var newX;
	var newY;

	if (rotationOriginX == 0 && rotationOriginY == 0) {
		newX = theX * Math.cos(rotationThetaRad) - Math.sin(rotationThetaRad)
				* theY;
		newY = theX * Math.sin(rotationThetaRad) + Math.cos(rotationThetaRad)
				* theY;
	} else {
		newX = (theX - rotationOriginX) * Math.cos(rotationThetaRad)
				- (theY - rotationOriginY) * Math.sin(rotationTheta)
				+ rotationOriginX;
		newY = (theX - rotationOriginX) * Math.sin(rotationThetaRad)
				+ (theY - rotationOriginY) * Math.cos(rotationTheta)
				+ rotationOriginY;
	}

	return new google.maps.LatLng(newX, newY);
};
var initAdminGmap = function(latitude, longitude, angle, DirType, gmapHolder) {

	if(controls)
	{
		controls = new Object();
	}
	if(map)
	{
		map = null;
	}
	
	if(marker)
	{
		marker = null;
	}
	controls.latitude = latitude;
	controls.longitude = longitude;
	controls.angle = angle;
	controls.DirType = DirType;

	var myLatlng = new google.maps.LatLng(latitude.val(), longitude.val());

	var mapOptions = {
		zoom : 16,
		center : myLatlng,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById(gmapHolder), mapOptions);

	marker = new google.maps.Marker({
		position : myLatlng,
		map : map,
		flat : true,
		draggable : true,
		animation : google.maps.Animation.DROP,
		title : 'Hello World!'
	});

	google.maps.event.addListener(marker, 'dragend', MakerDrag);
	google.maps.event.addListener(marker, 'click', toggleBounce);
	controls.angle.bind('change keypress',function() {
		createMarker();
	});
	controls.DirType.bind('change keypress', function() {
		
		createMarker();
	});
	controls.latitude.bind('change blur keyup',
			function() {
				var newLatlng = new google.maps.LatLng(latitude.val(),
						longitude.val());
				marker.setPosition(newLatlng);
				map.setCenter(newLatlng);

				createMarker();
			});
	controls.longitude.bind('change blur keyup',
			function() {
				var newLatlng = new google.maps.LatLng(latitude.val(),
						longitude.val());
				marker.setPosition(newLatlng);
				map.setCenter(newLatlng);
				createMarker();
			});
	createMarker();
}
function GradToDeg(angel) {
	var degrees = (Math.PI / 180) * angel;
	return degrees;
}

function createMarker() {

	var DirType = controls.DirType.val();
	DirType = DirType == 3 ? 0:DirType;
	
	var a = createDirectionPatch(controls.latitude.val(), controls.longitude.val(), DirType , controls.angle.val(), 200, 30);

	if (!controls.DirectionView) {
		var DirectionView = new google.maps.Polygon({
			strokeColor : "#00354b",
			strokeOpacity : 1,
			strokeWeight : 1,
			fillColor : "#00354b",
			fillOpacity : 0.35,
			clickable : false,
			map : map,
			path : a,
		});
		controls.DirectionView = DirectionView;
	} else {

		controls.DirectionView.setPath(a);
	}
	
}
//j, k, c, m, l, e
function createDirectionPatch(j, k, c, m, l, e) {

	j = j - 0;
	k = k - 0;
	var h = [ new google.maps.LatLng(j, k) ];
	var n = m;
	n = 360 - n + 90;
	if (c == 0) {
		e = 180;
	}
	e = e / 2;
	var f = Math.PI / 180;
	var a = 180 / Math.PI;
	var b = (l / 6378000) * a;
	var d = b / Math.cos(j * f);
	function g(o) {
		var p = Math.PI * (o / 180);
		sx = k + (d * Math.cos(p));
		sy = j + (b * Math.sin(p));
		h.push(new google.maps.LatLng(sy, sx));

	}
	g(n + e);
	g(n + e / 2);
	g(n);
	g(n - e / 2);
	g(n - e);
	if (c == 2 || c == 0) {
		h.push(new google.maps.LatLng(j, k));
		g(n + e - 180);
		g(n + e / 2 - 180);
		g(n - 180);
		g(n - e / 2 - 180);
		g(n - e - 180)
	}
	return h
}
function GetDirection(angel) {

	var canvas = document.createElement('canvas');
	canvas.width = 65;
	canvas.height = 65;
	var context = canvas.getContext("2d");

	var x = canvas.width / 2;
	var y = canvas.height / 2;
	var radius = 65;
	var startAngle = 1.1 * Math.PI;
	var endAngle = 1.9 * Math.PI;
	var counterClockwise = false;

	context.beginPath();
	context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
	context.lineWidth = 15;

	// line color
	context.strokeStyle = 'black';
	context.stroke();

	return canvas.toDataURL();

}

function MakerDrag(params) {

	controls.latitude.val(params.latLng.lat());
	controls.longitude.val(params.latLng.lng());

	createMarker();
}
function toggleBounce() {

	if (marker.getAnimation() != null) {
		marker.setAnimation(null);
	} else {
		marker.setAnimation(google.maps.Animation.BOUNCE);
	}
	console.log(marker);
}