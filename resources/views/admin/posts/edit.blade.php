@extends('layouts.admin')

@section('title')
    @parent
    :: Edit Post {{$post->title}}
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Post "{{$post->title}}"</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-8">
            <form method="POST"
             action="{{route('admin.posts.update', ['post' => $post])}}"
             enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input 
                    type="text"
                    class="form-control"
                    name="title"
                    placeholder="Enter category title"
                    value="{{$post->title}}" >
                     @error('title')
                     <div class="col-4 mt-2 alert alert-danger" role="alert">
                        {{$message}}
                      </div>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option
                            {{$post->category->title == $category->title
                            ?'selected'
                            : ''}}
                            value="{{$category->id}}">
                                {{$category->title}}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                     <div class="col-4 mt-2 alert alert-danger" role="alert">
                        {{$message}}
                      </div>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="summernote">{{$post->content}}</textarea>
                    @error('content')
                     <div class="col-4 mt-2 alert alert-danger" role="alert">
                        {{$message}}
                      </div>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select tags" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                      @foreach ($tags as $tag)
                      <option value="{{$tag->id}}"
                        {{in_array($tag->id, $post->tags->pluck('id')->toArray()) 
                        ? 'selected' 
                        : ''}}
                        >
                        {{$tag->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="image">Select Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error('image')
                     <div class="col-4 mt-2 alert alert-danger" role="alert">
                        {{$message}}
                      </div>
                     @enderror
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </form>
        </div>
      </div>
    </div>
</section>

@push('summernote')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

<script>

$(document).ready(function() {
  $('#summernote').summernote({
    toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
  });
});

$(function () {
  bsCustomFileInput.init();
});

$('.select2').select2()
</script>

@endpush
    
@endsection