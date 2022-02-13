@extends('layouts.user')

@section('title')
    {{ "Settings" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Settings</h2>
    </div>

    @include('includes.notification')

    <!-- Transactions List Row-->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="header">
                    <h2>
                        General Settings
                    </h2>
                </div>
                <div class="body">
                    
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="header">
                    <h2>
                        Change Password
                    </h2>
                </div>
                <div class="body">
                    <form action="">
                        <div class="row clearfix">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control">
                                        <label class="form-label">Old Password</label>
                                    </div>
                                </div>
        
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control">
                                        <label class="form-label">New Password</label>
                                    </div>
                                </div>
        
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control">
                                        <label class="form-label">Repeat New Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <button class="btn bg-pink btn-lg btn-block waves-effect font-bold" type="button">
                                    <i class="material-icons">check_circle</i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Transactions List row--> 
</div>
@endsection

@section('scripts')

@endsection