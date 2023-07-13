@extends('layouts.admin')

@section('title')
    @parent
    :: Tags
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ">
        <div class="col-sm-6">
          <h1 class="m-0">Tags</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 pr-5">
          <a href="{{route('admin.tags.create')}}" class="float-right  btn btn-primary">Add Tag</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-8">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" >
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th >Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><strong>{{$item->title}}</strong></td>
                        <td class="d-flex justify-content-start">
                            <a href="{{route('admin.tags.edit', [
                                'tag' => $item
                            ])}}" class="btn btn-primary mr-4">Edit</a>
                            <form method="POST"
                                  action="{{route('admin.tags.destroy', [
                                'tag' => $item
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
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
</section>
    
@endsection