jQuery( document ).ready(function() {
	jQuery(".menu").addClass("hide");
});

jQuery( document ).ready(function() {
	jQuery(".toggler").on('click', function () {
		jQuery(".menu").toggleClass("hide");
	});
});