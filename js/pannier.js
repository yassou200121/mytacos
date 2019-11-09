$(document).ready(function($)
{
	var currentEtape = "connexion";

	$('.lessQuantity').on('click', function()
	{
		if($('#quantityArticleInput' + parseInt($(this).attr('number'))).val() - 1 > 0 && $('#quantityArticleInput' + parseInt($(this).attr('number'))).val() < 20)
		{
			$('#quantityArticleInput' + $(this).attr('number')).val(parseInt($('#quantityArticleInput' + parseInt($(this).attr('number'))).val()) - 1);
		}

		$(this).parent().parent().parent().find('.DIV_66').text(parseInt($('#quantityArticleInput' + $(this).attr('number')).val()) * parseInt($(this).parent().parent().parent().find('.DIV_66').attr('def')) + '€');
	});
	$('.moreQuantity').on('click', function()
	{
		if($('#quantityArticleInput' + parseInt($(this).attr('number'))).val() + 1 > 0 && $('#quantityArticleInput' + parseInt($(this).attr('number'))).val() < 20)
		{
			$('#quantityArticleInput' + $(this).attr('number')).val(parseInt($('#quantityArticleInput' + parseInt($(this).attr('number'))).val()) + 1);
		}
		
		$(this).parent().parent().parent().find('.DIV_66').text(parseInt($('#quantityArticleInput' + $(this).attr('number')).val()) * parseInt($(this).parent().parent().parent().find('.DIV_66').attr('def')) + '€');
	});
	$('.moreQuantity').mouseenter(function()
	{
		$(this).animate(
		{
			backgroundColor: 'rgb(173, 173, 173)',
			color: '#1a1a1a'
		});
	});
	$('.moreQuantity').mouseleave(function()
	{
		$(this).animate(
		{
			backgroundColor: '#1a1a1a',
			color: 'white'
		});
	});
	$('.lessQuantity').mouseenter(function()
	{
		$(this).animate(
		{
			backgroundColor: 'rgb(173, 173, 173)',
			color: '#1a1a1a'
		});
	});
	$('.lessQuantity').mouseleave(function()
	{
		$(this).animate(
		{
			backgroundColor: '#1a1a1a',
			color: 'white'
		});
	});
	$('.BUTTON_65').on('click', function()
	{
		var selectedMenu = 0;
		var type = $(this).parent().parent().parent().attr('type');
		var id = $(this).parent().parent().parent().attr('menusessionid');
		var elem = $(this).parent().parent().parent();

		$.confirm(
		{
		    title: 'Supprimer le menu',
		    content: '<span style="font-size:15px;">Etes-vous sûr de vouloir supprimer ce menu ?</span>',
		    type: 'red',
		    boxWidth: '30%',
    		useBootstrap: false,
    		backgroundDismiss: false,
    		backgroundDismissAnimation: 'glow',
		    buttons:
		    {
		        ok:
		        {
		            text: "Oui",
		            btnClass: 'btn-primary',
		            action: function()
		            {
		                $.post('editPannier.php', {type : type, id : id, mode :  "delete"}, function(data)
		                {
		                	elem.remove();
		                	console.log(data);
		                });
		            }
		        },
		        cancel:
		        {
		            text: "Non"
		        }
		    }
		});
	});

	$('.BUTTON_12').off('click').on('click', function()
	{
		if(currentEtape == "connexion")
		{
			currentEtape = "livraison";
			$(this).fadeOut('slowly', function()
			{
				$(this).parent().parent().parent().parent().parent().animate({height: 40, opacity : 0.4}, 1000);
				$(this).parent().parent().parent().parent().empty().remove();
				$('.DIV_14').animate({opacity : 1, height : 120}, 500);
				$('.livraisonDIV_1').fadeIn(500);
			});
		}
		else if(currentEtape == "livraison")
		{
			currentEtape = "confirmAdresse";
			$(this).fadeOut('slowly', function()
			{
				$(this).parent().parent().parent().animate({height: 40, opacity : 0.4}, 1000);
				$(this).parent().parent().empty().remove();
				$('.DIV_16').animate({opacity : 1, height : 200}, 500);
				$('#adresseDivModal').fadeIn(500);
			});
		}
		else if(currentEtape == "confirmAdresse")
		{
			currentEtape = "Paiement";
			$(this).fadeOut('slowly', function()
			{
				$(this).parent().parent().parent().parent().parent().animate({height: 40, opacity : 0.4}, 1000);
				$(this).parent().parent().parent().parent().empty().remove();
				$('.DIV_18').animate({opacity : 1, height : 200}, 500);
				$('#paiementDivModal').fadeIn(500);
			});
		}
	});

	$('#paypalCheckBox').on('click', function()
	{
		if($('#paypalButton').length == 0)
			$(this).parent().append('<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="yassou200121@gmail.com"><input type="hidden" name="lc" value="FR"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHostedGuest"><input id="paypalButton" type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne"><img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1"></form>')
	});

	$('#paypalCheckBox').on('change', function()
	{
		alert('');
		$("#formPaypal").show();
	});
});