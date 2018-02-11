@if(Session::has('message'))
    <div class="ui info message">
        <p>{{ session('message') }}</p>
    </div>
@endif

@if(Session::has('error'))
    <div class="ui error message">
        <p>{{ session('error') }}</p>
    </div>
@endif

@if(isset($errors) && count($errors) > 0)
<div class="ui error message">
    <div class="header">
        @lang('quickauth::validator.error')
    </div>
    <ul class="list">
        @foreach($errors->all() as $error)
            <li>{{{ $error }}}</li>
        @endforeach
    </ul>
</div>
@endif