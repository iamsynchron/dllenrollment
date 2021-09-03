<div>
    <div class="px-3 py-5">
        <div class="max-w-7xl bg-white rounded-lg mx-auto dark:text-gray-400 dark:bg-gray-800">
            <div class="p-4 border-b">
                <h2 class="sm:text-2xl text-s font-semibold">
                  Dropped Students
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

                <div class="flex flex-col mt-5 md:flex-row justify-end">
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <a href="{{ route('adminlist') }}" class=" p-2 px-5 bg-blue-600 rounded-lg text-white rounded inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" stroke="currentColor" fill="#ffffff" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg> <span>Back</span></a>
                    
                    
                </div>
                </div>

            </div>
    </div>
</div>
            
             <!-- Client Table -->
    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3" style="width: 500px">Student Name</th>
                  <th class="px-4 py-3">Course&sol;Section</th>
                  <th class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($subjects as $subject)   
                <tr class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold">@if(is_null($subject->studentpersonal->middlename)) 
                            {{$subject->studentpersonal->lastname}}, {{$subject->studentpersonal->firstname}}
                            @else
                            {{$subject->studentpersonal->lastname}}, {{$subject->studentpersonal->firstname}} {{$subject->studentpersonal->middlename}}
                            @endif</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">{{ $subject->personalid }}</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-xs">{{  $courses->find($subject->studentToSection->first()->course_id)->course_code }}-{{$subject->studentToSection->first()->section}}</td>
                    <td class="px-4 py-3 text-xs">@if($confirming===$subject->id)
                        <button wire:click="restore({{ $subject->id }})"
                            class="hover:bg-green-800 dark:hover:bg-green-900 bg-green-600 p-1 rounded text-white text-xs">Are You Sure?</button>
                    @else
                        <button wire:click="confirmDelete({{ $subject->id }})"
                            class="hover:bg-green-800 dark:hover:bg-green-900 bg-gray-600 p-1 rounded text-white text-xs">Re-enroll Student</button>
                    @endif</td>
                  </tr>  
                  @endforeach
            </tbody>
            </table>
          </div>

          <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
           
        </div>
        </div>
      </div>
      <!-- ./Client Table -->

      

</div>

