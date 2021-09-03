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
          
  
  {!! Form::open(['wire:submit.prevent' => '']) !!}
  
        <div class="p-4 border-b">

            @if (Session::get('message'))
            <div class="px-4">
               <div class="bg-green-500 p-3 mt-3 mb-3 rounded-lg text-white text-center">
               {{ Session::get('message') }} 
               </div>  
           </div>
           @endif

                <div class="flex p-2 flex-col md:flex-row">
                    <p class="font-semibold text-gray-600 text-s">Current Enrollment Status:</p>
                    @if ($enrollstat->status_type == 'open')
                    <p class="ml-2 text-green-600 underline">{{ ucfirst(trans($enrollstat->status_type))}}</p>
                    @elseif($enrollstat->status_type == 'warn')
                    <p class="ml-2 text-yellow-600 underline">{{ ucfirst(trans($enrollstat->status_type))}}</p>
                    @elseif($enrollstat->status_type == 'closed')
                    <p class="ml-2 text-red-600 underline">{{ ucfirst(trans($enrollstat->status_type))}}</p>
                    @endif
                </div>
                <div class="flex p-2 flex-col md:flex-row">
                    <p class="font-semibold text-gray-600 text-s">Current Message:</p>
                    <p class="ml-2 underline">{{ $enrollstat->status_message }}</p>
                </div>
        </div>

              <div class="mt-3 flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                  {!! Html::decode(Form::label('bodylabel', 'Message to Display <span class="text-red-600">*</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('body') border-red-500 @enderror">
                      {{ Form::textarea('body', '', ['wire:model' => "enrollmessage", 'placeholder' => 'Message', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                </div>
                @error('body')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror 
            </div>
          </div>
  
              <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      {!! Html::decode(Form::label('sexlabel', 'Enrollment Status<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                    <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u dark:bg-gray-800">
                      <div class="flex items-center">
                       <div class="mx-1"> {{ Form::radio('type', 'open', true, ['wire:model' => "enrollradio", 'id' => 'notice', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                       <div class="mb-1"> {{ Form::label('noticelabel', 'Open', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-sm leading-8 uppercase']) }} </div>
                      </div>
                      <div class="flex items-center">
                        <div class="mx-1"> {{ Form::radio('type', 'warn', false, ['wire:model' => "enrollradio", 'id' => 'urgent', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                        <div class="mb-1"> {{ Form::label('urgentlabel', 'Warn', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-sm leading-8 uppercase']) }} </div>
                       </div> 
                       <div class="flex items-center">
                        <div class="mx-1"> {{ Form::radio('type', 'closed', false, ['wire:model' => "enrollradio", 'id' => 'urgent', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                        <div class="mb-1"> {{ Form::label('urgentlabel', 'Close', ['class' => 'dark:text-gray-200 font-bold text-gray-900 text-sm leading-8 uppercase']) }} </div>
                       </div>                    
                  </div>
                  @error('type')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
                </div>
              </div>
  
             
          <div class="p-4 border-b">
              <div class="py-2 px-2 flex justify-between">
  
                <a class="sm:text-sm text-xs bg-blue-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer" href="{{ route('dashboard') }}">Back</a>                
  
                  {{ Form::submit('Submit', [ 'wire:click' => 'submit', 'class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 
   
              </div> 
  
              {!! Form::close() !!}
      </div>
  </div>
  </div>
