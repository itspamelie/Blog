@extends('admin.layouts.main')
@section('content')
<div class="d-flex justify-content-between">
  <h1>Usuarios</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
  Agregar
</button></div>

<div class="p-4">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($usuarios as $item)
  <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->img}}</td>
    <td>{{$item->name}}</td>
    <td>{{ $item->nickname}}</td>
    <td>{{$item->email}}</td>
    <td>*********</td>
    <td><button class="btn btn-danger">
        X
    </button></td>
  </tr>
  @endforeach
  </tbody>
</table>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/dashboard/users" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" aria-describedby="Name">
          </div>
          <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" class="form-control" id="nickname" aria-describedby="Nickname">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" aria-describedby="Password">
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" id="password2" aria-describedby="Password2">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection