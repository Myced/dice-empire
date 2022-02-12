@extends('layouts.admin')

@section('title')
    {{ "Transactions" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Transactions</h2>
    </div>

    @include('includes.notification')

    <!-- Transactions List Row-->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Transactions List
                        <strong>({{ $transactions->count() }})</strong>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Coin</th>
                                    <th>Amount</th>
                                    <th>Payout Amount</th>
                                    <th>
                                        Transaction Status 
                                        <button class="btn btn-default waves-effect"
                                            data-trigger="focus" data-container="body" 
                                            data-toggle="popover" data-placement="top" 
                                            title="" 
                                            data-content="This is the status of the crypto transaction on the blockchain. This checks whether the transaction is still confirming on the blockchain or whether it has been confirmed" 
                                            data-original-title="Transaction Status" >
                                            <i class="material-icons">help</i>
                                        </button>
                                    </th>
                                    <th>
                                        Status
                                        <button class="btn btn-default waves-effect"
                                            data-trigger="focus" data-container="body" 
                                            data-toggle="popover" data-placement="top" 
                                            title="" 
                                            data-content="This concerns the payment status of this transaction, meaning whether the transaction payout has been made and whether or not you have confirmed the transaction (Payout amounts and amount received)" 
                                            data-original-title="Status" >
                                            <i class="material-icons">help</i>
                                        </button>
                                    </th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="font-bold">{{ $transaction->user_name }}</div>
                                        </td>
                                        <td>
                                            <strong>
                                                {{ $transaction->coin_symbol }}
                                            </strong>
                                        </td>
                                        <td>
                                            <div class="font-bold">{{ $transaction->amount . ' ' . $transaction->coin_symbol }}</div>
                                            <div class="font-italic">@ ${{ $transaction->price_per_coin }}/{{ $transaction->coin_symbol }}</div>
                                        </td>
                                        <td>
                                            <div class="font-bold col-teal fs-16">
                                                {{ number_format($transaction->payout_amount) }} FCFA
                                            </div>
                                            <div>
                                                ${{ number_format($transaction->amount_usd) }}
                                            </div>
                                            <div class="col-cyan font-bold font-italic">
                                                @ {{ $transaction->locked_rate }} FCFA/USD
                                            </div>
                                        </td>
                                        <td>
                                            <span class="{{ \App\Helpers\StatusHelper::getTransactionStatusColor($transaction->transaction_status) }}">
                                                {{ \App\Helpers\StatusHelper::getTransactionStatusLabel($transaction->transaction_status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="{{ \App\Helpers\StatusHelper::getStatusColor($transaction->status) }}">
                                                {{ \App\Helpers\StatusHelper::getStatusLabel($transaction->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $transaction->created_at->format(\App\Helpers\DateHelper::DEFAULT_DATE_FORMAT) }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('admin.coin.edit', ['id' => $coin->id]) }}" class="btn bg-indigo waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a type="button" class="btn bg-pink waves-effect">
                                                <i class="material-icons">delete</i>
                                            </a>  --}}
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
    <!-- #END# Transactions List row--> 
</div>
@endsection

@section('scripts')
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(function () {
            //Tooltip
            // $('[data-toggle="tooltip"]').tooltip({
            //     container: 'body'
            // });

            //Popover
            $('[data-toggle="popover"]').popover();
        })
        
    </script>
@endsection