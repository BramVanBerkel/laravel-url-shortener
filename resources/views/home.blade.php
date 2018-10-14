@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (!empty(session()->get('error')))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create URL</div>

                <div class="card-body">
                    <form action="/new" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Long url:</label>
                            <input type="url" class="form-control" name="url" aria-describedby="url" placeholder="Enter long url">
                        </div>
                        <button type="submit" class="btn btn-primary">Get short URL!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
