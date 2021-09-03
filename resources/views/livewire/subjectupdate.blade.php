
<div class="px-3 py-5">
    <div class="@if ($currentPage === 1) max-w-5xl @elseif($currentPage === 2) max-w-7xl @endif bg-white rounded-lg shadow-xl mx-auto ">
        <div class="p-4 border-b">
            <h2 class="sm:text-2xl text-s font-semibold">
               {{ $pages[$currentPage]['heading'] }}
            </h2>
            <p class="sm:text-sm text-xs text-gray-500">
              {{ $pages[$currentPage]['subheading'] }}
            </p>
        </div>  
          
  {!! Form::open(['wire:submit.prevent' => '']) !!}
        @if ($currentPage === 1)
        <div class="p-4 border-b">
  
  {!! Html::decode(Form::label('noteLabel', 'Please read first <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
          
              <div class="flex flex-col md:flex-row">
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <p class="sm:text-sm text-xs text-grey-darkest mb-6 leading-tight">1. <span class="text-red-800 font-bold underline">Shifting to another Course?</span> - Please coordinate first to your respective Program Head and to the Registrar before enrolling your desired course.</p>     
                    <p class="sm:text-sm text-xs text-grey-darkest mb-6 leading-tight">2. <span class="text-red-800 font-bold underline">Irregular Student/Transferee?</span> - If you&apos;re an Irregular Student or a Transferee, go to the Registrar&apos;s Office for your subject evaluation before choosing your year&sol;section and enrolling your subjects.</p>  
                    <p class="sm:text-sm text-xs text-grey-darkest mb-6 leading-tight">3. <span class="text-red-800 font-bold underline">Regular Student?</span> - Just select your course and year&sol;section.</p>                 
                  </div>
              </div>
  
  
              <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('courselabel', 'Course <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                      <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('coursemodel') border-red-500 @enderror">
                          <select name="course" id="course" wire:model="coursemodel" class="sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll">
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
                         
                          <select name="section" id="section" wire:model="sectionmodel" class="sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll">
                            <option value="" selected>Select Section</option>
                            @if (!is_null($sectionlist))
                              @foreach ($sectionlist as $section)
                                  <option value="{{ $section->id }}">{{ $section->section }}</option>
                              @endforeach
                            @endif
                      </select>
                    </div>
                    @error('sectionmodel')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    {!! Html::decode(Form::label('studtypelabel', 'Type of Student<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                  <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
                    <div class="flex items-center">
                     <div class="mx-1"> {{ Form::radio('studtype', '1', true, ['wire:model' => "studtypemodel", 'id' => 'reg', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                     <div class="mb-1"> {{ Form::label('reglabel', 'Regular', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                    </div>
                    <div class="flex items-center">
                      <div class="mx-1"> {{ Form::radio('studtype', '2', false, ['wire:model' => "studtypemodel", 'id' => 'irreg', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                      <div class="mb-1"> {{ Form::label('irreglabel', 'Irregular', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                     </div>                    
                </div>
                @error('studtypemodel')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror 
              </div>
              </div>
          </div>   
 



        @elseif($currentPage === 2)

            <div class="p-4 border-b">     
              <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                  @if(($studtypemodel == '2'))
                  <div class="relative mt-1">
                    <input wire:model.debounce.300ms="search" type="text" id="password" class="w-full sm:text-base text-xs pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search...">
                    <span class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6293ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                   </div>
                   @endif
                   @if(($studtypemodel == '2'))
                   <div class="sm:text-base text-xs bg-blue-500 p-4 rounded-lg mb-3 mt-3 text-white text-center">
                    Note: Please enroll only the subjects given and evaluated by the Registrar&apos;s Office. Enrolling unevaluated subjects will NOT BE CREDITED.
                  </div>
                  @endif
                  </div>
              </div>
              <div class="flex flex-col mt-3 md:flex-row">         
                <div class="w-full flex-1 mx-2 svelte-1l8159u">
                  <p class="sm:text-base text-xs px-2 text-gray-800 text-md">My Course&sol;Section: 
                    <span class="px-2 text-right font-semibold text-gray-800 text-lg">
                    @if (!is_null($coursemodel))
                        {{$courseslist->where('id', $coursemodel)->first()->course_code}}-
                    @endif
                    @if (!is_null($sectionmodel))
                        {{$sectionlist->where('id', $sectionmodel)->first()->section}}
                    @endif
                    </span>
                  </p>
                </div>
                @if(($studtypemodel == '2'))
                <div class="w-full flex-1 mx-2 svelte-1l8159u">
                  <p class="sm:text-md text-xs px-2 text-right text-gray-800 text-md">Total Subjects Selected: <span class="px-2 text-right font-semibold text-gray-800 text-lg">{{count($selectedsubjects)}}</span></p>
                </div>
                @endif
              </div>
                <div class="flex items-center justify-center">
                    <div class="container">                
                        <table class="w-full flex flex-row flex-no-wrap sm:table-auto table-fixed sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                            <thead class="text-white">
                              @if ($fordisplay->isNotEmpty())
                              @foreach ($fordisplay as $subject)   
                                    <tr class="bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                         @if ($studtypemodel == '2')                 
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Select</th>   
                                         @endif
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">No.</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Subject Code</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Description</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Unit(s)</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Time</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Day</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Room</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Prof</th>
                                          <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Year and Section</th>
                                          {{-- <th class="p-3 text-left" width="150px">Actions</th> --}}
                                    </tr>
                                    @endforeach   
                                    @endif
                                      </thead>
                                      <tbody class="flex-1 sm:flex-none">
                                       @if ($fordisplay->isNotEmpty())
                                       @foreach ($fordisplay as $subject)                                                  
                                        {{-- display data --}}
                                        <tr class="flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                                          @if ($studtypemodel == '2')
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3"><input wire:loading.attr="disabled" wire:click="addunits2({{$subject->subject_units}},{{$subject->id}})" wire:model="selectedsubjects" value="{{$subject->id}}" name="chkbx{{$subject->id}}" type="checkbox"></td>
                                          @endif                                            
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $loop->index+1 }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_code }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3 truncate ...">{{ $subject->subject_desc }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_units }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ date('H:i a', strtotime($subject->subject_from)) }} - {{ date('H:i a', strtotime($subject->subject_to)) }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_day }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_room }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_teacher }}</td>
                                            <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $courses->find($sections->find($subject->section_id)->course_id)->course_code}}-{{$sections->find($subject->section_id)->section}}</td>        
                                            {{-- <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer" wire:click="deletesubject({{$irregsubject['id']}})">Delete</td> --}}
                                          </tr>    
                                            @if(($studtypemodel == '1'))
                                            <?php $units += $subject->subject_units  ?>
                                            @endif
                                          @endforeach                                                                  
                                    </tbody>
                                </table>
                        {{ $fordisplay->links() }}
                          @if(($studtypemodel == '1'))
                          <p class="px-5 font-bold text-gray-800 sm:text-lg text-s">Total Units: {{$units}}</p>
                          @endif
                          @if(($studtypemodel == '2'))
                          <p class="px-5 font-bold text-gray-800 sm:text-lg text-s">Total Units: {{$unitcount}}</p>
                          @endif
                        @endif    
                        @if (session()->has('notype'))
                        <div class="bg-red-500 p-4 rounded-lg mb-3 mt-3 text-white text-center">
                          {{session('notype')}}
                        </div>
                        @endif
                        
                        @if (session()->has('noselected'))
                          <div class="bg-red-500 p-4 rounded-lg mb-3 mt-3 text-white text-center">
                            {{session('noselected')}}
                          </div>
                        @endif
                        
                        @if (session()->has('nocourse'))
                          <div class="bg-red-500 p-4 rounded-lg mb-3 mt-3 text-white text-center">
                            {{session('nocourse')}}
                          </div>
                        @endif
                        @if (session()->has('nosubject'))
                        <div class="bg-red-500 p-4 rounded-lg mb-3 mt-3 text-white text-center">
                          {{session('nosubject')}}
                        </div>
                        @endif  
                        @if (session()->has('manysubject'))
                        <div class="bg-red-500 p-4 rounded-lg mb-3 mt-3 text-white text-center">
                          {{session('manysubject')}}
                        </div>
                        @endif                      
                    </div>
                </div>
            </div>
            @endif
            <div class="p-4 border-b">
                <div class="py-2 px-2 flex justify-between">

                  @if ($currentPage === 1)
                  <div></div>
                  
                  {{ Form::button('Next', ['wire:click' => 'addPagenow', 'class' => 'sm:text-sm text-xs bg-gray-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }}  
                @endif

                @if ($currentPage === 2)
                  {{ Form::button('Back', ['wire:click' => 'subPagenow', 'class' => 'sm:text-sm text-xs bg-gray-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 
                
                  {{-- <button wire:click="save" type="button" class="bg-green-600 text-white flex justify-center mx-2 px-4 py-2 rounded font-bold cursor-pointer">Submit</button> --}}
                  {{ Form::submit('Update', ['wire:click' => 'submit', 'class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center mx-2 px-4 py-2 rounded font-bold cursor-pointer']) }} 
                @endif
                  {!! Form::close() !!}         
                </div> 
            </div>
        </div> 
</div>


<style>
  html,
  body {
    height: 100%;
  }

  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 1.2px solid rgba(0, 0, 0, .1);
  }
</style>