@extends('layouts.admin')
@section('title')
    <h6 class="font-weight-bolder mb-0">Add category</h6>
@endsection
@section('content')

    <div class="d-flex mb-4 justify-content-center ">
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 form-card">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ url('categories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input id="name" onkeyup="ChangeToSlug()" required class="form-control" name="name_cate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input id="slug" required class="form-control" name="slug_cate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta title</label>
                    <input type="text" class="form-control" name="meta_title_cate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta keyword</label>
                    <input type="text" class="form-control" name="meta_keywords_cate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta descrip</label>
                    <input type="text" class="form-control" name="meta_descrip_cate">
                </div>
                <div class="mb-3">
                    <input type="file" class="" name="image_cate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="checkbox" name="status_cate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Popular</label>
                    <input type="checkbox" name="popular_cate">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea type="text" class="form-control" rows="3" name="description_cate"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
<script src="{{ asset('admin/js-core.js') }}" ></script>
