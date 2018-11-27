@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <request-key email="{{ Auth::user()->email }}"></request-key>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                {{--<request-key></request-key>--}}
            </div>
        </div>
    </div>
</div>
@endsection
