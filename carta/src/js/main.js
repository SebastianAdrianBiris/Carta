/*
 *	Stretch an image inside a parent element
 *	- the parent needs a fixed hight
**/
(function($) {
	$.fn.stretchImage = function(fadeIn) {

		this.each(function() {
			if(fadeIn === null) {
				fadeIn = false;
			}

			var p = $(this);

			function stretchImage(parent) {
				var img = parent.find('img');


				parent.css({
					'overflow': 'hidden'
				});
				// Reset styles on image before we assign new
				img.css({
					'width': '',
					'height': '',
					'margin-top': '',
					'margin-left': ''
				});

				// Get current with and height of image element
				var imageWidth = img.outerWidth();
				var imageHeight = img.outerHeight();
				// Get current with and height of parent element
				var parentWidth = parent.outerWidth();
				var parentHeight = parent.outerHeight();
				// Parent width/height aspect ratio
				var parentRatio = parentWidth / parentHeight;
				// Image width/height aspect ratio
				var imageRatio = imageWidth / imageHeight;

				if(parentRatio <= 1) { // parentHeight >= parentWidth, parent is portrait/square
					if(imageRatio <= 1) { // imageHeight >= imageWidth, parent is portrait/square and img is portrait/square
						if(parentRatio <= imageRatio) { // parentHeight >= imageHeight, parent is portrait/square, img is portrait/square and parent is heigher or same height as img
							img.css({'height': parentHeight});
							img.css({'margin-left': -((img.outerWidth()-parentWidth)/2)});
						} else { // imageHeight > parentHeight, parent is portrait/square, img is portrait/square and img is heigher than parent
							img.css({'width': parentWidth});
							img.css({'margin-top': -((img.outerHeight()-parentHeight)/2)});
						}
					} else { // imageWidth > imageHeight, parent is portrait/square and img is landscape
						img.css({'height': parentHeight});
						img.css({'margin-left': -((img.outerWidth()-parentWidth)/2)});
					}
				} else { // parentWidth > parentHeight, parent is landscape
					if(imageRatio > 1) { // imageWidth > imageHeight, parent is landscape and img is landscape
						if(imageRatio > parentRatio) { // imageWidth > parentWidth, parent is landscape, img is landscape img is weider than parent
							img.css({'height': parentHeight});
							img.css({'margin-left': -((img.outerWidth()-parentWidth)/2)});
						} else { // parentWidth >= imageWidth, parent is landscape, img is landscape parent is weider than or same width as img
							img.css({'width': parentWidth});
							img.css({'margin-top': -((img.outerHeight()-parentHeight)/2)});
						}
					} else { // imageHeight >= imageWidth, parent is landscape, img is portrait/square
						img.css({'width': parentWidth});
						img.css({'margin-top': -((img.outerHeight()-parentHeight)/2)});
					}
				}

				if(fadeIn) {
					img.css("visibility","visible");
				}
			}

			stretchImage(p);

			// Bind window load event
			$(window).bind("load", function() {
				stretchImage(p);
			});

			// Bind window resize event
			$(window).bind("resize", function() {
				stretchImage(p);
			});
		});
		return this;
	};
}(jQuery));

/*
 *	Car
**/
(function($) {
	$.fn.carSharedLeasing = function() {

		var carSharedLeasing = this;
		var percentageTotal = 100;
		var percentageBusiness = 80;
		var monthlyPayment = 7615.5;
		var workAllowance = 3753.5;
		var firstPayment = 87500;

		var dragger = carSharedLeasing.find('#dragger');
		var draggerArrow = dragger.find('#dragger-arrow');
		var draggerLabel = dragger.find('#dragger-label');

		var carBusinessMask = carSharedLeasing.find('#car-business-mask');
		var carBusiness = carBusinessMask.find('#car-business');
		var carPrivate = carSharedLeasing.find('#car-private');
		var carPrivateImage = carPrivate.find('img');
		var carSharedLeasingSlider = carSharedLeasing.find('#car-shared-leasing-slider');

		var monthlyPaymentBusiness = carSharedLeasing.find('#monthly-payment-business');
		var monthlyPaymentPrivate = carSharedLeasing.find('#monthly-payment-private');
		var workAllowanceBusiness = carSharedLeasing.find('#work-allowance-business');
		var workAllowancePrivate = carSharedLeasing.find('#work-allowance-private');
		var firstPaymentBusiness = carSharedLeasing.find('#first-payment-business');
		var firstPaymentPrivate = carSharedLeasing.find('#first-payment-private');
		var savingsBusiness = carSharedLeasing.find('#savings-business');
		var savingsPrivate = carSharedLeasing.find('#savings-private');
		var relativeTotalSavigns = carSharedLeasing.find('#relative-total-savings');

		function addCommas(nStr) {
			nStr += '';
			var x = nStr.split('.');
			var x1 = x[0];
			var x2 = x.length > 1 ? ',' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + '.' + '$2');
			}
			return x1 + x2;
		}


		/*
		 *	Calculate the numbers in the table
		**/
		function calculateNumbers(newPercentageBusiness) {

			var total = 496764;
			var taxFreeCarSaved = 190544;
			var relativeTotalSavings = 160169;

			$('#percentage-business b').text(newPercentageBusiness + "%");
			$('#percentage-private b').text(percentageTotal - newPercentageBusiness + "%");

			monthlyPaymentBusiness.text(
				addCommas(Math.round(
					((newPercentageBusiness / percentageTotal) * monthlyPayment) * 0.8
				))
			);
			monthlyPaymentPrivate.text(
				addCommas(Math.round(
					((percentageTotal - newPercentageBusiness) / percentageTotal) * monthlyPayment
				))
			);

			workAllowanceBusiness.text(
				addCommas(Math.round(
					((newPercentageBusiness / percentageTotal) * workAllowance) * 0.8
				))
			);
			workAllowancePrivate.text(
				addCommas(Math.round(
					((percentageTotal - newPercentageBusiness) / percentageTotal) * workAllowance
				))
			);

			firstPaymentBusiness.text(
				addCommas(Math.round(
					((newPercentageBusiness / percentageTotal) * firstPayment) * 0.8
				))
			);
			firstPaymentPrivate.text(
				addCommas(Math.round(
					((percentageTotal - newPercentageBusiness) / percentageTotal) * firstPayment
				))
			);


			savingsBusiness.text(
				addCommas(Math.round(
					((percentageTotal - newPercentageBusiness) / percentageTotal) * total
				))
			);

			savingsPrivate.text(
				addCommas(Math.round(
					taxFreeCarSaved - (((percentageTotal - newPercentageBusiness) / percentageTotal) * total)
				))
			);

			relativeTotalSavigns.text(
				addCommas(Math.round((
					relativeTotalSavings
				)))
			);
		}

		// First calculation the numbers in the table
		calculateNumbers(percentageBusiness);

		draggerArrow.on('mousedown', function(e)
		{
			var xBefore = e.pageX;
			var xNow = 0;
			var pixelsMoved = 0;

			var carSharedLeasingSliderWidth = carSharedLeasingSlider.outerWidth();
			var draggerWidth = dragger.outerWidth();
			var newDraggerWidth = draggerWidth;
			var percentage = (newDraggerWidth / carSharedLeasingSliderWidth) * 100;

			draggerLabel.fadeOut();

			carSharedLeasingSlider.on('mousemove', function(e)
			{
				xNow = e.pageX;
				pixelsMoved = xNow - xBefore;

				if((newDraggerWidth + pixelsMoved) <= carSharedLeasingSliderWidth && (newDraggerWidth + pixelsMoved) >= 0)
				{
					newDraggerWidth = newDraggerWidth + pixelsMoved;
				}
				percentage = Math.round((newDraggerWidth / carSharedLeasingSliderWidth) * 100);

				carBusinessMask.css({'width': newDraggerWidth + 'px'});
				dragger.css({'width': newDraggerWidth + 'px'});

				calculateNumbers(percentage);

				xBefore = xNow;
			});
		});

		$(document).on('mouseup', function()
		{
			$('#car-shared-leasing-slider').unbind('mousemove');
			draggerLabel.fadeIn();
		});

		function calculateDimensions() {
			var carPrivateImageWidth = carPrivateImage.outerWidth();
			var carPrivateImageRatio = carPrivateImageWidth / carPrivateImage.outerHeight();
			var carSharedLeasingSliderHeight = carPrivateImageWidth / carPrivateImageRatio;

			carSharedLeasingSlider.css({
				'height': carSharedLeasingSliderHeight
			});

			carBusiness.css({
				'width': carSharedLeasingSlider.outerWidth()
			});

			carBusinessMask.css({
				'width': carSharedLeasingSlider.outerWidth() * (percentageBusiness / percentageTotal)
			});

			dragger.css({
				'width': carSharedLeasingSlider.outerWidth() *  (percentageBusiness / percentageTotal)
			});
		}

		// Bind window load event
		$(window).bind("load", function() {
			calculateDimensions();
			carSharedLeasing.css({'visibility': 'visible'}).hide().fadeIn();
		});

		// Bind window resize event
		$(window).bind("resize", function() {
			calculateDimensions();
		});

		return this;
	};
}(jQuery));

/*
*	Slider
**/
function slider(currentSlide) {
	var numOfSlides = $('#banner').children().length -1;
	var delay = 5000;
	var fadeSpeed = 1500;

	$('.slide').hide().removeClass('active');
	$('.banner-nav').removeClass('active');

	function fadeSlides() {
		$('.banner-nav-'+ currentSlide).addClass('active');
		$('#slide-' + currentSlide).addClass("active").fadeIn(fadeSpeed);
		$(window).trigger('resize');
		if(numOfSlides > 1) {
			setTimeout(function() {
				$('#slide-' + currentSlide).removeClass("active").fadeOut(fadeSpeed);
				$('.banner-nav-'+ currentSlide).removeClass('active');
				currentSlide++;
				if(currentSlide === numOfSlides) {
					currentSlide = 0;
				}

				fadeSlides();
			}, delay);
		}
	}

	fadeSlides();
}

// Calculate the with of the image croppers
function calculateImageCroppers() {
	var imageCropper = $('.image-cropper');
	$('.image-cropper-bar').css({
		'width': (imageCropper.outerWidth() / 2) - 60
	});
}

/*
*	On DOM ready
**/
jQuery(document).ready(function() {
	// Stretch images
	$('.bar-type-2').stretchImage(true);
	$('.bar-type-4 .image-container').stretchImage(true);
	$('.slide').stretchImage();
	$('.contact-image').stretchImage(true);

	// Append triangle to .sub-menus
	$('#menu-topmenu .sub-menu').append('<span class="triangle"></span>');
	$('#menu-hovedmenu .menu-item-has-children').append('<span class="triangle"></span>');

	// Instantiate car
	$('#car-shared-leasing').carSharedLeasing();

	// Add click functionality to the banner
	$('#banner-nav a').click(function() {
		if(!$(this).parent().hasClass('active')) {
			slider($(this).parent().data("slideNo"));
		}
	});

	// Add semantic classes to the bars
	$('.bar').each(function() {
		var bar = $(this);
		var next = $(this).next();
		if(next.hasClass('bar')) {
			var nextBarColorTheme = next.data('colortheme');
			bar.addClass('bar-below').addClass('next-bar-colortheme-'+nextBarColorTheme);
		} else {
			bar.addClass('last-bar');
		}
	});

	// Fixed main menu
	var topMenu = $('#topmenu');
	var mainMenu = $('#mainmenu');
	var topmenuBottom = topMenu.position().top+topMenu.outerHeight(true);
	$(window).scroll(function() {
		if($(this).scrollTop() > topmenuBottom) {
			mainMenu.addClass('floating');
		} else {
			mainMenu.removeClass('floating');
		}
	});

	calculateImageCroppers();

	// Add click functionality to the drop down menus
	$('li.menu-item-has-children').click(function() {
		if($(this).hasClass('active')) {
			$('li.menu-item-has-children').removeClass('active');

		} else {
			$('li.menu-item-has-children').removeClass('active');
			$(this).addClass('active');
		}
	});
});

/*
*	On Window load
**/
jQuery(window).load(function() {
	// Instantiate slider
	slider(0);
});

/*
*	On Window resize
**/
jQuery(window).resize(function() {
	calculateImageCroppers();

	var height = $('.slide').outerHeight() - 40 + 'px';
	var left = ($('.slide').outerWidth() / 2) - 60 + 'px';
	var right = ($('.slide').outerWidth() / 2) + 60 + 'px';
	console.log(left);
	var polygon = 'polygon(100% '+height+', 100% 0, 0 0, 0 '+height+', '+left+' '+height+', 50% 100%, '+right+' '+height+')';

	$('.slide').css({
		'-webkit-clip-path': polygon
	});

});
