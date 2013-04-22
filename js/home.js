$(document).ready(function(){	
	var click = 0;
	var d = new Date();
	var day = d.getDate();
	var month = d.getMonth()+1;
	var year = d.getFullYear();
	$.localScroll();
	
	$('section.movie-plot').ellipsis({visible: 80, more: ' [&hellip;]<span class="button">Continua a leggere &#9658;</span>', separator: ' ', atFront: false});
	//if(day >= 19 && day <= 27 && month == 4 && year == 2013) { window.location.hash = day+'-april'; }
	
	$('a#menu').click(function(){
		click++;
		$('aside').toggle('slide', { direction: 'right' });
		if(click%2 === 0){
			// il menù è aperto e lo sto chiudendo
			$(document).off('click', handler);
			$('section#main-content').animate({left: '0px'});
		}
		else{
			// il menù è chiuso e lo sto aprendo
			$(document).on('click', handler);
			$('section#main-content').animate({left: '-80px'});
		}
	});
	
	$('aside a').click(function(){
		$('a#menu').click();
	});
	
	var handler = function(event){
	  if($(event.target).is('a#menu, aside, aside *')) return;	  
	  
	  $('a#menu').click();
	  //alert($(event.target));
	}
	
	
});