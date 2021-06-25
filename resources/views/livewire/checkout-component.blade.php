	<main id="main" class="main-site">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">Inicio</a></li>
					<li class="item-link"><span>Procesar pago</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<form wire:submit.prevent="crearOrden">
					<div class="row">
						<div class="wrap-address-billing">
							<h3 class="box-title">Dirección principal</h3>
							<div class="billing-address">
								<p class="row-in-form">
									<label for="fname">Nombre completo<span>*</span></label>
									<input type="text" name="fname" value="" wire:model="nombre" placeholder="Escriba su nombre completo">
									@error('nombre')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="lname">Apellidos<span>*</span></label>
									<input type="text" name="lname" value="" wire:model="apellidos" placeholder="Escriba su(s) apellido(s))">
									@error('apellidos')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="email">Correo electrónico:</label>
									<input type="email" name="email" value="" wire:model="email" placeholder="Escriba su email">
									@error('email')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Celular<span>*</span></label>
									<input type="number" name="phone" value="" wire:model="celular" placeholder="Escriba su celular">
									@error('celular')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
										<label for="phone">Teléfono de contacto<span>*</span></label>
										<input type="number" name="phone" value="" wire:model="telefono" placeholder="Teléfono de contacto">
										@error('telefono')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Dirección:</label>
									<input type="text" name="add" value="" wire:model="direccion" placeholder="Escriba su dirección">
									@error('direccion')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">País<span>*</span></label>
									<input type="text" name="country" value="" wire:model="pais" placeholder="Escriba su país">
									@error('pais')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="departamento">Departamento<span>*</span></label>
									<input type="text" name="departamento" value="" wire:model="departamento" placeholder="Escriba el departamento">
									@error('departamento')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="city">Ciudad<span>*</span></label>
									<input type="text" name="city" value="" wire:model="municipio" placeholder="Escriba la ciudad">
									@error('municipio')<span class="text-danger">{{$message}}</span> @enderror
								</p>							
								<p class="row-in-form">
									<label for="zip-code">Código Postal:</label>
									<input id="zip-code" type="number" name="zip-code" value="" wire:model="codigo_p" placeholder="Escriba su código postal">
									@error('codigo_p')<span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form fill-wife">
									<label class="checkbox-field">
										<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="direccion_diferente">
										<span>¿Desea enviar a otra dirección?</span>
									</label>
								</p>
							</div>
						</div>
						@if($direccion_diferente)
							<div class="wrap-address-billing">
								<h3 class="box-title">Dirección secundaria</h3>
								<div class="billing-address">
									<p class="row-in-form">
										<label for="fname">Nombre completo<span>*</span></label>
										<input type="text" name="fname" value="" wire:model="nombre_" placeholder="Escriba su nombre completo">
										@error('nombre_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="lname">Apellidos<span>*</span></label>
										<input type="text" name="lname" value="" wire:model="apellidos_" placeholder="Escriba su(s) apellido(s))">
										@error('apellidos_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="email">Correo electrónico:</label>
										<input type="email" name="email" value="" wire:model="email_" placeholder="Escriba su email">
										@error('email_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Celular<span>*</span></label>
										<input type="number" name="phone" value="" wire:model="celular_" placeholder="Escriba su celular">
										@error('celular_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Teléfono de contacto<span>*</span></label>
										<input type="number" name="phone" value="" wire:model="telefono_" placeholder="Teléfono de contacto">
										@error('telefono_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">Dirección:</label>
										<input type="text" name="add" value="" wire:model="direccion_" placeholder="Escriba su dirección">
										@error('direccion_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="country">País<span>*</span></label>
										<input type="text" name="country" value="" wire:model="pais_" placeholder="Escriba su país">
										@error('pais_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="departamento">Departamento<span>*</span></label>
										<input type="text" name="departamento" value="" wire:model="departamento_" placeholder="Escriba el departamento">
										@error('departamento_')<span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="city">Ciudad<span>*</span></label>
										<input type="text" name="city" value="" wire:model="municipio_" placeholder="Escriba la ciudad">
										@error('municipio_')<span class="text-danger">{{$message}}</span> @enderror
									</p>							
									<p class="row-in-form">
										<label for="zip-code">Código Postal:</label>
										<input id="zip-code" type="number" name="zip-code" value="" wire:model="codigo_po" placeholder="Escriba su código postal">
										@error('codigo_po')<span class="text-danger">{{$message}}</span> @enderror
									</p>
								</div>
							</div>
						@endif					
					</div>
					<div class="summary summary-checkout">
							<div class="summary-item payment-method">
								<h4 class="title-box">Método de pago</h4>
								<div class="choose-payment-methods">
									<label class="payment-method">
										<input name="payment-method" id="payment-method-bank" value="codigo" type="radio" wire:model="metodopago" >
										<span>Pago con código</span>
										<span class="payment-desc">El sistema genera un código con el cual puede pagar en sucursales de pago en efectivo</span>
									</label>
									<label class="payment-method">
										<input name="payment-method" id="payment-method-visa" value="tarjeta" type="radio" wire:model="metodopago">
										<span>Tarjeta Débido / Crédito</span>
										<span class="payment-desc">Debe tener una tarjeta vigente de su banco y autorizada para realizar transacciones online</span>
									</label>
									<label class="payment-method">
										<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="metodopago">
										<span>Paypal</span>
										<span class="payment-desc">Usted puede pagar con su cuenta de paypal</span>
									</label>									
									@error('metodopago')<span class="text-danger">{{$message}}</span> @enderror
								</div>
								@if(Session::has('checkout'))
									<p class="summary-info grand-total"><span>Total</span><span class="grand-total-price">$ {{Session::get('checkout')['total']}}</span></p>
								@endif
								<button type="submit" class="btn btn-medium">Realizar pago</button>
							</div>
							<div class="summary-item shipping-method">
								<h4 class="title-box f-title">Método de envío</h4>
								<p class="summary-info"><span class="title">Costo de envío $ 0</span></p>
								<h4 class="title-box">Código de descuento</h4>
								<p class="row-in-form">
									<label for="coupon-code">Ingresar el código:</label>
									<input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
								</p>
								<a href="#" class="btn btn-small">Aplicar</a>
							</div>
						</div>
					</div>
				</form>
			</div><!--end main content area-->
		</div><!--end container-->
	</main>