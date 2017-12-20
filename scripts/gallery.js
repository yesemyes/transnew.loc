Gallery = function() {
	var self = this;
	self.path = '';
	self.index = 0;
	self.isPrev = false;
	self.isNext = false;
	self.uniqid = uniqid('gallery_overlay_');
	self.continer = null;
	this.options = {
		imagesPath: '',
		widthSmall: 126,
		heightSmall: 82,
		useBig: true,
		pageLimit: 6,
		animation: true,
		speed: 150,
		sideSizing: .68,
		buttonSpace: 100
	};

	this.open = function(path) {
		self.build();
		if (self.opened) return;
		$('html,body').addClass('gallery-no-scroll');
		var onOpen = function() {
			$('.gallery-wrapper',self.continer).show();
			self.monitorWidth = $('.gallery-monitor',self.continer).width();
			if (path) {
				self.show(path);
				$('.gallery-selector span',self.continer).removeClass('active');
				$('.gallery-selector img[' +(self.options.useBig ? 'rel' : 'src')+ '="' +path+ '"]',self.continer).parent().addClass('active');
			}
			self.opened = true;
		};
		if ($.browser.msie) {
			$('.gallery-overlay',self.continer).show();
			onOpen();
		}
		else {
			$('.gallery-overlay',self.continer).fadeIn(self.options.speed / 2, onOpen);
		}
		$('html').bind(((navigator.userAgent.indexOf('Firefox') >= 0 && navigator.userAgent.indexOf('Mac') >= 0) || window.opera) ? 'keypress' : 'keydown', self.keypress);
	};

	this.close = function() 
	{
		if (!self.opened) return;
		var onClose = function() {
			$('.gallery-wrapper',self.continer).hide();
			$('.gallery-overlay',self.continer).fadeOut(self.options.speed / 2, function() {
				$('html,body').removeClass('gallery-no-scroll');
				$('.gallery-center img, .gallery-left img, .gallery-right img',self.continer).remove();
				self.path = '';
				self.opened = false;
			});
		};
		if ($.browser.msie) {
			$('.gallery-wrapper',self.continer).hide();
			onClose();
		}
		else {
			$('.gallery-wrapper',self.continer).fadeOut(self.options.speed / 2, onClose);
		}
		$('html').unbind(((navigator.userAgent.indexOf('Firefox') >= 0 && navigator.userAgent.indexOf('Mac') >= 0) || window.opera) ? 'keypress' : 'keydown');
	};

	this.build = function(images,continer) {
	
	 
		if ($.playerOpened) {
			playerCloseInline();
			$.playerOpened = false;
		}
		if (!(images instanceof Array)) {
			return;
		}
		self.images = images;
		/* build interface */
		if (!self.built) {
			$('body').append('<div id="'+self.uniqid+'"><div class="gallery-overlay"></div><div class="gallery-wrapper"><div class="gallery-monitor"><div class="gallery-center"></div><div class="gallery-left"><div class="gallery-prev"></div></div><div class="gallery-right"><div class="gallery-next"></div></div></div><div class="gallery-selector"></div><div class="gallery-close"></div></div></div>');
			
			self.continer  = $("#"+self.uniqid);
			
			
			$('.gallery-close',self.continer).click(function() {
				self.close();
			});
			if (self.images.length > 1) {
				$('.gallery-prev',self.continer).click(self.prev);
				$('.gallery-next',self.continer).click(self.next);
			}
			self.built = true;
		}
		/* generate thumbnails */
		$('.gallery-selector',self.continer).empty();
		$('.gallery-thumbnails',continer).empty();
		
		var item;
		
		for (var i=0; i<self.images.length; i++) 
		{
			item = '<span><img src="' +self.options.imagesPath + self.images[i].small+ '"'+(self.options.useBig ? ' rel="' +self.options.imagesPath + self.images[i].big+ '"' : '')+' alt="" width="' +self.options.widthSmall+ '" height="' +self.options.heightSmall+ '" /></span>';
			
			
			$('.gallery-selector',self.continer).append(item);
			
			
			if (i < self.options.pageLimit) 
			{
				$('.gallery-thumbnails',continer).append(item);
			}
			
		}
		$('.gallery-selector span',self.continer).click(self.clickSmall);
		$('.gallery-thumbnails span',continer).click(self.clickPage);
	};

	this.show = function(path) {
		if (self.showing || path == self.path) {
			return false;
		}
		self.showing = true;
		self.path = path;
		var imgsBig, imgs2, imgs1, showImage, showPrevNext, animatics;
		var resizeHolders = function(dir) {
			if (!dir || dir == 'right') {
				$('.gallery-right',self.continer).width(parseInt((parseInt(self.monitorWidth) + parseInt(self.images[self.index].width)) / 2));
				$('.gallery-next',self.continer).css('margin-left', parseInt(self.images[self.isPrev ? self.indexNext : self.index].width / 2) + self.options.buttonSpace);
			}
			if (!dir || dir == 'left') {
				$('.gallery-left',self.continer).width(parseInt((parseInt(self.monitorWidth) + parseInt(self.images[self.index].width)) / 2));
				$('.gallery-prev',self.continer).css('margin-right', parseInt(self.images[self.isNext ? self.indexPrev : self.index].width / 2) + self.options.buttonSpace);
			}
		};
		if (self.images.length > 1) {
			self.index = self.getIndex(path);
			self.indexPrev = self.index > 0 ? self.index - 1 : self.images.length - 1;
			self.indexNext = self.index < self.images.length - 1 ? self.index + 1 : 0;
		}
		$('.gallery-center',self.continer).animate({
			width: self.images[self.index].width,
			height: self.images[self.index].height
		}, self.options.speed * 2);
		if (self.images.length > 1) {
			if (self.isNext || self.isPrev) {
				if (self.options.animation) {
					var sideHolder1 = self.isNext ? '.gallery-right' : '.gallery-left';
					var sideHolder2 = self.isNext ? '.gallery-left' : '.gallery-right';
					var index1 = self.isNext ? self.indexNext : self.indexPrev;
					var index2 = self.isNext ? self.indexPrev : self.indexNext;
					var dir1 = self.isNext ? 'right' : 'left';
					var dir2 = self.isNext ? 'left' : 'right';
					resizeHolders(dir1);
					// move to next
					$(sideHolder1,self.continer).append('<img src="' +self.options.imagesPath + self.images[index1][self.options.useBig ? 'big' : 'small']+ '" alt="" width="' +parseInt(self.images[index1].width*self.options.sideSizing)+ '" height="' +parseInt(self.images[index1].height*self.options.sideSizing)+ '" />');
					// move and make big next image
					imgs1 = $(sideHolder1 + ' img',self.continer);
					animatics = {
						top: 0,
						width: self.images[self.index].width,
						height: self.images[self.index].height
					};
					animatics[dir1] = $(sideHolder1).width() - self.images[self.index].width;
					$(imgs1[0]).animate(animatics, self.options.speed * 3, function() {
						$(imgs1[0]).css(dir1, 'auto').appendTo($('.gallery-center',self.continer));
						$(imgs1[1]).fadeIn(self.options.speed);
						var css = {
							top: parseInt((self.images[self.index].height - self.images[index1].height * self.options.sideSizing) / 2)
						};
						css[dir1] = -parseInt(self.images[index1].width*self.options.sideSizing) + 100;
						$(imgs1[1]).css(css);
						self.showing = false;
					});
					// remove prev image
					imgs2 = $(sideHolder2 + ' img',self.continer);
					$(imgs2[0]).fadeOut(self.options.speed, function() {
						$(imgs2[0]).remove();
					});
					// move old image
					imgsBig = $('.gallery-center img',self.continer);
					animatics = {
						top: parseInt((self.images[self.index].height - self.images[index2].height * self.options.sideSizing) / 2),
						width: parseInt(self.images[index2].width * self.options.sideSizing),
						height: parseInt(self.images[index2].height * self.options.sideSizing)
					};
					animatics[dir2] = -parseInt(self.images[index2].width * self.options.sideSizing) + 100;
					$(imgsBig[0]).css(dir2, parseInt((self.monitorWidth - self.images[index2].width) / 2)).css('top', 0).appendTo($(sideHolder2,self.continer)).animate(animatics, self.options.speed * 3, function() {resizeHolders(dir2);});
				}
				else {
					showImage = showPrevNext = true;
				}
			}
			else {
				showImage = showPrevNext = true;
			}
		}
		else {
			showImage = true;
		}
		if (showImage) {
			// show new image
			$('.gallery-center',self.continer).append('<img src="' +path+ '" alt="" width="' +self.images[self.index].width+ '" height="' +self.images[self.index].height+ '" />');
			imgsBig = $('.gallery-center img',self.continer);
			$(imgsBig[imgsBig.length - 1]).fadeIn(self.options.speed, function() {
				self.showing = false;
			});
			// hide old image
			if (imgsBig.length > 1) {
				$(imgsBig[0]).fadeOut(self.options.speed, function() {
					$(imgsBig[0]).remove();
				});
			}
		}
		if (showPrevNext) {
			resizeHolders();
			$('.gallery-left',self.continer).append('<img src="' +self.options.imagesPath + self.images[self.indexPrev][self.options.useBig ? 'big' : 'small']+ '" alt="" width="' +parseInt(self.images[self.indexPrev].width*self.options.sideSizing)+ '" height="' +parseInt(self.images[self.indexPrev].height*self.options.sideSizing)+ '" />');
			imgs2 = $('.gallery-left img',self.continer);
			$(imgs2[imgs2.length - 1]).fadeIn(self.options.speed, function() {
				if (imgs2.length > 1) {
					$(imgs2[0]).remove();
				}
			});
			$(imgs2[imgs2.length - 1]).css({
				left: -parseInt(self.images[self.indexPrev].width*self.options.sideSizing) + 100,
				top: parseInt((self.images[self.index].height - self.images[self.indexPrev].height * self.options.sideSizing) / 2)
			});
			$('.gallery-right',self.continer).append('<img src="' +self.options.imagesPath + self.images[self.indexNext][self.options.useBig ? 'big' : 'small']+ '" alt="" width="' +parseInt(self.images[self.indexNext].width*self.options.sideSizing)+ '" height="' +parseInt(self.images[self.indexNext].height*self.options.sideSizing)+ '" />');
			imgs1 = $('.gallery-right img',self.continer);
			$(imgs1[imgs1.length - 1]).fadeIn(self.options.speed, function() {
				if (imgs1.length > 1) {
					$(imgs1[0]).remove();
				}
			});
			$(imgs1[imgs1.length - 1]).css({
				right: -parseInt(self.images[self.indexNext].width*self.options.sideSizing) + 100,
				top: parseInt((self.images[self.index].height - self.images[self.indexNext].height * self.options.sideSizing) / 2)
			});
		}
		return true;
	};
	
	this.getIndex = function(path) {
		for (var i=0; i<self.images.length; i++) {
			if (self.options.imagesPath + (self.options.useBig ? self.images[i].big : self.images[i].small) == path) {
				return i;
			}
		}
	};
	
	this.next = function() {
	
		console.log("next",$('.gallery-selector span',self.continer));
		
		if (self.indexNext != undefined) 
		{
			self.isNext = true;
			$($('.gallery-selector span',self.continer)[self.indexNext]).click();
		}
	};
	
	this.prev = function() 
	{
		console.log("prev",$('.gallery-selector span',self.continer));
		
		if (self.indexPrev != undefined) {
			self.isPrev = true;
			$($('.gallery-selector span',self.continer)[self.indexPrev]).click();
		}
	};

	this.clickSmall = function(e) 
	{
		
		
		if (self.show($(e.currentTarget).find('img').attr(self.options.useBig ? 'rel' : 'src'))) {
			$('.gallery-selector span',self.continer).removeClass('active');
			$(e.currentTarget).addClass('active');
		}
		if (self.isPrev) {
			self.isPrev = false;
		}
		if (self.isNext) {
			self.isNext = false;
		}
	};

	this.clickPage = function(e) 
	{
			self.open($(e.currentTarget).find('img').attr(self.options.useBig ? 'rel' : 'src'));
	};

	this.keypress = function(e) {
		if (!self.opened) return true;
		switch (e.keyCode) {
			case 27:	// ESC
				self.close();
				return false;
				break;
			case 37:	// left
				self.prev();
				return false;
				break;
			case 32:	// space
			case 39:	// right
				self.next();
				return false;
				break;
			default:
				//console.log(e.keyCode);
				return true;
				break;
		}
	};
	
	
	return this;
};


function uniqid (prefix, more_entropy) {
  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +    revised by: Kankrelune (http://www.webfaktory.info/)
  // %        note 1: Uses an internal counter (in php_js global) to avoid collision
  // *     example 1: uniqid();
  // *     returns 1: 'a30285b160c14'
  // *     example 2: uniqid('foo');
  // *     returns 2: 'fooa30285b1cd361'
  // *     example 3: uniqid('bar', true);
  // *     returns 3: 'bara20285b23dfd1.31879087'
  if (typeof prefix === 'undefined') {
    prefix = "";
  }

  var retId;
  var formatSeed = function (seed, reqWidth) {
    seed = parseInt(seed, 10).toString(16); // to hex str
    if (reqWidth < seed.length) { // so long we split
      return seed.slice(seed.length - reqWidth);
    }
    if (reqWidth > seed.length) { // so short we pad
      return Array(1 + (reqWidth - seed.length)).join('0') + seed;
    }
    return seed;
  };

  // BEGIN REDUNDANT
  if (!this.php_js) {
    this.php_js = {};
  }
  // END REDUNDANT
  if (!this.php_js.uniqidSeed) { // init seed with big random int
    this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
  }
  this.php_js.uniqidSeed++;

  retId = prefix; // start with prefix, add current milliseconds hex string
  retId += formatSeed(parseInt(new Date().getTime() / 1000, 10), 8);
  retId += formatSeed(this.php_js.uniqidSeed, 5); // add seed hex string
  if (more_entropy) {
    // for more entropy we add a float lower to 10
    retId += (Math.random() * 10).toFixed(8).toString();
  }

  return retId;
}