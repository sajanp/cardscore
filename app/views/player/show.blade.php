@extends('layouts.master')

@section('body')
    <h1>{{$player->name}}</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Stats</h2>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Games Played</td>
                        <td>{{$player->games()->count()}}
                    </tr>
                    <tr>
                        <td>Deals Played</td>
                        <td>{{$player->scores()->count()}}
                    </tr>
                    <tr>
                        <td>All Time Points</td>
                        <td>{{$player->scores()->sum('amount') + $player->adjustments()->sum('amount')}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-chevron-right"></i> As Caller</td>
                        <td>{{$player->scores()->where('caller', true)->sum('amount')}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-chevron-right"></i> As Partner</td>
                        <td>{{$player->scores()->where('partner', true)->sum('amount')}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-chevron-right"></i> As Opposition</td>
                        <td>{{$player->scores()->where('partner', false)->where('caller', false)->sum('amount')}}</td>
                    </tr>
                </table>
            </div>
            {{HTML::linkRoute('player.edit', 'Edit Player', $player->id, ['class' => 'btn btn-warning'])}}
        </div>
    </div>
@stop
