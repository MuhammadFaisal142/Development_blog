@extends('production.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
            <div class=" container-fluid row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 bg-primary">
                  <div class="tile-stats" style="margin-top : 10px ;">

                    <div class="count">{{ $postCount }}</div>
                    <p>Posts</p>
                    <div class="icon">
                        <i class="fa fa-pencil"></i>
                      </div>
                  </div>

                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 bg-success">
                  <div class="tile-stats" style="margin-top : 10px ;">
                    <div class="count">{{ $categoryCount }}</div>
                    <p>Categories</p>
                    <div class="icon">
                      <i class="fa fa-tags"></i>
                    </div>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 bg-info">
                  <div class="tile-stats" style ="margin-top : 10px ;">

                    <div class="count">{{ $tagCount }}</div>

                    <p>Tags</p>
                    <div class="icon">
                      <i class="fa fa-tag"></i>
                    </div>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 bg-warning">
                  <div class="tile-stats" style="margin-top : 10px ;">

                    <div class="count">{{ $userCount }}</div>
                    <p>Users</p>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                      </div>
                  </div>

                </div>
             </div>

          <div class="row" style="
          margin-top: 20px;
      ">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Post List</h3>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Post List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th>Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count())
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            @foreach($post->tags as $tag)
                                                <span class="badge badge-primary">{{ $tag->name }} </span>
                                            @endforeach
                                        </td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->created_at->format('d M, Y') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="{{ route('post.destroy', [$post->id]) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No posts found.</h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
@endsection
