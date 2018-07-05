<script type="text/javascript">
            $(document).ready(function() {
                $("#id_pais").change(function() {
                    $("#id_pais option:selected").each(function() {
                        id_pais = $('#id_pais').val();
                        $.post("<?php echo base_url();?>pais/fill_ciudad", {
                            id_pais : id_pais,
                        }, function(data) {
                          $("#id_ciudad").html(data);
                        });
                    });
                });
            });
</script>