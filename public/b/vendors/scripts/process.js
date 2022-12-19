var width = 100,
    perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
    EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
    time = parseInt((EstimatedTime/1000)%60)*100;
    
// Percentage Increment Animation
var PercentageID = $("#percent1"),
		start = 0,
		end = 100,
		durataion = time;
		animateValue(PercentageID, start, end, durataion);
		
function animateValue(id, start, end, duration) {
  
	var range = end - start,
      current = start,
      increment = end > start? 1 : -1,
      stepTime = Math.abs(Math.floor(duration / range)),
      obj = $(id);
    
	var timer = setInterval(function() {
		current += increment;
		$(obj).text(current + "%");
		$("#bar1").css('width', current+"%");
      //obj.innerHTML = current;
		if (current == end) {
			clearInterval(timer);
		}
	}, stepTime);
}

// Fading Out Loadbar on Finised
setTimeout(function(){
  $('.pre-loader').fadeOut(300);
}, time);

function ajax_search_exp_handler(url,value) {
	$.ajax({
		type: "POST",
		url: url,
		data: {
			_token:  $('meta[name="_token"]').attr('content'),
			search: value
		},
		success: function (response) {
			if (response) {
				var upExps = '';
				response.forEach(expert => {
					upExps+=`<div class="mb-10 list-group-item list-group-item-action flex-column align-items-start rounded shadow-1"><button class="btn btn-primary float-right" data-toggle="modal" data-target="#send_email_modal" data-email="${expert['email']}">Send Email</button><h5 class="mb-1 h5"><a href="/admin/users/${expert['id']}">${expert['name']}</a></h5><div class="pb-1"></div><small>${expert['email']}</small></div>`
				});
				$('.search_exp_result').empty().append(upExps);
			}
		}
	});
}