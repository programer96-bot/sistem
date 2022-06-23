Mostrar Lista de Usuarios

@extends('layouts.app')

@section('content')
 <div class="container">



            @if(Session::has('mensaje'))
            <div class="alert alert-success alert dismissible" role="alert">
               {{Session::get('mensaje')}}
            </div>


            @endif

     <a href="{{url ('usuario/create') }}" class="btn btn-success" >Registrar nuevo usuario </a>
     <br/>
     <br/>
     <table class="table table-light">
     <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>TipoIdent</th>
            <th>NIdent</th>
            <th>Fecha</th>
            <th>Contraseña</th>
            <th>Acciones</th>
        </tr>
     </thead>
     <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }} </td>
            <td>{{ $usuario->Nombres }} </td>
            <td>{{ $usuario->Apellidos }} </td>
            <td>{{ $usuario->TipoIdent }} </td>
            <td>{{ $usuario->NIdent }} </td>
            <td>{{ $usuario->Fecha}} </td>
            <td>{{ $usuario->Contraseña}} </td>
            <td>

            <a href="{{url('/usuario/'.$usuario->id.'/edit')}}" class="btn-btn-warning">
                     Editar

            </a>


            <form action="{{ url('/usuario/'.$usuario->id) }}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE') }}

            <input class = "btn btn-danger" type="submit" anclick="return confirm('¿Quieres borrar?')"
                    value="Borrar">

                    </form>

                </td>
            </tr>
             @endforeach

        </tbody>
        </table>
        {!! $usuarios->links() !!}
    </div>
@endsection
