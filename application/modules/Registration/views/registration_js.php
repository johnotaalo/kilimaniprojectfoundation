<script type="text/javascript">
	$(document).ready(function(){
		$('.activities').hide();
		$('#individual-form').validate({
			rules: {
				volunteering: {
					required: true
				},
				certify: {
					required: true,
					message: "You have to certify that the information you have provided is true"
				}
			},
			submitHandler: function(form) {
				form.submit();
			}
		});

		$('input[name="volunteering"]').change(function(){
			var target = $(this).attr('data-target');
			if ($(this).val() == "yes") {
				$(target).show('slide');
			}else{
				$(target).hide('slide');
			}
		});
	});
</script>