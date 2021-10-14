@extends(backpack_view('blank'))

@section('content')
    <div class="container mt-3">

        @if (session('status'))
            <div class="w-100 alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="{{ route('settings.store') }}" role="form">
            {!! csrf_field() !!}

            @if(count(config('setting_fields', [])) )
            
                @foreach(config('setting_fields') as $section => $fields)
                    <div class="card col-md-8">

                        <div class="card-header">
                            <i class="{{ \Illuminate\Support\Arr::get($fields, 'icon', 'la la-flash') }}"></i>
                            <strong>{{ $fields['title'] }}</strong>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">{{ $fields['desc'] }}</p>

                            <div class="row mt-4">
                                <div class="col-md-8">
                                    @foreach($fields['elements'] as $field)
                                        {{-- @includeIf(backpack_view('crud.fields.'.$field['type']) ) --}}
                                        @if( !in_array($field['type'],['select','checkbox','radio']) )
                                            <div class="form-group ml-3">
                                                <label  class="col-form-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                                                <div class="col-md-8">
                                                    <input type="{{ $field['type'] }}"
                                                        class="form-control {{ \Illuminate\Support\Arr::get( $field, 'class') }}
                                                            {{ $errors->has($field['name']) ? ' is-invalid' : '' }}"
                                                        name="{{ $field['name'] }}"
                                                        value="{{ old($field['name'], \setting($field['name'])) }}"
                                                        id="{{ $field['name'] }}"
                                                        placeholder="{{ $field['label'] }}">

                                                    <span class="invalid-feedback">{{ $errors->first($field['name']) }}</span>
                                                </div>
                                            </div>
                                        @elseif( $field['type']=='select' )
                                            <div class="form-group ml-3">
                                                <label class="col-form-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                                                <div class="col-md-8">
                                                    <select class="form-control {{ \Illuminate\Support\Arr::get( $field, 'class') }} 
                                                                @if($errors->has($field['name'])) border border-danger @endif" 
                                                        id="{{ $field['name'] }}" 
                                                        name="{{ $field['name'] }}"
                                                    >
                                                        @foreach(\Illuminate\Support\Arr::get($field, 'options', []) as $val => $label)
                                                            <option @if( old($field['name'], \setting($field['name'])) == $val ) selected  @endif value="{{ $val }}">{{ $label }}</option>
                                                        @endforeach
                                                    </select>

                                                    @if($errors->has($field['name'])) 
                                                        <small class="text-danger">{{ $errors->first($field['name']) }}</small> 
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        {{-- <x-input type="{{$field['type'] }}"></x-input> --}}
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <!-- end panel for {{ $fields['title'] }} -->
                @endforeach

            @endif

            <div class="row m-b-md">
                <div class="col-md-12">
                    <button class="btn-primary btn">
                        {{ trans('backpack::crud.save') }}
                    </button>
                </div>
            </div>

        </form> 
    </div>
@endsection