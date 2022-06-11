@extends('layouts.app')

@section('content')
    <products :products="{{ $products }}" />
@endsection
