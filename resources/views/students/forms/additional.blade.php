@extends('layouts.app')

@section('title', 'Form 4')

@section('content')
<div class="px-3 py-5">
  <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
      <div class="p-4 border-b">
          <h2 class="sm:text-2xl text-s font-semibold">
            Additional Information
          </h2>
          <p class="sm:text-sm text-xs text-gray-500">
            Enrollment Form 4 of 6
          </p>
      </div>  
      <div class="p-4 border-b">
        

{!! Form::open(['method' => 'POST', 'route' => 'formsadditional']) !!}

<div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
  Insurance Beneficiary
</div>
<p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
    FYI: Every Dalubcenian is insured! Please inform us the details of your beneficiary.
</p>


<div x-data
            x-init="IMask(
            $refs.insurancemobileinput,
            {
            mask: '{\\09}00-000-0000'
            });">
        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('insurancelabel', 'Beneficiary<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
            <div class="flex items-center">
            <div class="mx-1"> {{ Form::radio('insuranceRadio', '1', false, ['onclick' => 'checkBeneficiary(this)', old('insuranceRadio') == '1' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
            <div class="mb-1"> {{ Form::label('parents', 'Parents/Guardian', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
            </div>
            <div class="flex items-center">
                <div class="mx-1"> {{ Form::radio('insuranceRadio', '2', true, ['onclick' => 'checkBeneficiary(this)', old('insuranceRadio') == '2' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
                <div class="mb-1"> {{ Form::label('other', 'Other', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
            </div>
        </div>
        </div>
        </div>


        {!! Html::decode(Form::label('insurancefullName', 'Benefeciary Fullname <span class="text-red-600"> *</span>', ['class' => 'hidebeneficiary font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3'.(old('insuranceRadio') == '1' ? ' hidden' : '')])) !!}
        
        <div class="hidebeneficiary flex flex-col md:flex-row {{ old('insuranceRadio') == '1' ? 'hidden' : '' }}">
        <div class="w-full flex-1 mx-2 svelte-1l8159u">
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('insuranceLastName') border-red-500 @enderror">
                {{ Form::text('insuranceLastName', '', [old('insuranceRadio') == '1' ? 'readonly' : '', 'placeholder' => 'Beneficiary Lastname', 'class' => old('insuranceRadio') == '1' ? 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                </div>
                @error('insuranceLastName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        <div class="w-full flex-1 mx-2 svelte-1l8159u">
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('insuranceFirstName') border-red-500 @enderror">
                {{ Form::text('insuranceFirstName', '', [old('insuranceRadio') == '1' ? 'readonly' : '', 'placeholder' => 'Beneficiary Firstname', 'class' => old('insuranceRadio') == '1' ? 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                </div>
                @error('insuranceFirstName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        <div class="w-full flex-1 mx-2 svelte-1l8159u">
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                {{ Form::text('insuranceMiddleName', '', [old('insuranceRadio') == '1' ? 'readonly' : '', 'placeholder' => 'Beneficiary Middlename', 'class' => old('insuranceRadio') == '1' ? 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
                </div>
                @error('insuranceMiddleName')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        </div>

        <div class="hidebeneficiary flex flex-col md:flex-row {{ old('insuranceRadio') == '1' ? 'hidden' : '' }}">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('insuranceAddresslabel', 'Address', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('insuranceAddress', '', [old('insuranceRadio') == '1' ? 'readonly' : '', 'placeholder' => 'Address', 'class' => old('insuranceRadio') == '1' ? 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        @error('insuranceAddress')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {{ Form::label('insuranceContactlabel', 'Contact Number', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
        {{ Form::text('insuranceContact', '', [old('insuranceRadio') == '1' ? 'readonly' : '', 'placeholder' => 'Mobile Number' ,'x-ref' => 'insurancemobileinput', 'class' => old('insuranceRadio') == '1' ? 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'beneficiary sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        @error('insuranceContact')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
        
        </div>
        </div>

        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
          Additional Information
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
            Additional
        </p>


<div class="flex flex-col md:flex-row">
    <div class="w-full mx-2 flex-1 svelte-1l8159u">
      {!! Html::decode(Form::label('civilStatuslabel', 'Civil Status <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('civilStatus') border-red-500 @enderror">
      {{ Form::select('civilStatus',$civillist,null,['class'=>'sm:text-sm text-xs p-1 px-2 w-full text-gray-800 overflow-y-scroll', 'placeholder' => 'Civil Status']) }}
    </div>
    @error('civilStatus')
       <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    </div>
    <div class="w-full mx-2 flex-1 svelte-1l8159u">
      {!! Html::decode(Form::label('citizenshiplabel', 'Citizenship <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('citizenship') border-red-500 @enderror">
      {{ Form::text('citizenship', 'Filipino', ['placeholder' => 'Citizenship', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
    </div>
    @error('citizenship')
       <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
    
<div class="flex flex-col md:flex-row">
  <div class="w-full mx-2 flex-1 svelte-1l8159u">
    {!! Html::decode(Form::label('religionlabel', 'Religion <span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('religion') border-red-500 @enderror">
      {{ Form::text('religion', '', ['placeholder' => 'Religion','class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
      @error('religion')
       <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    </div>
  
</div>


    <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
      Student with Special Needs
    </div>
    <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
        Disability
    </p>

    <div >
    <div class="flex flex-col md:flex-row">
      <div class="w-full mx-2 flex-1 svelte-1l8159u">
          {!! Html::decode(Form::label('speciallabel', 'Are you a student with special needs?<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
          <div class="flex items-center">
           <div class="mx-1"> {{ Form::radio('specialRadio', '1', false, ['onclick' => 'checkDisability(this)', old('specialRadio') == '1' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
           <div class="mb-1"> {{ Form::label('specialyes', 'Yes', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
          </div>
            <div class="flex items-center">
              <div class="mx-1"> {{ Form::radio('specialRadio', '2', true, ['onclick' => 'checkDisability(this)', old('specialRadio') == '2' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
              <div class="mb-1"> {{ Form::label('specialno', 'No', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
            </div>
        </div>
        @error('specialRadio')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </div>
      <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('specialDisabilitylabel', 'If YES, what type of Disability?<span class="text-red-600">*</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
          <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('specialDisability') border-red-500 @enderror">
            {{ Form::text('specialDisability', '', [empty(old('specialRadio')) ? 'readonly' : (old('specialRadio') == '2' ? 'readonly' : ''), 'placeholder' => 'Disability', 'class' => 'disability sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('specialRadio')) ? ' bg-gray-200' : (old('specialRadio') == '2' ? ' bg-gray-200' : '')) ]) }}
          </div>
          @error('specialDisability')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </div>
    </div>
    </div>

    <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
      Indigenous
    </div>
    <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
        Minority Group
    </p>

    <div>
    <div class="flex flex-col md:flex-row">
      <div class="w-full mx-2 flex-1 svelte-1l8159u">
          {!! Html::decode(Form::label('indigenouslabel', 'Are you an indigenous person?<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex justify-evenly svelte-1l8159u">
          <div class="flex items-center">
           <div class="mx-1"> {{ Form::radio('indigenousRadio', '1', false, ['onclick' => 'checkIndigenous(this)', old('indigenousRadio') == '1' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
           <div class="mb-1"> {{ Form::label('indigenousyes', 'Yes', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
          </div>
            <div class="flex items-center">
              <div class="mx-1"> {{ Form::radio('indigenousRadio', '2', true, ['onclick' => 'checkIndigenous(this)', old('indigenousRadio') == '2' ? 'checked' : '', 'class' => 'h-4 w-4 text-gray-700']) }} </div>
              <div class="mb-1"> {{ Form::label('indigenousno', 'No', ['class' => 'font-bold text-gray-900 text-xs leading-8 uppercase']) }} </div>
            </div>
        </div>
        @error('indigenousRadio')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
      <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('indegenousMinoritylabel', 'If YES, What Minority Group do you belong?<span class="text-red-600">*</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
          <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('indegenousMinority') border-red-500 @enderror">
            {{ Form::text('indigenousMinority', '', [empty(old('indigenousRadio')) ? 'readonly' : (old('indigenousRadio') == '2' ? 'readonly' : ''), 'placeholder' => 'Minority', 'class' => 'indigenous sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800'.(empty(old('indigenousRadio')) ? ' bg-gray-200' : (old('indigenousRadio') == '2' ? ' bg-gray-200' : '')) ]) }}
          </div>
          @error('indegenousMinority')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
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

function checkBeneficiary(radio){
        if(radio.value == "2"){
             enableinputs('beneficiary');
             showinputs('hidebeneficiary');
        }
        else if(radio.value == "1"){
             disableinputs('beneficiary');
             hideinputs('hidebeneficiary');
        }
    }

    function checkDisability(radio){
        if(radio.value == "1"){
             enableinputs('disability');
        }
        else if(radio.value == "2"){
             disableinputs('disability');
        }
    }
    function checkIndigenous(radio){
        if(radio.value == "1"){
             enableinputs('indigenous');
        }
        else if(radio.value == "2"){
             disableinputs('indigenous');
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