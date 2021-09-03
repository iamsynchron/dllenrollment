@extends('layouts.admin')

@section('title', 'Add Account')

@section('content')

<div class="px-3 py-5">
    <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto dark:text-gray-400 dark:bg-gray-800">
        <div class="p-4 border-b">
            <h2 class="text-2xl font-semibold">
               Account
            </h2>
            <p class="text-sm text-gray-500">
              Create Account
            </p>
        </div>  
        <div class="p-4 border-b">
            @if (Session::get('message'))
            <div class="px-4">
                <div class="bg-red-500 p-3 mt-3 mb-3 rounded-lg text-white text-center">
                {{ Session::get('message') }}
                </div>  
            </div>
            @endif
  
  {!! Form::open(['method' => 'POST', 'route' => 'accounts-add' ]) !!}
  
        
              <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('designationlabel', 'ID Prefix <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('idprefix') border-red-500 @enderror">
                        {{ Form::select('idprefix', $prefixlist, null,['class'=>'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll', 'placeholder' => 'Select Prefix...']) }}
                  </div>
                  @error('idprefix')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror 
                </div>

                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    {!! Html::decode(Form::label('authorName', 'ID Number <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('idnumber') border-red-500 @enderror">
                          {{ Form::number('idnumber', '', ['maxlength' => '4' ,'placeholder' => 'ID Number', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                        </div>
                        @error('idnumber')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror                    
                  </div>

              </div>

              <div class="flex flex-col md:flex-row">
             
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    {!! Html::decode(Form::label('authorName', 'Student Name <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('lastName') border-red-500 @enderror">
                          {{ Form::text('lastName', '', ['placeholder' => 'Lastname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                        </div>
                        @error('lastName')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror                    
                  </div>
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    {!! Html::decode(Form::label('', '', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('firstName') border-red-500 @enderror">
                          {{ Form::text('firstName', '', ['placeholder' => 'Firstname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                        </div>
                        @error('firstName')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror 
                  </div>

                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    {!! Html::decode(Form::label('', '', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('middleName') border-red-500 @enderror">
                          {{ Form::text('middleName', '', ['placeholder' => 'Middle Initial', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                        </div>
                        @error('middleName')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror 
                  </div>

              </div>

  
  
              <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      {!! Html::decode(Form::label('sexlabel', 'Student Type<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                    <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u dark:bg-gray-800">
                      <div class="flex items-center">
                       <div class="mx-1"> {{ Form::radio('type', 1, true, ['id' => 'new', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                       <div class="mb-1"> {{ Form::label('noticelabel', 'New Student', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                      </div>
                      <div class="flex items-center">
                        <div class="mx-1"> {{ Form::radio('type', 2, false, ['id' => 'old', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                        <div class="mb-1"> {{ Form::label('urgentlabel', 'Old Student', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                       </div> 
                       <div class="flex items-center">
                        <div class="mx-1"> {{ Form::radio('type', 3, false, ['id' => 'trans', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                        <div class="mb-1"> {{ Form::label('urgentlabel', 'Transferee', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                       </div> 
                       <div class="flex items-center">
                        <div class="mx-1"> {{ Form::radio('type', 4, false, ['id' => 'cross', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                        <div class="mb-1"> {{ Form::label('urgentlabel', 'Cross Enrollee', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                       </div>                    
                  </div>
                  @error('type')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
                </div>
              </div>
  
             
          <div class="p-4 border-b">
              <div class="py-2 px-2 flex justify-between">
  
                <a class="sm:text-sm text-xs bg-blue-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer" href="{{ route('accounts') }}">Back</a>                
  
                  {{ Form::submit('Submit', ['class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 
   
              </div> 
  
              {!! Form::close() !!}
      </div>
  </div>
  </div>

@endsection