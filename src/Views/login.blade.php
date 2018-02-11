@extends(config('quickauth.layouts.login') !== '' ? config('quickauth.layouts.login') : config('quickauth.layouts.default'))

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
                @lang('quickauth::forms.login.title')
            </div>
        </h2>

        @include('vendor.quickauth.partials.messages')

        {{ Form::open(['route' => 'quickauth.login.do', 'method' => 'POST', 'class' => 'ui large form']) }}
            <div class="ui stacked segment">
                <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        {{ Form::text('email', Input::old('email', ''), ['placeholder' => __('quickauth::forms.login.fields.placeholders.email')]) }}
                    </div>
                </div>
                <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        {{ Form::password('password', ['placeholder' => __('quickauth::forms.login.fields.placeholders.password')]) }}
                    </div>
                </div>
                <button type="submit" class="ui fluid large red submit button">@lang('quickauth::forms.login.buttons.submit.value')</button>
            </div>
        {{ Form::close() }}

        <div class="ui message">
            <a href="{{ route('quickauth.forgot.show') }}">@lang('quickauth::forms.login.links.forgot.text')</a> |
            <a href="{{ route('quickauth.register.show') }}">@lang('quickauth::forms.login.links.register.text')</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection