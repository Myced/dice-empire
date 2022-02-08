@extends('layouts.admin')

@section('title')
    {{ "Rates" }}
@endsection

@section('styles')
    <!-- Sweetalert Css -->
    <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Rates</h2>
    </div>

    @include('includes.notification')

    <div class="row clearfix">
        <!-- loop through all the coins and display their rates. -->
        @foreach ($coins as $coin)
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            Rates for <strong>{{ $coin->symbol }}</strong>
                        </h2>
                    </div>
                    <div class="body">

                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Min Amount</th>
                                        <th>Max Amount</th>
                                        <th>Price</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    @foreach ($coin->rates as $rate)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                ${{ $rate->min }}
                                            </td>
                                            <td>
                                                @if ($rate->max == "-1")
                                                    {{ "MAX" }}
                                                @else 
                                                    ${{ $rate->max }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $rate->price }}FCFA/$
                                            </td>
                                            <td>
                                                {{ $rate->comment }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.rate.edit', ['id' => $rate->id]) }}" 
                                                    class="btn bg-indigo waves-effect"
                                                    title="Modify Wallet address">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a type="button" class="btn bg-pink waves-effect delete"
                                                    data-url="{{ route('admin.rate.delete', ['id' => $rate->id]) }}">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <a href="{{ route('admin.rates.new', ['code' => $coin->symbol]) }}" class="btn btn-primary">
                                        Add Rate
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection

@section('scripts')
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            
            //on click for delete. 
            $(".delete").on('click', function(){
                const url = $(this).data('url');

                swal({
                    title: "Are you sure?",
                    text: "Deleting this is permanent",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    cancelButtonText: "No, Cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        //redirect the user to the url to delete. 
                        window.location.href = url;

                    } else {
                        swal("Cancelled", "Action Canceled", "error");
                    }
                });
            })

        })
        
    </script>
@endsection