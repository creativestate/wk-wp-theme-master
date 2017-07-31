/**
 * [PUBLIC STATIC] hero
 *
 * @author Zaid Sadhoe
 */
var HeroCarousel = new function ()
{
	'use strict';

	var self = this;

	/*
	 * common used variables
	 */
	var $window = null;
	var $body = null;
	var $items = null;

	var timeout = 5000;

	/**
	 * [PRIVATE] construct method
	 *
	 * @author Zaid Sadhoe
	 */
	var construct = function ()
	{
		self.setup();
	};

	/**
	 * [PRIVATE] construct method
	 *
	 * @author Zaid Sadhoe
	 */
	this.setup = function ()
	{
		$window = $(window);
		$body = $('body');
		$items = $('.wk-hero-carousel');

		if ($items.length > 0) {
			bindEvents();
			checkFirst();

			$items.each(function (index, item)
			{
				goTo($(item), 0);
			});
		}
	};

	/**
	 * [PRIVATE] check header
	 *
	 * @author Zaid Sadhoe
	 */
	var checkFirst = function ()
	{
		var $first = $('.panel-grid:first-child .panel-grid-cell:first-child .so-panel:first-child .wk-hero-carousel');

		if ($first.length > 0) {
			$('.wk-header').addClass('bg-clear');
			Layout.setLogoColor('light');
		}
	};

	/**
	 * [PRIVATE] go to item
	 * @author Zaid Sadhoe
	 */
	var goTo = function ($item, index)
	{
		clearTimeout($item[0].timer);

		var $dots = $item.find('.dots a');

		if ($dots.length > 1)
		{
			index = (index < 0 ? $dots.length - 1 : (index > $dots.length - 1 ? 0 : index));

			$item.find('.visible').removeClass('visible');
			$item.find('[data-id=' + index + ']').addClass('visible');

			if ($item.find('.description-block .item.visible').length === 1) {
				$item.addClass('description');
			} else {
				$item.removeClass('description');
			}
			
			var timeout = parseFloat($item.find('.dots a[data-id=' + index + ']').attr('data-speed')) * 1000;

			index++;

			$item[0].timer = setTimeout(function () {
				goTo($item, index);
			}, timeout);
		}

		$item.find('')
	};

	/**
	 * [PRIVATE] bind events
	 * @author Zaid Sadhoe
	 */
	var bindEvents = function () {
		$items.find('.dots a').on('click', function (e)
		{
			var $item = $(this).parents('.wk-hero-carousel');

			goTo($item, parseInt($(this).attr('data-id')));

			e.preventDefault();
		});
	};

	// call construct
	$(function () {
		construct();
	});
};