$(document).ready(function(){
		panel = '<div class="pre-style visible-desktop"><div class="setting"><i class="icon-cog"></i></div></div>',
		customizer = [
			'<div class="pre-style visible-desktop"><div class="setting"><i class="icon-cog"></i></div></div>',
			'<h6>Logo Type</h6><select name="nav" id="navstyle" class="demoselect"><option value="image">Image</option><option value="font">Font</option></select>',
			'<h6>Background Image</h6><div class="clearfix"><ul class="bg-picker"><li><a href="#" style="background: url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/navy_blue.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.com/patterns/cartographer.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.com/patterns/denim.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.com/patterns/px_by_Gre3g.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/noisy_grid.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/bedge_grunge.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.com/patterns/greyfloral.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/tiny_grid.png)"></a></li><li><a href="#" style="background:url(http://subtlepatterns.com/patterns/wood_pattern.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/retina_wood.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.com/patterns/tileable_wood_texture.png)"></a></li><li><a href="#" style="background: url(http://subtlepatterns.com/patterns/dark_wood.png)"></a></li></ul></div>',
			'<h6>Background Color</h6><input type="text" name="color" value="#222222" class="input-small bgcolor"/>',
			'<h6>Footer Color</h6><input type="text" name="color" value="#222222" class="input-small footcolor"/>',
			'<h6>Footer Font Color</h6><input type="text" name="color" value="#777777" class="input-small footfontcolor"/>',
			'<h6>Footer Link Color</h6><input type="text" name="color" value="#BBBBBB" class="input-small footlinkcolor"/>'	
		];
	
	$('body').append(panel);
	$('.pre-style').append(customizer);
})

$(function(){

	// Panel toggle
	$('.setting').toggle(function() {
	  $('.pre-style').animate({left:'0'});
	}, function() {
	  $('.pre-style').animate({left:'-150px'});
	});
	
	// Logo type
	$('select#navstyle').change(function(){
		var type = $(this).val();
		if ( type == 'image') {
			$('.text').hide();
			$('.image').show();
		} else {
			$('.text').show();
			$('.image').hide();					
		}
	});
	
	// Background image
	$('.bg-picker a').on('click', function(e){
		e.preventDefault();
		var bg = $(this).attr('style');
		$('body').attr('style',bg);
	});

	// Background color
	$('.bgcolor').miniColors({
		change: function(hex, rgb) {
			$('body').css('background',hex);
		}
	});

	// Footer background color
	$('.footcolor').miniColors({
		change: function(hex, rgb) {
			$('footer').css('background',hex);
			$('head').append('<style>footer .container {background:'+hex+'}</style>')
		}
	});

	// Footer font color
	$('.footfontcolor').miniColors({
		change: function(hex, rgb) {
			$('head').append('<style>footer {color:'+hex+'}</style>')
		}
	});

	// Footer link color
	$('.footlinkcolor').miniColors({
		change: function(hex, rgb) {
			$('head').append('<style>footer a {color:'+hex+'}</style>')
		}
	});	
	
})