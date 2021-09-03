@extends('layouts.app')

@section('title', 'Email Verification')

@section('content')

<div class="px-3 py-5">
    <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
        <div class="p-4 border-b">
            <h2 class="text-2xl font-semibold">
               Email Verification
            </h2>
        </div>  
        {!! Form::open(['method' => 'POST', 'route' => 'verification.send']) !!}
        <div class="p-4 border-b">
            @if (session('message'))
                <div class="bg-blue-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('message') }}
                </div>
                    
                @endif
        <p class="text-md text-gray-800 font-small">Before proceeding, please check you email for a Verification Link. If you did not receive any email, <button type="submit" class="underline text-blue-400">click here to request another.</span></p>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection