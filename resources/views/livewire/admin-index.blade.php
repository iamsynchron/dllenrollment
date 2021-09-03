<div>
   <!-- Statistics Cards -->
   <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 p-4 gap-4">
    <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
      </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($enrolled))
            {{count($enrolled)}}
        @else
            0
        @endif</p>
        <p>Enrolled</p>
      </div>
    </div>
    <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
    </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($newstudents))
            {{count($newstudents)}}
        @else
            0
        @endif</p>
        <p>New {{Str::plural('Student', count($newstudents))}}</p>
      </div>
    </div>
    <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
    </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($oldstudents))
            {{count($oldstudents)}}
        @else
            0
        @endif</p>
        <p>Old {{Str::plural('Student', count($oldstudents))}}</p>
      </div>
    </div>
  </div>


  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 p-4 gap-4">
    <div class="bg-red-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#96111e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
      </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($incomplete))
          {{count($incomplete)}}
      @else
          0
      @endif</p>
        <p><abbr title="Students who are not yet completed in their enrollment task.">Incomplete Task</abbr></p>
      </div>
    </div>

    <div class="bg-red-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg> --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"  class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
    </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($dropped))
          {{count($dropped)}}
      @else
          0
      @endif</p>
        <p>Dropped</p>
      </div>
    </div>


    {{-- <div class="bg-red-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#96111e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M9.9 17.1L14 13M9.9 12.9L14 17"/></svg>
    </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($forms))
          {{count($forms)}}
      @else
          0
      @endif</p>
        <p>Inc. Personal Forms</p>
      </div>
    </div>
    <div class="bg-red-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#96111e"  stroke="none"><path d="M5.495 2h16.505v-2h-17c-1.657 0-3 1.343-3 3v18c0 1.657 1.343 3 3 3h17v-20h-16.505c-1.375 0-1.375-2 0-2zm6.681 17c-.573 0-1.04-.467-1.04-1.042 0-.576.467-1.042 1.04-1.042.576 0 1.042.466 1.042 1.042 0 .575-.466 1.042-1.042 1.042zm.034-10c1.644 0 2.81 1.015 2.79 2.666-.015 1.134-.705 1.878-1.259 2.477-.832.896-.766 1.336-.766 1.941h-1.644c0-1.311-.045-1.84 1.174-2.999.469-.446.839-.799.788-1.493-.048-.66-.599-1.004-1.118-1.004-.883 0-1.26.785-1.26 1.746h-1.647c0-2.212 1.262-3.334 2.942-3.334z"/></svg>
    </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($sections))
          {{count($sections)}}
      @else
          0
      @endif</p>
        <p>No Subject and Section</p>
      </div>
    </div>
    <div class="bg-red-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-600 dark:border-gray-600 text-white font-medium group">
      <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"  fill="#96111e"  stroke="none"><path d="M1 3.373l20.654 18.734 1.346-1.48-20.658-18.734-1.342 1.48zm10.616 4.906l6.979-6.768c.645-.625 1.423-.903 2.187-.903 1.645-.001 3.218 1.291 3.218 3.193 0 .833-.324 1.665-.97 2.291l-6.682 6.479-1.484-1.346 6.774-6.569c1.133-1.098-.548-2.777-1.651-1.709l-6.887 6.679-1.484-1.347zm.847 7.515l-3.364 3.262c-1.837 1.782-3.591 2.665-6.024 3.455l-1.509-1.559c.866-2.409 1.803-4.135 3.64-5.916l3.105-3.009 1.48 1.343-3.193 3.102c-1.1 1.066-1.838 2.089-2.498 3.535 1.463-.615 2.508-1.321 3.607-2.387l3.269-3.175 1.487 1.349zm-2.744-9.278l6.24-6.092c.29-.282.663-.424 1.033-.424.377 0 .751.146 1.035.44l-7.274 7.055-1.034-.979zm-8.534 15.47l.845.872-1 .971c-.118.114-.27.171-.423.171-.336 0-.607-.274-.607-.607 0-.159.062-.317.185-.436l1-.971z"/></svg>    
    </div>
      <div class="text-right">
        <p class="text-2xl">@if (!is_null($signatures))
          {{count($signatures)}}
      @else
          0
      @endif</p>
        <p>No Signature</p>
      </div>
    </div> --}}


  </div>
  <!-- ./Statistics Cards -->
 

  <div class="p-4 gap-4">
      <p class="text-xl font-semibold text-gray-800 text-center mb-3">Number of Students</p>
    <div id="coursechart" style="height: 400px;"></div>
  </div>

  <div class="mt-4 p-4 gap-4">
    <p class="text-xl font-semibold text-gray-800 text-center mb-3">Number of Students (By Sex at Birth)</p>
  <div id="genderchart" style="height: 400px;"></div>
</div>


</div>

<!-- Charting library -->
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<!-- Your application script -->
<script>
  const coursechart = new Chartisan({
    el: '#coursechart',
    url: "@chart('course_stud_count')",
    hooks: new ChartisanHooks()
    .legend()
    .colors()
    .tooltip()
  });

  const genderchart = new Chartisan({
    el: '#genderchart',
    url: "@chart('course_gender_count')",
    hooks: new ChartisanHooks()
    .legend()
    .colors()
    .tooltip()
  });
</script>
