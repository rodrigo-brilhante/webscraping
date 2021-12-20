<script>
    $('#modalEditar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var autor = button.data('autor')
        var texto = button.data('texto')
        var tags = button.data('tags')

        var modal = $(this)
        modal.find('#id').val(id)
        modal.find('#autor').val(autor)
        modal.find('#texto').val(texto)
        modal.find('#tags').val(tags)
    });


    $('#modalExcluir').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#id').val(id)

        $(document).ready(function() {
            $("#txt-confirmar").keyup(verificar);
        });

        function verificar() {
            var confirmar = $("#txt-confirmar").val();

            if (confirmar == "sim") {
                document.getElementById("btn-exluir").disabled = false;

            } else {
                document.getElementById("btn-exluir").disabled = true;
            }
        }
    });
</script>