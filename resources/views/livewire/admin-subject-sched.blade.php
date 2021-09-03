<div>
    <div class="px-3 py-5">
        <div class="max-w-7xl bg-white rounded-lg mx-auto dark:text-gray-400 dark:bg-gray-800">
            <div class="p-4 border-b">
                <h2 class="sm:text-2xl text-s font-semibold">
                  Schedule of Subjects 
                </h2>
                <p class="sm:text-sm text-xs text-gray-500">
                  
                </p>
            </div>  


            <div class="p-4 border-b">                   
                <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="relative mt-1">
                      <input wire:model.debounce.300ms="search" type="text" id="announce" class="dark:text-white dark:bg-gray-800 w-full sm:text-base text-xs pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search Subjects...">
                      <span class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6293ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                     </div>
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
                  <th class="px-4 py-3" style="width: 400px">Subject</th>
                  <th class="px-4 py-3">Unit</th>
                  <th class="px-4 py-3">Time</th>
                  <th class="px-4 py-3">Day</th>
                  <th class="px-4 py-3">Prof</th>
                  <th class="px-4 py-3">Course/Section</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                
                @foreach ($fordisplay as $subject)     
                <tr class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold">{{ $subject->subject_code }}</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">{{ $subject->subject_desc }}</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-xs">{{ $subject->subject_units }}</td>
                    <td class="px-4 py-3 text-xs">{{ date('H:i a', strtotime($subject->subject_from)) }} - {{ date('H:i a', strtotime($subject->subject_to)) }}</td>
                    <td class="px-4 py-3 text-xs">{{ $subject->subject_day }}</td>
                    <td class="px-4 py-3 text-xs">{{ $subject->subject_teacher }}</td>
                    <td class="px-4 py-3 text-xs">{{ $courses->find($sections->find($subject->section_id)->course_id)->course_code}}-{{$sections->find($subject->section_id)->section}}</td>
                  </tr>          
                  @endforeach
            </tbody>
            </table>
          </div>
          {{ $fordisplay->links() }}
          <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
           
        </div>
        </div>
      </div>
      <!-- ./Client Table -->
</div>

