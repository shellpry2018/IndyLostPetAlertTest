jQuery(function($) {
	$('input:file').change(function(event) {

		var fileInput = $(this);

		var field = fileInput.parent().find('input[type=hidden]');
		var fieldTitle = field.attr('name');
		var fieldId = field.attr('id');

		var parentDiv = $(this).closest('.customizer-field');
		var progressArea = parentDiv.find('.progress-area');
		var uploadBar = parentDiv.find('.img-upload-bar');
		var progressStatus = parentDiv.find('.progress-status');

		progressArea.show();
		$('#form-submit-button').prop('disabled', true).addClass('disabled');


		var formdata = new FormData();
		jQuery.each(fileInput[0].files, function(i, file) {
			formdata.append('file-'+i, file);
		});
		formdata.append('uploadFolder', $('#tmp_uploads_folder').val());

		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener('progress', function(event) {
			var percent = (event.loaded / event.total) * 100;
			var progressStatusMessage;
			if(percent != 100) {
				progressStatusMessage = Math.round(percent) + '% uploaded... please wait';
			} else {
				progressStatusMessage = Math.round(percent) + '% Upload Complete';
			}
			uploadBar.val(Math.round(percent));
			progressStatus.html(progressStatusMessage);
			$('#loaded_n_total').html('Uploaded ' + precisionRound(event.loaded / 1024, 2) + ' kb of ' + precisionRound(event.total / 1024, 2));

		}, false);
		ajax.addEventListener('error', errorHandler(event, progressStatus), false);
		ajax.addEventListener('abort', abortHandler(event, progressStatus), false);
		ajax.addEventListener('load', function(event){
			filename = event.target.response;
			field.val(filename);

			var sectionToRemove;
			var sectionNameToRemove;
			if($('#' + fieldId + '-placeholder').length != 0) {
				sectionNameToRemove = '#' + fieldId + '-placeholder';
				sectionToRemove = $(sectionNameToRemove);
			} else {
				sectionNameToRemove = '#' + fieldId + '-image-preview';
				sectionToRemove = $(sectionNameToRemove);
			}
			if(filename.replace(/\s/g, '').length != 0) {
				sectionToRemove.after('<img id="' + fieldId + '-image-preview" src="' + filename + '" style="display:block">').remove();
			} else {
				sectionToRemove.before('<div id="' + fieldId + '-placeholder" class="image-placeholder">No image selected</div>').remove();
			}

			$('#form-submit-button').prop('disabled', false).removeClass('disabled');
		}, false);
		ajax.open('POST', '/wp-content/themes/mh_magazine_child/functions/temp-image-upload.php');

		ajax.send(formdata);
	});

	function precisionRound(number, precision) {
		var factor = Math.pow(10, precision);
		return Math.round(number * factor) / factor;
	}

	function errorHandler(event, progressStatus) {
		progressStatus.html('Upload Failed');
	}

	function abortHandler(event, progressStatus) {
		progressStatus.html('Upload Aborted');
	}
}); 