@extends('admin.layouts.main')
@section('content')
<div class="d-flex justify-content-between mb-2">
  <h1> Agregar Post</h1>
<!-- Button trigger modal -->
</div>

<div id="editor">
  <p>Hello World!</p>
  <p>Some initial <strong>bold</strong> text</p>
  <p><br /></p>
</div>


@endsection

@section('scripts')
<!-- Initialize Quill editor -->
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>
@endsection