@extends('layouts.app')

@section('title', 'Reset Password Form')

@section('content')
<div class="flex items-center min-h-screen bg-white dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Reset Password</h1>
                <p class="text-gray-500 dark:text-gray-400">Please complete the reset password form.</p>
            </div>
            <div class="m-7">

                @if (session('email'))
                <div class="bg-blue-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('email') }}
                </div>
                @endif

                <form action="{{ route('password.update') }}" method="post">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="you@email.com" value="{{ old('email') }}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 @error('email') border-red-500 @enderror" />
                        @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <label for="password" class="text-sm text-gray-600 dark:text-gray-400">Password</label>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Your Password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 @error('password') border-red-500 @enderror" />
                        @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <label for="password_confirmation" class="text-sm text-gray-600 dark:text-gray-400">Confirm Password</label>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Your Password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 @error('password_confirmation') border-red-500 @enderror" />
                        @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-gray-900 rounded-md focus:bg-gray-600 focus:outline-none">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection