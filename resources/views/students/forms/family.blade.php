@extends('layouts.app')

@section('title', 'Form 3')

@section('content')
<div class="px-3 py-5">
  <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
      <div class="p-4 border-b">
          <h2 class="sm:text-2xl text-s font-semibold">
            Family Background
          </h2>
          <p class="sm:text-sm text-xs text-gray-500">
            Enrollment Form 3 of 6
          </p>
      </div>  
      <div class="p-4 border-b">
        

{!! Form::open(['method' => 'POST', 'route' => 'formsfamily']) !!}


        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
            Father's Information
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Complete if possible
        </p>
        
        <div x-data
        
        x-init="IMask(
            $refs.fatherageinput,
            {
                mask: Number,
                min: 1,
                max: 120
            });
            IMask(
            $refs.fathermobileinput,
            {
            mask: '{\\09}00-000-0000'
            });"    >
        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                
            <div class="bg-white my-2 p-1 flex svelte-1l8159u">
                <div class="flex items-center">
                    <div class="mx-1">  <input onclick="deceasedFather(this)" type="checkbox" value="1" name="fatherdeceasedCheck" class="h-4 w-4 text-gray-800" {{ old('fatherdeceasedCheck') == '1' ? 'checked' : '' }}> </div>
                    <div class="mb-1"> {{ Form::label('fatherdeceasedLabel', 'Deceased', ['class' => 'font-bold ml-2 text-gray-700 text-xs leading-8 uppercase']) }} </div>
                </div>
            </div>
            </div>       
        </div>
        
        {!! Html::decode(Form::label('fatherfullName', 'Father\'s Fullname <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
        
        <div class="flex flex-col md:flex-row">
            <div class="w-full flex-1 mx-2 svelte-1l8159u">
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('fatherLastName') border-red-500 @enderror">
                    {{ Form::text('fatherLastName', '', ['placeholder' => 'Father\'s Lastname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
                    @error('fatherLastName')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
            </div>
            <div class="w-full flex-1 mx-2 svelte-1l8159u">
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('fatherFirstName') border-red-500 @enderror">
                    {{ Form::text('fatherFirstName', '', ['placeholder' => 'Father\'s Firstname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
                    @error('fatherFirstName')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror 
            </div>
            <div class="w-full flex-1 mx-2 svelte-1l8159u">
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                    {{ Form::text('fatherMiddleName', '', ['placeholder' => 'Father\'s Middlename', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {{ Form::label('fatherAgelabel', 'Age', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                {{ Form::text('fatherAge', '', [old('fatherdeceasedCheck') == '1' ? 'readonly' : '', 'x-ref' => 'fatherageinput', 'placeholder' => 'Age' ,'class' => old('fatherdeceasedCheck') == '1' ? 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('fatherOccupationlabel', 'Occupation', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('fatherOccupation', '', [old('fatherdeceasedCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Occupation', 'class' => old('fatherdeceasedCheck') == '1' ? 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('fatherAddresslabel', 'Address', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('fatherAddress', '', [old('fatherdeceasedCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Address', 'class' => old('fatherdeceasedCheck') == '1' ? 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {{ Form::label('fatherContactlabel', 'Contact Number', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
        {{ Form::text('fatherContact', '', [old('fatherdeceasedCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Mobile Number', 'x-ref' => 'fathermobileinput', 'class' => old('fatherdeceasedCheck') == '1' ? 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decfather sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        </div>
        </div>


        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
        Mother's Information
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
        Complete if possible
        </p>


        <div x-data
        x-init="IMask(
            $refs.motherageinput,
            {
                mask: Number,
                min: 1,
                max: 120
            });
            IMask(
            $refs.mothermobileinput,
            {
            mask: '{\\09}00-000-0000'
            });"    >
        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                
            <div class="bg-white my-2 p-1 flex svelte-1l8159u">
                <div class="flex items-center">
                    <div class="mx-1">  <input onclick="deceasedMother(this)" type="checkbox" value="1" name="motherdeceasedCheck" class="h-4 w-4 text-gray-800" {{ old('motherdeceasedCheck') == '1' ? 'checked' : '' }}> </div>
                    <div class="mb-1"> {{ Form::label('motherdeceasedLabel', 'Deceased', ['class' => 'font-bold ml-2 text-gray-700 text-xs leading-8 uppercase']) }} </div>
                </div>
            </div>
            </div>       
        </div>
        
        {!! Html::decode(Form::label('motherfullName', 'Mother\'s Maiden Fullname <span class="text-red-600"> *</span>', ['class' => 'font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'])) !!}
        
        <div class="flex flex-col md:flex-row">
            <div class="w-full flex-1 mx-2 svelte-1l8159u">
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('motherLastName') border-red-500 @enderror">
                    {{ Form::text('motherLastName', '', ['placeholder' => 'Mother\'s Lastname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
                    @error('motherLastName')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror 
            </div>
            <div class="w-full flex-1 mx-2 svelte-1l8159u">
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('motherFirstName') border-red-500 @enderror">
                    {{ Form::text('motherFirstName', '', ['placeholder' => 'Mother\'s Firstname', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
                    @error('motherFirstName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror 
            </div>
            <div class="w-full flex-1 mx-2 svelte-1l8159u">
                <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                    {{ Form::text('motherMiddleName', '', ['placeholder' => 'Mother\'s Middlename', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                    </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
            <div class="w-full mx-2 flex-1 svelte-1l8159u">
                {{ Form::label('motherAgelabel', 'Age', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                {{ Form::text('motherAge', '', [old('motherdeceasedCheck') == '1' ? 'readonly' : '', 'x-ref' => 'motherageinput', 'placeholder' => 'Age' ,'class' => old('motherdeceasedCheck') == '1' ? 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('motherOccupationlabel', 'Occupation', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('motherOccupation', '', [old('motherdeceasedCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Occupation', 'class' => old('motherdeceasedCheck') == '1' ? 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('motherAddresslabel', 'Address', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('motherAddress', '', [old('motherdeceasedCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Address', 'class' => old('motherdeceasedCheck') == '1' ? 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {{ Form::label('motherContactlabel', 'Contact Number', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
        {{ Form::text('motherContact', '', [old('motherdeceasedCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Mobile Number', 'x-ref' => 'mothermobileinput', 'class' => old('motherdeceasedCheck') == '1' ? 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'decmother sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        </div>
        </div>

        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
        Guardian's Information
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Complete if possible
        </p>

        <div x-data
            x-init="IMask(
            $refs.guardianageinput,
            {
                mask: Number,
                min: 1,
                max: 120
            });
            IMask(
            $refs.guardianmobileinput,
            {
            mask: '{\\09}00-000-0000'
            });">
        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('guardianlabel', 'Guardian<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
            <div class="flex items-center">
            <div class="mx-1"> {{ Form::radio('guardianRadio', '1', false,[ 'onclick' => 'checkOption(this)', old('guardianRadio') == '1' ? 'checked' : '',  'class' => 'h-4 w-4 text-gray-700']) }} </div>
            <div class="mb-1"> {{ Form::label('father', 'Father', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
            </div>
            <div class="flex items-center">
                <div class="mx-1"> {{ Form::radio('guardianRadio', '2', false,['onclick' => 'checkOption(this)',  old('guardianRadio') == '2' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                <div class="mb-1"> {{ Form::label('mother', 'Mother', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
            </div>
            <div class="flex items-center">
                <div class="mx-1"> {{ Form::radio('guardianRadio','3', true,['onclick' => 'checkOption(this)',  old('guardianRadio') == '3' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                <div class="mb-1"> {{ Form::label('other', 'Other', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
            </div>
        </div>
        @error('guardianRadio')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="hideguardian w-full mx-2 flex-1 svelte-1l8159u {{ old('guardianRadio') == '1' ? 'hidden' : '' }}{{ old('guardianRadio') == '2' ? 'hidden' : '' }}">
        {!! Html::decode(Form::label('guardianRelationshiplabel', 'Relationship to Guardian<span class="text-red-600">*</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('guardianRelationship') border-red-500 @enderror">
            {{ Form::text('guardianRelationship', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '', 'placeholder' => 'Relationship', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }}
            </div>
            @error('guardianRelationship')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        </div>


        {!! Html::decode(Form::label('guardianfullName', 'Guardian\'s Fullname <span class="text-red-600"> *</span>', ['class' => 'hideguardian font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'.(old('guardianRadio') == '1' ? ' hidden' : '').(old('guardianRadio') == '2' ? ' hidden' : '')])) !!}
        
        <div class="hideguardian flex flex-col md:flex-row {{ old('guardianRadio') == '1' ? 'hidden' : '' }}{{ old('guardianRadio') == '2' ? 'hidden' : '' }}">
        <div class="w-full flex-1 mx-2 svelte-1l8159u">
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('guardianLastName') border-red-500 @enderror">
                {{ Form::text('guardianLastName', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '', 'placeholder' => 'Guardian\'s Lastname', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }}
                </div>
                @error('guardianLastName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        <div class="w-full flex-1 mx-2 svelte-1l8159u">
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('guardianFirstName') border-red-500 @enderror">
                {{ Form::text('guardianFirstName', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '', 'placeholder' => 'Guardian\'s Firstname', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }}
                </div>
                @error('guardianFirstName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        <div class="w-full flex-1 mx-2 svelte-1l8159u">
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                {{ Form::text('guardianMiddleName', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '', 'placeholder' => 'Guardian\'s Middlename', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }}
                </div>
        </div>
        </div>

        <div class="hideguardian flex flex-col md:flex-row {{ old('guardianRadio') == '1' ? 'hidden' : '' }}{{ old('guardianRadio') == '2' ? 'hidden' : '' }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('guardianAgelabel', 'Age', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('guardianAge', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '', 'x-ref' => 'guardianageinput', 'placeholder' => 'Age', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {{ Form::label('guardianOccupationlabel', 'Occupation', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
        {{ Form::text('guardianOccupation', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '', 'placeholder' => 'Occupation', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }} </div>
        </div>
        </div>

        <div class="hideguardian flex flex-col md:flex-row {{ old('guardianRadio') == '1' ? 'hidden' : '' }}{{ old('guardianRadio') == '2' ? 'hidden' : '' }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('guardianAddresslabel', 'Address', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('guardianAddress', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '', 'placeholder' => 'Address', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {{ Form::label('guardianContactlabel', 'Contact Number', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
        {{ Form::text('guardianContact', '', [old('guardianRadio') == '1' ? 'readonly' : '', old('guardianRadio') == '2' ? 'readonly' : '','placeholder' => 'Mobile Number' ,'x-ref' => 'guardianmobileinput', 'class' => 'relguardian sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(old('guardianRadio') == '1' ? ' bg-gray-200' : '').(old('guardianRadio') == '2' ? ' bg-gray-200' : '')]) }} </div>
        </div>
        </div>
        </div>
        

    </div>        
    <div class="p-4 border-b">
        <div class="py-2 px-2 flex justify-between">

            <a class="sm:text-sm text-xs bg-blue-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer" href="{{ route('studentinformation') }}">Back</a>               

            {{ Form::submit('Submit', ['class' => 'sm:text-sm text-xs bg-green-600 text-white flex justify-center px-4 py-2 rounded font-bold cursor-pointer']) }} 

        </div> 

        {!! Form::close() !!}
</div>
</div>
</div>


<script>
    
    // Check if permanent
    function deceasedFather(checkbox)
    {
        if (checkbox.checked)
        {   
            disableinputs("decfather");
        }
        else{
            enableinputs("decfather");
        }

    }

    function deceasedMother(checkbox)
    {
        if (checkbox.checked)
        {   
            disableinputs("decmother");
        }
        else{
            enableinputs("decmother");
        }

    }

    function checkOption(radio){
        if(radio.value == "3"){
            enableinputs('relguardian');
            showinputs('hideguardian');
        }
        else{
            disableinputs('relguardian');
            hideinputs('hideguardian');
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


  



</script>

@endsection
