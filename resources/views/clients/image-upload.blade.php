@extends('layouts.home')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('image.upload') }}" enctype="multipart/form-data">
    @csrf

  <div class="mb-3">
    <label for="imageUpload" class="form-label">Качване на снимка</label>
    <input class="form-control" name="name" type="file" id="imageUpload">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="my-4" id="imagePreview">
    {{-- The place for an image preview --}}
  </div>


  <div class="form-floating">
    <label for="description mt-4">Описание</label>
    <textarea class="form-control" name="description" placeholder="Напишете вашето описание тук..." id="description"></textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <button class="btn btn-outline-info mt-4">Качи снимка</button>

</form>

<style>
    #imagePreview img {
      max-width: 300px;
      max-height: 300px;
    }
  </style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {

    $('#imageUpload').change(function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').html('<img src="' + e.target.result + '" class="img-fluid" alt="Предварителен преглед">');
      }
      reader.readAsDataURL(this.files[0]);
    });
  });
</script>

@endsection
