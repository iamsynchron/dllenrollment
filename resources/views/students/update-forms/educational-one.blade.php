@extends('layouts.app')

@section('title', 'Form 5 (Update)')

@section('content')
<div class="px-3 py-5">
  <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
      <div class="p-4 border-b">
          <h2 class="sm:text-2xl text-s font-semibold">
            Educational Background (Part 1 - Update)
          </h2>
          <p class="sm:text-sm text-xs text-gray-500">
            Enrollment Form 5 of 6
          </p>
      </div>  
      <div class="p-4 border-b">
        

{!! Form::open(['method' => 'POST', 'route' => 'updateeducone']) !!}
@method('PUT')
    <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('lrnlabel', 'Learners Reference Number <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div 
                x-data
                x-init="IMask(
                $refs.lrninput,
                {
                    mask: '000000000000' 
                });"
            class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('lrn') border-red-500 @enderror">
                {{ Form::text('lrn', '', ['x-ref' => 'lrninput', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
            </div>
        </div>
        @error('lrn')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
            Elementary
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Primary
        </p>

        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('elemSchoollabel', 'Complete School Name<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('elemSchool') border-red-500 @enderror">
                {{ Form::text('elemSchool', '', ['placeholder' => 'School Name', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
            @error('elemSchool')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('elemAttendedlabel', 'Year of Attendance<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('elemAttendance') border-red-500 @enderror">
                {{ Form::selectYear('elemAttendance', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, ['class' => 'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
        @error('elemAttendance')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
            </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('elemGraduatelabel', 'Year Graduated<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('elemGraduate') border-red-500 @enderror">
            {{ Form::selectYear('elemGraduate', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, ['class' => 'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
        </div>
        @error('elemGraduate')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('elemHonorlabel', 'Honor(s) Received', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('elemHonor', '', ['placeholder' => 'Leave blank if none', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
            
            </div>
        </div>



        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
        Junior High School
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Secondary
        </p>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('juniorSchoollabel', 'Complete School Name<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('juniorSchool') border-red-500 @enderror">
            {{ Form::text('juniorSchool', '', ['placeholder' => 'School Name', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
            @error('juniorSchool')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror 
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('juniorAttendedlabel', 'Year of Attendance<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('juniorAttendance') border-red-500 @enderror">
            {{ Form::selectYear('juniorAttendance', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, ['class' => 'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
        @error('juniorAttendance')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror 
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('juniorGraduatelabel', 'Year Graduated<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('juniorGraduate') border-red-500 @enderror">
        {{ Form::selectYear('juniorGraduate', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, ['class' => 'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
        </div>
        @error('juniorGraduate')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {{ Form::label('juniorHonorlabel', 'Honor(s) Received', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('juniorHonor', '', ['placeholder' => 'Leave blank if none', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        </div>

        
  </div>        
  <div class="p-4 border-b">
      <div class="py-2 px-2 flex justify-between">

        <a class="sm:text-sm text-xs bg-blue-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer" href="{{ route('studentinformation') }}">Back</a>                 

          {{ Form::submit('Update', ['class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 

      </div> 

      {!! Form::close() !!}
</div>
</div>
</div>

@endsection
