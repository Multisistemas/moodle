window.onload = function (){
	// For button hide-show left
	require(['jquery'], function($){
		var span = $("#rows");
		var panel = $("nav-drawer");

		if (panel.attr("aria-hidden") == "true" ){
			span.text('>>');
		} else {
			span.text('<<');
		}
	});
}

// Button hide-show left
require(['jquery'], function($){
	$("button.pull-xs-left").click(function(e){
		var span = $("#rows");
		var	btn = $("button.pull-xs-left");

		if (btn.attr("aria-expanded") == "true" ){
			span.text('>>');
		} else {
			span.text('<<');
		}
	});
});

// Button hide-show right
require(['jquery'], function($){
	$("#btn-show-hide-two").click(function(e){
		var span = $("#rows2");
		var	btn = $("btn-show-hide-two");
		var menu = $("#action-menu-right");

		if (menu.css("display") == "none" ){
			span.text('>>');
			menu.css("display","inline-block");
		} else {
			span.text('<<');
			menu.css("display","none");
		}
	});
});


/*$("#wiki-tab").click(function(e){
		
		$('#wiki-frame').attr('src', function () { return $(this).contents().get(0).location.href });

			function createCORSRequest(method, url) {
			  var xhr = new XMLHttpRequest();
			  if ("withCredentials" in xhr) {
			    // XHR for Chrome/Firefox/Opera/Safari.
			    xhr.open(method, url, true);
			  } else if (typeof XDomainRequest != "undefined") {
			    // XDomainRequest for IE.
			    xhr = new XDomainRequest();
			    xhr.open(method, url);
			  } else {
			    // CORS not supported.
			    xhr = null;
			  }
			  return xhr;
			}

			// Helper method to parse the title tag from the response.
			function getTitle(text) {
			  return text.match('<title>(.*)?</title>')[1];
			}

		  var url = 'https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=https%3A%2F%2Fmseicorp.com%2Fwiki%2Fdoku.php%2Fstart%3Fdo%3Dlogin&client_id=759994973962-nr1s2n4i57bj13tsovhje7q563g062dq.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&access_type=online&approval_prompt=auto&state=';

		  var xhr = createCORSRequest('GET', url);
		  if (!xhr) {
		    alert('CORS not supported');
		    return;
		  }

		  // Response handlers.
		  xhr.onload = function() {
		    var text = xhr.responseText;
		    var title = getTitle(text);
		    alert('Response from CORS request to ' + url + ': ' + title);
		  };

		  xhr.onerror = function() {
		    alert('Woops, there was an error making the request.');
		  };

		  xhr.withCredentials = true;
		  xhr.send();

		  
	});

});*/