<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h4>Editar categoría</h4></div>
                        <div class="col-md-6">
                            <a href="{{route('admin.categorias')}}" class="btn btn-primary pull-right">Lista de categorías</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                @if(Session::has('mensaje'))
                    <div class="alert alert-success" role="alert">{{Session::get('mensaje')}}</div>
                @endif
                    <form class="form-horizontal" wire:submit.prevent="actualizar">
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