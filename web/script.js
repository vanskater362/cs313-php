function clicked() {
   alert("Button Clicked!");
}

function mouseOver(id) {
   document.getElementById(id).style.fontWeight = "bold";
}

function mouseOut(id) {
   document.getElementById(id).style.fontWeight = "normal";
}

function showCreate() {
   var element = document.getElementById('createBTN');
    if(element.innerHTML == "Create New Job") {
       document.getElementById('createNew').style.visibility = "visible";
       document.getElementById('createBTN').innerHTML = "Hide Create New";
    }
 
    else {
       document.getElementById('createNew').style.visibility = "hidden";
       document.getElementById('createBTN').innerHTML = "Create New Job";
    }
 }

 function showSearch() {
   var element = document.getElementById('searchBTN');
    if(element.innerHTML == "Search") {
       document.getElementById('search').style.visibility = "visible";
       document.getElementById('searchBTN').innerHTML = "Hide Search";
    }
 
    else {
       document.getElementById('search').style.visibility = "hidden";
       document.getElementById('searchBTN').innerHTML = "Search";
    }
 }

 $(document).ready(function(){
	
	$('input[type=password]').keyup(function() {
		var pswd = $(this).val();
		
		//validate the length
		if ( pswd.length < 8 ) {
			$('#length').removeClass('valid').addClass('invalid');
		} else {
			$('#length').removeClass('invalid').addClass('valid');
		}
		
		//validate letter
		if ( pswd.match(/[A-z]/) ) {
			$('#letter').removeClass('invalid').addClass('valid');
		} else {
			$('#letter').removeClass('valid').addClass('invalid');
		}

		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) {
			$('#capital').removeClass('invalid').addClass('valid');
		} else {
			$('#capital').removeClass('valid').addClass('invalid');
		}

		//validate number
		if ( pswd.match(/\d/) ) {
			$('#number').removeClass('invalid').addClass('valid');
		} else {
			$('#number').removeClass('valid').addClass('invalid');
		}
		
		//validate space
		if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
			$('#space').removeClass('invalid').addClass('valid');
		} else {
			$('#space').removeClass('valid').addClass('invalid');
		}
		
	}).focus(function() {
		$('#pswd_info').show();
	}).blur(function() {
		$('#pswd_info').hide();
	});
	
});

$(function() {

   $('#login-form-link').click(function(e) {
     $("#login-form").delay(100).fadeIn(100);
      $("#register-form").fadeOut(100);
     $('#register-form-link').removeClass('active');
     $(this).addClass('active');
     e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
     $("#register-form").delay(100).fadeIn(100);
      $("#login-form").fadeOut(100);
     $('#login-form-link').removeClass('active');
     $(this).addClass('active');
     e.preventDefault();
  });

});
