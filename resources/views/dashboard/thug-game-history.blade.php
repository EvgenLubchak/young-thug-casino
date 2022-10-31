@extends('layouts.app')
@section('content')
    <div class="row text-center mt-4">
        <h2>Your History Bro</h2>
        <div class="col">
            <a href="{{route('thug.game', $link->token)}}">
                <button class="btn btn-lg btn-secondary">Back</button>
            </a>
        </div>
    </div>
    @if(!$history->isEmpty())
        <div class="table my-3">
            <table class="table">
                <thead>
                <tr>
                    <th>Result</th>
                    <th>Money Won</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($history as $h)
                    <tr>
                        <td>{{$h->result}}</td>
                        <td>{{$h->money_won}}</td>
                        <td>{{($h->money_won) ? 'won' : 'lose'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
