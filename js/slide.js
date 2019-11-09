$(document).ready(function($)
{
	var currentImg = 0;
	var exImg = 0;
	var maxImg = 2;
	var scrollValue;

	for(var i = 1; i <= maxImg; i++)
	{
		$('.imgSlide' + i).hide();
	}

	setInterval(function()
		{
			scrollValue = console.log($(window).scrollTop());
			if(currentImg == maxImg)
			{
				exImg = maxImg
				currentImg = 0;
			}
			else
			{
				exImg = currentImg;
				currentImg++;
			}
			$('.imgSlide' + currentImg).fadeIn(2500);
			$('.imgSlide' + exImg).fadeOut('slow', function()
				{
					$('.imgSlide' + exImg).hide();
				});
			window.scrollTop = scrollValue;
		}, 6000);
});