@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Edit Blog</b></div>
                <div class="card-body">
                    <form role="form" action="{{route('putblog', $id)}}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PUT">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="title">Judul *</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul" value="{{$blog->title}}" required>
                      </div>
                      <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Gambar" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                        <p>Keterangan : Maksimal 2 MB</p>
                      </div>
                      <div class="form-group">
                        <label for="description">Deskripsi *</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Deskripsi" required>{{$blog->description}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" id="submit" name="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
