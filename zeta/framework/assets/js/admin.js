jQuery(document).ready(function($){
var custom_uploader;

/* ---------------------------------------------------------------------- */
/*	Enable Upload with Media Upload
/* ---------------------------------------------------------------------- */
mdUploadFile = function(){
	$('.upload_single').on('click', function(e){

		e.preventDefault();

		$uploadArea = $(this).parents('div.field');
		$uploadPath = $uploadArea.data('path');
		$uploadMedia = $uploadArea.data('media');
		$uploadField = $uploadArea.find('.upload_field');
	 	$uploadImage = $uploadArea.find('.upload_img');
	 	$uploadTitle = $uploadArea.find('.upload_title');

		custom_uploader = wp.media({
			title: 'Select File',
			multiple: false,
			button: {
			    text: 'Insert'
			},
			library : { 
				type : $uploadMedia
			}
		});

		custom_uploader.on('select', function() {

			var attachment = custom_uploader.state().get('selection').first().toJSON();
			$uploadField.val(attachment.id);


			if(attachment.type == 'image'){
				$uploadImage.find('img').attr('src', attachment.url);
			}

			else{
				$uploadImage.find('img').attr('src', $uploadPath + '/upload-'+ attachment.type +'.png');
				$uploadTitle.text(attachment.title);
			}

			$uploadImage.fadeIn();
		});

		custom_uploader.on('open', function(){

			var selection = custom_uploader.state().get('selection');

			if(selection.length){
				ids = $uploadField.val().split(',');
			    ids.forEach(function(id) {
					attachment = wp.media.attachment(id);
					attachment.fetch();
					selection.add( attachment ? [ attachment ] : [] );
				});
			}

		});
		
		custom_uploader.open();
	});	


	$('.upload_remove_single').on('click', function(){
		
		$uploadArea = $(this).parents('div.field');
		$uploadField = $uploadArea.find('.upload_field');
		$uploadImage = $uploadArea.find('.upload_img');
	 	$uploadTitle = $uploadArea.find('.upload_title');

		$uploadField.val('');
		$uploadImage.fadeOut();
		$uploadTitle.empty();
	
		return false;	
	});



	$('.upload_multi').on('click', function(e){

		e.preventDefault();

		$uploadArea = $(this).parents('div.field');
		$uploadPath = $uploadArea.data('path');
		$uploadField = $uploadArea.find('.upload_field');
	 	$uploadImage = $uploadArea.find('.upload_img');
	 	$uploadTitle = $uploadArea.find('.upload_title');

		custom_uploader = wp.media({
			title: 'Select Files',
			multiple: true,
			button: {
			    text: 'Insert'
			},
			library : { 
				type : 'image'
			}
		});

		custom_uploader.on('select', function() {
			console.log(custom_uploader);

			var attachments = custom_uploader.state().get('selection').toJSON();

			$uploadImage.empty();
			$val = '';
			$comma = false;
			for (i in attachments){

				if($comma)
					$val += ',';
				$comma = true;

				$val += attachments[i].id;

				$uploadImage.append('<img src="'+ attachments[i].url +'" alt="" />');
			}
			$uploadField.val($val);
			$uploadImage.fadeIn();
		});

		custom_uploader.on('open', function(){
			var selection = custom_uploader.state().get('selection');
			if(selection.length){
				ids = $uploadField.val().split(',');
			    ids.forEach(function(id) {
					attachment = wp.media.attachment(id);
					attachment.fetch();
					selection.add( attachment ? [ attachment ] : [] );
				});
			}	
  		});

  		custom_uploader.open();
	});	


	$('.upload_remove_multi').on('click', function(){
		
		$uploadArea = $(this).parents('div.field');
		$uploadField = $uploadArea.find('.upload_field');
		$uploadImage = $uploadArea.find('.upload_img');
	 	$uploadTitle = $uploadArea.find('.upload_title');

		$uploadField.val('');
		$uploadImage.empty();
		$uploadTitle.empty();
	
		return false;	
	});

}
mdUploadFile();



/* ---------------------------------------------------------------------- */
/*	Toggle Section Composer
/* ---------------------------------------------------------------------- */
function mdToggleSectionComposer(){
	$('body').delegate('.hide_row', 'click', function(){
		$(this).parents('.wpb_vc_row').find('.wpb_element_wrapper').eq(0).slideToggle(400);
		return false;
	});

	$('body').delegate('.hide_row_inner', 'click', function(){
		$(this).parents('.wpb_vc_row_inner').find('.wpb_element_wrapper').eq(0).slideToggle(400);
		return false;
	});
}
mdToggleSectionComposer();



/* ---------------------------------------------------------------------- */
/*	Chosen Select
/* ---------------------------------------------------------------------- */
function mdChosenSelect(){
	$(".chosen").chosen();
}
mdChosenSelect();




/* ---------------------------------------------------------------------- */
/*	Metabox Panel
/* ---------------------------------------------------------------------- */
function mdMetaboxPanel(){
	$('#mt-metabox #mt-tabs a').on('click', function(){

		$eq = $('#mt-metabox #mt-tabs a').index(this);

		$('#mt-metabox #mt-tabs a').removeClass('active').eq($eq).addClass('active');

		$('#mt-metabox .mt-panel').hide().eq($eq).fadeIn(0, function(){
            $offset = $('#mt-metabox').offset().top - 100;
            $('body, html').animate({ scrollTop : $offset}, 400);
		});

		return false;
	});

	$('#mt-metabox #mt-tabs a').eq(0).addClass('active');
	$('#mt-metabox .mt-panel').eq(0).show();
}
mdMetaboxPanel();



/* ---------------------------------------------------------------------- */
/*	Checkbox Toggle
/* ---------------------------------------------------------------------- */
function mdCheckboxToggle(){
	$('.checkbox-toggle').on('click', function(){
		$(this).toggleClass('active');
		$(this).next('input[type="checkbox"]').click();
		return false;
	});
}
mdCheckboxToggle();



/* ---------------------------------------------------------------------- */
/*	Select Icon
/* ---------------------------------------------------------------------- */
function mdSelectIcon(){
	
	$('body').delegate('.icons-item a', 'click', function(){
		$(this).parent('.icons-item').find('a').removeClass('active');
		$(this).addClass('active');
		$val = $(this).find('i').attr('class');
		$(this).parent('.icons-item').find('input').val($val);

		return false;
	});
}
mdSelectIcon();




/* ---------------------------------------------------------------------- */
/*	Post Formats
/* ---------------------------------------------------------------------- */
function mdPostFormats(){

	if ($('#post-formats-select').length){
		
		function getPostVal(c){
			$('.md-post-format').hide();

			$val = $('input[name="post_format"]:checked').val();

			if($val != '0'){
				$('.md-post-'+$val).css('display', 'block');
				
				if(c)
					$('.md-post-'+$val).find('a').click();
			}
			else $('#mt-tabs li a').eq(0).click();
		}
		getPostVal(false);


		$('input[name="post_format"]').on('change', function(){
			getPostVal(true);
		});
	}

}
mdPostFormats();


/* ---------------------------------------------------------------------- */
/*	ColorPicker
/* ---------------------------------------------------------------------- */
function mdColorPicker(){
	var myOptions = {
	    hide: true,
	    palettes: false
	};
	 
	$('.md-colorpicker').wpColorPicker(myOptions);
}
mdColorPicker();

});