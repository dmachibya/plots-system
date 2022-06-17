@extends('layouts.master')

@section('content')
<div class="welcome-msg pt-3 pb-4">
    <h1>Hi <span class="text-primary">{{Auth::user()->name}}</span>, Welcome back</h1>
    <p>Plots Management System - Dashboard.</p>
</div>
<div class="statistics">
    <div class="row">
        <div class="col-xl-6 pr-xl-2">
            <div class="row">
                <div class="col-sm-6 pr-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="lnr lnr-users"> </i>
                        <h3 class="text-primary number">
                            @php
                            $users = DB::table('users')->where("role", 0)->get();
                            // $number1 = count
                            echo count($users);
                            @endphp


                        </h3>
                        <p class="stat-text">Registered Users</p>
                    </div>
                </div>
                <div class="col-sm-6 pl-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="fa fa-th"> </i>
                        <h3 class="text-secondary number">
                            @php
                            $users = DB::table('authorities')->where("level", 5)->get();
                            // $number1 = count
                            echo count($users);
                            @endphp

                        </h3>
                        <p class="stat-text">Plots Registered</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
            <div class="row">
                <div class="col-sm-6 pr-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="fa fa-th"> </i>
                        <h3 class="text-success number">
                            @php
                            $users = DB::table('kiwanjas')->whereNotIn("price", [NULL])->get();
                            // $number1 = count
                            echo count($users);
                            @endphp
                        </h3>
                        <p class="stat-text">Plots on Sale</p>
                    </div>
                </div>
                <div class="col-sm-6 pl-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="fa fa-th"> </i>
                        <h3 class="text-danger number">
                            @php
                            $users = DB::table('kiwanjas')->whereNotIn("conflict", [NULL])->get();
                            // $number1 = count
                            echo count($users);
                            @endphp
                        </h3>
                        <p class="stat-text">Plots with conflict</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection