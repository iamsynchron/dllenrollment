@extends('layouts.app')

@section('title', 'Form 6 (Update)')

@section('content')
<div class="px-3 py-5">
  <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
      <div class="p-4 border-b">
          <h2 class="sm:text-2xl text-s font-semibold">
            Educational Background (Part 2 - Update)
          </h2>
          <p class="sm:text-sm text-xs text-gray-500">
            Enrollment Form 6 of 6
          </p>
      </div>  
      <div class="p-4 border-b">
        

{!! Form::open(['method' => 'POST', 'route' => 'updateeductwo']) !!}
   
@method('PUT')

   <div class="sm:text-xl text-sm  font-bold leading-normal text-center text-blueGray-800 mt-7">
            Senior High School
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Secondary
        </p>

        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('juniorSchoollabel', 'Complete School Name<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('seniorSchool') border-red-500 @enderror">
                {{ Form::text('seniorSchool', '', ['placeholder' => 'School Name', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>          
            @error('seniorSchool')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror 
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('seniorTracklabel', 'Track and Strand<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('seniorTrack') border-red-500 @enderror">
                {{ Form::select('seniorTrack', $tracklist, null,['class'=>'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll', 'placeholder' => 'Select Track and Strand']) }} </div>
            @error('seniorTrack')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror 
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('seniorAttendedlabel', 'Year of Attendance<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('seniorAttendance') border-red-500 @enderror">
                {{ Form::selectYear('seniorAttendance', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, null, ['placeholder' => 'Year Attended', 'class' => 'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
            @error('seniorAttendance')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror 
            </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('seniorGraduatelabel', 'Year Graduated<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('seniorGraduate') border-red-500 @enderror">
            {{ Form::selectYear('seniorGraduate', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, null, ['placeholder' => 'Year Graduated', 'class' => 'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
            @error('seniorGraduate')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror 
        </div>
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('seniorHonorlabel', 'Honor(s) Received', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('seniorHonor', '', ['placeholder' => 'Leave blank if none', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
            
            </div>
        </div>
















        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
        Vocational
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Trade Course
        </p>

        <div>
        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            
            <div class="bg-white my-2 p-1 flex svelte-1l8159u">
            <div class="flex items-center">
                <div class="mx-1">  {{ Form::checkbox('vocationalCheck', '1', false,[old('vocationalCheck') == '1' ? 'checked' : '', 'onclick' => 'checkVocational(this)', 'class' => 'h-4 w-4 text-gray-800']) }} </div>
                <div class="mb-1"> {{ Form::label('vocationalChecklabel', 'Press checkbox if applicable', ['class' => 'font-bold text-blue-600 text-xs leading-8 uppercase']) }} </div>
                </div>
            </div>
        </div>       
        </div>

        <div class="vochide flex flex-col md:flex-row  {{ empty(old('vocationalCheck')) ? 'hidden' : (old('vocationalCheck') == '1' ? '' : 'hidden') }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('vocationalSchoollabel', 'Complete School Name<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('vocationalSchool') border-red-500 @enderror">
            {{ Form::text('vocationalSchool', '', [empty(old('vocationalCheck')) ? 'readonly' : (old('vocationalCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'School Name', 'class' => 'vocational sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('vocationalCheck')) ? ' bg-gray-200' : (old('vocationalCheck') == '1' ? '' : ' bg-gray-200'))]) }} </div>
            @error('vocationalSchool')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <div class="vochide flex flex-col md:flex-row  {{ empty(old('vocationalCheck')) ? 'hidden' : (old('vocationalCheck') == '1' ? '' : 'hidden') }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('vocationalCourselabel', 'Course (Complete if possible)', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('vocationalCourse', '', [empty(old('vocationalCheck')) ? 'readonly' : (old('vocationalCheck') == '1' ? '' : 'readonly'),'placeholder' => 'Course', 'class' => 'vocational sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('vocationalCheck')) ? ' bg-gray-200' : (old('vocationalCheck') == '1' ? '' : ' bg-gray-200'))]) }} </div>
            </div>
        </div>


        <div class="vochide flex flex-col md:flex-row  {{ empty(old('vocationalCheck')) ? 'hidden' : (old('vocationalCheck') == '1' ? '' : 'hidden') }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('vocationalGraduatedlabel', 'Graduated?<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
                <div class="flex items-center">
                <div class="mx-1"> {{ Form::radio('vocationalGraduated', '1', true, [old('vocationalGraduated') == '1' ? 'checked' : '', 'onclick' => 'gradDisable(this)' ,empty(old('vocationalCheck')) ? 'disabled' : (old('vocationalCheck') == '1' ? '' : 'disabled'), 'id' => 'vocYes','class' => 'vocationaloption h-4 w-4 text-gray-700']) }} </div>
                <div class="mb-1"> {{ Form::label('vocationalYes', 'Yes', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                </div>
                <div class="flex items-center">
                    <div class="mx-1"> {{ Form::radio('vocationalGraduated', '2', false, [old('vocationalGraduated') == '2' ? 'checked' : '','onclick' => 'gradDisable(this)' ,empty(old('vocationalCheck')) ? 'disabled' : (old('vocationalCheck') == '1' ? '' : 'disabled'), 'id' => 'vocNo','class' => 'vocationaloption h-4 w-4 text-gray-700']) }} </div>
                    <div class="mb-1"> {{ Form::label('vocationalNo', 'No', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                </div>
                </div>          
            </div>

            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('vocationalUnitslabel', 'Highest level/Units Earned (If not graduated)<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('vocationalUnits') border-red-500 @enderror">
                {{ Form::text('vocationalUnits', '', [empty(old('vocationalCheck')) ? 'readonly' : (old('vocationalCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'Highest Level', 'class' => 'vocational sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('vocationalCheck')) ? ' bg-gray-200' : (old('vocationalCheck') == '1' ? '' : ' bg-gray-200'))]) }} </div>
                @error('vocationalUnits')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <div class="vochide flex flex-col md:flex-row  {{ empty(old('vocationalCheck')) ? 'hidden' : (old('vocationalCheck') == '1' ? '' : 'hidden') }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('seniorAttendedlabel', 'Year of Attendance<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('vocationalAttendance') border-red-500 @enderror">
            {{ Form::selectYear('vocationalAttendance', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, [empty(old('vocationalCheck')) ? 'disabled' : (old('vocationalCheck') == '1' ? '' : 'disabled'), 'class' => 'vocationaloption vocselect sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
        @error('vocationalAttendance')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('vocationalGraduatelabel', (empty(old('vocationalGraduated')) ? 'Year Graduated' : (old('vocationalGraduated') == '1' ? 'Year Graduated' : 'Year Stopped')).' <span class="text-red-600"> *</span>', ['id' => 'vocationalGraduatelabel', 'class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('vocationalGraduate') border-red-500 @enderror">
        {{ Form::selectYear('vocationalGraduate', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, [empty(old('vocationalCheck')) ? 'disabled' : (old('vocationalCheck') == '1' ? '' : 'disabled'), 'class' => 'vocationalgrad vocationaloption vocselect sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
        @error('vocationalGraduate')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>
        </div>

        <div class="vochide flex flex-col md:flex-row  {{ empty(old('vocationalCheck')) ? 'hidden' : (old('vocationalCheck') == '1' ? '' : 'hidden') }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {{ Form::label('vocationalHonorlabel', 'Honor(s) Received', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('vocationalHonor', '', [empty(old('vocationalCheck')) ? 'readonly' : (old('vocationalCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'Highest level', 'class' => 'vocational sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('vocationalCheck')) ? ' bg-gray-200' : (old('vocationalCheck') == '1' ? '' : ' bg-gray-200'))]) }} </div>
        </div>
        </div>
        </div>



























            <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
            College
            </div>
            <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
                Tertiary
            </p>
        
            <div>
            <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                
                <div class="bg-white my-2 p-1 flex svelte-1l8159u">
                <div class="flex items-center">
                    <div class="mx-1">  {{ Form::checkbox('collegeCheck', '1', false,[old('collegeCheck') == '1' ? 'checked' : '', 'onclick' => 'checkCollege(this)', 'class' => 'h-4 w-4 text-gray-800']) }} </div>
                    <div class="mb-1"> {{ Form::label('collegeChecklabel', 'Press checkbox if applicable', ['class' => 'font-bold text-blue-600 text-xs leading-8 uppercase']) }} </div>
                    </div>
                </div>
            </div>       
        </div>

            <div class="colhide flex flex-col md:flex-row  {{ empty(old('collegeCheck')) ? 'hidden' : (old('collegeCheck') == '1' ? '' : 'hidden') }}">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {!! Html::decode(Form::label('collegeSchoollabel', 'Complete School Name<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('collegeSchool') border-red-500 @enderror">
                {{ Form::text('collegeSchool', '', [empty(old('collegeCheck')) ? 'readonly' : (old('collegeCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'School Name', 'class' => 'college sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('collegeCheck')) ? ' bg-gray-200' : (old('collegeCheck') == '1' ? '' : ' bg-gray-200')) ]) }} </div>
                @error('collegeSchool')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                </div>
            </div>

            <div class="colhide flex flex-col md:flex-row  {{ empty(old('collegeCheck')) ? 'hidden' : (old('collegeCheck') == '1' ? '' : 'hidden') }}">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {{ Form::label('collegeCourselabel', 'Course (Complete if possible)', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                {{ Form::text('collegeCourse', '', [empty(old('collegeCheck')) ? 'readonly' : (old('collegeCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'Course', 'class' => 'college sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('collegeCheck')) ? ' bg-gray-200' : (old('collegeCheck') == '1' ? '' : ' bg-gray-200'))]) }} </div>
                </div>
            </div>

            <div class="colhide flex flex-col md:flex-row  {{ empty(old('collegeCheck')) ? 'hidden' : (old('collegeCheck') == '1' ? '' : 'hidden') }}">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {!! Html::decode(Form::label('collegeGraduatedlabel', 'Graduated?<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                    <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
                    <div class="flex items-center">
                    <div class="mx-1"> {{ Form::radio('collegeGraduated', '1', true, [old('collegeGraduated') == '1' ? 'checked' : '', 'onclick' => 'gradDisable2(this)', empty(old('collegeCheck')) ? 'disabled' : (old('collegeCheck') == '1' ? '' : 'disabled'), 'id' => 'colYes','class' => 'collegeoption h-4 w-4 text-gray-700']) }} </div>
                    <div class="mb-1"> {{ Form::label('collegeYes', 'Yes', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                    </div>
                    <div class="flex items-center">
                        <div class="mx-1"> {{ Form::radio('collegeGraduated', '2', false, [old('collegeGraduated') == '2' ? 'checked' : '', 'onclick' => 'gradDisable2(this)' ,empty(old('collegeCheck')) ? 'disabled' : (old('collegeCheck') == '1' ? '' : 'disabled'), 'id' => 'colNo','class' => 'collegeoption h-4 w-4 text-gray-700']) }} </div>
                        <div class="mb-1"> {{ Form::label('collegeNo', 'No', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
                    </div>
                    </div>
                </div>

                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {!! Html::decode(Form::label('collegeUnitslabel', 'Highest level/Units Earned (If not graduated)<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('collegeUnits') border-red-500 @enderror">
                    {{ Form::text('collegeUnits', '', [empty(old('collegeCheck')) ? 'readonly' : (old('collegeCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'Highest level', 'class' => 'college sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('collegeCheck')) ? ' bg-gray-200' : (old('collegeCheck') == '1' ? '' : ' bg-gray-200')) ]) }} </div>
                @error('collegeUnits')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                </div>
            </div>

            <div class="colhide flex flex-col md:flex-row  {{ empty(old('collegeCheck')) ? 'hidden' : (old('collegeCheck') == '1' ? '' : 'hidden') }}">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {!! Html::decode(Form::label('collegeAttendedlabel', 'Year of Attendance<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('collegeAttendance') border-red-500 @enderror">
                {{ Form::selectYear('collegeAttendance', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, [empty(old('collegeCheck')) ? 'disabled' : (old('collegeCheck') == '1' ? '' : 'disabled'), 'class' => 'collegeoption colselect sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
            @error('collegeAttendance')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('collegeGraduatelabel', (empty(old('collegeGraduated')) ? 'Year Graduated' : (old('collegeGraduated') == '1' ? 'Year Graduated' : 'Year Stopped')).'<span class="text-red-600"> *</span>', ['id' => 'collegeGraduatelabel','class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('collegeGraduate') border-red-500 @enderror">
            {{ Form::selectYear('collegeGraduate', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->year, [empty(old('collegeCheck')) ? 'disabled' : (old('collegeCheck') == '1' ? '' : 'disabled'), 'class' => 'collegegrad collegeoption colselect sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
            @error('collegeGraduate')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        </div>

        <div class="colhide flex flex-col md:flex-row  {{ empty(old('collegeCheck')) ? 'hidden' : (old('collegeCheck') == '1' ? '' : 'hidden') }}">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('collegeHonorlabel', 'Honor(s) Received', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                {{ Form::text('collegeHonor', '', [empty(old('collegeCheck')) ? 'readonly' : (old('collegeCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'Leave blank if none', 'class' => 'college sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('collegeCheck')) ? ' bg-gray-200' : (old('collegeCheck') == '1' ? '' : ' bg-gray-200')) ]) }} </div>
            </div>
        </div>
            </div>













        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
        Transferred from other College (For TRANSFEREE only)
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Tertiary
        </p>

        <div>
        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            
            <div class="bg-white my-2 p-1 flex svelte-1l8159u">
            <div class="flex items-center">
                <div class="mx-1">  {{ Form::checkbox('transferCheck', '1', false,[old('transferCheck') == 'checked' ? '' : 'readonly', 'onclick' => 'checkTransfer(this)', 'class' => 'h-4 w-4 text-gray-800']) }} </div>
                <div class="mb-1"> {{ Form::label('transferChecklabel', 'Press checkbox if applicable', ['class' => 'font-bold text-blue-600 text-xs leading-8 uppercase']) }} </div>
                </div>
            </div>
        </div>       
        </div>

        <div class="tranhide flex flex-col md:flex-row  {{ empty(old('transferCheck')) ? 'hidden' : (old('transferCheck') == '1' ? '' : 'hidden') }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('transferSchoollabel', 'Complete School Name<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('transferSchool') border-red-500 @enderror">
            {{ Form::text('transferSchool', '', [empty(old('transferCheck')) ? 'readonly' : (old('transferCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'School Name', 'class' => 'transfer sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('transferCheck')) ? ' bg-gray-200' : (old('transferCheck') == '1' ? '' : ' bg-gray-200')) ]) }} </div>
            @error('transferSchool')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <div class="tranhide flex flex-col md:flex-row  {{ empty(old('transferCheck')) ? 'hidden' : (old('transferCheck') == '1' ? '' : 'hidden') }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('transferCourselabel', 'Course (Complete if possible)', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('transferCourse', '', [empty(old('transferCheck')) ? 'readonly' : (old('transferCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'Course', 'class' => 'transfer sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('transferCheck')) ? ' bg-gray-200' : (old('transferCheck') == '1' ? '' : ' bg-gray-200')) ]) }} </div>
            </div>

            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('transferUnitslabel', 'Highest level<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('transferUnits') border-red-500 @enderror">
                {{ Form::text('transferUnits', '', [empty(old('transferCheck')) ? 'readonly' : (old('transferCheck') == '1' ? '' : 'readonly'), 'placeholder' => 'Highest level', 'class' => 'transfer sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('transferCheck')) ? ' bg-gray-200' : (old('transferCheck') == '1' ? '' : ' bg-gray-200')) ]) }} </div>
            @error('transferUnits')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
        </div>

            <div class="tranhide flex flex-col md:flex-row  {{ empty(old('transferCheck')) ? 'hidden' : (old('transferCheck') == '1' ? '' : 'hidden') }}">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {!! Html::decode(Form::label('transferAttendedlabel', 'Year of Attendance<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('transferAttendance') border-red-500 @enderror">
                {{ Form::selectYear('transferAttendance', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, null, ['placeholder' => 'Year Attended', empty(old('transferCheck')) ? 'disabled' : (old('transferCheck') == '1' ? '' : 'disabled'), 'class' => 'transferoption transelect sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
            @error('transferAttendance')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('transferGraduatelabel', 'Year Transferred<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('transferLeft') border-red-500 @enderror">
            {{ Form::selectYear('transferLeft', \Carbon\Carbon::now()->year-70,\Carbon\Carbon::now()->year, null, ['placeholder' => 'Year Transferred', empty(old('transferCheck')) ? 'disabled' : (old('transferCheck') == '1' ? '' : 'disabled'), 'class' => 'transferoption transelect sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll']) }} </div>
         @error('transferLeft')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>
        </div>
        </div>

        
  </div>        
  <div class="p-4 border-b">
      <div class="py-2 px-2 flex justify-between">

        <a class="sm:text-sm text-xs bg-blue-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer" href="{{ route('studentinformation') }}">Back</a>             

          {{ Form::submit('Update', ['class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 

      </div> 

      {!! Form::close() !!}
</div>
</div>
</div>

<script>

    function checkVocational(checkbox){
        if (checkbox.checked)
        {   
            enableinputs("vocational");
            enableoption("vocationaloption");
            showinputs("vochide");
        }
        else{
            setRadio("vocYes");
            setSelect("vocselect");
            disableinputs("vocational");
            disableoption("vocationaloption");
            hideinputs("vochide");
        }
    }

    function checkCollege(checkbox){
        if (checkbox.checked)
        {   
            enableinputs("college");
            enableoption("collegeoption");
            showinputs("colhide");
        }
        else{
            setRadio("colYes");
            setSelect("colselect");
            disableinputs("college");
            disableoption("collegeoption");
            hideinputs("colhide");
        }
    }

    function checkTransfer(checkbox){
        if (checkbox.checked)
        {   
            enableinputs("transfer");
            enableoption("transferoption");
            showinputs("tranhide");
        }
        else{
            setSelect("transelect");
            disableinputs("transfer");
            disableoption("transferoption");
            hideinputs("tranhide");
        }
    }

    function gradDisable(radio){
        if(radio.value == "2"){
            disableGraduated("vocationalgrad");
            var x =document.getElementById('vocationalGraduatelabel');
            x.innerHTML = 'Year Stopped <span class="text-red-600"> *</span>';
            
        }
        else{
            enableGraduated("vocationalgrad");
            var x =document.getElementById('vocationalGraduatelabel');
            x.innerHTML = 'Year Graduated <span class="text-red-600"> *</span>';
        }
    }


    function gradDisable2(radio){
        if(radio.value == "2"){
            disableGraduated("collegegrad");
            var x =document.getElementById('collegeGraduatelabel');
            x.innerHTML = 'Year Stopped <span class="text-red-600"> *</span>';
            
        }
        else{
            enableGraduated("collegegrad");
            var x =document.getElementById('collegeGraduatelabel');
            x.innerHTML = 'Year Graduated <span class="text-red-600"> *</span>';
        }
    }

    function setRadio(a){
        var rad = document.getElementById(a);
        rad.checked = true;
    }

    function setSelect(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].selectedIndex = inputs[i].length -1;
            }
    }

    function disableGraduated(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].selectedIndex = inputs[i].length -1;
            }
    }

    function enableGraduated(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].selectedIndex = inputs[i].length -1;
            }
    }


    function enableoption(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].disabled = false;
            }
    }

    function disableoption(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].disabled = true;
            }
    }

    function enableoption(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].disabled = false;
            }
    }

    function disableinputs(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].readOnly = true;
            inputs[i].value = "";
            inputs[i].classList.add("bg-gray-200");
            }
    }

    function enableinputs(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].readOnly = false;
            inputs[i].classList.remove("bg-gray-200");
            }
    }
    
    function hideinputs(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].classList.add("hidden");
            }
    }
    function showinputs(a){
        var inputs = document.getElementsByClassName(a);
            var i;
            for (i = 0; i < inputs.length; i++) {
            inputs[i].classList.remove("hidden");
            }
    }

</script>

@endsection
