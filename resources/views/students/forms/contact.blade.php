@extends('layouts.app')

@section('title', 'Form 2')

@section('content')
<div class="px-3 py-5">
  <div class="max-w-5xl bg-white rounded-lg shadow-xl mx-auto ">
      <div class="p-4 border-b">
          <h2 class="sm:text-2xl text-s font-semibold">
            Contact Details
          </h2>
          <p class="sm:text-sm text-xs text-gray-500">
            Enrollment Form 2 of 6
          </p>
      </div>  
      <div class="p-4 border-b">
        

{!! Form::open(['method' => 'POST', 'route' => 'formscontact']) !!}
  
      <div class="flex flex-col md:flex-row">
            <div 
            x-data
            x-init="mobile = IMask(
                $refs.mobileinput,
                {
                mask: '{\\09}00-000-0000'
                });"
            class="w-full mx-2 flex-1 svelte-1l8159u">
                {{ Form::label('mobileNumberlabel', 'Mobile Number', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('mobileNumber') border-red-500 @enderror">
                {{ Form::text('mobileNumber', '', ['placeholder' => 'Mobile Number' ,'x-ref' => 'mobileinput', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
                @error('mobileNumber')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror 
            </div>
        <div 
            x-data
            x-init="telephone = IMask(
            $refs.telephoneinput,
            {
                mask: '(\\000)000-0000'
            });"

        class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('telephoneNumberlabel', 'Telephone Number', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('telephoneNumber') border-red-500 @enderror">
                {{ Form::text('telephoneNumber', '', ['placeholder' => 'Telephone Number' ,'x-ref' => 'telephoneinput', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
        </div>
        @error('telephoneNumber')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror 
        </div>
        </div>

        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
        Residential Address
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
        Complete address if possible
        </p>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('residentialStreetlabel', 'House/Block/Lot No./Street', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('residentialStreet', '', ['placeholder' => 'House/Block/Lot No./Street', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('residentialBrgylabel', 'Barangay<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('residentialBrgy') border-red-500 @enderror">
        {{ Form::text('residentialBrgy', '', ['placeholder' => 'Barangay', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        @error('residentialBrgy')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror 
        </div>       
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('residentialCitylabel', 'City/Municipality<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('residentialCity') border-red-500 @enderror">
            {{ Form::text('residentialCity', '', ['placeholder' => 'City/Municipality', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        @error('residentialCity')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
       @enderror
        </div>        
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('residentialProvincelabel', 'Province<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('residentialProvince') border-red-500 @enderror">
                {{ Form::text('residentialProvince', '', ['placeholder' => 'Province', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}          
        </div>
        @error('residentialProvince')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
           @enderror      
        </div> 
         
        <div 
        x-data
        x-init="IMask(
        $refs.reszipinput,
        {
            mask: Number,
            min: 1,
            max: 9999
        });"
        class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('residentialZiplabel', 'Zip Code<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('residentialZip') border-red-500 @enderror">
            {{ Form::text('residentialZip', '', ['x-ref' => 'reszipinput', 'placeholder' => 'Zip Code', 'class' => 'sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
        </div>
        @error('residentialZip')
             <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror 
        </div>       
        </div>


        <div class="sm:text-xl text-sm font-bold leading-normal text-center text-blueGray-800 mt-7">
        Permanent Address
        </div>
        <p class="sm:text-sm text-xs mb-5 text-center text-gray-500">
        Complete address if possible
        </p>

        <div x-data
        x-init="IMask(
        $refs.perzipinput,
        {
            mask: Number,
            min: 1,
            max: 9999
        });"
        >
        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">                
        <div class="bg-white my-2 p-1 flex svelte-1l8159u">
            <div class="flex items-center">
                <div class="mx-1"><input onclick="checkpermanent(this)" id="permanentCheck" type="checkbox" name="permanentCheck" value="1" class="h-4 w-4 text-gray-800" {{ old('permanentCheck') == '1' ? 'checked' : '' }}> </div>
                <div class="mb-1"> {{ Form::label('permanentChecklabel', 'Same as Residential Address', ['class' => 'font-bold text-blue-600 text-xs leading-8 uppercase']) }} </div>
            </div>
        </div>
        @error('permanentCheck')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
         @enderror 
        </div>       
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {{ Form::label('permanentStreetlabel', 'House/Block/Lot No./Street', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase']) }}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('permanentStreet', '', [ old('permanentCheck') == '1' ? 'readonly' : '', 'placeholder' => 'House/Block/Lot No./Street', 'class' => old('permanentCheck') == '1' ? 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('permanentBrgylabel', 'Barangay<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u @error('permanentBrgy') border-red-500 @enderror">
        {{ Form::text('permanentBrgy',  '', [old('permanentCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Barangay', 'class' => old('permanentCheck') == '1' ? 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        @error('permanentBrgy')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror 
         </div>
        </div>

        <div class="flex flex-col md:flex-row">
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('permanentCitylabel', 'City/Municipality<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('permanentCity', '', [old('permanentCheck') == '1' ? 'readonly' : '', 'placeholder' => 'City/Municipality', 'class' => old('permanentCheck') == '1' ? 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }} </div>
        @error('permanentCity')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
            {!! Html::decode(Form::label('permanentProvincelabel', 'Province<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
            <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                {{ Form::text('permanentProvince', '', [old('permanentCheck') == '1' ? 'readonly' : '', 'placeholder' => 'Province', 'class' => old('permanentCheck') == '1' ? 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
            </div>
            @error('permanentProvince')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full mx-2 flex-1 svelte-1l8159u">
        {!! Html::decode(Form::label('permanentZiplabel', 'Zip Code<span class="text-red-600"> *</span>', ['class' => 'font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase'])) !!}
        <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
            {{ Form::text('permanentZip', '', [old('permanentCheck') == '1' ? 'readonly' : '', 'x-ref' => 'perzipinput', 'placeholder' => 'Zip Code', 'class' => old('permanentCheck') == '1' ? 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800 bg-gray-200' : 'fordisable sm:text-sm text-xs p-1 px-2 appearance-none outline-none w-full text-gray-800']) }}
        </div>
        @error('permanentZip')
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
    
    // Check if permanent
    function checkpermanent(checkbox)
    {
        if (checkbox.checked)
        {   
            disableinputs("fordisable");
        }
        else{
            enableinputs("fordisable");
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







        
