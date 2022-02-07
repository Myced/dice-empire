@extends('layouts.admin')

@section('title')
    {{ "Edit Wallet Address" }}
@endsection

@section('styles')
    <!-- bootstrap select -->
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Wallet Address</h2>
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{ route('admin.wallets') }}" class="btn btn-primary waves-effect">
                <i class="material-icons">arrow_back</i>
                Back
            </a>
        </div>
    </div>
    <br>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Editing Wallet Infomation for <strong>{{ $coin->symbol }}</strong>
                    </h2>
                </div>
                <div class="body">
                    <form method="POST"
                        action="{{ route('admin.wallet.update', ['code' => $coin->symbol]) }}">
                        @csrf
                        <label for="name">Select Network *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="network" class="form-control show-tick">
                                    @foreach ($networks as $key => $network)
                                        <option value="{{ $key }}"
                                            @if($coin->network == $key) {{ "selected" }} @endif>
                                            {{ $network }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <label for="address">Address *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="address" id="address" class="form-control" 
                                    placeholder="Enter your wallet address" value="{{ $coin->address }}" 
                                    autocomplete="off" required>
                            </div>
                        </div>
    
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                            <strong>
                                Update Wallet Information
                            </strong>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection