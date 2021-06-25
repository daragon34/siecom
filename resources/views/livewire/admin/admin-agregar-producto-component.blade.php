<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>Agregar productos</h4></div>
                        <div class="col-md-6">
                            <a href="{{route('admin.productos')}}" class="btn btn-primary pull-right">Ver productos</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                @if(Session::has('mensaje'))
                    <div class="alert alert-success" role="alert">{{Session::get('mensaje')}}</div>
                @endif
                    <form class="form-horizontal" wire:submit.prevent="agregarProducto">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Escriba el nombre de la categoría" class="form-control input-md" wire:model="nombre" wire:keyup="copiarNombre"/>
                                @error('nombre') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Escriba el slug" class="form-control input-md" readonly wire:model="slug"/>
                                @error('slug') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripción Corta</label>
                            <div class="col-md-4" wire:ignore>
                                <input type="text" id="descripcion_corta" placeholder="Escriba una pequeña descripción del producto" class="form-control input-md" wire:model="descripcion_corta"/>
                                @error('descripcion_corta') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-4" wire:ignore>
                                <input type="text" id="descripcion" placeholder="Escriba una descripción del producto" class="form-control input-md"  wire:model="descripcion"/>
                                @error('descripcion') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio Regular</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Escriba el precio del producto" class="form-control input-md"  wire:model="precio_regular"/>
                                @error('precio_regular') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio de Compra</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Escriba el precio de compra del producto" class="form-control input-md"  wire:model="precio_compra"/>
                                @error('precio_compra') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Disponibilidad</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="disponibilidad">
                                    <option value="disponible">Disponible</option>
                                    <option value="agotado">Agotado</option>
                                </select>
                                @error('disponibilidad') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">¿Desea destacar este producto?</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="destacar">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                                @error('destacar') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Código de almacenamiento</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Codifique el producto de acuerdo con el estándar" class="form-control input-md"  wire:model="sku"/>
                                @error('sku') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cantidad</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese la cantidad del producto" class="form-control input-md"  wire:model="cantidad"/>
                                @error('cantidad') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-4">
                                <input type="file" class="form-control input-md"  wire:model="imagen"/>
                                @if($imagen)
                                    <img src="{{$imagen->temporaryUrl()}}" width="100"/>
                                @endif
                                @error('imagen') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Categoría</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="categoria_id">
                                    <option value=" ">Seleccione la categoría</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id') <p class="text-warning">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#descripcion_corta',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var descr = $('#descripcion_corta').val();
                        @this.set('descripcion_corta',descr);
                    });
                }
            });

            tinymce.init({
                selector:'#descripcion',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var desc = $('#descripcion').val();
                        @this.set('descripcion',desc);
                    });
                }
            });
        });
    </script>
@endpush