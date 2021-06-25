<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>Todos los productos</h4></div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addproducto')}}" class="btn btn-primary pull-right">Añadir producto</a>
                        </div>
                    </div>
                </div>
                    <div class="panel-body">
                        @if(Session::has('mensaje'))
                            <div class="alert alert-success" role="alert">{{Session::get('mensaje')}}</div>
                        @endif
                        <table class="table table-striped table-light">
                             <thead>
                                <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Precio regular</th>
                                <th scope="col">Precio de compra</th>
                                <th scope="col">Disponibilidad</th>
                                <th scope="col">Destacar</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                     <tr>
                                        <td>{{$producto->id}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        <td>{{$producto->slug}}</td>
                                        <td>{{$producto->precio_regular}}</td>
                                        <td>{{$producto->precio_compra}}</td>
                                        <td>{{$producto->disponibilidad}}</td>
                                        <td>{{$producto->destacar}}</td>
                                        <td>{{$producto->sku}}</td>
                                        <td>{{$producto->cantidad}}</td>
                                        <td><img src="{{asset('assets/images/products')}}/{{$producto->imagen}}" width="100"/></td>
                                        <td>{{$producto->categoria_id}}</td>
                                        <td>
                                            <a href="{{route('admin.editproducto', ['producto_slug'=>$producto->slug])}}"><i class="fa fa-edit fa-2x"></i></a>                                                                    
                                        </td>
                                        <td>
                                             <a href="#" onclick="confirm('¿Está usted seguro de eliminar este registro?') || event.stopImmediatePropagation()" wire:click.prevent="borrarProducto({{$producto->id}})"><i class="fa fa-trash fa-2x"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$productos->links()}}
                    </div>
            </div>
        </div>
    </div>
</div>