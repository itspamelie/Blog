@extends('admin.layouts.main')
@section('content')
<div class="d-flex justify-content-between">
  <h1>Usuarios</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
  Agregar
</button></div>

@if($errors->any())
<div class="alert alert-danger mt-2">
  <ul>
    @foreach($errors->all() as $error)
       <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success mt-2">
  {{session('success')}}
</div>
@endif

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
    <td><button  class="btn btnEliminar btn-danger" data-id="{{ $item->id }}"
     data-toggle="modal" data-target="#modalDelete">
    <i class="fa-solid fa-trash"></i>
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
            <input value="{{old('name')}}" type="text" class="form-control" id="name" name="name" aria-describedby="Name">
          </div>
          <div class="form-group">
            <label for="nickname">Nickname</label>
            <input value="{{old('nickname')}}" type="text" class="form-control" id="nickname" name="nickname" aria-describedby="Nickname">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input value="{{old('email')}}" type="email" class="form-control" id="email" name="email" aria-describedby="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input value="{{old('password')}}" type="password" class="form-control" id="password" name="password" aria-describedby="Password">
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input value="{{old('password-confirm')}}" type="password" class="form-control" id="password2" name="password-confirm" aria-describedby="Password2">
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


<div class="modal" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Deseas eliminar el usuario?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  $(document).ready(function(){
     $(".btnEliminar").on('click', function(event){
      var id= $(this).data('id')
      alert(id)
     });
  });
</script>
@endsection