@extends('layouts.app')
@section('content')
    <div class="row text-center mt-4">
        <h2>Shall We Spin The Roulette Today Bro? </h2>
        <div class="col">
            <form method="POST" action="{{route('thug.game.store', $link->token)}}">
                @csrf
                <button onclick="event.preventDefault(); this.closest('form').submit();"
                        class="btn btn-lg btn-secondary"> Im Feeling Lucky
                </button>
            </form>
        </div>
        <div class="col">
            <a href="{{route('thug.game.history', $link->token)}}">
                <button class="btn btn-lg btn-secondary">History</button>
            </a>
        </div>
    </div>
    @if(isset($game))
        <div class="row text-center mt-4">
            @if($game->money_won)
                <div class="col" style="color: #186118">
                    <h1>Bro Won Money</h1>
                    <h2>Result Number: {{$game->result}}</h2>
                    <h2>Money Won: {{$game->money_won}}$</h2>
                </div>
            @else
                <div class="col" style="color: #861515">
                    <h1>Bro Lost Money</h1>
                    <h2>Result Number: {{$game->result}}</h2>
                    <h2>Money Won: {{$game->money_won}}$</h2>
                </div>
            @endif
        </div>
    @endif
@endsection
