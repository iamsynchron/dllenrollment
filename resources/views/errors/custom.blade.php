@extends('layouts.app')

@section('title', 'Error')

@section('content')

<div class="bg-gray-400">
    <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
    <div class="border-t border-gray-200 text-center pt-8">
    <h1 class="text-9xl font-bold text-gray-700">500</h1>
    <h1 class="text-6xl font-medium py-8">Error</h1>
    <p class="text-2xl pb-8 px-12 font-medium">Please contact the Registrar&apos;s Office if this error still persist.</p>
    <a href="/" class="bg-gray-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
    HOME
    </a>
    </div>
    </div>
    </div>
</div>
@endsection