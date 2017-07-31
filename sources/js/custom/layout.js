/**
 * [PUBLIC STATIC] page
 *
 * @author Zaid Sadhoe
 */
var Layout = new function ()
{
	'use strict';

	var self = this;

	/*
	 * common used variables
	 */
	var $window = null;
	var $html = null;
	var $body = null;
	var $header = null;
	var $progress = null;

	/*
	 * holds timer to handle progress
	 */
	var progressTimer = null;

	/**
	 * [PRIVATE] construct method
	 *
	 * @author Zaid Sadhoe
	 */
	var construct = function ()
	{
		$window = $(window);
		$html = $('html');
		$body = $('body');
		$header = $('.wk-header');
		$progress = $header.find('.sub aside div');

		// add touchstart on body
		$body.on('touchstart', function () {});

		//checkAdminBar();

		bindSearch();
		bindNavBar();
//        checkHeader();
//        checkProgress();
	};

	/**
	 * [PRIVATE] check header height
	 *
	 * @author Zaid Sadhoe
	 */
	this.setLogoColor = function (color)
	{
		var logoSmall = $header.find('.wk-logo-small');
		var logoLarge = $header.find('.wk-logo-large');

		logoSmall.attr('src', logoSmall.attr('data-src-' + color));
		logoLarge.attr('src', logoLarge.attr('data-src-' + color));
	};

	/**
	 * [PRIVATE] check header height
	 *
	 * @author Zaid Sadhoe
	 */
	this.headerHeight = function ()
	{
		var height = 0;

		height += $('#wpadminbar').length > 0 ? $('#wpadminbar').height() : 0;

		return height;

		var isFixed = $header.hasClass('fixed');
		var hasSub = $header.hasClass('sub');

		if (isFixed && hasSub) {
			return $header.find('.main').height() + $header.find('.sub').height();
		}

		return $header.find('.main').height();
	};

	/**
	 * [PRIVATE] check header on scroll
	 *
	 * @author Zaid Sadhoe
	 */
	var checkHeader = function ()
	{
		var $breaker = $('.breaker-photo-large');

		var isFixed = $header.hasClass('fixed');
		var hasSub = $header.hasClass('sub');

		var toFixedHeight = 0;
		var toSubHeight = 0;

		if ($breaker.length) {
			toFixedHeight = ($breaker.outerHeight() - self.headerHeight() - 150) / 2;
			toSubHeight = ($breaker.outerHeight() - self.headerHeight()) - 100;
		} else {
			toFixedHeight = 30;
			toSubHeight = 50;
		}

		if (!isFixed && $window.scrollTop() >= toFixedHeight) {
			$header.addClass('fixed');
		} else if (isFixed && $window.scrollTop() < toFixedHeight) {
			$header.removeClass('fixed');
		}

		if (!hasSub && $window.scrollTop() >= toSubHeight) {
			$header.addClass('sub');
		} else if (hasSub && $window.scrollTop() < toSubHeight) {
			$header.removeClass('sub');
		}
	};

	/**
	 * [PRIVATE] check progress on scroll
	 *
	 * @author Zaid Sadhoe
	 */
	var checkProgress = function ()
	{
		clearTimeout(progressTimer);

		var progressTimer = setTimeout(function ()
		{
			var $disqus = $('.disqus');

			var startY = $window.height() - 50;
			var endY = $disqus.length ? $disqus.offset().top - $window.height() : $('.footer-signup').offset().top - $window.height();
			var maxY = endY - startY;
			var y = $window.scrollTop() - startY;

			var ratio = (y / maxY);

			$progress.css({width: (ratio * 100) + '%'});

		}, 500);
	};

	/**
	 * [PRIVATE] Check wp admin bar
	 * @author Zaid Sadhoe
	 */
	var checkAdminBar = function ()
	{
		if ($('#wpadminbar').length > 0) {
			var check = function () {
				$html.attr('style', '');
				$html.attr('style', 'padding-top:' + $html.css('margin-top') + ';margin: 0 !important;');
			};

			$window.on('resize load', check);
		}
	};

	/**
	 * [PRIVATE] bind scroll
	 * @author Zaid Sadhoe
	 */
	var bindScroll = function ()
	{
		unbindScroll();

		$window.on('scroll resize load', function ()
		{
			checkHeader();
			checkProgress();
		});
	};

	/**
	 * [PRIVATE] bind scroll
	 * @author Zaid Sadhoe
	 */
	var unbindScroll = function ()
	{
		$window.unbind('scroll');
	};

	/**
	 * [PRIVATE] bind search
	 * @author Zaid Sadhoe
	 */
	var bindSearch = function ()
	{
		$header.find('.search a').on('click', function (e) {
			$(this).parent().toggleClass('open');
			setTimeout(function () {
				$header.find('.search-form input')[0].focus();
			}, 500);
			e.preventDefault();
		});

		$header.find('.search-form input').on('blur', function (e) {
			if ($(this).val() === '') {
				$(this).parents('ul').find('.search').toggleClass('open');
			}
		});
	};

	/**
	 * [PRIVATE] bind nav bar
	 * @author Zaid Sadhoe
	 */
	var bindNavBar = function ()
	{
		var $navbar = $('.wk-navbar');
		var $more = $('.wk-more-menu');
		var $items = $navbar.find('ul.wk-nav > li > a');
		var timer = null;

		$more.on('click', function (e) {
			$(this).toggleClass('open');
			$('#menu-main-menu').toggleClass('open');
			$('#menu-main-menu .hover').removeClass('hover');
		});

		$items.on('mouseover', function (e) {
			if ($window.width() >= 996) {
				if ($(this).parent().hasClass('menu-item-has-children')) {
					clearTimeout(timer);
					$navbar.find('li.hover').removeClass('hover');
					$navbar.addClass('hover');
					$(this).parent().addClass('hover');
				} else {
					$navbar.find('li.hover').removeClass('hover');
					$navbar.removeClass('hover');
				}
			}
		});

		$navbar.on('mouseleave', function (e) {
			if ($window.width() >= 996) {
				clearTimeout(timer);
				if ($navbar.hasClass('hover')) {
					timer = setTimeout(function () {
						$navbar.find('li.hover').removeClass('hover');
						$navbar.removeClass('hover');
					}, 100);
				}
			}
		});

		$items.on('click', function (e) {
			if ($(this).parent().hasClass('menu-item-has-children') && $window.width() < 996) {
				clearTimeout(timer);
				if ($(this).parent().hasClass('hover')) {
					$navbar.find('li.hover').removeClass('hover');
					$navbar.removeClass('hover');
				} else {
					$navbar.find('li.hover').removeClass('hover');
					$navbar.addClass('hover');
					$(this).parent().addClass('hover');
				}

				e.preventDefault();
			}
		});
	};

	/**
	 * [PUBLIC] scroll to a specific position
	 *
	 * @param {int} y position to scroll to
	 * @param {int} time duration of scroll
	 * @param {int} wait duration to wait before scrolling
	 * @param {function} onComplete function to call after complete
	 * @author Zaid Sadhoe
	 */
	this.scrollTo = function (y, time, wait, onComplete)
	{
		wait = wait ? wait : 0;

		var scrollTop = y;

		setTimeout(function ()
		{
			$('html,body').animate({scrollTop: scrollTop}, {
				duration: time,
				easing: 'swing',
				done: function () {
					if (onComplete) {
						setTimeout(onComplete, 100);
					}
				}
			});
		}, wait);
	};

	// call construct
	$(function () {
		construct();
	});
};