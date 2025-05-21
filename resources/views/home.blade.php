@extends('layouts.app')

@section('content')
<div class="container">
     @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
        <img src="{{ asset('storage/' . session('image')) }}" width="200">
    @endif

    <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Remarks:</label><br>
        <textarea name="remarks"></textarea><br><br>

        <label>Upload Photo:</label><br>
        <input type="file" name="photo" accept="image/*" required><br><br>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
