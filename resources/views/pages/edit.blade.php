@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('alerts')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit URL</div>

                    <div class="card-body">
                        <form action="/update" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="url">Long url:</label>
                                <input type="url" class="form-control" name="longUrl" aria-describedby="url" value="{{ $url['longUrl'] }}" required>
                                <input type="hidden" name="id" value="{{ $url['id'] }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update URL</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection