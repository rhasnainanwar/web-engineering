$(function() { //document ready

	var days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
	var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

	// Task 1: date on click
	$('#items li').click(function(){
		let curr = new Date();
		$(this).append('<span class="date">Clicked on ' + days[curr.getDay()] +' '+ months[curr.getMonth()] +' '+ curr.getDate() +' '+ curr.getFullYear() +' at '+ curr.getHours() +':'+ curr.getMinutes() +':'+ curr.getSeconds() +'<span>');
	});

	$('#items').append('<p id="displayBox">Click or mouseover a hot item...</p>');

	// Task 2: event details
	$('#items li').on('click mouseover', function(event){
		let text =  $(this).clone()    //clone the element
						    .children() //select all the children
						    .remove()   //remove all the children
						    .end()  //again go back to selected element
						    .text();

		let status = (text === 'honey' || text === 'pine nuts') ? 'Important' : 'Available';

		$('#displayBox').html('Item: ' + text + '<br/>' + 'Status: ' + status + '<br/>' + 'Event: ' + event.type);
	});

	// Task 3: Scroll
	$(window).scroll(function(){
		if($('#footer').offset().top - $(window).height() - $(window).scrollTop() > 500){
			$('.discount-label').fadeOut(2000);
		}
		else {
			$('.discount-label').fadeIn(2000);
		}
	});
});

