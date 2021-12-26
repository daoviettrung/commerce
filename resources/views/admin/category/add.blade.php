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
@section('scripts')
    <script type="text/javascript">
        function ChangeToSlug() {
            var name, slug;
            //Lấy text từ thẻ input title
            name = document.getElementById("name").value;
            //Đổi chữ hoa thành chữ thường
            slug = name.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            slug = slug.replace(/ /gi, "-");
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-'); //Xóa
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, ''); //In slug ra textbox có id“ slug” 
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
