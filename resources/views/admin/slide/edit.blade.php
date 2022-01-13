@extends('layouts.admin')
@section('title')
    <h6 class="font-weight-bolder mb-0">Update slide</h6>
@endsection
@section('content')

    <div class="d-flex mb-4 justify-content-center ">
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 form-card">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ url('slide/'.$slide->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input id="name" onkeyup="ChangeToSlug()" required class="form-control" name="name_slide"
                        value="{{ $slide->name }}">
                </div>
                <div class="mb-3">
                    <input type="file" name="image_slide">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea  type="text" class="form-control" rows="3" name="description_slide">{{ $slide->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

