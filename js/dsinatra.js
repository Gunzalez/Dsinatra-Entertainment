// JavaScript Document
var isMobile = false;
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
 	isMobile = true;
	document.getElementsByTagName('html')[0].className = document.getElementsByTagName('html')[0].className + ' mobile';
} else {	
	document.getElementsByTagName('html')[0].className = document.getElementsByTagName('html')[0].className + ' desktop';
}

var dsinatra = {
	util: {
		shuffle: function(arr){
			var o = arr;
			for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
			return o;
		},
		setImage: function(img, src){
			$(img).attr('src',src);
		},
		getById: function(id){
			return document.getElementById(id);
		},
		getByTag: function(tagname){
			return document.getElementsByTagName(tagname)[0];
		},
		getByClass: function(className, node){
			if(!node) node = document.getElementsByTagName("body")[0];
			var a = [];
			var re = new RegExp('\\b' + classname + '\\b');
			var els = node.getElementsByTagName("*");
			for(var i=0,j=els.length; i<j; i++){
				if(re.test(els[i].className))a.push(els[i]);
			}
			return a;
		}
	},
	carousel: {
		busy: false,
		hover: false,
		loop: '',
		count: 0,
		speed: 1250,
		delay: 10000,
		width: 950,
		easing: 'swing',
		setUp: function(){
			
			// initial carousel state
/*			$('#slideshow ul').prepend($('#slideshow ul li').last());
			$('#slideshow ul li:eq(1)').addClass('active');
			$('#slideshow ul li .imagery').not('.active .imagery').css('opacity','0');
			$('#slideshow ul li .copy').not('.active .copy').css('display','none');*/
			
			// next and prev buttons
			var nextButton = $('<a href="#" class="controls prev">Prev</a>');
			nextButton.css({
				left: '0'
			}).on('click',function(e){
					$(this).blur();
					e.preventDefault();
					if(dsinatra.carousel.busy == true){
						return false;
					} else {						
						clearTimeout(dsinatra.carousel.loop);
						dsinatra.carousel.prev();
					}
				});
			var prevButton = $('<a href="#" class="controls next">Next</a>');
			prevButton.css({
				right: '0'
			}).on('click',function(e){
					$(this).blur();
					e.preventDefault();
					if(dsinatra.carousel.busy == true){
						return false;
					} else {
						clearTimeout(dsinatra.carousel.loop);
						dsinatra.carousel.next();
					}
				});
			$('#content').append(nextButton).append(prevButton);			
			
			if(!isMobile){
				if(!$('html').hasClass('lt-ie9')){
					nextButton.css('left','-58px');
					prevButton.css('right','-58px');
					$(window).mousemove(function(e){
						if((e.pageY >= 140) && (e.pageY <= 590)){
							dsinatra.carousel.hover = true;
							nextButton.stop().animate({
								'left': 0
							}, 750, 'easeOutElastic');
							prevButton.stop().animate({
								'right': 0
							}, 750, 'easeOutElastic');
						} else {
							dsinatra.carousel.hover = false;
							nextButton.stop().animate({
								'left': '-66px'
							}, 250, 'linear');
							prevButton.stop().animate({
								'right': '-66px'
							}, 250, 'linear');
						}
					});
				}
			}
			
			// auto start
			dsinatra.carousel.loop = setInterval(function(){
				if(!dsinatra.carousel.hover){
					dsinatra.carousel.next();
				}
			}, dsinatra.carousel.delay);	
			
		},
		prev: function(){
			dsinatra.carousel.busy = true;
			$('#slideshow .active').removeAttr('class');	
			$('#slideshow ul').prepend($('#slideshow ul li').last());
			$('#slideshow ul').css('left','-'+(dsinatra.carousel.width * 2)+'px');
			$('#slideshow ul').animate({
				left: '-' + dsinatra.carousel.width
			}, dsinatra.carousel.speed, dsinatra.carousel.easing, function(){
                    $('#slideshow ul li:eq(1)').addClass('active');
					dsinatra.carousel.busy = false;
				});
		},
		next: function(){
			dsinatra.carousel.busy = true;
			$('#slideshow .active').removeAttr('class');			
			$('#slideshow ul').animate({
				left: '-=' + dsinatra.carousel.width
			}, dsinatra.carousel.speed, dsinatra.carousel.easing, function(){
					$('#slideshow ul').append($('#slideshow ul li').first());
					$('#slideshow ul li:eq(1)').addClass('active');
					$('#slideshow ul').css('left','-'+dsinatra.carousel.width+'px');
					dsinatra.carousel.busy = false;
				});
		}
	},
	members: {
		setUp: function(){
			$('#members li a').on('click',function(e){
				e.preventDefault();
				var $imgSrc = $(this).find('img').attr('src');
				var $details = $(this).siblings('.details');
				var top = $(this).offset().top - 1;
				var left = $(this).offset().left - 1;				
				if($('#member-focus').length > 0){
					$('#member-focus').empty();
					$('#member-focus').append($('<img src="'+$imgSrc+'" width="145" height="193" />')).append($details.clone());					
				} else {
					var $focus = $('<div id="member-focus"><img src="'+$imgSrc+'" width="145" height="193" /></div>');
					$('body').append($focus);
					$focus.append($details.clone());
				}
				$('#member-focus').css({
					top: top,
					left: left
				});				
			});
			
			$(window).on('resize',function(){
				$('#member-focus').remove();
			});
			
			$('.copy').on('click',function(){
				$('#member-focus').remove();
			});
			
			setTimeout(function(){
				$('#members li > a:eq(4)').trigger('click');
			}, 250);
			
		}		
	},
	events: {
		curList : 0,
		setUp: function(){
									
			$('.events a').on('click',function(e){
				
				e.preventDefault();
				if($(this).hasClass('no-images')){
					return false;	
				}
				
				$('.events .active').removeClass('active');
				$(this).addClass('active').blur();
				
				var eventlist = $(this).parents('.events');
				var eventIndex = $('.events').index(eventlist);
				
				// move details div, then scroll page
				if(dsinatra.events.curList != eventIndex) {					
					$('#details').insertAfter('.events:eq('+eventIndex+')');
					dsinatra.events.curList = eventIndex;
					$('body,html').animate({
						scrollTop: $('.events:eq('+eventIndex+')').offset().top - 100
					}, 750);
				}		
				var index = $('.events:eq('+eventIndex+') a').index($(this));
				$('#details .arrow').css({
						'background-position': ((155 * index) + 50)+'px 0'
					});				
				$('#details .copy').html($(this).find('.copy').html());
				$('span.link').css({
					cursor : 'pointer'
					}).on('click',function(){
						window.location = $(this).attr('data-link')
						})				
			});
			$('.events:eq('+dsinatra.events.curList+') a:eq(2)').trigger('click');			
		}		
	},
	gallery2: {
		curGal: 0,
		busy: false,
		rangeChecks: function(){
			var leftPos = Math.abs($('.open .gallery').css('left').replace('px',''));
			var width = $('.open .gallery').width() - 915;
			if(leftPos >= width){
				$('.open .gallery').attr('data-left', 'end');
				$('.galleries .right').addClass('disabled');
			} else {
				$('.open .gallery').attr('data-left', '');
				$('.galleries .right').removeClass('disabled');
			}
			if(leftPos == 0){
				$('.open .gallery').attr('data-right', 'end');
				$('.galleries .left').addClass('disabled');
			} else {
				$('.open .gallery').attr('data-right', '');	
				$('.galleries .left').removeClass('disabled');
			}
		},
		setUp: function(){
			$('.set-anchor').on('click',function(e){
				e.preventDefault();
				if(!dsinatra.gallery2.busy){
					dsinatra.gallery2.busy = true;
					$('.gallery-set').removeClass('open');
					$(this).parent().addClass('open');
										
					$('.galleries .controls').animate({
							top: $('.open .gallery-images').offset().top - 175
						}, 250, 'swing', function(){
								dsinatra.gallery2.rangeChecks();	
								dsinatra.gallery2.busy = false;
						});
				}
			});
			$('.gallery').each(function(i, obj){
				var length = $(obj).find('li').length;
				$(obj).css({
						width: (length * (168 + 15)) + 'px'
					});
				$(obj).attr('data-left', 'end');
				$(obj).attr('data-right', 'end');
				if(length > 5){
					$(obj).attr('data-left', '');
				}
				$(obj).find('a').lightBox();				
			});
			$('.galleries .right').on('click',function(e){
					e.preventDefault();
					if(!dsinatra.gallery2.busy){						
						if($('.open .gallery').attr('data-left') != 'end'){
							dsinatra.gallery2.busy = true;
							$('.open .gallery').animate({
									left: '-=' + 915 + 'px'
								}, 600, function(){
									dsinatra.gallery2.rangeChecks();
									dsinatra.gallery2.busy = false;
								});
						}
					}
				});
			$('.galleries .left').on('click',function(e){
					e.preventDefault();
					if(!dsinatra.gallery2.busy){
						if($('.open .gallery').attr('data-right') != 'end'){
							dsinatra.gallery2.busy = true;
							$('.open .gallery').animate({
									left: '+=' + 915 + 'px'
								}, 600, function(){
									dsinatra.gallery2.rangeChecks();
									dsinatra.gallery2.busy = false;
								});
						}
					}
				});
			dsinatra.gallery2.rangeChecks();
			$('.galleries .controls').css('top', $('.open .gallery-images').offset().top - 175);	
		}		
	},
	gallery: {
		
		attachHover: function(){
			$('#photos a').each(function(i, obj){
				var height = $(obj).height();
				var width = $(obj).width();
				var $span = $('<span />');
				$span.css({
					'margin-top': '-'+height+'px',
					width: width,
					height: height
				});
				
				$(obj).append($span);
			})
		},
		
		ieFix: function(){
			var count = 0;
			if($.browser.msie && $.browser.version < 10) {
				
				$('#photos > div a').each(function(i, obj){
					if(count > 2){
						count = 0;
					}
					if($('#photos .col:eq('+count+')').length < 1){
						var $col = $('<div class="col"></div>');
						$col.append($(obj));
						$('#photos').append($col);
					} else {
						$('#photos .col:eq('+count+')').append($(obj));
					}
					count = count + 1;
				});
				
				$('#photos div:eq(2)').append($('#photos div:eq(1) a:eq('+($('#photos div:eq(1) a').length-1)+')')); // Moving the last link of the first div into the second div, on one line, naughty.
				$('#photos div:eq(0)').append($('#photos div:eq(1)')).append($('#photos div:eq(2)')).append($('#photos div:eq(3)'));
								
			}
		},
		
		stickyNavTop: '',
		stickyNav: function(){
						  
			var scrollTop = $(window).scrollTop(); 
			if (scrollTop > dsinatra.gallery.stickyNavTop) {   
				$('#photo-nav').addClass('floated');  
			} else {  
				$('#photo-nav').removeClass('floated');   
			}  
		},  
		
		setUp: function(){
			
			dsinatra.gallery.stickyNavTop = $('#photo-nav').offset().top;
			
			// lightbox the initial images
			//dsinatra.gallery.attachHover();
			$('#photos a').lightBox();				
			
			$('#photo-nav li').on('click',function(e){
				e.preventDefault();
				
				if($(this).hasClass('active')){
					return false;
				}
				
				$('#photo-nav li').removeClass('active');
				$(this).addClass('active');
				
				$('body,html').animate({
					scrollTop: 0
				}, 500);
				
				var thisId = $(this).find('a').attr('id');
				var doAjax = true;
				
				// store current content
				$('#viewed-galleries').append($('#photos').html());					
				// clear the stage
				$('#photos').empty();					
				
				// use stored content if available
				$('#viewed-galleries div').each(function(i, obj){
					if($(obj).hasClass(thisId)){
						$('#photos').append($(obj));
						$('#photos a').lightBox();
						doAjax = false;
					}
				});					
				
				// ajax in new content
				if(doAjax){
					$('#photos').append($('<div class="preloader"></div>'));
					var imagesUrl = $(this).find('a').attr('href');
					$('#photos').load( imagesUrl, function( response, status, xhr ){
						$('.preloader').remove();
						dsinatra.gallery.ieFix();
						$('#photos a').lightBox();
					});
				}
				
			});// click event end
			
			$(window).on('scroll',function(){
				
				if($.browser.msie && $.browser.version < 10) {
					return false;
				}
				
				if(isMobile) {
					return false;
				}
				
				var combinedHeight = $('#header').height() + $('#content').height() - $('#photo-nav').height() - 100; // 100 ir rough height for padding under photos
				if( $(window).scrollTop() >= combinedHeight ){
					$('#photo-nav').css({
						'padding-top': $('#photos').height() - $('#photo-nav').height() + 30 // 30 is rough height of header + padding
					}).removeClass('floated');
				} else {
					$('#photo-nav').removeAttr('style');
					dsinatra.gallery.stickyNav();
				}
			})
			
			// ie
			dsinatra.gallery.ieFix();	
							
		}
	},
	inputs : {
		list : ['name','email'],
		setUp : function(){
			var placeholderSupport = ("placeholder" in document.createElement("input")); 
			if(!placeholderSupport){
				$.each(dsinatra.inputs.list, function(index, value){				
					$('#'+value).val($('#'+value).attr('placeholder')).addClass('empty');
					$('#'+value).on('focus',function(){
						if($.trim($('#'+value).val()) == $('#'+value).attr('placeholder')){
							$('#'+value).val('').removeClass('empty');
						}
					}).on('blur',function(){
						if($.trim($('#'+value).val()) == ''){
							$('#'+value).val($('#'+value).attr('placeholder')).addClass('empty')
						}
					})
				})
			}
			$('.txt').on('focus',function(){
				$(this).parents('.row').removeClass('error');
			});	
			$('#frmContact').submit(function(e){
				
				e.preventDefault();
				
				var hasErrors = false;
				$('#frmContact .error').removeClass('error');
				
				var IsEmail = function(email){
					var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					return regex.test(email);
				};
				
				var emailaddress = $(this).find('.email').val();			
				if(!IsEmail(emailaddress)){	
					$(this).find('.email').parents('.row').addClass('error');
					hasErrors = true;
				}
							
				var requireds = $(this).find('.required');
				requireds.each(function(){
					if($.trim($(this).val()) == ''){
						$(this).parents('.row').addClass('error');
						hasErrors = true;
					}
				});				
							
				if(hasErrors){			
					return false;				
				} else {
					
					$('#frmContact').css('display','none');
					$('#sending').css('display','block');
					
					var url = $('#frmContact').attr('action');
					var posting = $.post(url, $('#frmContact').serialize());
					
					posting.done(function(data) {
						/* var content = $(data).find('#content');
						$("#result").empty().append(content); */
						setTimeout(function(){
							$('#sending').css('display','none');						
							$('#sent').css('display','block');
						}, 500);
					});
					
					posting.fail(function(data){
						$('#sending').css('display','none');						
						$('#error').css('display','block');
					});
					
					return true;	
				}
				
			});
				
			$('.tryagain').on('click',function(){						
				$('#error').css('display','none');
				$('#frmContact').css('display','block');
			});
		}
	},
	comestic: {
		setUp: function(){
			if($('.newslist-home').length > 0){
				$('.newslist-home li').each(function(i, obj){
					$(obj).on('mouseenter',function(){
						$(obj).addClass('on');
					}).on('mouseleave',function(){
						$(obj).removeClass('on');
					});
				});
			}

            if($('.new-window').length > 0){
                $('.new-window').each(function(i, obj){
                    var $obj = $(obj);
                    $obj.on('click', function(event){
                        event.preventDefault();

                        var href = $(this).attr('href');
                        window.popup_window = window.open(href, "popupWindow", "width=600,height=600,scrollbars=yes");


                    });
                });
            }
		}
	},
	twitterfeed: {
		setUp: function(){
								
			/*$.ajax({
			  url: 'https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=DsinatraE&count=1&callback=?',			  
			  dataType: 'json',
			  success: function(data){
				$('<h2 class="clearfix"><span>Recent Tweet</span></h2>').insertBefore('#jstweets');	
				$.each(data, function(i,item){
				  ct = item.text;
				  // include time tweeted - thanks to will
				  mytime = item.created_at;
				  var strtime = mytime.replace(/(\+\S+) (.*)/, '$2 $1')
				  var mydate = new Date(Date.parse(strtime)).toLocaleDateString();
				  var mytime = new Date(Date.parse(strtime)).toLocaleTimeString();
				  ct = dsinatra.twitterfeed.processTweetLinks(ct);
				  $("#jstweets").append('<div class="tweet">'+ct + ' <span class="small">Posted: ' + mydate + ' @ ' + mytime + '</span></div>');
				});
			  }
			});*/
			
		},
		processTweetLinks: function(text){
			var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/i;
			text = text.replace(exp, "<a href='$1' target='_blank'>$1</a>");
			exp = /(^|\s)#(\w+)/g;
			text = text.replace(exp, "$1<a href='http://search.twitter.com/search?q=%23$2' target='_blank'>#$2</a>");
			exp = /(^|\s)@(\w+)/g;
			text = text.replace(exp, "$1<a href='http://www.twitter.com/$2' target='_blank'>@$2</a>");
			return text;
		}		
	},
	form: {
		setUp: function(){
			$('.textareas textarea').not($('.textareas textarea:eq(0)')).css('display','none');
			$('.textareas label span').on('click',function(){
				$(this).parents('.row').find('textarea').css('display','block');
				$(this).parents('label').html($(this).html());
			});
			
			$('#application-form input').on('focus',function(){
				$(this).parents('.row').removeClass('error');
			});
			
			$('#application-form .upload').on('click',function(){
				$(this).parents('.row').removeClass('error');
			});
			
			$('#application-form select').on('change',function(){
				$(this).parents('.row').removeClass('error');
			});
			
			$('#application-form').submit(function(){				
				var rtnVal = true;
							
				$('#application-form input, #application-form select').each(function(index, obj){
					var $inputField = $(obj);
					if($inputField.attr('data-validate') !== undefined){
						var type = $inputField.attr('data-validate');
						switch (type){
						case 'text':
							// This field is mandatory
							if($.trim($inputField.val()).length < 1 ){
								$inputField.parents('.row').addClass('error');
								rtnVal = false;
							}
							break;
						case 'email':
							// This field must have an email address
							var IsEmail = function(email){
								var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
								return regex.test(email);
							};		
							if(!IsEmail($.trim($inputField.val()))){	
								$inputField.parents('.row').addClass('error');
								rtnVal = false;
							}
							break;
						case 'select':
							// This field must not have first value selected							
							var IsDefault = function(obj){
								var defaultVal = obj.find('option:first').val();
								var selectedVal = obj.val();
								if( defaultVal == selectedVal ){
									return true;	
								} else {
									return false;
								}
							};		
							if(IsDefault($inputField)){	
								$inputField.parents('.row').addClass('error');
								rtnVal = false;
							}
							break;
						case 'upload':
							// This field must contain an image file							
							var fileName = $.trim($inputField.val());
							var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
							if( ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" ){
								// return true;
							} else {
								$inputField.parents('.row').addClass('error');
								rtnVal = false;
							}
							break;	
						default:
							// Do nowt for now.
						}
					}
					
				});
				
				if(!rtnVal){
					$('body,html').animate({
						scrollTop: 0
					}, 1000);	
				} else {
                    $('#submit-button').addClass('disabled').attr('disabled','disabled');
                    $('#loading').removeClass('displayNone');
                    $('#shield').removeClass('displayNone');
                }
				
				return rtnVal;
				
			});

            $('#terms-and-conditions').on('change',function(){
                if(this.checked == true){
                    $('#submit-button').removeClass('disabled').removeAttr('disabled');
                } else {
                    $('#submit-button').addClass('disabled').attr('disabled','disabled');
                }
            });

		}
	},
	init: function(){
		if($('#slideshow').length > 0){
			dsinatra.carousel.setUp();
		}
		if($('#eventspage').length > 0){
			dsinatra.events.setUp();
		}
		if($('#gallerypage').length > 0){
			dsinatra.gallery.setUp();
		}
		if($('#gallerypage2').length > 0){
			dsinatra.gallery2.setUp();
		}
		if($('#frmContact').length > 0){
			dsinatra.inputs.setUp();	
		}
		if($('#jstweets').length > 0){
			dsinatra.twitterfeed.setUp();	
		}
		if($('#application-form').length > 0){
			dsinatra.form.setUp();	
		}
		if($('#members').length > 0){
			dsinatra.members.setUp();	
		}
		dsinatra.comestic.setUp();
	}
};
/*
var success = function(){
	console.log('xxx');
}*/

$(document).ready(function(){
	dsinatra.init();
});