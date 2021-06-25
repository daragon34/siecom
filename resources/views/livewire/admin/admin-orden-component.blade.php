<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de órdenes solicitadas
                    </div>
                    <div class="panel-body">
                    @if(Session::has('mensaje'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('mensaje')}}
                        </div>
                    @endif
                         <table class="table table-light">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Nombre (s)</th>
                                    <th scope="col">Apellido (s)</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Código Postal</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Detalles</th>
                                    <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ordenes as $orden)
                                        <tr>
                                            <td>{{$orden->id}}</td>
                                            <td>{{$orden->total}}</td>
                                            <td>{{$orden->nombre}}</td>
                                            <td>{{$orden->apellidos}}</td>
                                            <td>{{$orden->email}}</td>
                                            <td>{{$orden->celular}}</td>
                                            <td>{{$orden->direccion}}</td>
                                            <td>{{$orden->pais}}</td>
                                            <td>{{$orden->departamento}}</td>
                                            <td>{{$orden->municipio}}</td>
                                            <td>{{$orden->codigo_p}}</td>
                                            <td>{{$orden->estado}}</td>
                                            <td>{{$orden->created_at}}</td>
                                            <td><a href="{{route('admin.ordendetalle', ['orden_id'=>$orden->id])}}" class="btn btn-primary">Ver detalles</td>
                                            <td>
                                             <div class="dropdown">
                                                 <button id="btn btn-secondary" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estado
                                                 <span class="caret"></span></button>
                                                 <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="actualizarEstado({{$orden->id}},'enviado')">Enviado</a></li>
                                                    <li><a href="#" wire:click.prevent="actualizarEstado({{$orden->id}},'cancelado')">Cancelado</a></li>
                                                 </ul>
                                             </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>  
                        {{$ordenes->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>