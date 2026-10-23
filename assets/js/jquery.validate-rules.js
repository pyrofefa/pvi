$(document).ready(function() {

	jQuery.validator.addMethod("lettersonly", function(value, element) {
		return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Por favor solo letras");

	jQuery.validator.setDefaults({
		errorElement:'span',
		errorClass: 'error',
		errorPlacement: function(error, element) {
			error.appendTo(element.parent());
			$(element).parent().parent().addClass("error");
		},
		success: function(element){
			$(element).parent().parent().removeClass("error");
		}
	});
	
});