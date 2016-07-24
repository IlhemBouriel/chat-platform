@extends('index')

@section('content')
{{ 'this your publications'}}
@if ($publications)
@foreach ($publications as $p)
$p->id
@endforeach
@else
{{ 'no publications'}}
@endif


@endsection