$(function() {
	
	var imgsLoaded = 0;
		
	$('.hidden-image').each(function(){
		$(this).find('img').load(function(){
			imgsLoaded++;
		});
	});
	
	// form validetion regex
	var validation = {
		isEmailAddress:function(str) {
			var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			return pattern.test(str);  // returns a boolean
		},
		isNotEmpty:function (str) {
		   var pattern =/\S+/;
		   return pattern.test(str);  // returns a boolean
		},
		isNumber:function(str) {
		   var pattern = /^\d+$/;
		   return pattern.test(str);  // returns a boolean
		},
	}
	
	$(window).load(function(){
	
		// cache window width dimension parameters
		var winwid = parseInt($('#window-width').css('width'));
		var winhei = parseInt($('#window-height').css('height'));
		
		(function splashLoad(){
			$('#loader-wrapper').fadeOut(200, function(){
				$('#splash-top, #splash-bottom').addClass('initialise');
				$('#splash-divider').delay(400).animate({
					width: '100%'
				}, 1000, 'easeInOutQuint', function(){
					$('#splash-divider').hide();
					$('#splash-top-wrapper, #splash-bottom-wrapper').addClass('initialise');
					setTimeout(function(){
						$('#splash-wrapper').remove();
					}, 1000);
				});
			});
		})();
		
		function loadSection(section){
			$('.animate').removeClass('animate');
			$('.current').removeClass('current');
			setTimeout(function(){
				$('.content-section').hide();
			}, 1000);
			
			switch (section){
				case 'home': // home
					//code here
					
					$('.menu-item[data-tab="home"]').addClass('current');
					$('.content-section#home').addClass('current');
					setTimeout(function(){
						$('.content-section.current').fadeIn(100);
						$('#heading-wrapper, #get-started-quote-wrapper #quote, #about-wrapper div, #cover-about .face1, #cover-wrapper div, #about-wrapper, #cover-wrapper #buy-div').addClass('animate');
					}, 1200);
					
					break;
				case 'contact': // contact
					//code here
					
					$('.menu-item[data-tab="contact"]').addClass('current');
					$('.content-section#contact').addClass('current');
					setTimeout(function(){
						$('.content-section.current').fadeIn(100);
						$('.contact-prof-pic, .contact-description, #inkspire-contact-wrapper div').addClass('animate');
					}, 1200);
					
					break;
			}
		}
		
		function toggleMenuState(){
			$('.slit, .menu-item, #content-inner').toggleClass('open');
			$('#cover-wrapper #buy-div').removeClass('open').addClass('close');
		}
		
		var initLoad;
		if(window.location.hash)
		{
			initLoad = window.location.hash.substr(2);
		}
		else
		{
			initLoad = 'home';
		}
		
		setTimeout(function(){
			loadSection(initLoad);
		}, 500);
		
		$('.menu-item').each(function(){
			$(this).on('click', function(){
				if($(this).hasClass('current'))
				{
					toggleMenuState();
				}
				else
				{
					var thisTab = $(this).data('tab');
					console.log(thisTab);
					toggleMenuState();
					loadSection(thisTab);
					window.location.hash = 'Z'+thisTab;
				}
				
			});
		});
		
		$('#cover-about .face1').on('click', function(){
			$('#cover-about .face2').toggleClass('animate');
			setTimeout(function(){
				$('#app-submit').addClass('animate');
			}, 400);
		});
		
		$('#menu-toggle, #dummy-disable').on('click', function(){
			toggleMenuState();
		});
		
		function toggleBuy(){
			$('#cover-wrapper #buy-div').toggleClass('close');
			$('#cover-wrapper #buy-div').toggleClass('open');
			//$('#buy-header-div').slideToggle();
		}
		
		$('#cover-wrapper #cover, #buy-header-div').on('click', function(){
			toggleBuy();
		});
		
		$('#buy-submit-div').on('click', function(){
			
			//console.log('buy');
			appFormLoaderIn();
			
			var buyName = $('input#buy-name');
			var buyNameValue = buyName.val();
			
			var buyEmail = $('input#buy-email');
			var buyEmailValue = buyEmail.val();
			
			var buyPhone = $('input#buy-phone');
			var buyPhoneValue = buyPhone.val();
			
			var buyQty = $('input#buy-qty');
			var buyQtyValue = buyQty.val();
			
			console.log(buyNameValue + ' ' + buyEmailValue + ' ' + buyPhoneValue + ' ' + buyQtyValue);
			
			var buy;
			if(
				validation.isNotEmpty(buyNameValue) &&
				validation.isEmailAddress(buyEmailValue) &&
				validation.isNumber(buyPhoneValue) &&
				validation.isNumber(buyQtyValue)
			)
			{
				buy = true;
			}
			else
			{
				buy = false;
			}
			
			console.log('buy is ' + buy);
			
			if(buy)
			{
				// proceed to email sending
				//var dataString = new FormData();
				//dataString.append( 'name', buyNameValue );
				//dataString.append( 'email', buyEmailValue );
				//dataString.append( 'phone', buyPhoneValue );
				//dataString.append( 'qty', buyQtyValue );
				
				var dataString = 'name='+buyNameValue+'&email='+buyEmailValue+'&phone='+buyPhoneValue+'&qty='+buyQtyValue;
				
				$.ajax({
					url: "buyForm.php",
					data: dataString,
					//processData: false,
					type: "POST",
					success: function()
					{
						$("input").val("");
						$("textarea").val("");
						flashAppSuccess(buyNameValue);
						toggleBuy();
						appFormLoaderOut();
					},
					error: function()
					{
						flashAppError();
						appFormLoaderOut();
					}
				});
			}
			else
			{
				// fill all details bro!!!
				alert('Some fields are invalid. Please check and try again.');
				appFormLoaderOut();
			}
		});
		
		/*$('.menu-item').on('click', function(){
			alert('We are not there yet! Check back later.');
		});*/
		
		var canvas = $('#bg-canvas');
		var ctx = canvas.get(0).getContext('2d');
		canvas.width(winwid);
		canvas.height(winhei);
		canvas.attr('width', winwid);
		canvas.attr('height', winhei);
		console.log(winwid);
		
		var points = [], moons = [], numPoints = 51, i, width, height;
		width = winwid;
		height = winhei;
		
		var moonDis = 40;
		var moonAngle = 0;
		
		var maxDist2 = 150*150;
		var minDist2 = 40*40;
		
		var mouseX, mouseY;
		$(document).mousemove(function(e){ 
			mouseX = e.pageX;
			mouseY = e.pageY;
		});
		
		for(i = 0; i < numPoints; i++)
		{
			points.push({
				x: Math.random() * width,
				y: Math.random() * height,
				vx: Math.random() * 2 - 1,
				vy: Math.random() * 2 - 1
			});
		}
		
		for(i = 0; i < numPoints - 1; i++)
		{
			var point = points[i];
			moons.push({
				velocity: (Math.random() - 0.5)/10,
				//velocity: .05,
				angle: 0,
				distance: moonDis*Math.random() + 5
			});
		}
		
		function update(){
			var i, point;
			for(i = 0; i < numPoints; i++) {
				point = points[i];
				point.x += point.vx;
				point.y += point.vy;
				if(point.x > width) {
					point.x = 0;
				}
				else if(point.x < 0) {
					point.x = width;
				}
				if(point.y > height) {
					point.y = 0;
				}
				else if(point.y < 0) {
					point.y = height;
				}
			}
			points[50].x = mouseX;
			points[50].y = mouseY;
		}
		
		function drawPoints(){
			ctx.clearRect(0, 0, width, height);
			var i, point;
			for(i = 0; i < numPoints - 1; i++) {
				point = points[i];
				ctx.beginPath();
				ctx.arc(point.x, point.y, 1, 0, Math.PI * 2, false);
				ctx.closePath();
				// rgba(81,187,255,1) BLUE *****************************************************
				// rgba(222,222,222,1) WHITE *****************************************************
				ctx.fillStyle = "rgba(222,222,222,1)";
				ctx.fill();
			}
		}
		
		function drawlines(){
			for(var i = 0; i < numPoints; i++)
			{
				point1 = points[i];
				
				for(var j = 0; j < numPoints; j++)
				{
					point2 = points[j];
					var dist2 = (point2.x - point1.x)*(point2.x - point1.x) + (point2.y - point1.y)*(point2.y - point1.y);
					var opacity;
					if(dist2 > maxDist2)
					{
						opacity = 0;
					}
					else if( minDist2 < dist2 < maxDist2)
					{
						opacity = 1 - ( (dist2 - minDist2) / (maxDist2 - minDist2) );
					}
					else 
					{
						opacity = 1;
					}
					//opacity = 0;
					ctx.beginPath();
					ctx.moveTo(point1.x, point1.y);
					var dirx = point1.x > point2.x ? point1.x : point2.x;
					var diry = point1.y < point2.y ? point1.y : point2.y;
					//ctx.quadraticCurveTo(dirx, diry, point2.x, point2.y); 
					ctx.lineTo(point2.x, point2.y);
					ctx.strokeStyle = 'rgba(81,187,255,' + opacity + ')';
					//ctx.strokeStyle = 'rgba(100,100,100,' + opacity + ')';
					ctx.closePath();
					ctx.lineWidth = .1;
					ctx.stroke();
				}
			}
		}
		
		function drawMoon(){
			for(var i = 0; i < moons.length; i++)
			{
				var moon = moons[i];
				var point = points[i];
				moon.angle += moon.velocity;
				var xPos = point.x + moon.distance*Math.cos(moon.angle);
				var yPos = point.y + moon.distance*Math.sin(moon.angle);
				ctx.beginPath();
				ctx.arc(xPos, yPos, 1, 0, Math.PI * 2, false);
				ctx.fillStyle = "rgba(81,187,255,1)";
				ctx.fill();
				ctx.moveTo(point.x, point.y);
				ctx.lineTo(xPos, yPos);
				ctx.strokeStyle = 'rgba(81,187,255,1)';
				ctx.lineWidth = .1;
				ctx.stroke();
				ctx.closePath();
			}
		}
		//console.log(winwid);
		//draw();
		if( winwid > 500 )
		{
			setInterval(function() {
				//update();
				//drawPoints();
				//drawlines();
				//drawMoon();
			}, 1000/24);
		}
		
		console.log('Background images loaded: ' + imgsLoaded);
		
		function loaderIn(){
			$('#loader-wrapper').stop().fadeIn();
			console.log('Loader in');
		}
		
		function loaderOut(){
			$('#loader-wrapper').stop().fadeOut();
			console.log('Loader out');
		}
		
		function appFormLoaderIn(){
			loaderIn();
			$('#app-disable').addClass('open');
		}
		
		function appFormLoaderOut(){
			loaderOut();
			$('#app-disable').removeClass('open');
		}
		
		function flashAppSuccess(name){
			$('#app-submit-response #success span').html(name);
			$('#app-submit-response #success').show();
			$('#app-submit-response').toggleClass('animate');
			setTimeout(function(){
				$('#app-submit-response').toggleClass('animate');
				setTimeout(function(){
					$('#app-submit-response #success').hide();
					$('#app-submit-response #success span').html('');
				}, 1000);
			}, 5000);
		}
		
		function flashAppError(){
			$('#app-submit-response #error').show();
			$('#app-submit-response').toggleClass('animate');
			setTimeout(function(){
				$('#app-submit-response').toggleClass('animate');
				setTimeout(function(){
					$('#app-submit-response #error').hide();
				}, 1000);
			}, 5000);
		}
		
		
		$('#logo').click(function(){
			//var appName = $('input#app-name').val();
			//flashAppSuccess(appName);
			//flashAppError();
		});
		
		/* ***********************   APPLICATION  FORM STUFF    **************************** */
		
		$('#app-choose-file').on('click', function(){
			$('#app-file').click();
		});
		
		$('#app-file').change(function(){
			$('#app-file-text').html($('#app-file').val());
			//console.log($('#app-file')[0].files[0].size/(1024*1024));
		});
		
		$('#app-submit').on('click', function(){
			
			appFormLoaderIn();
			
			var appName = $('input#app-name');
			var appNameValue = appName.val();
			
			var appEmail = $('input#app-email');
			var appEmailValue = appEmail.val();
			
			var appPhone = $('input#app-phone');
			var appPhoneValue = appPhone.val();
			
			var appEducation = $('input#app-education');
			var appEducationValue = appEducation.val();
			
			var appField = $('input#app-field');
			var appFieldValue = appField.val();
			
			var appFile = $('input#app-file')[0].files[0];
			
			var appLink = $('input#app-link');
			var appLinkValue = appLink.val();
			
			var appExp = $('textarea#app-exp');
			var appExpValue = appExp.val();
			
			var appWhy = $('textarea#app-why-work');
			var appWhyValue = appWhy.val();

			//console.log(validation.isNotEmpty(buyPhone));
			//console.log(validation.isNumber(buyPhone));
			//console.log(validation.isEmailAddress(buyEmail));
			
			/* var x = 0
			$('.app-detail').each(function(){
				x++
			});
			
			console.log('Total number of fields is ' + x);
			
			//var thisInputValue;
			for( var i = 1 ; i < x-1 ; i++)
			{
				var thisInputValue = $('.app-detail:nth-child(' + i + ') input').value();
				if(thisInputValue == '')
				{
					console.log(i + '\'th field is empty');
					appFormLoaderOut();
				}
			}*/
			
			var fileOk;
			if($('#app-file-text').text() != 'no file chosen')
			{
				if($('#app-file-text').text() != '')
				{
					// file has been uploaded
					console.log('File has been uploaded');
					if($('#app-file')[0].files[0].size < (5*1024*1024))
					{
						fileOk = true;
						console.log('File size is OK');
						$('#app-file-div').removeClass('error-in-submition');
						
					}
					else
					{
						fileOk = false;
						console.log('File size exceeds the limit');
						$('#app-file-div').addClass('error-in-submition');
						appFormLoaderOut();
					}
				}
				else
				{
					// file has been cancelled
					console.log('File has been cancelled');
					fileOk = true;
					$('#app-file-div').removeClass('error-in-submition');
				}
				
			}
			else
			{
				fileOk = true;
				console.log('File has not been uploaded');
				$('#app-file-div').removeClass('error-in-submition');
			}
			
			
			var valid;
			if(
				validation.isNotEmpty(appNameValue) &&
				validation.isEmailAddress(appEmailValue) &&
				validation.isNumber(appPhoneValue) &&
				validation.isNotEmpty(appEducationValue) &&
				validation.isNotEmpty(appFieldValue) &&
				validation.isNotEmpty(appExpValue) &&
				validation.isNotEmpty(appWhyValue) &&
				fileOk
			)
			{
				valid = true;
			}
			else
			{
				valid = false;
			}
			
			if(appNameValue == '')
			{
				appName.addClass('error-in-submition');
				appFormLoaderOut();
			}
			else
			{
				appName.removeClass('error-in-submition');
			}
			
			if((validation.isEmailAddress(appEmailValue) == false) || (appEmailValue == ''))
			{
				appEmail.addClass('error-in-submition');
				appFormLoaderOut();
			}
			else
			{
				appEmail.removeClass('error-in-submition');
			}
			
			if((appPhoneValue == '') || (validation.isNumber(appPhoneValue) == false))
			{
				appPhone.addClass('error-in-submition');
				appFormLoaderOut();
			}
			else
			{
				appPhone.removeClass('error-in-submition');
			}
			
			if(appEducationValue == '')
			{
				appEducation.addClass('error-in-submition');
				appFormLoaderOut();
			}
			else
			{
				appEducation.removeClass('error-in-submition');
			}
			
			if(appFieldValue == '')
			{
				appField.addClass('error-in-submition');
				appFormLoaderOut();
			}
			else
			{
				appField.removeClass('error-in-submition');
			}
			
			if(appExpValue == '')
			{
				appExp.addClass('error-in-submition');
				appFormLoaderOut();
			}
			else
			{
				appExp.removeClass('error-in-submition');
			}
			
			if(appWhyValue == '')
			{
				appWhy.addClass('error-in-submition');
				appFormLoaderOut();
			}
			else
			{
				appWhy.removeClass('error-in-submition');
			}
			
			if(valid == true)
			{				
				var dataString = new FormData();
				dataString.append( 'name', appNameValue );
				dataString.append( 'email', appEmailValue );
				dataString.append( 'phone', appPhoneValue );
				dataString.append( 'education',appEducationValue);
				dataString.append( 'field', appFieldValue );
				if($('#app-file-text').html() != 'no file chosen')
				{
					dataString.append( 'file', appFile );
				}
				dataString.append( 'link', appLinkValue );
				dataString.append( 'exp', appExpValue );
				dataString.append( 'why', appWhyValue );
				
				$.ajax({
					url: "appForm.php",
					data: dataString,
					processData: false,
					contentType: false,
					type: "POST",
					//dataType: 'json',
					success: function()
					{
						/*if(data.type == 'error')
						{
							appFormLoaderOut();
							alert(data.text);
						}
						else
						{*/
							$("input").val("");
							$("textarea").val("");
							$("#app-file-text").html("no file chosen");
							console.log('Message sent MOTHERFUCKER!!!');
							appFormLoaderOut();
							//alert('Congratulations ' + appNameValue + '! We\'ve received your application. We will get back to you.')
							flashAppSuccess(appNameValue);
							$('#cover-about .face2, #app-submit').toggleClass('animate');
							$('#app-file-progress').css({
								width: '0%'
							});
						/*}*/
					},
					error: function(xhr, error)
					{
						appFormLoaderOut();
						//alert('Your internet might be in trouble. Please try again later.');
						flashAppError();
						console.log(error);
						console.log(xhr);
					},
					xhr: function(){
						var xhr = new window.XMLHttpRequest();
						//Upload progress
						xhr.upload.addEventListener("progress", function(evt){
							if (evt.lengthComputable)
							{
								var percentComplete = (evt.loaded / evt.total)*100;
								//Do something with upload progress
								$('#app-file-progress').css({
									width: percentComplete + '%'
								});
								console.log(percentComplete);
							}
						}, false);
						return xhr;
					}
				});
				
			}
			
		});
		
		
		
		
		/* ****** USEFUL TEST PATTERNS ********** */
/*		var validation = {
			isEmailAddress:function(str) {
			   var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			   return pattern.test(str);  // returns a boolean
			},
			isNotEmpty:function (str) {
			   var pattern =/\S+/;
			   return pattern.test(str);  // returns a boolean
			},
			isNumber:function(str) {
			   var pattern = /^\d+$/;
			   return pattern.test(str);  // returns a boolean
			},
			isSame:function(str1,str2){
			  return str1 === str2;
		}};   

		alert(validation.isNotEmpty("dff"));
		alert(validation.isNumber(44));
		alert(validation.isEmailAddress("mf@tl.ff"));
		alert(validation.isSame("sf","sf"));
*/		
		
		
		
		
		
		
		
		
		
		/*
		var imgsArray = [
			$('.hidden-image:nth-child(1)').find('img').attr('src'),
			$('.hidden-image:nth-child(2)').find('img').attr('src'),
			$('.hidden-image:nth-child(3)').find('img').attr('src'),
			$('.hidden-image:nth-child(4)').find('img').attr('src'),
			$('.hidden-image:nth-child(5)').find('img').attr('src')
		];
		
		var imgsDimArray = [
			[
				$('.hidden-image:nth-child(1)').width(),
				$('.hidden-image:nth-child(1)').height()
			],
			[
				$('.hidden-image:nth-child(2)').width(),
				$('.hidden-image:nth-child(2)').height()
			],
			[
				$('.hidden-image:nth-child(3)').width(),
				$('.hidden-image:nth-child(3)').height()
			],
			[
				$('.hidden-image:nth-child(4)').width(),
				$('.hidden-image:nth-child(4)').height()
			],
			[
				$('.hidden-image:nth-child(5)').width(),
				$('.hidden-image:nth-child(5)').height()
			]
		];
		
		var imgsRatioArray = [];
		
		var smallestHeight = 100000000;
		var i;
		for( i = 0 ; i < imgsDimArray.length ; i++)
		{
			if( imgsDimArray[i][1] < smallestHeight )
			{
				smallestHeight = parseFloat(imgsDimArray[i][1]);
				console.log('Height of the image ' + i +': ' + imgsDimArray[i][1]);
			} else 
			{
				console.log('Height of the image ' + i +': ' + imgsDimArray[i][1]);
			}
			
			imgsRatioArray.push(imgsDimArray[i][0]/imgsDimArray[i][1])		
		}
		console.log('Smallest height of the images: ' + smallestHeight);
		
		var img = new Image;
		var nextImg = new Image;
		
		imageIndex = 0;
		nextImageIndex = 0;
		
		img.src = imgsArray[imageIndex];
		nextImg.src = imgsArray[1];
		
		img.width = parseFloat(imgsDimArray[imageIndex][0]);
		img.height = parseFloat(imgsDimArray[imageIndex][1]);
		
		img.ratio = parseFloat(imgsRatioArray[imageIndex]);
		nextImg.ratio = parseFloat(imgsRatioArray[nextImageIndex]);
		
		nextImg.width = parseFloat(imgsDimArray[nextImageIndex][0]);
		nextImg.height = parseFloat(imgsDimArray[nextImageIndex][1]);
		
		var windowRatio = winwid / winhei;
		console.log('Window ratio: ' + windowRatio);
		
		img.onload = function(){
			if( img.ratio > windowRatio )
			{
				ctx.drawImage(img, 0, 0, img.width, smallestHeight - 5, 0, 0, img.ratio*winwid, winhei);
			}
			else
			{
				ctx.drawImage(img, 0, 0, img.width, smallestHeight - 5, 0, 0, winwid, winhei);
			}
		};
		
		console.log('First image source: ' + img.src + ' ; width, height: ' + img.width + ', ' + img.height + ' ; Ratio: ' + img.ratio);
		console.log('Next image source: ' + nextImg.src + ' ; width, height: ' + nextImg.width + ', ' + nextImg.height + ' ; Ratio: ' + nextImg.ratio);
		
	*/
	});
	
});











































































