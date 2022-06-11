@extends('layouts.app')

@section('content')
    <products :products="{{ $products }}"
        :type_user="'{{ $user_type }}'" />
@endsection
