$(document).ready(function($)
{
	var currentType;
	var currentAside = 0;
	var quantity;
	var nbViande = 0;
	var multipleMeat = 0;

	$.post('loadMenus2.php', {type:'Menu'}, function(data)
			{
				$('li.product').remove();
				$('.avgrund-popup').remove();
				$('#progressContainer').remove();
				$('#compoMenuContainer').remove();
				$('ul.products').append(data);
				$('.products').css('display', 'flex');
				reloadJSCompo();
				reloadJSproducts();
			}, 'text');

	var position = $('#panierLink').position();
	$('#panierMenu').css(
	{
		position: 'absolute',
		top: position.top,
		left: position.left
	});
	$('#panierMenu').hide();

				$('#progressBarInscription').progressbar({value : 0.0000000001});

				function reloadJSproducts()
				{
					currentAside = 0;

					$('.selectSize').off('change').change(function()
					{
						var thisSelect = $(this);
						var menuid = $(this).parent().parent().parent().parent().attr('menuid');

						$.post('calculPrice.php', {id:menuid, size:$(this).val()}, function(price)
						{
							thisSelect.parent().parent().find('p.price span').text( + price + '€');
						});

						$.post('meatNumber.php', {id : $(this).parent().parent().parent().parent().attr('menuid'), size : $(this).val()}, function(data)
						{
							multipleMeat = parseInt(data);
							console.log(multipleMeat + "meatNumber");

							thisSelect.parent().parent().find('.meatSelect').each(function()
							{
								$(this).remove();
							});

							$.post('getSelect.php', {id:menuid}, function(d)
							{
								for(var i = 0; i < multipleMeat; i++)
								{
									thisSelect.parent().parent().find('.meatP').append(d);
								}
							});
						});
					});

					$('img#editMenuIMG').mouseenter(function()
					{
						$(this).animate({'max-height' : '23px', 'max-width' : '23px'}, 100);
					});

					$('img#editMenuIMG').mouseleave(function()
					{
						$(this).animate({'max-height' : '20px', 'max-width' : '20px'}, 100);
					});

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

					$('.product').on("click", function()
					{
						Avgrund.show("#default-popup" + $(this).attr('id'));
						reloadJSproducts();
						$('.closeImg').on('click', function()
						{
							Avgrund.hide();
						});
					});

					$('.closeImg').mouseenter(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "#155de9",
							color : "white"
						}, 500);
					});
					$('.closeImg').mouseleave(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "white",
							color : "#155de9"
						}, 200);
					});

					$('.a373').mouseenter(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "#155de9",
							color : "white"
						}, 500);
					});
					$('.a373').mouseleave(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "white",
							color : "#155de9"
						}, 200);
					});

					$('.a373').off('click').on('click', function()
					{
						console.log("une fois encore");
						var id = $(this).parent().attr('menuID');
						var quantite = $(this).parent().find($('input#quantite')).val();
						var taille = $(this).parent().find($('select.selectSize')).val();
						var viandeArray = [];
						var sauce = $(this).parent().find($('.sauceSelect option:selected')).text();
						var boisson = $(this).parent().find($('.boissonSelect option:selected')).text();
						var commentaire = $(this).parent().find($('.commentaireMenu')).val();

						$(this).parent().find('.meatSelect').each(function()
						{
							viandeArray.push($(this).val());
						});

						console.log(id + " " + quantite + " " + taille + " " + viandeArray + " " + sauce + " " + boisson + " " + commentaire);

						$.post('calculPrice.php', {id : id, size : taille}, function(p)
						{
							$.post('addProduct.php', {id : id, quantite : quantite, sauce : sauce, boisson : boisson, commentaire : commentaire, size : taille, p : p, viandes: viandeArray}, function(data)
							{
								console.log(data);
								if(data != "error")
								{
									$.confirm(
									{
									    title: 'Menu',
									    content: '<span style="font-size:15px;">Le menu a bien été ajouté</span>',
									    type: 'green',
									    boxWidth: '30%',
							    		useBootstrap: false,
							    		backgroundDismiss: true,
							    		backgroundDismissAnimation: 'glow',
									    buttons:
									    {
									        ok:
									        {
									            text: "Ok",
									            btnClass: 'btn-primary',
									            action: function()
									            {
									                
									            }
									        },
									    }
									});
								}
							});
						});

						setTimeout($(this).on, 500);
					});
					$('#panierButton').mouseenter(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "#155de9",
							color : "white"
						}, 500);
					});
					$('#panierButton').mouseleave(function()
					{
						$(this).css({'font-weight' : 'normal'});

						$(this).animate(
						{
							backgroundColor : "white",
							color : "#155de9"
						}, 200);
					});

				}

				function reloadJSCompo()
				{
					$('#breadCompoSelect').niceSelect();
					$('#sizeCompoSelect').niceSelect();
					$('#viandeCompoSelect').niceSelect();
					$('#sauceCompoSelect').niceSelect();
					$('#boissonCompoSelect').niceSelect();
					$('#sauceCompoSelect').niceScroll();
					$('#boissonCompoSelect').niceScroll();

					$('#progressBarCompo').progressbar({value : 0.0000000001});
					$('#progressBarCompo').find(".ui-progressbar-value").css('background-color', '#155de9');


					$('.validCompoButton').on('click', function()
					{
						$(this).attr('disabled', 'true');
						$(this).parent().attr('class', 'fadeOutLeft animated');
						$(this).parent().css('z-index', '1');
						currentAside += 1;
						$('aside:eq(' + currentAside + ')').attr('class', 'fadeInRight animated');
						$('aside:eq(' + currentAside + ')').show();
						$('aside:eq(' + currentAside + ')').css('display', 'none');

						if(currentAside == 2)
						{
							$('#size span').text($('#sizeCompoSelect').val() + ' (' + $('#breadCompoSelect').val() + ')');

							switch($('#sizeCompoSelect').val())
							{
								case 'M':
								nbViande = 1;
								break;

								case 'L':
								nbViande = 2;
								break;

								case 'XL':
								nbViande = 3;
								break;

								case 'XXL':
								nbViande = 4;
								break;
							}

							for(var i = 0; i < nbViande - 1; i++)
							{
								$('aside:eq(' + currentAside + ')').find('.modalCompo').append($('#viandeCompoSelect').clone());
								//$('.viandeCompoSelect:eq('+ i +')').niceSelect();
							}
							for(var i = 0; i < nbViande + 1; i++)
							{
								$('.viandeCompoSelect:eq(' + i + ')').niceSelect();
							}
						}
						else if(currentAside == 3)
						{
							for(var i = 0; i < nbViande; i++)
							{

							}
							$('#viandes span').text($('#viandeCompoSelect').val());
						}
						else if(currentAside == 4)
							$('#sauce span').text($('#sauceCompoSelect').val());
						else if(currentAside == 5)
							$('#boisson span').text($('#boissonCompoSelect').val());
						else if(currentAside == 6)
							{
								quantity = $('#quantityCompo').val();
							}

						$.post('calculPrice.php', {size:$('#sizeCompoSelect').val()}, function(price)
						{
							$('#price span').text(parseInt(price)*parseInt($('#quantityCompo').val()) + '€');
						});

						var pos = $(this).parent().position();
						$('aside:eq(' + currentAside + ')').css(
						{
					        position: "absolute",
					        top: pos.top + "px",
					        left: pos.left + "px"
					    }).show();

					    if(currentAside >= 7)
					    {
					    	$.post('addProduct.php', {type : 'Composition',
					    							pain : $('#breadCompoSelect').val(),
					    							size: $('#sizeCompoSelect').val(),
					    							viandes: $('#viandeCompoSelect').val(),
					    							sauce: $('#sauceCompoSelect').val(),
					    							boisson : $('#boissonCompoSelect').val(),
					    							quantity : $('#quantityCompo').val()}, function(data)
					    							{
					    								alert(data);
					    							});
					    }


					    $("#progressBarCompo").animate_progressbar(16.66*currentAside);
					});

					$('.validCompoButton').mouseenter(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "#155de9",
							color : "white"
						}, 500);
					});
					$('.validCompoButton').mouseleave(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "white",
							color : "#155de9"
						}, 200);
					});

					$('.nice-select .option').animate(
					{
						backgroundColor : "white",
						color : "rgba(115, 115, 115, 1)"
					}, 100);

					$('.nice-select .option').mouseenter(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "#155de9",
							color : "white"
						}, 100);
					});
					$('.nice-select .option').mouseleave(function()
					{
						$(this).css({'font-weight' : 'bold'});

						$(this).animate(
						{
							backgroundColor : "white",
							color : "rgba(115, 115, 115, 1)"
						}, 100);
					});

					$('.lessQuantityCompo').on('click', function()
					{
						$(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) - 1);
						if(parseInt($(this).parent().find('input').val()) < 1)
						{
							$(this).parent().find('input').val('1');
						}
					});
					$('.moreQuantityCompo').on('click', function()
					{
						$(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) + 1);
					});
					$('.moreQuantityCompo').mouseenter(function()
					{
						$(this).animate(
						{
							backgroundColor: 'rgb(173, 173, 173)',
							color: '#1a1a1a'
						});
					});
					$('.moreQuantityCompo').mouseleave(function()
					{
						$(this).animate(
						{
							backgroundColor: '#1a1a1a',
							color: 'white'
						});
					});
					$('.lessQuantityCompo').mouseenter(function()
					{
						$(this).animate(
						{
							backgroundColor: 'rgb(173, 173, 173)',
							color: '#1a1a1a'
						});
					});
					$('.lessQuantityCompo').mouseleave(function()
					{
						$(this).animate(
						{
							backgroundColor: '#1a1a1a',
							color: 'white'
						});
					});

				}

				$('a#menuLink').on('click', function()
				{
					var type = $(this).attr('type');

					if(type != currentType)
					{
						$.post('loadMenus2.php', {type:type}, function(data)
						{
							$('li.product').remove();
							$('.avgrund-popup').remove();
							$('#progressContainer').remove();
							$('#compoMenuContainer').remove();
							$('ul.products').append(data);
							currentType = type;

							if(type == 'Composition')
								$('.products').css('display', 'block');
							else
								$('.products').css('display', 'flex');

							reloadJSproducts();
							reloadJSCompo();

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
					 $.post('loadMenus2.php', {type:'Menu'}, function(data)
						{
							$('li.product').remove();
							$('ul.products').append(data);
							currentType = 'Menu';
							reloadJSproducts();
						}, 'text');
				});

				$('#panierLink').mouseenter(function()
				{
					$('#panierMenu').show();
					$.post('getPanierItem.php', {}, function(data)
					{
						$('#panierMenu').empty();
						$('#panierMenu').append(data);

						reloadJSproducts();
					});
				});
				$('#panierMenu').mouseenter(function()
				{
					$('#panierMenu').show();
					$.post('getPanierItem.php', {}, function(data)
					{
						$('#panierMenu').empty();
						$('#panierMenu').append(data);

						reloadJSproducts();
					});
				});
				$('#panierLink').mouseleave(function()
				{
					$('#panierMenu').delay(1000);$('#panierMenu').hide();
				});

				$('#validConnexionButton').on('click', function()
				{
					$.post('connect.php', {pseudo: $('#pseudoInput').val(), password: $('#passwordInput').val()}, function(response)
					{
						if(response == "")
						{
							document.location.href = "profil.php";
						}
						else
						{
							alert(response);
						}
					});
				});

				$('#validConnexionButton').mouseenter(function()
				{
					$(this).css({'font-weight' : 'bold'});

					$(this).animate(
					{
						backgroundColor : "#155de9",
						color : "white"
					}, 500);
				});
				$('#validConnexionButton').mouseleave(function()
				{
					$(this).css({'font-weight' : 'bold'});

					$(this).animate(
					{
						backgroundColor : "white",
						color : "#155de9"
					}, 200);
				});

				$('.validInscriptionButton').on('click', function()
				{
					$('#progressBarInscription').find(".ui-progressbar-value").css('background-color', '#155de9');

					$(this).attr('disabled', 'true');
					$(this).parent().attr('class', 'fadeOutLeft animated');
					$(this).parent().css('z-index', '1');
					currentAside += 1;

					$('aside:eq(' + currentAside + ')').attr('class', 'fadeInRight animated');
					$('aside:eq(' + currentAside + ')').show();
					$('aside:eq(' + currentAside + ')').css('display', 'none');

					if(currentAside +1 == 8)
					{
						var pseudo = $('#pseudoInput').val();
						var password = $('#passwordInput').val();
						var name = $('#nameInput').val();
						var email = $('#emailInput').val();
						var phoneNumber = $('#phoneNumberInput').val();
						var photoName = $('#photoInput').prop('files')[0].name;
						var photoSize = $('#photoInput').prop('files')[0].size;
						var photoType = $('#photoInput').prop('files')[0].type;
						var photo = $('#photoInput').prop('files')[0];
                  		var adresse = $('#adresseInput').val();

						var data = new FormData(this);
						data.append('pseudo', pseudo);
						data.append('password', password);
						data.append('name', name);
						data.append('email', email);
						data.append('phoneNumber', phoneNumber);
						data.append('photoName', photoName);
						data.append('photoSize', photoSize);
						data.append('photoType', photoType);
						data.append('photo', photo);
                  data.append('adresse', adresse);

						$.ajax(
				        {
				            url: 'inscription.php',
				            type: 'post',
				            contentType: false,
				            processData: false,
				            data: data,
				            success: function(response) 
				            {
				                alert(response);
				            },
				            error: function(response)
				            {
				            	alert(response);
				            }
				        });
					}

					var pos = $(this).parent().position();
					$("#progressBarInscription").animate_progressbar(100/6*currentAside);
					$('aside:eq(' + currentAside + ')').css(
					{
				        position: "absolute",
				        top: pos.top + "px",
				        left: pos.left + "px"
				    }).show();
				    $('aside:eq(' + currentAside + ')').find('input').focus();
				});

				$('.headerLink').on('click', function()
				{
					currentAside = 0;
					if($(location).attr('pathname').includes("menu.php"))
					{
						if($(this).text() != "Profil" && $(this).text() != "Connexion")
						{
							var type = $(this).text();
							$.post('loadMenus2.php', {type:type}, function(data)
							{
								$('li.product').remove();
								$('.avgrund-popup').remove();
								$('#progressContainer').remove();
								$('#compoMenuContainer').remove();
								$('ul.products').append(data);
								currentType = type;

								if(type == 'Composition')
									$('.products').css('display', 'block');
								else
									$('.products').css('display', 'flex');

								reloadJSproducts();
								reloadJSCompo();

							}, 'text');
						}
					}
					else
					{
						document.location.href = "menus.php";
					}
				});

				reloadJSproducts();
			});

(function(a){a.fn.animate_progressbar=function(d,e,f,b){if(d==null){d=0}if(e==null){e=1000}if(f==null){f="swing"}if(b==null){b=function(){}}var c=this.find(".ui-progressbar-value");c.stop(true).animate({width:d+"%"},e,f,function(){if(d>=99.5){c.addClass("ui-corner-right")}else{c.removeClass("ui-corner-right")}b()})}})(jQuery);