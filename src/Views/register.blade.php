@extends(config('quickauth.layouts.register') !== '' ? config('quickauth.layouts.register') :   config('quickauth.layouts.default'))

@section('styles')
<style type="text/css">
    body {
        background-color: #DADADA;
    }
    body > .grid {
        height: 100%;
    }
    .image {
        margin-top: -100px;
    }
    .column {
        max-width: 450px;
    }
</style>
@endsection

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui red header">
            <div class="content">
                @lang('quickauth::forms.register.title')
            </div>
        </h2>

        @include('vendor.quickauth.partials.messages')

        {{ Form::open(['route' => 'quickauth.register.do', 'method' => 'POST', 'class' => 'ui large form']) }}
            <div class="ui stacked segment">
                <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        {{ Form::text('email', Input::old('email', ''), ['placeholder' => __('quickauth::forms.register.fields.placeholders.email')]) }}
                    </div>
                </div>
                
                @if(config('quickauth.username_support'))
                    <div class="field {{ $errors->has('username') ? 'error' : '' }}">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            {{ Form::text('username', Input::old('username', ''), ['placeholder' => __('quickauth::forms.register.fields.placeholders.username')]) }}
                        </div>
                    </div>
                @endif

                <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        {{ Form::password('password', ['placeholder' => __('quickauth::forms.register.fields.placeholders.password')]) }}
                    </div>
                </div>

                <div class="field {{ $errors->has('password_confirm') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        {{ Form::password('password_confirm', ['placeholder' => __('quickauth::forms.register.fields.placeholders.password_confirm')]) }}
                    </div>
                </div>

                <button type="submit" class="ui fluid large red submit button">@lang('quickauth::forms.register.buttons.submit.value')</button>
            </div>
        {{ Form::close() }}

        <div class="ui message">
            <a href="{{ route('quickauth.login.show') }}">@lang('quickauth::forms.register.links.login.text')</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection