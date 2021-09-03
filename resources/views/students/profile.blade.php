@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<!-- This is an example component -->
<div class="px-3 py-5">
    <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
        <div class="p-4 border-b">
            <h2 class="sm:text-2xl text-s font-semibold">
                Student Profile
            </h2>
            <p class="sm:text-sm text-xs text-gray-500">
                ID Number:&nbsp;{{auth()->user()->personalid}}
            </p>
        </div>
    
        <div>
            <div class="lg:w-full md:w-5/5 sm:w-4/5 mx-auto p-8">
                <div class="shadow-md">
                   <div class="tab w-full overflow-hidden border-t">
                      <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs">
                      <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-one">Personal Information</label>
                      <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Full name
                                </p>
                                <p class="sm:text-base text-xs">
                                  @if (is_null($info->studentpersonal))
                                      No record
                                  @else
                                  {{ $info->studentpersonal->lastname}}@if(!is_null($info->studentpersonal->extension)) {{Str::title($info->studentpersonal->extension)}}@endif,&nbsp;{{ $info->studentpersonal->firstname}} 
                                  @if (!is_null($info->studentpersonal->middlename)){{$info->studentpersonal->middlename}}@endif 
                                  @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Sex
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (is_null($info->studentpersonal))
                                        No record
                                    @else
                                        @if ($info->studentpersonal->sex === '1')
                                            Male
                                        @else
                                            Female
                                        @endif
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Gender
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (is_null($info->studentpersonal))
                                        No record
                                    @else
                                        {{ $info->studentpersonal->gender }}    
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Birthday
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (is_null($info->studentpersonal))
                                        No record
                                    @else
                                        {{ date('F d, Y', strtotime($info->studentpersonal->birthday)) }}
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Birthplace
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (is_null($info->studentpersonal))
                                        No record
                                    @else
                                        {{ $info->studentpersonal->birthplace }}
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Height
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (is_null($info->studentpersonal))
                                        No record
                                    @else
                                        @if (!is_null($info->studentpersonal->height))
                                        {{$info->studentpersonal->height}}&nbsp;cm
                                        @else
                                        No record
                                        @endif
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Weight
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (is_null($info->studentpersonal))
                                        No record
                                    @else
                                            @if (!is_null($info->studentpersonal->weight))
                                            {{$info->studentpersonal->weight}}&nbsp;kg
                                            @else
                                            No record
                                            @endif
                                    @endif
                                </p>
                            </div>
                      </div>
                   </div>
                   <div class="tab w-full overflow-hidden border-t">
                      <input class="absolute opacity-0" id="tab-multi-two" type="checkbox" name="tabs">
                      <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-two">Contact Details</label>
                      <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Mobile Number
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentcontact))
                                            No record
                                        @else
                                            @if (is_null($info->studentcontact->mobilenumber))
                                                No Record
                                            @else
                                                {{ $info->studentcontact->mobilenumber }}
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Telephone Number
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentcontact))
                                            No record
                                        @else
                                            @if (is_null($info->studentcontact->telephonenumber))
                                                No Record
                                            @else
                                                {{ $info->studentcontact->telephonenumber }}
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Residential Address
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentcontact))
                                            No record
                                        @else
                                            @if (is_null($info->studentcontact->res_street))
                                                
                                            @else
                                                {{ $info->studentcontact->res_street }},&nbsp;
                                            @endif
                                            {{ $info->studentcontact->res_brgy }},&nbsp;{{ $info->studentcontact->res_city }},&nbsp;{{ $info->studentcontact->res_province }}&nbsp;{{ $info->studentcontact->res_zip }}
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Permanent Address
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentcontact))
                                            No record
                                        @else
                                            @if ($info->studentcontact->is_permanent == '1')
                                                Same as Residential Address
                                            @else
                                                @if (is_null($info->studentcontact->per_street))
                                                    
                                                @else
                                                    {{ $info->studentcontact->per_street }},&nbsp;
                                                @endif
                                                {{ $info->studentcontact->per_brgy }},&nbsp;{{ $info->studentcontact->per_city }},&nbsp;{{ $info->studentcontact->per_province }}&nbsp;{{ $info->studentcontact->per_zip }}
                                            @endif
                                        @endif
                                    </p>
                                </div>
                      </div>
                   </div>
                   
          <div class="tab w-full overflow-hidden border-t">
            <input class="absolute opacity-0" id="tab-multi-six" type="checkbox" name="tabs">
            <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-six">Family Background</label>
            <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">

                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0" id="tab-multi-three" type="checkbox" name="tabs">
                    <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-three">Father's Information</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">
                                  <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                      <p class="sm:text-base text-xs text-gray-600">
                                          Father's Name
                                      </p>
                                      <p class="sm:text-base text-xs">
                                          @if (is_null($info->studentfamily))
                                              No record
                                          @else                    
                                              {{ $info->studentfamily->father_lname}},&nbsp;{{ $info->studentfamily->father_fname}} 
                                              @if (!is_null($info->studentfamily->father_mname)){{$info->studentfamily->father_mname}}@endif 
                                          @endif
                                      </p>
                                  </div>
                                  <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                      <p class="sm:text-base text-xs text-gray-600">
                                          Father's Age
                                      </p>
                                      <p class="sm:text-base text-xs">
                                          @if (is_null($info->studentfamily))
                                              No record
                                          @else                    
                                              @if (is_null($info->studentfamily->father_age))
                                                  No Record
                                              @else
                                                  {{ $info->studentfamily->father_age }}
                                              @endif
                                          @endif
                                      </p>
                                  </div>
                                  <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                      <p class="sm:text-base text-xs text-gray-600">
                                          Father's Occupation
                                      </p>
                                      <p class="sm:text-base text-xs">
                                          @if (is_null($info->studentfamily))
                                              No record
                                          @else                    
                                              @if (is_null($info->studentfamily->father_occup))
                                                  No Record
                                              @else
                                                  {{ $info->studentfamily->father_occup }}
                                              @endif
                                          @endif
                                      </p>
                                  </div>
                                  <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                      <p class="sm:text-base text-xs text-gray-600">
                                          Father's Address
                                      </p>
                                      <p class="sm:text-base text-xs">
                                          @if (is_null($info->studentfamily))
                                              No record
                                          @else                    
                                              @if (is_null($info->studentfamily->father_address))
                                                  No Record
                                              @else
                                                  {{ $info->studentfamily->father_address }}
                                              @endif
                                          @endif
                                      </p>
                                  </div>
                                  <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                      <p class="sm:text-base text-xs text-gray-600">
                                          Father's Mobile Number
                                      </p>
                                      <p class="sm:text-base text-xs">
                                          @if (is_null($info->studentfamily))
                                              No record
                                          @else                    
                                              @if (is_null($info->studentfamily->father_mobile))
                                                  No Record
                                              @else
                                                  {{ $info->studentfamily->father_mobile }}
                                              @endif
                                          @endif
                                      </p>
                                  </div>

                    </div>
              </div>
              <div class="tab w-full overflow-hidden border-t">
                  <input class="absolute opacity-0" id="tab-multi-four" type="checkbox" name="tabs">
                  <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-four">Mother's Information</label>
                  <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">
                      <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                          <p class="sm:text-base text-xs text-gray-600">
                              Mother's Name
                          </p>
                          <p class="sm:text-base text-xs">
                              @if (is_null($info->studentfamily))
                                  No record
                              @else                    
                                  {{ $info->studentfamily->mother_lname}},&nbsp;{{ $info->studentfamily->mother_fname}} 
                                  @if (!is_null($info->studentfamily->mother_mname)){{$info->studentfamily->mother_mname}}@endif 
                              @endif
                          </p>
                      </div>
                      <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                          <p class="sm:text-base text-xs text-gray-600">
                              Mother's Age
                          </p>
                          <p class="sm:text-base text-xs">
                              @if (is_null($info->studentfamily))
                                  No record
                              @else                    
                                  @if (is_null($info->studentfamily->mother_age))
                                      No Record
                                  @else
                                      {{ $info->studentfamily->mother_age }}
                                  @endif
                              @endif
                          </p>
                      </div>
                      <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                          <p class="sm:text-base text-xs text-gray-600">
                              Mother's Occupation
                          </p>
                          <p class="sm:text-base text-xs">
                              @if (is_null($info->studentfamily))
                                  No record
                              @else                    
                                  @if (is_null($info->studentfamily->mother_occup))
                                      No Record
                                  @else
                                      {{ $info->studentfamily->mother_occup }}
                                  @endif
                              @endif
                          </p>
                      </div>
                      <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                          <p class="sm:text-base text-xs text-gray-600">
                              Mother's Address
                          </p>
                          <p class="sm:text-base text-xs">
                              @if (is_null($info->studentfamily))
                                  No record
                              @else                    
                                  @if (is_null($info->studentfamily->mother_address))
                                      No Record
                                  @else
                                      {{ $info->studentfamily->mother_address }}
                                  @endif
                              @endif
                          </p>
                      </div>
                      <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                          <p class="sm:text-base text-xs text-gray-600">
                              Mother's Mobile Number
                          </p>
                          <p class="sm:text-base text-xs">
                              @if (is_null($info->studentfamily))
                                  No record
                              @else                    
                                  @if (is_null($info->studentfamily->mother_mobile))
                                      No Record
                                  @else
                                      {{ $info->studentfamily->mother_mobile }}
                                  @endif
                              @endif
                          </p>
                      </div>
                  
                  </div>
            </div>
            <div class="tab w-full overflow-hidden border-t">
              <input class="absolute opacity-0" id="tab-multi-five" type="checkbox" name="tabs">
              <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-five">Guardian's Information</label>
              <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">
                  <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                      <p class="sm:text-base text-xs text-gray-600">
                          Guardian
                      </p>
                      <p class="sm:text-base text-xs">
                          @if (is_null($info->studentfamily))
                              No record
                          @else                    
                              @if ($info->studentfamily->guardianOption == "3")
                                  {{ $info->studentfamily->guardian_rel }}
                              @elseif($info->studentfamily->guardianOption == "2")
                                  Mother
                              @elseif($info->studentfamily->guardianOption == "1")
                                  Father
                              @endif
                          @endif
                      </p>
                  </div>
                  @if (is_null($info->studentfamily))
                              
                          @else                    
                              @if ($info->studentfamily->guardianOption == "3")
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Guardian's Name
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentfamily))
                                                No record
                                            @else                    
                                                @if ($info->studentfamily->guardianOption == "3")                   
                                                    {{ $info->studentfamily->guardian_lname}},&nbsp;{{ $info->studentfamily->guardian_fname}} 
                                                    @if (!is_null($info->studentfamily->guardian_mname)){{$info->studentfamily->guardian_mname}}@endif 
                                                @elseif($info->studentfamily->guardianOption == "2")
                                                    Mother
                                                @elseif($info->studentfamily->guardianOption == "1")
                                                    Father
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Guardian's Age
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentfamily))
                                                No record
                                            @else                    
                                                @if ($info->studentfamily->guardianOption == "3")
                                                        @if (is_null($info->studentfamily->guardian_age))
                                                        No Record
                                                        @else
                                                            {{ $info->studentfamily->guardian_age }}
                                                        @endif
                                                @elseif($info->studentfamily->guardianOption == "2")
                                                    Mother
                                                @elseif($info->studentfamily->guardianOption == "1")
                                                    Father
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Guardian's Occupation
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentfamily))
                                                No record
                                            @else                    
                                                @if ($info->studentfamily->guardianOption == "3")
                                                        @if (is_null($info->studentfamily->guardian_occup))
                                                        No Record
                                                        @else
                                                            {{ $info->studentfamily->guardian_occup }}
                                                        @endif
                                                @elseif($info->studentfamily->guardianOption == "2")
                                                    Mother
                                                @elseif($info->studentfamily->guardianOption == "1")
                                                    Father
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Guardian's Address
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentfamily))
                                                No record
                                            @else                    
                                                @if ($info->studentfamily->guardianOption == "3")
                                                        @if (is_null($info->studentfamily->guardian_address))
                                                        No Record
                                                        @else
                                                            {{ $info->studentfamily->guardian_address }}
                                                        @endif
                                                @elseif($info->studentfamily->guardianOption == "2")
                                                    Mother
                                                @elseif($info->studentfamily->guardianOption == "1")
                                                    Father
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Guardian's Mobile Number
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentfamily))
                                                No record
                                            @else                    
                                                @if ($info->studentfamily->guardianOption == "3")
                                                        @if (is_null($info->studentfamily->guardian_mobile))
                                                        No Record
                                                        @else
                                                            {{ $info->studentfamily->guardian_mobile }}
                                                        @endif
                                                @elseif($info->studentfamily->guardianOption == "2")
                                                    Mother
                                                @elseif($info->studentfamily->guardianOption == "1")
                                                    Father
                                                @endif
                                            @endif
                                        </p>
                                    </div>

                              @endif
                          @endif
                  
                  
              </div>
        </div>

        
            </div>
      </div>
                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0" id="tab-multi-seven" type="checkbox" name="tabs">
                    <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-seven">Additional Information</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">     
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Chosen Beneficiary
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                                No record
                                        @else   
                                                @if ($info->studentadditional->insuranceOption == "1")
                                                    Parents&sol;Guardian
                                                @elseif  ($info->studentadditional->insuranceOption == "2")
                                                    Other
                                                @endif
                                        @endif
                                    </p>
                                </div>  
                                @if (is_null($info->studentadditional))
                                                
                                @else   
                                        @if ($info->studentadditional->insuranceOption == "2")
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Beneficiary Name
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentadditional))
                                                        No record
                                                    @else 
                                                        {{ $info->studentadditional->insurance_lname}},&nbsp;{{ $info->studentadditional->insurance_fname}} 
                                                        @if (!is_null($info->studentadditional->insurance_mname)){{$info->studentadditional->insurance_mname}}@endif
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Beneficiary Address
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentadditional))
                                                        No record
                                                    @else 
                                                        @if (is_null($info->studentadditional->insurance_address))
                                                            No record
                                                        @else
                                                            {{ $info->studentadditional->insurance_address }}
                                                        @endif
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Beneficiary Contact Number
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentadditional))
                                                        No record
                                                    @else 
                                                        @if (is_null($info->studentadditional->insurance_mobile))
                                                            No record
                                                        @else
                                                            {{ $info->studentadditional->insurance_mobile }}
                                                        @endif
                                                    @endif
                                                </p>
                                            </div>
                                        @endif
                                @endif
                                
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Civil Status
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                             No record
                                        @else 
                                            {{$info->studentadditional->civilstatus}}
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Citizenship
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                            No record
                                        @else 
                                            {{$info->studentadditional->citizenship}}
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Religion
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                            No record
                                        @else 
                                            {{$info->studentadditional->religion}}
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Student with Special Needs?
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                            No record
                                        @else 
                                            @if ($info->studentadditional->specialOption == "1")
                                                Yes
                                            @elseif($info->studentadditional->specialOption == "2")
                                                No
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Disability
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                            No record
                                        @else 
                                            @if ($info->studentadditional->specialOption == "1")
                                                {{ $info->studentadditional->specialdisability }}
                                            @elseif($info->studentadditional->specialOption == "2")
                                                Not Applicable
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                        Is an Indigenous Person?
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                            No record
                                        @else 
                                            @if ($info->studentadditional->indigenousRadio == "1")
                                                Yes
                                            @elseif($info->studentadditional->indigenousRadio == "2")
                                                No
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                       Minority Group
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentadditional))
                                        No record
                                    @else 
                                        @if ($info->studentadditional->indigenousRadio == "1")
                                            {{ $info->studentadditional->indigenousminority }}
                                        @elseif($info->studentadditional->indigenousRadio == "2")
                                            Not Applicable
                                        @endif
                                    @endif
                                    </p>
                                </div>
                    </div>
              </div>
              <div class="tab w-full overflow-hidden border-t">
                <input class="absolute opacity-0" id="tab-multi-eight" type="checkbox" name="tabs">
                <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-eight">Educational Background (Part 1)</label>
                <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">                           
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="sm:text-base text-xs text-gray-600">
                                       Learner's Reference Number (LRN)
                                    </p>
                                    <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentschoolone))
                                        No record
                                        @else 
                                            {{$info->studentschoolone->lrn}}
                                        @endif
                                    </p>
                                </div>
                    
                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-multi-nine" type="checkbox" name="tabs">
                        <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-nine">Primary (Elementary)</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">                           
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            School Name
                                        </p>
                                        <p class="sm:text-base text-xs">                                     
                                            @if (is_null($info->studentschoolone))
                                            No record
                                            @else 
                                                {{$info->studentschoolone->elemSchool}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Year Attended
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentschoolone))
                                            No record
                                            @else 
                                                {{$info->studentschoolone->elemAttended}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Year Graduated
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentschoolone))
                                            No record
                                            @else 
                                                {{$info->studentschoolone->elemGraduated}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Honor(s) Received
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentschoolone))
                                            No record
                                            @else 
                                                @if (is_null($info->studentschoolone->elemHonor))
                                                    None
                                                @else
                                                    {{$info->studentschoolone->elemHonor}}
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-ten" type="checkbox" name="tabs">
                            <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-ten">Secondary (Junior Highschool)</label>
                            <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">                           
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                School Name
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschoolone))
                                                No record
                                                @else 
                                                    {{$info->studentschoolone->juniorSchool}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Year Attended
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschoolone))
                                                No record
                                                @else 
                                                    {{$info->studentschoolone->juniorAttended}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Year Graduated
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschoolone))
                                                No record
                                                @else 
                                                    {{$info->studentschoolone->juniorGraduated}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Honor(s) Received
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschoolone))
                                                No record
                                                @else 
                                                    @if (is_null($info->studentschoolone->juniorHonor))
                                                        None
                                                    @else
                                                        {{$info->studentschoolone->juniorHonor}}
                                                    @endif
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                            </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-eleven" type="checkbox" name="tabs">
                            <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-eleven">Secondary (Senior Highschool)</label>
                            <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">                           
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                School Name
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo))
                                                No record
                                                @else 
                                                    {{$info->studentschooltwo->seniorSchool}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Track and Strand
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo))
                                                No record
                                                @else 
                                                    {{$track[$info->studentschooltwo->seniorStrand]}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Year Attended
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo))
                                                No record
                                                @else 
                                                    {{$info->studentschooltwo->seniorAttended}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Year Graduated
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo))
                                                No record
                                                @else 
                                                    {{$info->studentschooltwo->seniorGraduated}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Honor(s) Received
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo))
                                                No record
                                                @else 
                                                    @if (is_null($info->studentschooltwo->seniorHonor))
                                                        None
                                                    @else
                                                        {{$info->studentschooltwo->seniorHonor}}
                                                    @endif
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                            </div>
                </div>
              </div>

              <div class="tab w-full overflow-hidden border-t">
                <input class="absolute opacity-0" id="tab-multi-seventeen" type="checkbox" name="tabs">
                <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-seventeen">Educational Background (Part 2)</label>
                <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-multi-twelve" type="checkbox" name="tabs">
                        <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-twelve">Vocational&sol;Trade Course</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">     
                                    @if (is_null($info->studentschooltwo))
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Vocational
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                No record
                                            </p>
                                        </div>
                                     @else  
                                        @if (is_null($info->studentschooltwo->vocationalCheck))
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Vocational
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    Not Applicable
                                                </p>
                                            </div>
                                        @else
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    School Name
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    {{ $info->studentschooltwo->vocationalSchool }}
                                                </p>
                                            </div>
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Course
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentschooltwo->vocationalCourse))
                                                        No record
                                                    @else 
                                                        {{$info->studentschooltwo->vocationalCourse}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Units
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentschooltwo->vocationalUnits))
                                                        No record
                                                    @else 
                                                        {{$info->studentschooltwo->vocationalUnits}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Year Attended
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentschooltwo->vocationalAttended))
                                                        No record
                                                    @else 
                                                        {{$info->studentschooltwo->vocationalAttended}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    @if (is_null($info->studentschooltwo->vocationalOptiongrad))
                                                    Year Graduated
                                                    @else 
                                                        @if (is_null($info->studentschooltwo->vocationalOptiongrad == "2"))
                                                            Year Graduated
                                                        @else 
                                                            Year Stopped
                                                        @endif
                                                    @endif
                                                    
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentschooltwo->vocationalGraduated))
                                                        No record
                                                    @else 
                                                        {{$info->studentschooltwo->vocationalGraduated}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                                <p class="sm:text-base text-xs text-gray-600">
                                                    Honor(s) Received
                                                </p>
                                                <p class="sm:text-base text-xs">
                                                    @if (is_null($info->studentschooltwo->vocationalHonor))
                                                        None
                                                    @else 
                                                        {{$info->studentschooltwo->vocationalHonor}}
                                                    @endif
                                                </p>
                                            </div>
                                        @endif                                                            
                                    @endif
                                </div>
                        </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-multi-thirteen" type="checkbox" name="tabs">
                        <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-thirteen">Tertiary (College)</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">                           
                            @if (is_null($info->studentschooltwo))
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            College
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            No record
                                        </p>
                                    </div>
                                @else  
                                    @if (is_null($info->studentschooltwo->collegeCheck))
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                College
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                Not Applicable
                                            </p>
                                        </div>
                                    @else
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            School Name
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            {{ $info->studentschooltwo->collegeSchool }}
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Course
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentschooltwo->collegeCourse))
                                                No record
                                            @else 
                                                {{$info->studentschooltwo->collegeCourse}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Units
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentschooltwo->collegeUnits))
                                                No record
                                            @else 
                                                {{$info->studentschooltwo->collegeUnits}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Year Attended
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentschooltwo->collegeAttended))
                                                No record
                                            @else 
                                                {{$info->studentschooltwo->collegeAttended}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            @if (is_null($info->studentschooltwo->collegeOptiongrad))
                                                Year Graduated
                                            @else
                                                @if ($info->studentschooltwo->collegeOptiongrad == "2")
                                                    Year Graduated
                                                @else 
                                                    Year Stopped
                                                @endif
                                            @endif
                                        </p>
                                        <p class="sm:text-base text-xs">
                                        @if (is_null($info->studentschooltwo->collegeGraduated))
                                            No record
                                        @else 
                                            {{$info->studentschooltwo->collegeGraduated}}
                                        @endif
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Honor(s) Received
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            @if (is_null($info->studentschooltwo->collegeHonor))
                                            None
                                            @else 
                                                {{$info->studentschooltwo->collegeHonor}}
                                            @endif
                                        </p>
                                    </div>
                                    @endif                                                            
                                @endif
                                </div>
                        </div>
                        

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-multi-fourteen" type="checkbox" name="tabs">
                        <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-fourteen">Transferred From other College</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">                           
                            @if (is_null($info->studentschooltwo))
                                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                        <p class="sm:text-base text-xs text-gray-600">
                                            Transferred
                                        </p>
                                        <p class="sm:text-base text-xs">
                                            No record
                                        </p>
                                    </div>
                                @else  
                                    @if (is_null($info->studentschooltwo->transferCheck))
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Transferred
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                Not Applicable
                                            </p>
                                        </div>
                                    @else
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                School Name
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                {{$info->studentschooltwo->transferSchool}}
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Course
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo->transferCourse))
                                                No record
                                                @else 
                                                    {{$info->studentschooltwo->transferCourse}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Units
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo->transferUnits))
                                                No record
                                                @else 
                                                    {{$info->studentschooltwo->transferUnits}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Year Attended
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo->transferAttended))
                                                No record
                                                @else 
                                                    {{$info->studentschooltwo->transferAttended}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                            <p class="sm:text-base text-xs text-gray-600">
                                                Year Transferred
                                            </p>
                                            <p class="sm:text-base text-xs">
                                                @if (is_null($info->studentschooltwo->transferTransferred))
                                                No record
                                                @else 
                                                    {{$info->studentschooltwo->transferTransferred}}
                                                @endif
                                            </p>
                                        </div>                                            
                                    @endif                                                            
                                @endif
                                </div>
                        </div>
                
                </div>
            </div>
                

              <div class="tab w-full overflow-hidden border-t">
                <input class="absolute opacity-0" id="tab-multi-fifteen" type="checkbox" name="tabs">
                <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-fifteen">Course&sol;Subjects Enrolled</label>
                <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Course
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (!is_null($getcourse))
                                        {{ $getcourse->coursebelong->course_desc }}
                                    @else
                                        No record
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Section
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (!is_null($getcourse))
                                        {{$getcourse->section}}
                                    @else
                                        No record
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Student Type
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (!is_null($studtype))
                                        @if ($studtype->pivot->studtype == 'reg')
                                            Regular Student
                                        @elseif($studtype->pivot->studtype == 'irreg')
                                            Irregular Student
                                        @endif 
                                    @else
                                        No record
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Number of Subjects Enrolled
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (!is_null($getsubject))
                                        {{count($getsubject)}} Subject(s)
                                    @else
                                    No record
                                    @endif
                                </p>
                            </div>
                            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="sm:text-base text-xs text-gray-600">
                                    Total Units
                                </p>
                                <p class="sm:text-base text-xs">
                                    @if (!$getsubject->isEmpty())
                                    @foreach ($getsubject as $subject)
                                        <?php
                                        $unitstotal += $subject->subject_units;
                                        ?>
                                    @endforeach
                                    {{$unitstotal}}
                                    @else
                                    No record
                                    @endif
                                </p>
                            </div>
                </div>
          </div>
         </div>            
        </div>
    </div>  
</div>
</div>

<div class="px-3 py-5">
    <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
        <div class="p-4 border-b">
            <h2 class="sm:text-2xl text-s font-semibold">
                Downloadables
            </h2>
            <p class="sm:text-sm text-xs text-gray-500">
                
            </p>
        </div>


        

        <div class="tab w-full overflow-hidden border-t">
            <div class="lg:w-full md:w-5/5 sm:w-4/5 mx-auto p-8">
                <div class="shadow-md">
            <input class="absolute opacity-0" id="tab-multi-sixteen" type="checkbox" name="tabs">
            <label class="sm:text-base text-xs block p-5 leading-normal cursor-pointer" for="tab-multi-sixteen">Personal Documents</label>
            <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-gray-500 leading-normal">
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                            <p class="sm:text-base text-xs text-gray-600">
                                Profile Summary
                            </p>
                            <div class="space-y-2">
                                    <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                                        <div class="space-x-2 truncate">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24"><path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z"/></svg>
                                            <span class="sm:text-base text-xs">
                                                MIS Form
                                            </span>
                                        </div>
                                        <a href="{{ route('profilepdf') }}" class="sm:text-base text-xs text-purple-700 hover:underline">
                                            Download
                                        </a>
                                    </div>
                                </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                            <p class="sm:text-base text-xs text-gray-600">
                                Subjects
                            </p>
                            <div class="space-y-2">
                                <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                                    <div class="space-x-2 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24"><path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z"/></svg>
                                        <span class="sm:text-base text-xs">
                                            Certificate of Registration (COR)
                                        </span>
                                    </div>
                                    <a href="{{ route('corpdf') }}" class="sm:text-base text-xs text-purple-700 hover:underline">
                                        Download
                                    </a>
                                </div>
            
                                <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                                    <div class="space-x-2 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24"><path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z"/></svg>
                                        <span class="sm:text-base text-xs">
                                            My Schedule
                                        </span>
                                    </div>
                                    <a href="{{ route('schedpdf') }}" class="sm:text-base text-xs text-purple-700 hover:underline">
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>    
                </div>
            </div>

    </div>
</div>   

<style>
    /* Tab content - closed */
    .tab-content {
    max-height: 0;
    -webkit-transition: max-height .35s;
    -o-transition: max-height .35s;
    transition: max-height .35s;
    }
    /* :checked - resize to full height */
    .tab input:checked ~ .tab-content {
    max-height: 100vh;
    }
    /* Label formatting when open */
    .tab input:checked + label{
    /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
    font-size: 1.25rem; /*.text-xl*/
    padding: 1.25rem; /*.p-5*/
    border-left-width: 2px; /*.border-l-2*/
    border-color: #1eafaf; /*.border-indigo*/
    background-color: #1eafaf; /*.bg-gray-100 */
    color: #ffffff; /*.text-indigo*/
    }
    /* Icon */
    .tab label::after {
    float:right;
    right: 0;
    top: 0;
    display: block;
    width: 1.5em;
    height: 1.5em;
    line-height: 1.5;
    font-size: 1.25rem;
    text-align: center;
    -webkit-transition: all .35s;
    -o-transition: all .35s;
    transition: all .35s;
    }
    /* Icon formatting - closed */
    .tab input[type=checkbox] + label::after {
    content: "+";
    font-weight:bold; /*.font-bold*/
    border-width: 1px; /*.border*/
    border-radius: 9999px; /*.rounded-full */
    border-color: #292929; /*.border-grey*/
    }
    .tab input[type=radio] + label::after {
    content: "\25BE";
    font-weight:bold; /*.font-bold*/
    border-width: 1px; /*.border*/
    border-radius: 9999px; /*.rounded-full */
    border-color: #333333; /*.border-grey*/
    }
    /* Icon formatting - open */
    .tab input[type=checkbox]:checked + label::after {
    transform: rotate(315deg);
    background-color: #98cdd4; /*.bg-indigo*/
    color: #041313; /*.text-grey-lightest*/
    }
    .tab input[type=radio]:checked + label::after {
    transform: rotateX(180deg);
    background-color: #313131; /*.bg-indigo*/
    color: #9fa0a0; /*.text-grey-lightest*/
    }
 </style>
@endsection