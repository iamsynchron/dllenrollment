<div class="px-3 py-5">
    <div class="max-w-7xl bg-white rounded-lg shadow-xl mx-auto ">
        <div class="p-4 border-b">
            <h2 class="sm:text-2xl text-s font-semibold">
               COR (Whiteforms)
            </h2>
            <p class="sm:text-sm text-xs text-gray-500">
              
            </p>
        </div>  
          
  {!! Form::open(['wire:submit.prevent' => '']) !!}
        <div class="p-4 border-b">
  
  {!! Html::decode(Form::label('noteLabel', 'Please read first <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
          
  
              <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('courselabel', 'Course <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('coursemodel') border-red-500 @enderror">
                          <select name="course" id="course" wire:model="coursemodel" class="sm:text-base text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll">
                                <option value="" selected>Select Course</option>
                                  @foreach ($courseslist as $course)
                                      <option value="{{ $course->id }}">{{ $course->course_desc }} ({{ $course->course_code }})</option>
                                  @endforeach
                          </select>
                      </div>
                  @error('coursemodel')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror 
              </div>
            </div>

              <div class="flex flex-col md:flex-row">
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      {!! Html::decode(Form::label('sectionlabel', 'Year and Section <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('sectionmodel') border-red-500 @enderror">
                         
                          <select name="section" id="section" wire:model="sectionmodel" class="sm:text-base text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll">
                            <option value="" selected>Select Year Level</option>
                              @foreach ($sectionlist as $section)
                                  <option value="{{ $section}}">{{ $section }}</option>
                              @endforeach
                      </select>
                    </div>
                    @error('sectionmodel')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
                </div>
              </div>
          </div>   
 

            <div class="p-4 border-b">
                <div class="py-2 px-2 flex justify-between">

                  
              
                  {{ Form::button('Back', ['wire:click' => 'backPage', 'class' => 'sm:text-sm text-xs bg-gray-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 
                
                  {{-- <button wire:click="save" type="button" class="bg-green-600 text-white flex justify-center mx-2 px-4 py-2 rounded font-bold cursor-pointer">Submit</button> --}}
                  {{ Form::submit('Submit', [ 'wire:click' => 'submit', 'class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center mx-2 px-4 py-2 rounded font-bold cursor-pointer']) }} 

                  {!! Form::close() !!}         
                </div> 
            </div>
        </div> 
</div>
