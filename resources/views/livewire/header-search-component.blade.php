<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="{{route('producto.search')}}" id="form-search-top" name="form-search-top">
            <input type="text" name="search" value="{{$search}}" placeholder="Buscar">
            <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                <input type="hidden" name="producto_cat" value="{{$producto_cat}}" id="producto-cate">
                <input type="hidden" name="producto_cat_id" value="{{$producto_cat_id}}" id="producto-cate-id">
                <a href="#" class="link-control">{{str_split($producto_cat,12)[0]}}</a>
                <ul class="list-cate">
                    <li class="level-0">Todas las categorías</li>
                    @foreach($categorias as $categoria)
                        <li class="level-1" data-id="{{$categoria->id}}">{{$categoria->nombre}}</li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>