@extends('layouts.user')

@section('title')
    {{ "Edit Profile" }}
@endsection

@section('styles')
    <!-- bootstrap select -->
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Edit Profile</h2>
        </div>
    
        @include('includes.notification')

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="{{ route('user.profile') }}" class="btn btn-primary waves-effect">
                    <i class="material-icons">arrow_back</i>
                    Profile
                </a>
            </div>
        </div>
        <br>

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">
                                        Basic Info
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">
                                        Payout Information
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="basic">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('user.profile.basic.update') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Name" value="{{ $user->name }}" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="email" name="email" 
                                                        placeholder="Email" value="{{ $user->email }}" required=""
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Telephone Number: </label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="tel" class="form-control" id="tel" name="tel" 
                                                        placeholder="Telephone Number" value="{{ $user->tel }}" required="">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Update Information</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('user.profile.payout.update') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="network" class="col-sm-2 control-label">Payout Network: </label>
                                            <div class="col-sm-10">
                                                <select name="payout_network" class="form-control show-tick" >
                                                    @foreach ($payoutNetworks as $network)
                                                        <option value="{{ $network }}"
                                                            @if($network == $user->payout_network) {{ "selected" }} @endif>
                                                            {{ $network }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Tele" class="col-sm-2 control-label">Payout Number: </label>
                                            <div class="col-sm-10">
                                                <div class="form-line focused">
                                                    <input type="text" class="form-control" id="Tele" name="payout_tel" 
                                                        placeholder="6 71 23 45 67" value="{{ $user->payout_number }}" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Payout Type: </label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <select name="payout_type" class="form-control show-tick" >
                                                        @foreach ($payoutTypes as $type)
                                                            <option value="{{ $type }}"
                                                                @if($type == $user->payout_type) {{ "selected" }} @endif>
                                                                {{ $type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">
                                                    UPDATE PAYOUT INFO
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection