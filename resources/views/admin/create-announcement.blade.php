@extends('layouts.admin')

@section('title', 'Create Announcement')

@section('content')

<div class="px-3 py-5">
    <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto dark:text-gray-400 dark:bg-gray-800">
        <div class="p-4 border-b">
            <h2 class="text-2xl font-semibold">
               Announcement
            </h2>
            <p class="text-sm text-gray-500">
              Create Announcement
            </p>
        </div>  
        <div class="p-4 border-b">
          
  
  {!! Form::open(['method' => 'POST', 'route' => 'announcement-create' ]) !!}
  
  

          
              <div class="flex flex-col md:flex-row">
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    {!! Html::decode(Form::label('authorName', 'Author Name <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
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

                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      {!! Html::decode(Form::label('designationlabel', 'Designation <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('designation') border-red-500 @enderror">
                          {{ Form::select('designation', $designationlist, null,['class'=>'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll', 'placeholder' => 'Select Designation...']) }}
                    </div>
                    @error('designation')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
                  </div>
              </div>
  
  
              <div class="flex flex-col md:flex-row">
                
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      {!! Html::decode(Form::label('titlelabel', 'Announcement Title <span class="text-red-600">*</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('title') border-red-500 @enderror">
                          {{ Form::text('title', '', ['placeholder' => 'Title', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
                    @error('title')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
                </div>
              </div>

              <div class="flex flex-col md:flex-row">
                
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                  {!! Html::decode(Form::label('bodylabel', 'Announcement Body <span class="text-red-600">*</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('body') border-red-500 @enderror">
                      {{ Form::textarea('body', '', ['placeholder' => 'Title', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                </div>
                @error('body')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror 
            </div>
          </div>
  
              <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      {!! Html::decode(Form::label('sexlabel', 'Sex<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                    <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u dark:bg-gray-800">
                      <div class="flex items-center">
                       <div class="mx-1"> {{ Form::radio('type', 'Notice', true, ['id' => 'notice', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                       <div class="mb-1"> {{ Form::label('noticelabel', 'Notice', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-sm leading-8 uppercase']) }} </div>
                      </div>
                      <div class="flex items-center">
                        <div class="mx-1"> {{ Form::radio('type', 'Urgent', false, ['id' => 'urgent', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                        <div class="mb-1"> {{ Form::label('urgentlabel', 'Urgent', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-sm leading-8 uppercase']) }} </div>
                       </div>                    
                  </div>
                  @error('type')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
                </div>
              </div>
  
             
          <div class="p-4 border-b">
              <div class="py-2 px-2 flex justify-between">
  
                <a class="sm:text-sm text-xs bg-blue-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer" href="{{ route('announcement') }}">Back</a>                
  
                  {{ Form::submit('Submit', ['class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 
   
              </div> 
  
              {!! Form::close() !!}
      </div>
  </div>
  </div>

@endsection