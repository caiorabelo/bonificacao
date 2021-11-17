{{-- Data tables --}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $("#{{ $tabela }}").DataTable({
            order: [
                [0, "asc"]
            ],
            // dom: 'Bfrtip',
            // buttons: [
            // 'csv',
            // 'excel',
            // {
            //     extend: 'pdf',
            //     footer: true
            // },
            // {
            //     extend: 'print',
            //     text: 'Imprimir'
            // }
            // ],
            responsive: true,
            processing: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "A tabela está vazia!",
                "info": "Mostrando pagina _PAGE_ de um total de _PAGES_",
                "infoEmpty": "Nenhum registro encontrado",
                "infoFiltered": "(filtrado de _MAX_ registros totais)",
                "infoPostFix": "",
                "thousands": ",",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "search": "<span class='text-muted font-weight-bold'>Pesquisar:</span>",
                "paginate": {
                    "first": "Primeiro",
                    "last": "Útimo",
                    "next": "Próximo",
                    "previous": "Voltar"
                }
            },
        });
    });

</script>
