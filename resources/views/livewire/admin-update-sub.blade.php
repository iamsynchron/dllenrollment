<div class="px-3 py-5">
    <div class="max-w-7xl bg-white rounded-lg shadow-xl mx-auto ">
        <div class="p-4 border-b">
            <h2 class="sm:text-2xl text-s font-semibold">
               Update Subject
            </h2>
            <p class="sm:text-sm text-xs text-gray-500">
              ID Number: {{$student->personalid}}
            </p>
        </div>  
        {!! Form::open(['wire:submit.prevent' => '']) !!}


        <div class="p-4 border-b">     
            <div class="flex flex-col md:flex-row">
              <div class="w-full mx-2 flex-1 svelte-1l8159u">
                <div class="relative mt-1">
                  <input wire:model.debounce.300ms="search" type="text" id="password" class="w-full sm:text-base text-xs pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search Subjects...">
                  <span class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6293ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                 </div>
                </div>
            </div>
            <div class="flex flex-col mt-3 md:flex-row"> 
              <div class="w-full flex-1 mx-2 svelte-1l8159u">
                <p class="sm:text-md text-xs px-2 sm:text-right text-left text-gray-800 text-md">Total Subjects Selected: <span class="px-2 text-right font-semibold text-gray-800 sm:text-base text-xs">{{count($selectedsubjects)}}</span></p>
              </div>
            </div>
              <div class="flex items-center justify-center">
                  <div class="container">                
                      <table class="w-full">
                          <thead class="text-white">   
                              <tr class="bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">         
                                        <th class="sm:w-auto w-36 sm:text-base text-xs p-3 text-left">Select</th>
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
                                    </thead>
                                    <tbody class="flex-1 sm:flex-none">
                                     @if ($fordisplay->isNotEmpty())
                                     @foreach ($fordisplay as $subject)                                                  
                                      {{-- display data --}}
                                      <tr class="flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3"><input wire:loading.attr="disabled" wire:click="addunits({{$subject->subject_units}},{{$subject->id}})" wire:model="selectedsubjects" value="{{$subject->id}}" name="chkbx{{$subject->id}}" type="checkbox"></td>                                        
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $loop->index+1 }}</td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_code }}</td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3 truncate ..."><span class="">{{ $subject->subject_desc }}</span></td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_units }}</td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ date('h:i a', strtotime($subject->subject_from)) }} - {{ date('h:i a', strtotime($subject->subject_to)) }}</td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_day }}</td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_room }}</td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $subject->subject_teacher }}</td>
                                          <td class="sm:w-auto w-screen sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">{{ $courseslist->find($sectionlist->find($subject->section_id)->course_id)->course_code}}-{{$sectionlist->find($subject->section_id)->section}}</td>        
                                          {{-- <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer" wire:click="deletesubject({{$irregsubject['id']}})">Delete</td> --}}
                                        </tr>  
                                        @endforeach                                                                  
                                  </tbody>
                              </table>
                      {{ $fordisplay->links() }}
                        <p class="px-5 mt-5 font-bold text-gray-800 sm:text-lg text-s">Total Units: {{$unitcount}}</p>
                    
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