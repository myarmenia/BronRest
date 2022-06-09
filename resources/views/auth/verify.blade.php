@extends('adminlte::auth.verify')

@section('js')
<script>
    setTimeout(()=>{
      location.href = "{{url('/')}} " 
    },2000)
</script>
@endsection