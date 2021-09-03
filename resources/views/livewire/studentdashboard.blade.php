   <style>
    .modal {
      transition: opacity 0.25s ease;
    }
    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
  </style>


  @if ($enrollstatus->status_type == 'warn')
    <div class="p-5">
      <div class="bg-yellow-600 p-4 rounded-lg text-white text-center">
        {{$enrollstatus->status_message}}
      </div>  
    </div>
  @endif

  @if ($enrollstatus->status_type == 'closed')
  <div class="p-5">
    <div class="bg-red-800 p-4 rounded-lg text-white text-center">
      {{$enrollstatus->status_message}}
    </div>  
  </div>
@endif


@if ($enrollstatus->status_type == 'message')
  <div class="p-5">
    <div class="bg-green-600 p-4 rounded-lg text-white text-center">
      {{$enrollstatus->status_message}}
    </div>  
  </div>
@endif

@if (session('message'))
  <div class="p-5">
    <div class="bg-green-600 p-4 rounded-lg text-white text-center">
      {{session('message')}}
    </div>  
  </div>
@endif


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
  <div class="bg-gray-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-600 dark:border-gray-600 text-white font-medium group">
    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
      {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> --}}
      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-gray-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
      </svg>
    </div>
    <div class="text-right">
      <p class="text-2xl">
        @if (!$getsubject->isEmpty() && !is_null($getsignature) &&  $data["count"] == 6)
            Enrolled
        @else
            Not Enrolled
        @endif

      </p>
      <p>Status</p>
    </div>
  </div>

  <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
      {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg> --}}
      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
    </div>
    <div class="text-right">
      <p class="text-2xl">@if (!is_null($data["count"]))
          {{$data["count"]}} of 6
      @else
          0 of 6
      @endif</p>
      <p>Completed Forms</p>
    </div>
  </div>

  <div class="bg-green-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-gray-600 text-white font-medium group">
    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
      {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> --}}
      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-green-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
      </svg>
    </div>
    <div class="text-right">
      <p class="text-2xl">
          @if (!$getsubject->isEmpty())
            {{count($getsubject)}} Subject(s)
          @else
            0 Subjects
          @endif</p>
      <p>Enrolled Subjects</p>
    </div>
  </div>

  <div class="bg-yellow-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-yellow-600 dark:border-gray-600 text-white font-medium group">
    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
      {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> --}}
      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-yellow-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
      </svg>
    </div>
    <div class="text-right">
      <p class="text-2xl">
        @if (!is_null($getsignature))
          Uploaded
        @else
          No Signature
        @endif
      </p>
      <p>E-Signature</p>
    </div>
  </div>
</div>







  <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">
  
      <!-- Social Traffic -->
      <div wire:ignore class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t mb-0 px-0 border-0">
          <div class="flex flex-wrap items-center px-4 py-2">
            <div class="relative w-full max-w-full flex-grow flex-1">
              <h3 class="font-semibold sm:text-base text-xs text-gray-900 dark:text-gray-50">My Task(s)</h3>
            </div>
            <div class="relative w-full max-w-full flex-grow flex-1 text-right">
              {{-- <button class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">See all</button> --}}
            </div>
          </div>
          <div class="block w-full overflow-x-auto">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Task</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">To-Do</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 py-5 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"><a class="underline" href="{{ route('studentinformation') }}">Complete Enrollment Forms</a></th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    {{ $data["count"] }} out of 6 Forms
                  </td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex items-center">
                      <span class="mr-2">{{round($data["percentage"],0)}}%</span>
                      <div class="relative w-full">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                          <div style="width:@if($data["percentage"] == 6)100% @else {{$data["percentage"]}}%@endif" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center @if($data["count"] == 6) bg-green-500 @else bg-blue-600 @endif"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 py-5 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"><a class="underline" href="{{ route('studentsubjects') }}">Enroll Subjects</a></th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">      
                    @if (!$getsubject->isEmpty())
                    <?php
                          $displaytype = !is_null($getsection) ? $getsection->studentToSection->first()->pivot->studtype : '';               
                    ?>
                        {{count($getsubject)}} subject(s) enrolled | @if ($displaytype == 'reg')
                            Regular Student
                        @elseif($displaytype == 'irreg')
                            Irregular Student
                        @endif
                      @else
                        No subjects enrolled
                      @endif
                  </td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex justify-center">
                      @if (!$getsubject->isEmpty())
                      <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>
                    @else
                      <span class="rounded bg-red-600 py-1 px-3 text-white text-xs font-bold">Incomplete</span>    
                    @endif
                    </div>
                  </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 py-5 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"><a class="underline" href="{{ route('studentsignature') }}">Enter E-Signature</a></th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                      @if (!is_null($getsignature))
                        Signature uploaded
                      @else
                        No E-signature
                      @endif
                    </td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex justify-center">
                      @if (!is_null($getsignature))
                        <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>
                      @else
                        <span class="rounded bg-red-600 py-1 px-3 text-white text-xs font-bold">Incomplete</span>    
                      @endif
                      
                      </div>
                    </div>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- ./Social Traffic -->
  
      <!-- Recent Activities -->
    
      <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t mb-0 px-0 border-0">
          <div class="flex flex-wrap items-center px-4 py-2">
            <div class="relative w-full max-w-full flex-grow flex-1">
              <h3 class="font-semibold sm:text-base text-xs text-gray-900 dark:text-gray-50">Announcements (@if($announcements->total() > 0 ){{$announcements->total()}}@else{{'0'}}@endif)</h3>
            </div>
            <div class="relative w-full max-w-full flex-grow flex-1 text-right">
              {{-- <button class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">See all</button> --}}
            </div>
          </div>
          <div class="block w-full overflow-x-auto">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Title</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Created</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Importance</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Action</th>
                </tr>
              </thead>
              <tbody>      
                @if (!is_null($announcements))
                  @foreach ($announcements as $announce)  
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">{{ $announce->title }}</th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ $announce->created_at->diffForHumans() }}</td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><span class="px-2 py-1 
                    @if($announce->announcement_type === "Urgent")
                    bg-red-600
                    @else
                    bg-blue-600
                    @endif
                    text-gray-100 font-bold rounded">{{ $announce->announcement_type }}</span>
                  </td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex justify-start">                    
                      <div class="flex-shrink-0 ml-2">                         
                        <button onclick="openmodal({{$announce}})" class="modal-open flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" style="outline: none;">
                          View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                      </button>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                @else
                  <tr class="text-gray-700 dark:text-gray-100">
                    <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">No Announcement</th>
                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"></td>
                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"></td>
                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"></td>
                  </tr>
                @endif
  
              </tbody>
            </table>      
          </div>
        </div>
        <div class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
          {{ $announcements->links() }}
        </div>
      </div>
         <!-- ./Recent Activities -->       
    </div>
  



    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
      <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
      
      <div class="modal-container bg-white w-11/12 max-h-4/5 sm:h-auto md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
          <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
          </svg>
          <span class="text-sm">(Esc)</span>
        </div>
  
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!-- Information Modal -->
          
              <div class="flex justify-between border-b border-gray-100 px-1 py-2">
                <div class="flex items-start">
                    <span class="font-bold text-gray-700 text-lg">
                      <!-- Title -->
                      <p id="announce-title"></p>
                    </span>
                  </div>
                <div>
                    <button class="modal-close"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff2f33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>
                  </div>
              </div>

              <div class="flex justify-between items-center mt-3">
                <span id="announce-date" class="px-5 text-sm text-gray-400 italic"></span>       
              </div>
            
              <!-- Body -->
              <div class="" >
                  <p class="break-words px-5 py-5 text-gray-600" id="announce-body"></p>
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

    <script>
      // var openmodal = document.querySelectorAll('.modal-open')
      // for (var i = 0; i < openmodal.length; i++) {
      //   openmodal[i].addEventListener('click', function(event){
      //   event.preventDefault()
      //   toggleModal()
      //   })
      // }

      function openmodal(announce){
        event.preventDefault();
        toggleModal();

        var monthNames = ["January", "February", "March", "April", "May","June","July", "August", "September", "October", "November","December"];
        let mydate = Date.parse(announce['created_at']);
        var realdate = new Date(mydate);
        var formattedDate =          
          monthNames[realdate.getMonth()] + " " +
          realdate.getDate() + ", " +
          realdate.getFullYear().toString()

          formattedDate.replace(/(?<!\d)(?=\d(\D|$))/g, '0');
        
        document.getElementById("announce-body").innerHTML = announce['body'];
        document.getElementById("announce-title").innerHTML = announce['title'];
        document.getElementById("announce-date").innerHTML = formattedDate;
        document.getElementById("announce-author").innerHTML = "By: "+announce['author']+" ("+announce['position']+")";
      }
      
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
  