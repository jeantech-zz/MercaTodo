
@extends('layouts.app')
@push('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->isClient())
                        
                    @else
                        @extends('layouts.admin')
                    @endif
                    {{ session('status') }}
                    {{ __('You are logged inss!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

