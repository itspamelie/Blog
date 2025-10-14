@extends('admin.layouts.main')
@section('content')
<div class="d-flex justify-content-between mb-2">
  <h1> Agregar Post</h1>
<!-- Button trigger modal -->
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif


<form action="/dashboard/posts" method="POST" id="form" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="title">Title</label>
<input value="{{ old('title') }}" name="title" type="text" class="form-control" id="title">
</div>

<div class="form-group">
<label for="description">Description</label>
<input value="{{ old('description') }}" name="description" type="text" class="form-control" id="description">
</div>
<div class="form-group">
<label for="file">Img</label>
<input name="img" type="file" class="form-control" id="file">
</div>
<div class="form-group">
<label for="cathegory_id">Category</label>
<select name="cathegory_id" id="category_id" class="form-control">
@foreach($categories as $cate)
<option value="{{$cate->id}}">{{$cate->name}}</option>
@endforeach
</select>
</div>
<input type="text" name="content" id="content">
<div id="editor">
<p>Hello World ! </p>
<p>Some initial <strong>bold</strong> text</p>
<p><br/></p>
</div>
<br>
<div class="form-group">
<button type="submit" class="btn btn-primary">Insertar</button>
</div>

</form>

@endsection


@section('scripts')
<!-- Initialize Quill editor -->
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>
@endsection