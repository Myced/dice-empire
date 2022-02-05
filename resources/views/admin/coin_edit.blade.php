@extends('layouts.admin')

@section('title')
    {{ "Edit Coin" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Coin</h2>
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{ route('admin.coins') }}" class="btn btn-primary waves-effect">
                View All Coins
            </a>
        </div>
    </div>
    <br>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Edit Coin
                    </h2>
                </div>
                <div class="body">
                    <form method="POST" enctype="multipart/form-data" 
                        action="{{ route('admin.coin.update', ['id' => $coin->id]) }}">
                        @csrf
                        <label for="name">Coin Name *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="name" name="coin_name" class="form-control" 
                                    placeholder="Enter the coins name" required
                                    value="{{ $coin->name }}">
                            </div>
                        </div>
    
                        <label for="symbol">Coin Symbol *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="symbol" id="symbol" class="form-control" 
                                    placeholder="Enter your the coins symbol" value="{{ $coin->symbol }}" required>
                            </div>
                        </div>

                        <label for="active">Coin is active ?</label>
                        <div class="demo-switch" id="active">
                            <div class="switch">
                                <label>
                                    NO
                                    <input type="checkbox" name="is_active" @if($coin->is_active) {{ "checked" }} @endif>
                                    <span class="lever"></span>
                                    YES
                                </label>
                            </div>
                        </div>
    
                        <br>
                        <label for="symbol">Icon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" id="icon" name="icon" class="form-control" >
                            </div>
                        </div>
    
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Coin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection