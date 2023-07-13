@extends('layouts.admin')

@section('title')
    @parent
    :: Posts
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ">
        <div class="col-sm-6">
          <h1 class="m-0">Posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 pr-5">
          <a href="{{route('admin.posts.create')}}" class="float-right  btn btn-primary">Add Post</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    {{-- <td>{{$item->id}}</td> --}}
                    <td class="d-flex justify-content-start">
                        <a href="{{route('admin.posts.edit', [
                            'post' => $item
                        ])}}" class="btn btn-primary mr-4">Edit</a>
                        <form method="POST"
                              action="{{route('admin.posts.destroy', [
                            'post' => $item
                        ])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" 
                            class="btn btn-danger"
                            value="Delete"
                            >
                        </form>
                    </td>
                  </tr>
                  <tr class="expandable-body d-none">
                    <td colspan="5">
                      <p style="display: none;">
                        {{$post->content}}
                      </p>
                    </td>
                  </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
    
@endsection