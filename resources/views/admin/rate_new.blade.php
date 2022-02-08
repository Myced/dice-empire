@extends('layouts.admin')

@section('title')
    {{ "Add New Rate Limit" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>
            New Rate for 
            <strong>{{ $code }}</strong>
        </h2>
    </div>

    @include('includes.notification')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Add A New Rate - 
                        <strong>{{ $code }}</strong>
                    </h2>
                </div>
                <div class="body">
                    <form method="POST" enctype="multipart/form-data" 
                        action="{{ route('admin.rate.store', ['code' => $code]) }}">
                        @csrf
                        <label for="min">Minimum Amount *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="min" name="min" class="form-control" 
                                    placeholder="Enter the minimum amount" required autocomplete="off"
                                    min="0">
                            </div>
                        </div>
    
                        <label for="max">Maximum Amount *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="max" id="max" class="form-control" 
                                    placeholder="Enter the maximum amount or -1 if the maximum amount is limitless" 
                                    required min="-1">
                            </div>
                        </div>
    
                        <label for="price">Price *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="price" id="price" class="form-control" 
                                    placeholder="Enter the price for this rate" required
                                    min="-1">
                            </div>
                        </div>

                        <label for="comment">Comment </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="comment" id="comment" class="form-control" 
                                    placeholder="Commnet (E.g Unit)">
                            </div>
                        </div>
    
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Rate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection