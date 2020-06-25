@extends('layouts/main')

@section('layoutTitle')
    Dashboard
@endsection

@section('layoutContent')
    <div class="mt-6">
        <Dashboard name="{{ Auth::user()->name }}" email="{{ Auth::user()->email }}" identity="{{ Auth::user()->id }}"></Dashboard>
    </div>
@endsection