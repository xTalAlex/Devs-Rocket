@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Dashboard',
        //'content'     =>  trans('backpack::base.use_sidebar'),
        //'button_link' => backpack_url('logout'),
        //'button_text' => trans('backpack::base.logout'),
    ];
@endphp

@section('content')
@endsection