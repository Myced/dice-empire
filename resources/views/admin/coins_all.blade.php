@extends('layouts.admin')

@section('title')
    {{ "All Coins" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>All Coins</h2>
    </div>

    @include('includes.notification')

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{ route('admin.coin.create') }}" class="btn btn-primary waves-effect">Add New Coin</a>
        </div>
    </div>
    <br>
    
    <div class="row clearfix">
        <!-- Coins List -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Coins List</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Symbol</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($coins as $coin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($coin->logo_path) }}" width="30" height="30" alt="">
                                        </td>
                                        <td>
                                            {{ $coin->name }}
                                        </td>
                                        <td>
                                            {{ $coin->symbol }}
                                        </td>
                                        <td>
                                            @if($coin->is_active)
                                                <span class="text-success">
                                                    <i class="material-icons">done</i>
                                                </span>
                                            @else
                                                <span class="text-danger">
                                                    <i class="material-icons">clear</i>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.coin.edit', ['id' => $coin->id]) }}" class="btn bg-indigo waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            {{-- <a type="button" class="btn bg-pink waves-effect">
                                                <i class="material-icons">delete</i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Coins List-->
        
    </div>
</div>
@endsection