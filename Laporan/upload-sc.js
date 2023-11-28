/*---==>Custom FIle Upload--==>*/
	$(".file-upload").each(function() {

		var fI  = $(this).children('input'), 
		    btn = $(this).children('.btn-upload'), 
		    i1  = $(this).children('.i-pic-upload'),
			i2  = $(this).children('.i-deselect'), 
			dN  = "No file Selected", 
			tfN = $(this).find('.text-file-name'), 
			bT  = $(this).find('.text-browse');
			bT.text('Browse...');
			tfN.text('No file Selected');

		  btn.click(function(b) {
		  	 b.preventDefault(); 
		  	 fI.click();
		  });
		  function readURL(input) {
		  	if (input.files && input.files[0]) {
		  		var reader = new FileReader();
	  		    reader.onload = function(e) {
	  				i1.css("background", "url("+e.target.result+") no-repeat center").removeClass('fa fa-camera');
	  			}
		  		reader.readAsDataURL(input.files[0]);
		  	}
		  }
		fI.change(function(e) {
			readURL(this); 
			var fN = e.target.files[0].name; 
			tfN.text(fN); 
			i2.fadeIn(200); 
			bT.text('Change...');
		});
		i2.click(function() {
			i2.fadeOut(100);
			window.setTimeout(function() {
				i1.css("background", "#ebebeb").addClass('fa fa-camera');
				bT.text('Browse...');
				tfN.text('No file Selected');
				fI.val(null);
			}, 200);

		});
	});