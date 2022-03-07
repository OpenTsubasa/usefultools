@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>

                <div class="card-body">
                    Welcome to Useful Tools website!
                    <hr>
                    <div class="container-fluid">
                        <div class="row">
                            <p>Various userful tools are listed below:</p>
                        </div>
                        <div class="row">
                            <div class="col text-center bg-light m-1 p-3">
                                <a href="{{ route('todoapp.all_tasks') }}" class="btn btn-info">To Do App</a>
                            </div>
                            <div class="col text-center bg-light m-1 p-3">
                                <a href="#" class="btn btn-secondary">Tool Name</a>
                            </div>
                            <div class="col text-center bg-light m-1 p-3">
                                <a href="#" class="btn btn-secondary">Tool Name</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
