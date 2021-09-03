@extends('layouts.app')

@section('title', 'My Information')

@section('content')


<div class="px-3 py-5">
  @if (Session::get('message'))
  <div class="px-4">
    <div class="bg-green-500 p-4 rounded-lg text-white text-center">
      {{ Session::get('message') }}
    </div>  
  </div>
  @endif

    <div class="flex items-center justify-center">
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr class="sm:text-base text-xs bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Form</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left" width="120px">Actions</th>
                    </tr>
                    <tr class="sm:text-base text-xs bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Form</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left" width="120px">Actions</th>
                    </tr>
                    <tr class="sm:text-base text-xs bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Form</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left" width="120px">Actions</th>
                    </tr>
                    <tr class="sm:text-base text-xs bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Form</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left" width="120px">Actions</th>
                    </tr>
                    <tr class="sm:text-base text-xs bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Form</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left" width="120px">Actions</th>
                    </tr>
                    <tr class="sm:text-base text-xs bg-gray-800 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Form</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left" width="120px">Actions</th>
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    <tr class="sm:text-base text-xs flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3">Form 1</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Personal Information</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if(is_null($info->studentpersonal))
                          <span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>
                          @else @if (is_null($info->studentpersonal->created_at))<span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>@else
                          <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>@endif 
                          @endif
                      </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if (is_null($info->studentpersonal))
                            <a href="{{ route('formspersonal') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                          @else
                            @if (is_null($info->studentpersonal->created_at))
                            <a href="{{ route('formspersonal') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                            @else
                            <a href="{{ route('updatepersonal') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Update</a>
                            @endif
                          @endif
                          
                      </td>
                    </tr>
                    <tr class="sm:text-base text-xs flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3">Form 2</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Contact Details</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if(is_null($info->studentcontact))
                          <span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>
                          @else @if (is_null($info->studentcontact->created_at))<span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>@else
                          <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>@endif 
                          @endif
                      </td>
                        <td class="sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">
                          @if (is_null($info->studentcontact))
                              <a href="{{ route('formscontact') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                          @else
                              @if (is_null($info->studentcontact->created_at))
                              <a href="{{ route('formscontact') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                              @else
                              <a href="{{ route('updatecontact') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Update</a>
                              @endif  
                          @endif          
                        </td>
                    </tr>
                    <tr class="sm:text-base text-xs flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3">Form 3</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Family Background</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if(is_null($info->studentfamily))
                          <span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>
                          @else @if (is_null($info->studentfamily->created_at))<span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>@else
                          <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>@endif 
                          @endif
                        </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if (is_null($info->studentfamily))
                            <a href="{{ route('formsfamily') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                          @else
                            @if (is_null($info->studentfamily->created_at))
                            <a href="{{ route('formsfamily') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                            @else
                            <a href="{{ route('updatefamily') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Update</a>
                            @endif  
                          @endif
                        
                      </td>
                    </tr>
                    <tr class="sm:text-base text-xs flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                      <td class="border-grey-light border hover:bg-gray-100 p-3">Form 4</td>
                      <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Additional Information</td>
                      <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if(is_null($info->studentadditional))
                          <span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>
                          @else @if (is_null($info->studentadditional->created_at))<span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>@else
                          <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>@endif 
                          @endif
                      </td>
                      <td class="sm:text-base text-xs border-grey-light border hover:bg-gray-100 p-3">
                          @if (is_null($info->studentadditional))
                          <a href="{{ route('formsadditional') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                          @else
                            @if (is_null($info->studentadditional->created_at))
                            <a href="{{ route('formsadditional') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                            @else
                            <a href="{{ route('updateadditional') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Update</a>
                            @endif 
                          @endif       
                      </td>
                    </tr>
                    <tr class="sm:text-base text-xs flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3">Form 5</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Educational Background (Part 1)</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                            @if(is_null($info->studentschoolone))
                            <span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>
                            @else @if (is_null($info->studentschoolone->created_at))<span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>@else
                            <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>@endif 
                            @endif
                        </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if (is_null($info->studentschoolone))
                            <a href="{{ route('formseducone') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                          @else
                            @if (is_null($info->studentschoolone->created_at))
                            <a href="{{ route('formseducone') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Fill-up</a>
                            @else
                            <a href="{{ route('updateeducone') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs hover:text-white hover:bg-blue-700">Update</a>
                            @endif  
                          @endif                            
                        </td>
                      </tr>
                      <tr class="sm:text-base text-xs flex flex-col bg-white flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3">Form 6</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Educational Background (Part 2)</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if(is_null($info->studentschooltwo))
                          <span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>
                          @else @if (is_null($info->studentschooltwo->created_at))<span class="rounded bg-red-500 py-1 px-3 text-white text-xs font-bold">Unanswered</span>@else
                          <span class="rounded bg-green-600 py-1 px-3 text-white text-xs font-bold">Completed</span>@endif 
                          @endif
                        </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">
                          @if (is_null($info->studentschooltwo))
                            <a href="{{ route('formseductwo') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs  hover:text-white hover:bg-blue-700">Fill-up</a>
                          @else
                            @if (is_null($info->studentschooltwo->created_at))
                            <a href="{{ route('formseductwo') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs  hover:text-white hover:bg-blue-700">Fill-up</a>
                            @else
                            <a href="{{ route('updateeductwo') }}" class="bg-blue-500 px-5 py-2 rounded-full text-white sm:text-sm text-xs  hover:text-white hover:bg-blue-700">Update</a>
                            @endif 
                          @endif                          
                        </td>
                      </tr>
                </tbody>
            </table>
        </div>
    </body>
    
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
        border-bottom: 1.7px solid rgba(0, 0, 0, .1);
      }
    </style>
</div>
@endsection
