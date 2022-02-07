@extends('layouts.admin')

@section('title')
    {{ "Wallets" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Wallets</h2>
    </div>

    @include('includes.notification')
    
    <div class="row clearfix">

        <!-- Wallets List -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Wallet List</h2>
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
                                    <th>Address</th>
                                    <th>Network</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($wallets as $wallet)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($wallet->logo_path) }}" width="30" height="30" alt="">
                                        </td>
                                        <td>
                                            {{ $wallet->name }}
                                        </td>
                                        <td>
                                            {{ $wallet->symbol }}
                                        </td>
                                        <td>
                                            {{ $wallet->address }}
                                        </td>
                                        <td>
                                            {{ $wallet->network }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.wallet.edit', ['code' => $wallet->symbol]) }}" 
                                                class="btn bg-indigo waves-effect"
                                                title="Modify Wallet address">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# wallets List-->
        
    </div>
</div>
@endsection