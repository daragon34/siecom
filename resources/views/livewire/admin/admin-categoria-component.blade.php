<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>Lista de categorías creadas</h4></div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addcategorias')}}" class="btn btn-primary pull-right">Añadir categoría</a>
                        </div>
                    </div>
                </div>
                    <div class="panel-body">
                        <table class="table table-striped table-light">
                             <thead>
                                <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorias as $categoria)
                                     <tr>
                                        <td>{{$categoria->id}}</td>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->slug}}</td>
                                        <td>{{$categoria->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.editcategorias', ['categoria_slug'=>$categoria->slug])}}"><i class="fa fa-edit fa-2x"></i></a>                                     
                                        </td>
                                        <td>
                                            <a href="#" onclick="confirm('¿Está usted seguro de eliminar este registro?') || event.stopImmediatePropagation()" wire:click.prevent="borrar({{$categoria->id}})"><i class="fa fa-trash fa-2x"></i></a>                                     
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categorias->links()}}
                    </div>
            </div>
        </div>
    </div>
</div>