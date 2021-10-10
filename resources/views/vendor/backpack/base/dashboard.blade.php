@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Dashboard',
        //'content'     =>  trans('backpack::base.use_sidebar'),
        'button_link' => 'https://dashboard.tawk.to/#/dashboard/',
        'button_text' => 'TawkTo Dashboard',
    ];
@endphp

@section('content')
@endsection