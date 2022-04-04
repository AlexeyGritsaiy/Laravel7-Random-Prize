@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <form method="POST" action="/save" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card mb-3">
                                <div class="card-header">
                                    Common
                                </div>
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="address" class="col-form-label">address</label>
                                                <input id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback"><strong>{{ $errors->first('address') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="FirstName" class="col-form-label">FirstName</label>
                                                <input id="FirstName" class="form-control{{ $errors->has('FisrtName') ? ' is-invalid' : '' }}" name="FirstName" required>
                                                @if ($errors->has('FirstName'))
                                                    <span class="invalid-feedback"><strong>{{ $errors->first('FirstName') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="LastName" class="col-form-label">LastName</label>
                                                <input id="LastName" class="form-control{{ $errors->has('FisrtName') ? ' is-invalid' : '' }}" name="LastName" required>
                                                @if ($errors->has('LastName'))
                                                    <span class="invalid-feedback"><strong>{{ $errors->first('LastName') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="status" class="col-form-label">status</label>--}}
{{--                                                <input id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required>--}}
{{--                                                @if ($errors->has('status'))--}}
{{--                                                    <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
