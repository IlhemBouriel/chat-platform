@extends('index')
@section('content')
<div>
Home Page
</br>
Welcome 
 {{ Session::get('name')}} 

your email:
{{ Session::get('email')}}	
</div>


@endsection