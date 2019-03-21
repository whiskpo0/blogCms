@extends('layouts.backend.main')

@section('title', 'MyBlog | Index')
    
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blog
            <small>Display All blog post</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> <a href="{{ url('/home') }}">Dashboard</a></li>
            <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
            <li class="active">All Posts</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('backend.blog.create')}}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="pull-right">
                            <form accept-charset="utf-8" method="post" class="form-inline" id="form-filter" action="#">
                                <div class="input-group">
                                    <input type="hidden" name="search">
                                    <input type="text" name="keywords" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search..." value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default search-btn" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive">
                      @if (!$posts->count())
                        <div class="alert alert-danger">
                            <strong>No Record Found</strong> 
                        </div>
                      @else
                    <table class="table table-bordered table-condesed">
                      <thead>
                          <tr>
                            <th>Action</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Date</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($posts as $post)
                              <tr>
                                <td width="70">
                                    <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('backend.blog.edit', $post->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Delete" class="btn btn-xs btn-danger delete-row" href="{{ route('backend.blog.destroy', $post->id) }}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>
                                    <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> | {!! $post->publicationLabel() !!}
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                  @endif
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{ $posts->render() }}    
                    </div>
                    <div class="pull-right">                    
                        <small>{{ $postCount }} {{ str_plural('Item', $post) }} </small>
                    </div>
                </div>
                <!-- /.box -->
              </div>
            </div>
          <!-- ./row -->
        </section>
        <!-- /.content -->
      </div>
@endsection

@section('script')
      <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm'); 
      </script>
@endsection