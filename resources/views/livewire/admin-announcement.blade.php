<div>
    <div class="px-3 py-5">
        <div class="max-w-7xl bg-white rounded-lg mx-auto dark:text-gray-400 dark:bg-gray-800">
            <div class="p-4 border-b">
                <h2 class="sm:text-2xl text-s font-semibold">
                  Announcements 
                </h2>
                <p class="sm:text-sm text-xs text-gray-500">
                  
                </p>
            </div>  


            <div class="p-4 border-b">                   
                <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="relative mt-1">
                      <input wire:model.debounce.300ms="search" type="text" id="announce" class="dark:text-white dark:bg-gray-800 w-full sm:text-base text-xs pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search Announcement...">
                      <span class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6293ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                     </div>
                    </div>
                </div>

                <div class="flex flex-col mt-5 md:flex-row justify-end">
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <a href="{{ route('announcement-create') }}" class=" p-2 px-5 bg-blue-600 rounded-lg text-white rounded inline-flex items-center"><svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="#ffffff" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg> <span>Create Announcement</span></a>
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
                  <th class="px-4 py-3" style="width: 650px">Announcement</th>
                  <th class="px-4 py-3">Author</th>
                  <th class="px-4 py-3">Type</th>
                  <th class="px-4 py-3">Date Created</th>
                  <th class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                
                
                @foreach ($announcements as $announcement)
                <tr class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold">{{$announcement->title}}</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">{{$announcement->body}}</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">{{$announcement->author}}</td>
                    <td class="px-4 py-3 text-xs">
                        @if ($announcement->announcement_type == "Urgent")
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-red-700 rounded-full dark:bg-red-700 dark:text-white"> {{$announcement->announcement_type}} </span>
                        @else
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-blue-700 rounded-full dark:bg-blue-700 dark:text-white"> {{$announcement->announcement_type}} </span>
                        @endif                
                    </td>
                    <td class="px-4 py-3 text-sm">{{$announcement->created_at->diffForHumans()}}</td>
                    <td class="px-4 py-3 text-sm">
                        @if($confirming===$announcement->id)
                            <button wire:click="kill({{ $announcement->id }})"
                                class="hover:bg-red-800 dark:hover:bg-red-900 bg-red-600 p-1 rounded text-white text-sm">Sure?</button>
                        @else
                            <button wire:click="confirmDelete({{ $announcement->id }})"
                                class="hover:bg-red-800 dark:hover:bg-red-900 bg-gray-600 p-1 rounded text-white text-sm">Delete</button>
                        @endif
                        </td>
                  </tr>
                @endforeach            
            
            </tbody>
            </table>
          </div>
          <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
           {{$announcements->links()}}
          </div>
        </div>
      </div>
      <!-- ./Client Table -->
</div>

