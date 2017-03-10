window.onload = function (){
	// For button hide-show left
	require(['jquery'], function($){
		var span = $("#rows");
		var panel = $("#nav-drawer");

		if (panel.attr("aria-hidden") == "true" ){
			span.text('>>');
		} else {
			span.text('<<');
		}
	});

}

function view_icon(){
	require(['jquery'], function($){

		var media_left = document.getElementsByClassName("media-left");
		var media_body = document.getElementsByClassName("media-body");
		
		var array1 = jQuery.makeArray(media_body);
		var array2 = jQuery.makeArray(media_left);
	
		for (i in array1) {
			var temp = $(array2[i]);
    	if (array1[i].innerHTML == "Home" || array1[i].innerHTML == "Página Principal") {
    		var img = "<img class='icon smallicon' src='../pix/i/home.svg'>";
    		array2[i].innerHTML = img;
    		temp.fadeIn("slow");
    	} else if (array1[i].innerHTML == "Dashboard" || array1[i].innerHTML == "Área personal") {
    		var img = "<img class='icon smallicon' src='../pix/i/course.svg'>";
    		array2[i].innerHTML = img;
    		temp.fadeIn("slow");
    	} else if (array1[i].innerHTML == "Calendar" || array1[i].innerHTML == "Calendario") {
    		var img = "<img class='icon smallicon' src='../pix/i/calendar-new.svg'>";
    		array2[i].innerHTML = img;
    		temp.fadeIn("slow");
    	} else if (array1[i].innerHTML == "Private files" || array1[i].innerHTML == "Ficheros privados") {
    		var img = "<img class='icon smallicon' src='../pix/i/upload-folder.svg'>";
    		array2[i].innerHTML = img;
    		temp.fadeIn("slow");
    	} else if (array1[i].innerHTML == "Site administration" || array1[i].innerHTML == "Administración del sitio") {
    		var img = "<img class='icon smallicon' src='../pix/i/cog-wheel.svg'>";
    		array2[i].innerHTML = img;
    		temp.fadeIn("slow");
    	} else {
    		var img = "<img class='icon smallicon' src='../pix/i/test.svg'>";
    		array2[i].innerHTML = img;
    		temp.fadeIn("slow");
    	}
		}
	});
}

function hide_icon(){
	require(['jquery'], function($){
		var media_left = document.getElementsByClassName("media-left");
		var array = jQuery.makeArray(media_left);

		for (i in array){
			var temp = $(array[i]);
			temp.fadeOut("fast");
		}
	});
}

// Button hide-show left
require(['jquery'], function($){
	$("button.pull-xs-left").click(function(e){
		var span = $("#rows");
		var	btn = $("button.pull-xs-left");
		var panel = $("#nav-drawer");
    var body = $(".drawer-open-left");
    var media_body = document.getElementsByClassName("media-body");
		var array = jQuery.makeArray(media_body);
    alert("funciona");
    console.log(panel.width());
    if (panel.width() >= 284 && panel.width() <= 285 ){

			span.text('>>');
			panel.css({
				'width' : '50px',
				'transition' : 'all 0.7s ease'
			});
			body.css({
				'margin-left': '50px',
				'transition' : 'all 0.7s ease'
			});

			for (i in array) {
				var temp = $(array[i]);
				temp.fadeOut("fast");
			}

			view_icon();

		} else if (panel.width() >= 49 || panel.width() <= 50) {

			hide_icon();

			span.text('<<');
			panel.css({
				'width' : '285px',
				'transition' : 'all 0.7s ease'
			});
			body.css({
				'margin-left': '285px',
				'transition' : 'all 0.7s ease'
			});

			for (i in array) {
				var temp = $(array[i]);
				temp.fadeIn("slow");
			}

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