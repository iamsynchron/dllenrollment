@extends('layouts.app')

@section('title', 'My Signature')

@section('content')
<style>
    .wrapper {
  position: relative;
  max-width: 400px;
  max-height: 300px;
  width: 100%;
  height: 100%;
  min-width: 200px;
  min-height: 200px;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

img {
  position: absolute;
  left: 0;
  top: 0;
}

.signature-pad {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
}


</style>

<div class="px-3 py-5">
  <div class="max-w-3xl bg-white rounded-lg shadow-xl mx-auto ">
      <div class="p-4 border-b">
          <h2 class="sm:text-2xl text-s font-semibold">
            Student Signature
          </h2>
          <p class="sm:text-sm text-xs text-gray-500">
            Please provide your signature
          </p>
      </div>  

    <form action="{{ route('studentsignature') }}" method="post">
        @if (!is_null($getsignature))
            @method('PUT')
        @endif
      @csrf
    <div class="p-4 border-b"> 
        @if ($message = Session::get('success'))
           <div class="flex flex-col md:flex-row justify-center">
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                  {{ $message }}
              </div> 
          </div>
        @endif 
        <div class="flex flex-col md:flex-row justify-center">
              <div class="wrapper">    
                <canvas name="signaturepad" id="signature-pad" class="signature-pad border-2 border-gray-500 flex"></canvas>
              </div>
              <textarea id="signature" name="signed" style="display: none"></textarea>
              
        </div>
        <div class="flex flex-col md:flex-row justify-center">
          @error('signature')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
        
    </div>

    <div class="p-4 border-b">  
        <div class="flex flex-col md:flex-row justify-end">
                            
            <button type="button" id="clear" class="sm:text-sm text-xs mt-5 bg-gray-600 text-white flex justify-center mx-2 px-4 py-2 rounded font-bold cursor-pointer">Clear Canvas</button>    
            <button type="submit" class="sm:text-sm text-xs mt-5 bg-green-600 text-white flex justify-center mx-2 px-4 py-2 rounded font-bold cursor-pointer" id="save">
              @if (!is_null($getsignature))
                Update Signature
              @else
                Save Signature
              @endif</button>        

        </div>
    </div>
    </form>

  </div>        
  
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script>

        var mytext = document.getElementById('signature');  
        
        var canvas = document.getElementById('signature-pad');        
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        penColor: 'rgb(0, 0, 0)'
        });


        function resizeCanvas() {
            // When zoomed out to less than 100%, for some very strange reason,
            // some browsers report devicePixelRatio as less than 1
            // and only part of the canvas is cleared then.
            var ratio =  Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear();
        }

        window.onresize = resizeCanvas;
        resizeCanvas();

        var saveButton = document.getElementById('save');
        var cancelButton = document.getElementById('clear');

        saveButton.addEventListener('click', function(event) {         
        var data = signaturePad.toDataURL("image/svg+xml"); 
        mytext.innerHTML = data;
        console.log(data);

        });

        cancelButton.addEventListener('click', function(event) {
        signaturePad.clear();
        });

</script>

@endsection