@extends('layouts.user')

@section('title')
    {{ "Transactions" }}
@endsection

@section('styles')
    <!-- bootstrap select -->
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Capture Transaction</h2>
    </div>

    @include('includes.notification')

    <!-- Transactions List Row-->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2">
            <div class="card">
                <div class="header text-center">
                    <h2>
                        Capture Transaction
                    </h2>
                </div>
                <div class="body">
                    <form action="">
                        <div class="row clearfix">
                            <div class="col-sm-8">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="hash"
                                            autocomplete="off">
                                        <label class="form-label">Transaction Hash</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="network" class="form-control show-tick" >
                                            @foreach ($coins as $coin)
                                                <option value="{{ $coin->symbol }}">
                                                    {{ $coin->symbol }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <button class="btn bg-pink btn-lg btn-block waves-effect font-bold" type="button">
                                    <i class="material-icons">check_circle</i>
                                    Submit
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