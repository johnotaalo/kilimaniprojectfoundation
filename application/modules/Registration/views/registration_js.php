<script type="text/javascript">
	$(document).ready(function(){
		// $('.activities').hide();
		$('#confirm-transaction').hide();
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

	$('#make-payment').on('click', function(){
		$(this).find('i.fa').addClass('fa-spinner');
		$(this).prop('disabled', true);

		$.ajax({
			url: "<?= @base_url('Registration/makeIndividualPayment/' . $member->id . '/FirstTimeRegistration'); ?>",
			method: "GET",
			beforeSend: function(){
				console.log("Sending Request");
			},
			success:function(res){
				console.log(res);
				$('#make-payment').find('i.fa').removeClass('fa-spinner');
				$('#make-payment').prop('disabled', false);
				if(res.response_code == "0"){
					$(this).text("Retry");
				}else{
					alert(res.error_message);
				}
			},
			error: function(){
				alert("There was an error while trying to make the payment");
				$('#make-payment').find('i.fa').removeClass('fa-spinner');
				$('#make-payment').prop('disabled', false);
			}
		});
	});
</script>