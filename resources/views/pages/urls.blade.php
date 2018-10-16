@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('alerts')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My URL's</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Long Url</th>
                                    <th>Short Url</th>
                                    <th>Clicks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($urls as $url)
                                    <tr>
                                        <td style="max-width: 200px;">{{ $url['longUrl'] }}</td>
                                        <td><a href="{{ $url['shortUrl'] }}" target="_blank">{{ $url['shortUrl'] }}</a></td>
                                        <td>{{ $url['clicks'] }}</td>
                                        <td><i class="fas fa-trash-alt" onclick="event.preventDefault()
                                                                                document.getElementById('remove-{{ $url['id'] }}-form').submit()"></i>
                                            <form id="remove-{{ $url['id'] }}-form" action="{{ route('remove') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $url['id'] }}">
                                            </form>
                                            <a href="/edit/{{ $url['id'] }}" style=""><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection