<div>
    <div class="px-3 py-5">
        <div class="max-w-7xl bg-white rounded-lg mx-auto dark:text-gray-400 dark:bg-gray-800">
            <div class="p-4 border-b">
                <h2 class="sm:text-2xl text-s font-semibold">
                  Excel Reports
                </h2>
                <p class="sm:text-sm text-xs text-gray-500">
                  
                </p>
            </div>  


            <div class="p-4 border-b">     

                <div class="flex flex-col mt-5 md:flex-row justify-end">
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <button wire:loading.attr="disabled" wire:click="downloadMIS()" class=" p-2 px-5 bg-green-600 rounded-lg text-white rounded inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/></svg> <span>ALL MIS Report</span></button>
                    <button wire:loading.attr="disabled" wire:click="downloadChed()" class=" p-2 ml-2 px-5 bg-green-600 rounded-lg text-white rounded inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/></svg> <span>CHED Report</span></button>
                    <a href="{{route('sectionreport')}}" class=" p-2 ml-2 px-5 bg-green-600 rounded-lg text-white rounded inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M11.363 2c4.155 0 2.637 6 2.637 6s6-1.65 6 2.457v11.543h-16v-20h7.363zm.826-2h-10.189v24h20v-14.386c0-2.391-6.648-9.614-9.811-9.614zm4.811 13h-2.628v3.686h.907v-1.472h1.49v-.732h-1.49v-.698h1.721v-.784zm-4.9 0h-1.599v3.686h1.599c.537 0 .961-.181 1.262-.535.555-.658.587-2.034-.062-2.692-.298-.3-.712-.459-1.2-.459zm-.692.783h.496c.473 0 .802.173.915.644.064.267.077.679-.021.948-.128.351-.381.528-.754.528h-.637v-2.12zm-2.74-.783h-1.668v3.686h.907v-1.277h.761c.619 0 1.064-.277 1.224-.763.095-.291.095-.597 0-.885-.16-.484-.606-.761-1.224-.761zm-.761.732h.546c.235 0 .467.028.576.228.067.123.067.366 0 .489-.109.199-.341.227-.576.227h-.546v-.944z"/></svg> <span>List of Students (Section)</span></a>
                </div>
                </div>

            </div>

            <div class="p-4 border-b mt-10">
                <h2 class="sm:text-2xl text-s font-semibold">
                  PDF Reports
                </h2>
                <p class="sm:text-sm text-xs text-gray-500">
                  
                </p>
            </div>  

            <div class="p-4 border-b">     

                <div class="flex flex-col mt-5 md:flex-row justify-end">
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <a href="{{ route('correport') }}" class=" p-2 px-5 bg-red-600 rounded-lg text-white rounded inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M11.363 2c4.155 0 2.637 6 2.637 6s6-1.65 6 2.457v11.543h-16v-20h7.363zm.826-2h-10.189v24h20v-14.386c0-2.391-6.648-9.614-9.811-9.614zm4.811 13h-2.628v3.686h.907v-1.472h1.49v-.732h-1.49v-.698h1.721v-.784zm-4.9 0h-1.599v3.686h1.599c.537 0 .961-.181 1.262-.535.555-.658.587-2.034-.062-2.692-.298-.3-.712-.459-1.2-.459zm-.692.783h.496c.473 0 .802.173.915.644.064.267.077.679-.021.948-.128.351-.381.528-.754.528h-.637v-2.12zm-2.74-.783h-1.668v3.686h.907v-1.277h.761c.619 0 1.064-.277 1.224-.763.095-.291.095-.597 0-.885-.16-.484-.606-.761-1.224-.761zm-.761.732h.546c.235 0 .467.028.576.228.067.123.067.366 0 .489-.109.199-.341.227-.576.227h-.546v-.944z"/></svg> <span>COR (Whiteforms)</span></a>
                    
                    
                </div>
                </div>

            </div>
    </div>
</div>
            
    
</div>

