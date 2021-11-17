{{-- Mostra Mensagem de Confirmação de Exclusão --}}
<script>
    $("{{$formulario}}").submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Deseja realmente excluir!',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            CancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
