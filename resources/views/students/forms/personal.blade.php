@extends('layouts.app')

@section('title', 'Form 1')

@section('content')
<div class="px-3 py-5">
  <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
      <div class="p-4 border-b">
          <h2 class="sm:text-2xl text-s font-semibold">
             Personal Information
          </h2>
          <p class="sm:text-sm text-xs text-gray-500">
            Enrollment Form 1 of 6
          </p>
      </div>  
      <div class="p-4 border-b">
        

{!! Form::open(['method' => 'POST', 'route' => 'formspersonal' ]) !!}


{!! Html::decode(Form::label('fullName', 'Fullname <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
        
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('lastName') border-red-500 @enderror">
                        {{ Form::text('lastName', '', ['placeholder' => 'Lastname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                      </div>
                      @error('lastName')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror                    
                </div>
                <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('firstName') border-red-500 @enderror">
                        {{ Form::text('firstName', '', ['placeholder' => 'Firstname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                      </div>
                      @error('firstName')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror 
                </div>
                <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        {{ Form::text('middleName', '', ['placeholder' => 'Middlename', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                      </div>
                </div>
                <div class="w-full flex-1 mx-2 svelte-1l8159u">
                  <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                      {{ Form::text('extName', '', ['placeholder' => 'Extensions (Jr., II...)', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
              </div>
            </div>


            <div class="flex flex-col md:flex-row">
                <div 
                x-data
                x-init = "new Pikaday({ 
                  field: $refs.dateinput,
                       firstDay: 1,
                       minDate: new Date(1900, 0, 0),
                       maxDate: new Date(2015, 12, 31),
                       yearRange: [1900, 2015],
                       format: 'MM-DD-YYYY',
                       onOpen: function () {
                           this.gotoYear(2015);
                       },  
                       toString(date, format) {
                         console.log(date.toLocaleString('default', {
                           weekday: 'short'
                         }));
                         console.log(date.toLocaleString('default', {
                           month: 'short'
                         }));
                         const day = date.getDate();
                         const daylong = date.toLocaleString('default', {
                           weekday: 'long'
                         });
                         const month = date.getMonth() + 1;
                         const monthlong = date.toLocaleString('default', {
                           month: 'long'
                         });
                         const year = date.getFullYear();
                         return `${monthlong} ${day}, ${year}`;
                       }
                       })"
                class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('birthDaylabel', 'Birthday<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                  <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('birthDay') border-red-500 @enderror
                  ">
                    {{ Form::text('birthDay', '', ["x-ref" => "dateinput"  ,'placeholder' => 'My Birthday', 'readonly' => 'readonly', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
                    @error('birthDay')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror 
                  </div>
              
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('birthPlacelabel', 'Birthplace (Full address if possible) <span class="text-red-600">*</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('birthPlace') border-red-500 @enderror">
                        {{ Form::text('birthPlace', '', ['placeholder' => 'My Birthplace', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                  </div>
                  @error('birthPlace')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror 
              </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('sexlabel', 'Sex<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                  <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
                    <div class="flex items-center">
                     <div class="mx-1"> {{ Form::radio('sex', '1', true, ['id' => 'male', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                     <div class="mb-1"> {{ Form::label('male', 'Male', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                    </div>
                    <div class="flex items-center">
                      <div class="mx-1"> {{ Form::radio('sex', '2', false, ['id' => 'female', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                      <div class="mb-1"> {{ Form::label('female', 'Female', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                     </div>                    
                </div>
                @error('sex')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror 
              </div>
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('genderlabel', 'Gender <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('gender') border-red-500 @enderror">
                        {{ Form::select('gender', $genderlist, null,['class'=>'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll', 'placeholder' => 'Select Gender']) }}
                  </div>
                  @error('gender')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror 
              </div>
            </div>

            <div class="flex flex-col md:flex-row">
              <div 
              x-data
              x-init="IMask(
                $refs.heightinput,
                {
                  mask: Number,
                  min: 1,
                  max: 500,
                  signed: false,  
                  padFractionalZeros: false,  
                  normalizeZeros: true,
                  radix: '.',  
                  mapToRadix: ['.']  
                
                });"

              class="w-full mx-2 flex-1 svelte-1l8159u">
                  {{ Form::label('heightlabel', 'Height', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                  {{ Form::text('height', '', ["x-ref" => "heightinput" ,'id' => 'height', 'placeholder' => 'Use cm for height', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
            </div>
                <div 
                x-data
                x-init="IMask(
                  $refs.weightinput,
                  {
                    mask: Number,
                    min: 1,
                    max: 500,
                    signed: false,  
                    padFractionalZeros: false,  
                    normalizeZeros: true,
                    radix: '.',  
                    mapToRadix: ['.']  
                  });"
                class="w-full mx-2 flex-1 svelte-1l8159u">
                  {{ Form::label('weightlabel', 'Weight', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                      {{ Form::text('weight', '', ['x-ref' => 'weightinput', 'placeholder' => 'Use kg for weight', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                </div>
            </div>
          </div>
        </div>        
        <div class="p-4 border-b">
            <div class="py-2 px-2 flex justify-between">

              <a class="sm:text-sm text-xs bg-blue-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer" href="{{ route('studentinformation') }}">Back</a>                

                {{ Form::submit('Submit', ['class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 
 
            </div> 

            {!! Form::close() !!}
    </div>
</div>
</div>

@endsection
