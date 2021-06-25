<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
            @if(Session::has('mensaje'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('mensaje')}}
                </div>
            @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Detalles de la orden
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orden')}}" class="btn btn-primary pull-right">Ver órdenes</a>
                                @if ($orden->estado=='ordenado')
                                    <a href="#" wire:click.prevent="cancelarOrden" class="btn btn-primary pull-right margin:20px;">Cancelar orden</a>
                                @endif
                            </div>
                        </div>                        
                    </div>
                    <div class="panel-body">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Id</th>
                                    <td>{{$orden->id}}</td>
                                    <th>Fecha</th>
                                    <td>{{$orden->created_at}}</td>
                                    <th>Estado</th>
                                    <td>{{$orden->estado}}</td>
                                    @if ($orden->estado=="enviado")
                                        <th>Fecha de entrega</th>
                                    <td>{{$orden->fecha_envio}}</td>
                                    @else($orden->estado=="cancelado")
                                        <th>Fecha de cancelado</th>
                                    <td>{{$orden->fecha_cancel}}</td>
                                    @endif
                                </tr>
                        </table>
                        <div class="wrap-iten-in-cart">
                            <ul class="products-cart">
                                @foreach($orden->ordenItem as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('assets/images/products')}}/{{$item->producto->imagen}}" alt="{{$item->producto->imagen}}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{ route('producto.detalles', ['slug'=>$item->producto->slug])}}">{{$item->producto->nombre}}</a>
                                        </div>
                                        <div class="price-field produtc-price">
                                            <p class="price">{{$item->producto->precio_compra}}</p>
                                        </div>
                                        <div class="quantity">
                                            <div>
                                                <h5>{{$item->cantidad}}</h5>
                                            </div>
                                        </div>
                                        <div class="price-field total">
                                            <p class="price">{{$item->producto->precio_compra*$item->cantidad}}</p>
                                        </div>
                                    </li>
                                @endforeach											
                            </ul>
                        </div> 
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Detalles de la cuenta</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">$ {{$orden->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">IVA</span><b class="index">$ {{$orden->impuesto}}</b></p>
                                <p class="summary-info"><span class="title">Envío</span><b class="index">Envío gratis</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">$ {{$orden->total}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dirección de facturación
                    </div>
                    <div class="panel-body">
                        <table class="table table-light">
                                <tr>
                                    <th>Nombre completo</th>
                                    <td>{{$orden->nombre}}</td>
                                    <th>Apellido (s)</th>
                                    <td>{{$orden->apellidos}}</td>
                                </tr>
                                <tr>
                                    <th>Correo electrónico</th>
                                    <td>{{$orden->email}}</td>
                                    <th>Celular</th>
                                    <td>{{$orden->celular}}</td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td>{{$orden->direccion}}</td>
                                </tr>
                                <tr>
                                    <th>país</th>
                                    <td>{{$orden->pais}}</td>
                                    <th>Código Postal</th>
                                    <td>{{$orden->codigo_p}}</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($orden->dir_diferente)
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dirección de envío
                        </div>
                        <div class="panel-body">
                            <table class="table table-light">
                                <tr>
                                    <th>Nombre completo</th>
                                    <td>{{$orden->nombre}}</td>
                                    <th>Apellido (s)</th>
                                    <td>{{$orden->apellidos}}</td>
                                </tr>
                                <tr>
                                    <th>Correo electrónico</th>
                                    <td>{{$orden->email}}</td>
                                    <th>Celular</th>
                                    <td>{{$orden->celular}}</td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td>{{$orden->direccion}}</td>
                                </tr>
                                <tr>
                                    <th>país</th>
                                    <td>{{$orden->pais}}</td>
                                    <th>Código Postal</th>
                                    <td>{{$orden->codigo_po}}</td>
                                </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detalles de la transacción
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Tipo de transacción</th>
                                <td>{{$orden->transaccion->m_pago}}</td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>{{$orden->transaccion->estad_pago}}</td>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <td>{{$orden->transaccion->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>