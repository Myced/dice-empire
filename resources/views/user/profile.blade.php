@extends('layouts.user')

@section('title')
    {{ "Profile" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Profile</h2>
    </div>

    @include('includes.notification')

    <!-- Transactions List Row-->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile Image">
                    </div>
                    <div class="content-area">
                        <h3>{{ $user->name }}</h3>
                    </div>
                </div>
                <div class="profile-footer">
                    <ul>
                        <li>
                            <span>Name</span>
                            <span>{{ $user->name }}</span>
                        </li>
                        <li>
                            <span>Email</span>
                            <span>{{ $user->email }}</span>
                        </li>
                        <li>
                            <span>Telephone</span>
                            <span>{{ $user->tel }}</span>
                        </li>
                    </ul>
                    <a class="btn btn-primary btn-lg waves-effect btn-block"
                        href="{{ route('user.profile.edit') }}">
                        <i class="material-icons">edit</i>
                        EDIT
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="card card-about-me">
                <div class="header">
                    <h2>PAYOUT INFORMATION</h2>
                </div>
                <div class="body">
                    <ul>
                        <li>
                            <div class="title">
                                <i class="material-icons">local_phone</i>
                                Payout Telephone
                            </div>
                            <div class="content">
                                {{ $user->payout_number }}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">phone_android</i>
                                Payout Network
                            </div>
                            <div class="content">
                                {{ $user->payout_network }}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">phone_android</i>
                                Payout Type
                            </div>
                            <div class="content">
                                {{ $user->payout_type }}
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Transactions List row--> 
</div>
@endsection

@section('scripts')

@endsection