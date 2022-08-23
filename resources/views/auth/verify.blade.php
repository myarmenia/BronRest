@extends('adminlte::auth.verify')

@section('js')
<script>
    setTimeout(()=>{
      location.href = "{{url('/?message=Пройдите верификацию')}} "
    },1000)
</script>
@endsection
