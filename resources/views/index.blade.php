@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="flex bg-white" style="height:600px;">
    <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
        <div>
            <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Welcome Dalubcenian</h2>
            <p class="mt-2 text-sm text-gray-500 md:text-base">Dalubhasaan ng Lungsod ng Lucena online enrollment for the First Semester A.Y. 2021 - 2022.</p>
            <div class="flex justify-center lg:justify-start mt-6">
                @guest
                <a class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800" href="{{ route('studentlogin') }}">Get Started</a>    
                @endguest
                @auth
                <a class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800" href="{{ route('dashboard') }}">Get Started</a>
                @endauth 
                {{-- <a class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-xs font-semibold rounded hover:bg-gray-400" href="#">Learn More</a> --}}
            </div>
        </div>
    </div>
    <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
        <div class="h-full object-cover" style="background-image: url(../images/index.jpg)">
            <div class="h-full bg-black opacity-25"></div>
        </div>
    </div> 
</div>

  
<div class="container content-center mx-auto px-6 pt-8 sm:pt-16 pb-20">
    

  <div class="sm:px-12 flex flex-col sm:flex-row">
      <div class="sm:w-1/2 sm:pr-16">
          <img src="{{asset('images/index1.jpg')}}" class="rounded-lg" style="width: 90%">
      </div>
      <div class="sm:w-1/2 pt-4">
          <h3 class="text-2xl text-gray-800 mb-4">
              Enrollment for the New Normal.
          </h3>
          <p class="text-gray-600 leading-relaxed text-lg mb-7">
              Here at DLL, we value the safety of our students. This website allows every student to enroll within the comfort of their home, safe from COVID-19 virus. Just follow the enrollment steps and tasks and you're ready to go. God bless and stay safe Dalubcenians! 
          </p>
          <a href="{{ route('studentlogin') }}" class="mx-auto bg-blue-600 hover:bg-blue-500 text-white rounded py-2 px-8 shadow-lg">
              Get Started
          </a>
      </div>
  </div>
</div>

</div>
<div class="bg-gray-100 py-20">
  <div class="container mx-auto px-6 flex flex-col items-center">
      <h3 class="text-center font-bold text-4xl text-gray-800 mb-4">Find us on Facebook</h3>
      <p class="text-gray-600 leading-relaxed text-lg mb-8 text-center">
          If you have suggestions, inquiries, and other school matters, feel free to send us a message.
      </p>
      <button class="mx-auto bg-blue-600 hover:bg-blue-500 text-white rounded py-3 px-8 shadow-lg text-xl">
          Click here
      </button>
  </div>
</div>


<!-- component -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@3.0.6/css/line.css">
<footer class="bg-gray-800 pt-10">
    <div class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-left">
        

    </div>

    <!-- Copyright Bar -->
    <div class="pt-2">
        <div class="flex pb-5 px-3 m-auto pt-5 
            border-t border-gray-500 text-gray-400 text-sm 
            flex-col md:flex-row max-w-6xl">
            <div class="mt-2">
                © Copyright 2021 James Jemuel Antiporda. All Rights Reserved.
            </div>

            <!-- Required Unicons (if you want) -->
            <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-facebook-f"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-twitter-alt"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-youtube"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-linkedin"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

@endsection