<div class="col-md-12">
    @if (!empty(session()->get('error')))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
    @endif
    @if (!empty(session()->get('success')))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
</div>