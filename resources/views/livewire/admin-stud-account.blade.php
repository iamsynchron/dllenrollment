<div>
    <div>
        <div class="px-3 py-5">
            <div class="max-w-7xl bg-white rounded-lg mx-auto dark:text-gray-400 dark:bg-gray-800">
                <div class="p-4 border-b">
                    <h2 class="sm:text-2xl text-s font-semibold">
                      List of Accounts (ID Numbers) 
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
                    <div class="flex flex-col mt-5 md:flex-row justify-end">
                        <div class="w-full mx-2 flex-1 svelte-1l8159u">
                        <a href="{{ route('accounts-add') }}" class=" p-2 px-5 bg-blue-600 rounded-lg text-white rounded inline-flex items-center"><svg class="w-5 h-5 mr-2" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.5 15c-2.483 0-4.5 2.015-4.5 4.5s2.017 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.017-4.5-4.5-4.5zm2.5 5h-2v2h-1v-2h-2v-1h2v-2h1v2h2v1zm-7.18 4h-14.815l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 6.751 0 7.506 7.595 3.64 13.679-1.292 2.031-2.64 3.63-2.64 5.821 0 1.747.696 3.331 1.82 4.5z"/></svg> <span>Add Account</span></a>
                        <button wire:click.prevent="downloadExcel()" class=" p-2 ml-2 px-5 bg-green-600 rounded-lg text-white rounded inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path d="M4 22v-20h16v11.543c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-7.362zm18-7.614v-14.386h-20v24h10.189c3.163 0 9.811-7.223 9.811-9.614zm-5-1.386h-10v-1h10v1zm0-4h-10v1h10v-1zm0-3h-10v1h10v-1z"/></svg> <span>Export to Excel</span></button>
                        
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
                      <th class="px-4 py-3" style="width: 650px">ID Number/Name</th>
                      <th class="px-4 py-3">Code</th>
                      <th class="px-4 py-3">Type</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                      
                    @foreach ($accounts as $account)
                    <tr class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                            <div>
                              <p class="font-semibold">{{ $account->id }}</p>
                              <p class="text-sm text-gray-600 dark:text-gray-400">{{ $account->name }}</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $account->code }}</td>
                        <td class="px-4 py-3 text-sm">@if ($account->type == 1)
                            New Student
                        @elseif ($account->type == 2)
                            Old Student
                        @elseif ($account->type == 3)
                            Transferee
                        @elseif ($account->type == 4)
                            Cross Enrollee
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
    
    
</div>
