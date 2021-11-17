{{-- Pesquisar no select --}}
<script src="{{url('js/tail.select-full.min.js')}}"></script>
<script>
    tail.select("#{{$id}}",{
        search:true,
        width:"{{$tamanho}}"
    });
</script>
