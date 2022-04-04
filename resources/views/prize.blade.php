@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                    <h1><?php echo $getPrizeName ?> </h1><br>
                        <h2><a href="/approve"> Принять</a></h2>
                        <h2><a href="/refuse">Отказаться</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
