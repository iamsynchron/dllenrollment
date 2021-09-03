<div>
    <div class="px-3 py-5">
        <div class="max-w-7xl bg-white rounded-lg mx-auto dark:text-gray-400 dark:bg-gray-800">
            <div class="p-4 border-b">
                <h2 class="sm:text-2xl text-s font-semibold">
                  Subjects of Students
                </h2>
                <p class="sm:text-sm text-xs text-gray-500">
                  
                </p>
            </div>  


            <div class="p-4 border-b">                   
                <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="relative mt-1">
                      <input wire:model.debounce.300ms="search" type="text" id="subject" class="dark:text-white dark:bg-gray-800 w-full sm:text-base text-xs pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search Student...">
                      <span class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6293ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                     </div>
                    </div>
                </div>
            </div>
            @if (Session::get('message'))
            <div class="px-4">
               <div class="bg-green-500 p-3 mt-3 mb-3 rounded-lg text-white text-center">
               {{ Session::get('message') }} 
               </div>  
           </div>
           @endif
    </div>
</div>
            
             <!-- Client Table -->
    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3" style="width: 400px">Student Name</th>
                  <th class="px-4 py-3">Course&sol;Section</th>
                  <th class="px-4 py-3">No. of Subjects</th>
                  <th class="px-4 py-3">Student Type</th>
                  <th class="px-4 py-3">View</th>
                  <th class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($subjects as $subject)   
                @if (!is_null($subject->studentToSubject) && !is_null($subject->studentpersonal) && !is_null($subject->studentToSection))
                <tr class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold">@if(is_null($subject->studentpersonal->middlename)) 
                            {{$subject->studentpersonal->lastname}}, {{$subject->studentpersonal->firstname}}
                            @else
                            {{$subject->studentpersonal->lastname}}, {{$subject->studentpersonal->firstname}} {{$subject->studentpersonal->middlename}}
                            @endif</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">                          
                          {{ $subject->personalid }}
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-xs">{{  $courses->find($subject->studentToSection->first()->course_id)->course_code }}-{{$subject->studentToSection->first()->section}}</td>
                    <td class="px-4 py-3 text-xs">{{ count($subject->studentToSubject)}} {{Str::plural('subject', count($subject->studentToSubject))}}</td>
                    <td class="px-4 py-3 text-xs">@if ($subject->studentToSection->first()->pivot->studtype == 'reg')
                        Regular Student
                    @elseif ($subject->studentToSection->first()->pivot->studtype == 'irreg')
                        Irregular Student
                    @endif</td>
                    <td class="px-4 py-3 text-xs"><button wire:click.prevent="showSubject({{$subject->id}})" class="modal-open hover:bg-blue-800 dark:hover:bg-blue-900 bg-blue-600 p-1 rounded text-white text-xs">Show Subjects</button></td>
                    <td class="px-4 py-3 text-xs">
                        @if ($subject->studentToSection->first()->pivot->studtype == 'reg')
                        --
                    @elseif ($subject->studentToSection->first()->pivot->studtype == 'irreg')
                    <button wire:click.prevent="showInformation({{$subject->id}})" class="hover:bg-yellow-800 dark:hover:bg-yellow-900 bg-yellow-600 p-1 rounded text-white text-xs">Edit Subjects</button>
                    @endif
                        </td>
                  </tr>  
                @endif          
                @endforeach
            </tbody>
            </table>
          </div>
          {{ $subjects->links() }}
          <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
           
        </div>
        </div>
      </div>
      <!-- ./Client Table -->

      
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        
        <div class="modal-container bg-white w-full max-h-4/5 sm:h-auto md:max-w-4xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
          
          <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
          </div>
    
          <!-- Add margin if you want to see some of the overlay behind the modal-->
          <div class="modal-content max-h-96 py-4 text-left px-6">
              <!-- Information Modal -->
            
                <div class="flex justify-between border-b border-gray-100 px-1 py-2">
                  <div class="flex items-start">
                      <span >
                        <!-- Title -->
                        <p class="font-bold text-gray-700 text-lg" id="subject-studid">
                            @if (!is_null($studID))
                                @if (is_null($subjects->where('id', $studID)->first()->studentpersonal->middlename))
                                    {{$subjects->where('id', $studID)->first()->studentpersonal->lastname}}, {{$subjects->where('id', $studID)->first()->studentpersonal->firstname}}
                                @else
                                    {{$subjects->where('id', $studID)->first()->studentpersonal->lastname}}, {{$subjects->where('id', $studID)->first()->studentpersonal->firstname}} {{$subjects->where('id', $studID)->first()->studentpersonal->middlename}}
                                @endif
                            @endif
                        </p>
                        <p class="text-gray-700 text-md">
                            @if (!is_null($studID))
                            {{$subjects->where('id', $studID)->first()->personalid}}
                            @endif
                        </p>
                      </span>
                    </div>
                  <div>
                      <button class="modal-close"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff2f33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>
                    </div>
                </div>
  
                <div class="flex justify-between items-center mt-3">
                  <span id="announce-date" class="px-5 text-sm text-gray-400 italic">
                </span>       
                </div>
              
                <!-- Body -->
                <div class="">
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                          <div class="w-full overflow-x-auto">
                            <table class="w-full" id="showtable">
                              <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                  <th class="px-4 py-3" style="width: 400px">Subject</th>
                                  <th class="px-4 py-3">Unit</th>
                                  <th class="px-4 py-3">Time</th>
                                  <th class="px-4 py-3">Day</th>
                                  <th class="px-4 py-3">Prof</th>
                                  <th class="px-4 py-3">Course/Section</th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"> 
                                @if (!is_null($studID))
                                    @foreach ($subjects->where('id', $studID)->first()->studentToSubject as $subject)
                                        <tr class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                <p class="font-semibold">{{$subject->subject_code}}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">{{ $subject->subject_desc }}</p>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="px-4 py-3 text-xs">{{ $subject->subject_units }}</td>
                                            <td class="px-4 py-3 text-xs">{{ date('H:i a', strtotime($subject->subject_from)) }} - {{ date('H:i a', strtotime($subject->subject_to)) }}</td>
                                            <td class="px-4 py-3 text-xs">{{ $subject->subject_day }}</td>
                                            <td class="px-4 py-3 text-xs">{{ $subject->subject_teacher }}</td>
                                            <td class="px-4 py-3 text-xs">{{ $courses->find($sections->find($subject->section_id)->course_id)->course_code}}-{{$sections->find($subject->section_id)->section}} </td>
                                        </tr> 
                                    @endforeach
                                @endif
                                  
                                       
                            </tbody>
                            </table>
                          </div>
                          <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                           
                        </div>
                        </div>
                </div>
              
                <!-- Author -->
                <div class="flex justify-between items-center mt-3">
                  <p id="announce-author" class="px-5 text-sm text-gray-400 italic"></p>
                </div>
  
                <div class="px-1 py-2 flex justify-end">
                  <button class="modal-close text-sm py-2 px-3 text-gray-500 hover:text-gray-600 transition duration-150">Close</button>
                </div>
            
          </div>
        </div>
      </div>

      @livewireScripts
      <script>
  
        window.livewire.on('showSub', () => {
          toggleModal();
        });


        // function openmodal(){
        //   event.preventDefault();
        //   toggleModal();

        //   document.getElementById("subject-studid").innerHTML = "";
        //   document.getElementById("announce-date").innerHTML = "";
        //   document.getElementById("announce-author").innerHTML = "";
        // }
        
        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)
        
        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
          closemodal[i].addEventListener('click', toggleModal)
        }
        
        document.onkeydown = function(evt) {
          evt = evt || window.event
          var isEscape = false
          if ("key" in evt) {
          isEscape = (evt.key === "Escape" || evt.key === "Esc")
          } else {
          isEscape = (evt.keyCode === 27)
          }
          if (isEscape && document.body.classList.contains('modal-active')) {
          toggleModal()
          }
        };
        
        
        function toggleModal () {
          const body = document.querySelector('body')
          const modal = document.querySelector('.modal')
          modal.classList.toggle('opacity-0')
          modal.classList.toggle('pointer-events-none')
          body.classList.toggle('modal-active')
        }
        
         
      </script>






</div>

