{{-- ALERT DE SUCESSO --}}
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '<span style="font-size:1.5rem">{{ session('success') }}</span>',
    })
</script>
@endif

{{-- ALERT DE TODOS OS ERROS --}}
<script>
@if ($errors->any())
    let errors='Erros encontrados: \n',cont=1;

    @foreach ($errors->all() as $error)
        errors += cont+'-'+'{{ $error }}' + '\n';
        cont++;
    @endforeach
    Swal.fire({
    icon: 'error',
    title: "<sapn style='font-size: 1.3rem;text-align:left'>" + errors + "</li></span>",
        })
@endif
</script>

{{-- ALERT UM ERRO --}}
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '<span style="font-size:1.5rem">{{ session('error') }}</span>',
        })
    </script>
@endif
