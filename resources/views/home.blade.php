@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Blog</b></div>
                <a href="{{route('addblog')}}" class="btn btn-primary">Tambah Blog</a>
                <div class="card-body">
                    <div class="row text-center font-weight-bold">
                      <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <h5>ID</h5>
                      </div>
                      <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <h5>Judul</h5>
                      </div>
                      <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <h5>Dibuat</h5>
                      </div>
                      <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <h5>Aksi</h5>
                      </div>
                    </div>
                    @foreach ($blogs as $blog)
                    <div class="row text-center">
                      <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        {{$blog->id}}
                      </div>
                      <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-justify">
                        {{$blog->title}}
                      </div>
                      <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        {{$blog->created_at}}
                      </div>
                      <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="{{route('editblog', $blog->id)}}" class="btn btn-primary">Edit</a>
                        <form role="form" method="post" action="{{route('deleteblog', $blog->id)}}">
                          <input type="hidden" name="_method" value="DELETE">
                          {{csrf_field()}}
                          <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
