$(document).ready(function($)
			{
				var currentType;

				function reloadJSproducts()
				{
					$('a#menuLink').mouseout(function()
					{
						$(this).parent().css({'background-color': 'transparent', 'font-weight' : 'normal'});
						$(this).css('color', 'grey');
						$(this).parent().attr('id', 'menu-item');
					});

					$('.product').mouseenter(function()
					{
						$(this).append('<a><img class="addedImg" style="opacity: 0;display:block;position:relative;"src="img/+.png"></a>');
						$('.addedImg').css({'top' : $(this).position().top + $(this).height() - 50,
											'left' : $(this).position().left + $(this).width() / 2 - 20,
											'position' : 'absolute'});
						$('.addedImg').animate(
						{
						        opacity: 1
						}, 300);
						$(this).css({border: '0 solid rgb(76, 76, 76)'}).animate(
						{
							borderWidth: 2
						}, 300);

						$('addedImg').on('click', function()
						{

						});
					});
					$('.product').mouseleave(function()
					{
						$(this).animate(
						{
						        borderWidth: 0
						}, 300);
						$('.addedImg').animate(
						{
						        opacity: 0
						}, 300);
						$('.addedImg').remove();
					});

					$('#composezVotreMenu').on("click", function()
					{
						$('.products').remove();
						$('#progressContainer').attr('class', '');
						$('#progressContainer').css('display', 'flex');
						$('#progressContainer').append('<div class="progressDiv"></div>');
						$('#progressContainer').append('<div class="circleDiv"></div>');
						$('#progressContainer').append('<div class="progressDiv1"></div>');
						$('#progressContainer').append('<div class="circleDiv1"></div>');
					});
				}

				$('a#menuLink').on('click', function()
				{
					var type = $(this).attr('type');

					if(type != currentType)
					{
						$.post('loadMenus.php', {type:type}, function(data)
						{
							$('li.product').remove();
							$('.avgrund-popup').remove();
							$('ul.products').append(data);
							currentType = type;
							reloadJSproducts();
						}, 'text');
					}
				});
				$('a#menuLink').hover(function()
				{
						$(this).parent().css({'background-color': 'rgb(67, 35, 160)', 'font-weight' : 'bold'});
						$(this).css('color', 'white');
						$(this).parent().removeAttr('id');
						$(this).parent().toggleClass('visibleMenuItem');
				});

				$('li#nosMenus').on('click', function()
				{
					 $.post('loadMenus.php', {type:'Menu'}, function(data)
						{
							$('li.product').remove();
							$('ul.products').append(data);
							currentType = 'Menu';
							reloadJSproducts();
						}, 'text');
				});

				$('')

				reloadJSproducts();
			});
