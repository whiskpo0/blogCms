@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new post')
    
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Post
      </h1>
      <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> <a href="{{ url('/home') }}">Dashboard</a></li>
            <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
            <li class="active">Add new</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-9">
              <div class="box">
                  <!-- form start -->
                  <form role="form">
                    <div class="box-body">
                        {!! Form::model($post,[ 
                            'method' => 'POST', 
                            'route' => 'backend.blog.store'
                        ]) !!}

                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            {!! Form::label('title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}

                            @if($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control']) !!}                            
                        </div>
                        <div class="form-group">
                            {!! Form::label('excerpt') !!}
                            {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}                            
                        </div>
                        <div class="form-group">
                            {!! Form::label('body') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}                            
                        </div>  
                        <div class="form-group">
                            {!! Form::label('published_at', 'Published Date') !!}
                            {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}                            
                        </div> 
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', App\Category::pluck('title','id'), null, ['class' => 'form-control', 'placeholder' => 'Choose category']) !!}                            
                        </div>        
                        
                        <hr>

                        {!! Form::submit('Create new post', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}

                      {{-- <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" placeholder="Enter Title here" id="title" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" class="form-control">

                        <p class="help-block">Example block-level help text here.</p>
                      </div>
                      <div class="form-group">
                        <label for="body">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" rows="5" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" rows="10" class="form-control"></textarea>
                      </div> --}}
                    </div>
                    <!-- /.box-body -->

                    {{-- <div class="box-footer">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </form> --}}
                </div>
          </div>
          <div class="col-md-3">
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Publish</h3>
                  </div>
                  <div class="box-body">
                      <div class="form-group">
                        <label for="published_at">Publish date</label>
                        <input type="text" class="form-control">
                      </div>
                  </div>
                  <div class="box-footer clearfix">
                      <div class="pull-left">
                          <a href="#" class="btn btn-default">Save Draft</a>
                      </div>
                      <div class="pull-right">
                          <a href="#" class="btn btn-primary">Publish</a>
                      </div>
                  </div>
              </div>
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Category</h3>
                  </div>
                  <div class="box-body">
                      <div class="radio">
                          <label>
                            <input type="radio" name="category" id="category-1" value="option1">
                            Web Programming
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="category" id="category-2" value="option1">
                            Web Design
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="category" id="category-3" value="option1">
                            Java
                          </label>
                      </div>
                  </div>
              </div>
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Feature Image</h3>
                  </div>
                  <div class="box-body text-center">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://placehold.it/200x200" width="100%" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="...">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

  @section('script')
        <script type="text/javascript">
          $('ul.pagination').addClass('no-margin pagination-sm'); 
        </script>
  @endsection
