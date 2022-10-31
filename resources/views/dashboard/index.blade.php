@extends('layouts.app')
@section('content')
    <div class="row text-center mt-4">
        <h2>Create Thug Game And Change Your Life Bro</h2>
        <div class="col">
            <form method="POST" action="{{route('thug.game.link.store')}}">
                @csrf
                <button onclick="event.preventDefault(); this.closest('form').submit();"
                        class="btn btn-lg btn-secondary">Create Thug Game Link
                </button>
            </form>
        </div>
    </div>
    <div class="row text-center mt-4">
        <div class="col">
            @if (session('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(!$links->isEmpty())
                <div class="table my-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Lifetime End</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($links as $link)
                            <tr>
                                <td>{{($link->active) ? 'Active' : 'Deactivated'}}</td>
                                <td>
                                    <a href="{{route('thug.game', $link->token)}}">{{route('thug.game', $link->token)}}</a>
                                </td>
                                <td>{{$link->lifetime}}</td>
                                <td>{{$link->created_at}}</td>
                                <td>
                                    @if($link->active)
                                        <form class="btn-group-sm" method="POST"
                                              action="{{ route('thug.game.link.deactivate', $link->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button onclick="event.preventDefault(); this.closest('form').submit();"
                                                    type="button" class="btn btn-outline-secondary delete-confirm">
                                                Deactivate
                                            </button>
                                        </form>
                                    @else
                                        Deactivated
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $links->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
