@extends('layouts.admin')

@section('title')
    @parent
    :: Edit Category {{$category->title}}
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Category {{$category->title}}</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-8">
            <form method="POST" action="{{route('admin.categories.update', [
                'category' => $category
            ])}}">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input 
                    type="text"
                     class="form-control"
                    name="title"
                     placeholder="Enter category title"
                     value="{{$category->title}}" >
                     @error('title')
                     <div class="col-4 mt-2 alert alert-danger" role="alert">
                        {{$message}}
                      </div>
                     @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
        
        </div>
      </div>
    </div>
</section>
    
@endsection