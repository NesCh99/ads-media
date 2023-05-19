<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('css/client/welcome.css') }}" rel="stylesheet">
	
    </head>
    <body>
    <div class="header">
			<div class="logo">
				<img src="img/logo.svg" alt="">
				<div class="clearfix"></div>
				<div class="margin_top3"></div>
				<br>
				<h6 class="top-small"><span>Campeonatos y Eventos Deportivos</span></h6>
				<h3 class="subtitle">¿Qué quieres ver? <br> Campeonatos y eventos deportivos en ADS Media.</h3>
				<br>

                   @if (Route::has('login'))
               
                    @auth

                        <a href="{{ route('cliente.home')}}" class="wow pulse " data-wow-offset="20"  data-wow-iteration="20" >Streaming<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    @else
                       
                        <a href="{{ route('login') }}" class="wow pulse " data-wow-offset="20"  data-wow-iteration="20">Iniciar Sesión<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="wow pulse " data-wow-offset="20"  data-wow-iteration="20" >Registrarse <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        @endif
                    @endauth
                
                @endif

			</div>
			<div class="clearfix"></div>
		</div>
		<section class="sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="sec-title-container text-center">
							<h5 class="font-weight-4 less-mar-1 line-height-4 text-white opacity-5">ADS Media</h5>
							<h1 class="font-weight-6 less-mar-1 line-height-5 text-white">Eventos deportivos exclusivos
							
							</h1>
							<div class="clearfix"></div>
							<br><br>
							<a class="btn btn-prim btn-medium uppercase" href="{{ route('register') }}"><i class="fa fa-play-circle" aria-hidden="true"></i> Inicia aquí ! </a> 
						</div>
					</div>
					<div class="clearfix"></div>
					<!--end title-->
					<div class="divider-line solid light-2 opacity-2"></div>
					<div class="col-md-6 col-centered text-center">
						
						<div class="clearfix"></div>
						<p>Copyright © 2023 <a href="{{ route('cliente.home')}}">Ads Publicidad</a> | Todos los derechos reservados.</p>
					</div>
					<!--end item-->
					<div class="clearfix"></div>
				</div>
			</div>
		</section>     
		
    </body>
</html>
