@extends(config('quickauth.layouts.forgot') !== '' ? config('quickauth.layouts.forgot') :  config('quickauth.layouts.default'))

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
                @lang('quickauth::forms.forgot.title')
            </div>
        </h2>

        @include('vendor.quickauth.partials.messages')

        {{ Form::open(['route' => 'quickauth.forgot.do', 'method' => 'POST', 'class' => 'ui large form']) }}
            <div class="ui stacked segment">
                <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        {{ Form::text('email', Input::old('email', ''), ['placeholder' => __('quickauth::forms.forgot.fields.placeholders.email')]) }}
                    </div>
                </div>
                <button type="submit" class="ui fluid large red submit button">@lang('quickauth::forms.forgot.buttons.submit.value')</button>
            </div>
        {{ Form::close() }}

        <div class="ui message">
            <a href="{{ route('quickauth.login.show') }}">@lang('quickauth::forms.forgot.links.login.text')</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection