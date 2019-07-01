@if (Session::has('status') && !empty(Session::get('status')))
    <div class="alert alert-success custom-fade" id="custom-fade" role="alert">
        <span class="message-body font-weight-bold"> {{ Session::get('status') }} </span>
    </div>
    <div class="clear-fix">
    </div>
@endif

@if (Session::has('info') && !empty(Session::get('info')))
    <div class="alert alert-info custom-fade" id="custom-fade" role="alert">
        <span class="message-body font-weight-bold"> {{ Session::get('info') }} </span>
    </div>
    <div class="clear-fix">
    </div>
@endif


@if (Session::has('only_admin') && !empty(Session::get('only_admin')))
    <div class="alert alert-danger col-md-12 custom" id="custom-fade" role="alert">
        <span class="message-body font-weight-bold"> {{ Session::get('only_admin') }} </span>
    </div>
    <div class="clear-fix">

    </div>
@endif