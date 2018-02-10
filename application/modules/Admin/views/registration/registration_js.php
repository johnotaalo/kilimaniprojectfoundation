<script>
    $(document).ready(function(){
        $('form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: $('form').attr('action'),
                method: "POST",
                data: $('form').serialize(),
                beforeSend: function(){
                    console.log('Started request...');
                },
                success: function(res){
                    window.location = "<?= @base_url('Admin/members'); ?>";
                },
                error: function(){
                    console.log('Request not successful.');
                }
            });
        });
    });
</script>