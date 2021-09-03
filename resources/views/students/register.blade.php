@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex items-center min-h-screen bg-white dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Register</h1>
                <p class="text-gray-500 dark:text-gray-400">Student Account Registration</p>
            </div>
            <div class="m-7">
                <form action="{{ route('studentregister') }}" method="post">
                    @csrf
                    <div class="mb-6">
                        <label for="id" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Student ID Number</label>
                        <input type="text" name="id" id="id" placeholder="Ex. 021A-4129" value="{{ old('id') }}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 @error('id') border-red-500 @enderror" />
                        @error('id')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="id" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Verification Code</label>
                        <input type="text" name="verification" id="verification" placeholder="Ex. ABC1234" value="{{ old('verification') }}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500 @error('verification') border-red-500 @enderror" />
                        @error('verification')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
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
                        <button type="submit" onclick="submitForm(this);" class="w-full px-3 py-4 text-white bg-gray-900 rounded-md focus:bg-gray-600 focus:outline-none">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }
</script>
@endsection