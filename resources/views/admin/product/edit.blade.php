@extends('layouts.admin')
@section('title')
    <h6 class="font-weight-bolder mb-0">Update product</h6>
@endsection
@section('content')

    <div class="d-flex mb-4 justify-content-center ">
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 form-card">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ url('product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input id="name" onkeyup="ChangeToSlug()" required class="form-control" name="name_product"
                        value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input id="slug" required class="form-control" name="slug_product" value="{{ $product->slug }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $valueCate)
                            @if ($product->category_id == $valueCate->id)
                                <option value="{{ $valueCate->id }}" selected>{{ $valueCate->name }}</option>
                            @else
                                <option value="{{ $valueCate->id }}">{{ $valueCate->name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Small description</label>
                    <input value="{{ $product->small_description }}" type="text" class="form-control" name="small_description_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Original price</label>
                    <input value="{{ $product->original_price }}" type="number" class="form-control" name="original_price_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Selling price</label>
                    <input value="{{ $product->selling_price }}" type="number" class="form-control" name="selling_price_product">
                </div>
                <div class="mb-3">
                    <input type="file" name="image_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="checkbox" {{$product->status == '1' ? 'checked' : ''}} name="status_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Trending</label>
                    <input type="checkbox" {{$product->trending == '1' ? 'checked' : ''}} name="trending_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta title</label>
                    <input value="{{ $product->meta_title }}" type="text" class="form-control" name="meta_title_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta keyword</label>
                    <input value="{{ $product->meta_keywords }}" type="text" class="form-control" name="meta_keywords_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta descrip</label>
                    <input value="{{ $product->meta_descrip }}" type="text" class="form-control" name="meta_descrip_product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea type="text" class="form-control" rows="3" name="description_product">{{ $product->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
<script src="{{ asset('admin/js-core.js') }}"></script>
