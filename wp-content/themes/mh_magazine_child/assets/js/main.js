jQuery(function($){
	$(document.body).on('focus', '.datepicker', function(){
		$(this).datepicker({
			showOtherMonths: true,
			dateFormat: 'mm/dd/yy'
		});
	});

	$(document.body).on('blur', 'input[name="email"]', function(){
		if($('input[name="confirm_email"]').val()) {
			verifyEmailMatch();
		}
	});

	$(document.body).on('blur', 'input[name="confirm_email"]', function(){
		verifyEmailMatch();
	});

	function verifyEmailMatch() {
		var $originalEmailField = $('input[name="email"]');
		var $confirmEmailField = $('input[name="confirm_email"]');
		var $originalEmailValue = $originalEmailField.val();
		var $confirmEmailValue = $confirmEmailField.val();
		var $formSubmitButton = $('#form-submit-button');

		if($originalEmailValue != $confirmEmailValue) {
			if($('#email-warning').length == 0) {
				$confirmEmailField.after('<div id="email-warning" class="warning">Email addresses do not match!</div>');
				$formSubmitButton.prop('disabled', true).addClass('disabled');
			}
		} else {
			if($('#email-warning').length != 0) {
				$('#email-warning').remove();
				$formSubmitButton.prop('disabled', false).removeClass('disabled');
			}
		}
	}

	$(document.body).on('change', '.category-parent', function(){
		var $categoryId = $(this).attr('category-id');
		console.log($categoryId);
		$('.child-category').each(function(){
			if($(this).attr('parent-category-id') == $categoryId) {
				$(this).show();
				if($(this).attr('donotrequire') != 'true') {
					$(this).find('.field').attr('required', true);
				}
			} else {
				$(this).hide();
				$(this).find('.field').attr('required', false);
			}
		});
	});

	$(document.body).on('blur', '.customizer-field .phone', function(obj){
		var $phoneValue = $(this).val();
		console.log($phoneValue);
		var val = $phoneValue.replace(/\D/g, '');
		if (/^(\d{3})(\d{3})(\d{4})$/.test(val)) {
			$(this).val('(' + RegExp.$1 + ') ' + RegExp.$2 + '-' + RegExp.$3);
		}
	});

	$(document.body).on('change', 'input[name="pet_collar"]', function(){
		var $radioValue = $(this).val();
		var $collarDescription = $('#collar_description');
		var $collarDescriptionTextarea = $collarDescription.find('textarea');

		$collarDescription.each(function(){
			if($radioValue == 'yes') {
				changeRequiredAndVisible($collarDescription, $collarDescriptionTextarea, true);
			} else {
				changeRequiredAndVisible($collarDescription, $collarDescriptionTextarea, false);
			}
		});
	});

	$(document.body).on('change', 'input[name="update_type"]', function(){
		var $radioValue = $(this).val();
		var $howDidPetGetHomeDescription = $('#how_did_pet_get_home');
		var $howDidPetGetHomeDescriptionInput = $howDidPetGetHomeDescription.find('input');
		var $whichShelterDescription = $('#which_shelter');
		var $whichShelterDescriptionInput = $whichShelterDescription.find('input');
		var $petDeceasedDescription = $('#pet_deceased');
		var $petDeceasedDescriptionInput = $petDeceasedDescription.find('input');

		if($radioValue == 'my_pet_home' || $radioValue == 'found_pet_home') {
			changeRequiredAndVisible($howDidPetGetHomeDescription, $howDidPetGetHomeDescriptionInput, true);
			changeRequiredAndVisible($whichShelterDescription, $whichShelterDescriptionInput, false);
			changeRequiredAndVisible($petDeceasedDescription, $petDeceasedDescriptionInput, false);
		} else if($radioValue == 'taken_to_shelter') {
			changeRequiredAndVisible($howDidPetGetHomeDescription, $howDidPetGetHomeDescriptionInput, false);
			changeRequiredAndVisible($whichShelterDescription, $whichShelterDescriptionInput, true);
			changeRequiredAndVisible($petDeceasedDescription, $petDeceasedDescriptionInput, false);
		} else if($radioValue == 'pet_deceased') {
			changeRequiredAndVisible($howDidPetGetHomeDescription, $howDidPetGetHomeDescriptionInput, false);
			changeRequiredAndVisible($whichShelterDescription, $whichShelterDescriptionInput, false);
			changeRequiredAndVisible($petDeceasedDescription, $petDeceasedDescriptionInput, true);
		} else {
			changeRequiredAndVisible($howDidPetGetHomeDescription, $howDidPetGetHomeDescriptionInput, false);
			changeRequiredAndVisible($whichShelterDescription, $whichShelterDescriptionInput, false);
			changeRequiredAndVisible($petDeceasedDescription, $petDeceasedDescriptionInput, false);
		}
	});

	function changeRequiredAndVisible($label, $input, $visibleAndRequired) {
		if($visibleAndRequired) {
			$label.show();
			$input.attr('required', true);
		} else {
			$label.hide();
			$input.attr('required', false);
		}
	}

	$(document.body).on('change', 'input[type="radio"]', function(){
		var $parentDiv = $(this).closest('.customizer-field');
		var $otherOptionInput = $parentDiv.find('input[value="other"]');
		var $otherOptionParentDiv = $otherOptionInput.closest('.radio-button');
		var $textInput = $otherOptionParentDiv.find('input[type="text"]');

		if($(this).val() == 'other') {
			$textInput.css('display', 'block').prop('required', true);
		} else {
			$textInput.hide().prop('required', false).val($(this).val());
		}
	});
});