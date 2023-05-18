@extends('layouts.admin')
@section('content')


{{--to show the message you've have writtten in the login controller --}}

 @if(session('message'))
<h2>{{ session('message') }}</h2>
@endif


@endsection
