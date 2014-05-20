<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
header('Content-Type: text/html; charset=utf-8');
include("funciones_db.php");

$pdoArr = pdoQuery('SELECT idCarro, dirImg, nombre, mes, anio, killit, kilometraje, precio 
                    FROM carros
                    WHERE activo = 1');
$autos = $pdoArr->fetchAll(PDO::FETCH_ASSOC);
$tope = floor(count($autos)/2);

$carrosP1 = "";
$carrosP2 = "";
for($i=0; $i<count($autos); $i++) {
    $carro = "
        <div class='autos_item' data-id='".$autos[$i]['idCarro']."'>
            <div class='autos_imagen'>
               <a href='#'><img src='img/db_imgs/".$autos[$i]['dirImg']."' alt=''></a>
            </div>
            <div class='ficha_tecnica'>
                <h3><a href='#'>".$autos[$i]['nombre']."</a></h3>
                <div class='datos_auto_fila'><span>Fecha:</span> ".$autos[$i]['mes'].$autos[$i]['anio']."</div>
                <div class='datos_auto_fila'><span>Kilómetros por litro:</span> ".$autos[$i]['killit']." km/lt</div>
                <div class='datos_auto_fila'><span>Kilometraje</span> ".$autos[$i]['kilometraje']."</div>
                <div class='precio_auto'>$".$autos[$i]['precio']."</div>
            </div>
        </div>";
    
    if($i < $tope)
        $carrosP1 .= $carro;
    else
        $carrosP2 .= $carro;
}

?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="RPM motors venta de Autos" content="Venta de Automóviles">
<meta name="Carros autos Durango" content="compra venta de autos">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>RPM Motors - Venta de automóviles a los mejores precios de Durango</title>

<link rel="shortcut icon" href="#">

<link href="css/estilo.css" media="screen" rel="stylesheet">
<link href="css/screen.css" media="screen" rel="stylesheet">
<link href="css/bootstrap.css" media="screen" rel="stylesheet">




<script src="js/libs/modernizr.min.js"></script>
<script src="js/libs/respond.min.js"></script>					 
<script src="js/libs/jquery.min.js"></script>

<script src="js/jquery.easing.min.js"></script>
<script src="js/general.js"></script>
<script src="js/hoverIntent.js"></script>

<script src="js/jquery.carouFredSel.min.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>


<link rel="stylesheet" href="css/cusel.css">
<script src="js/cusel-min.js"></script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.totemticker.js"></script>
   
    <script type="text/javascript">
        $(document).on('ready', function() {
            $('#vertical-ticker').totemticker({
                row_height  :   '100px',
                next        :   '#ticker-next',
                previous    :   '#ticker-previous',
                stop        :   '#stop',
                start       :   '#start',
                mousestop   :   true,
            });
            
            
            $('.autos_item .autos_imagen a').on('click', function() {
                TINY.box.show({iframe:'autos.html',boxid:'frameless',width:900,height:650,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}});
            });
        });
    </script>
<script type="text/javascript">

</script>
</head>

<body>
<div class="body_completo pagina_inicio">
	<div class="header_arriba">
		<div class="contenedor">
			<div class="logotipo">
				<a href="index.html"><img src="img/rpmlogo.png" alt=""></a>
			</div>
			
			<nav id="menu_principal" class="clearfix">            
				
				<ul class="menu_opciones">    
                	<li class="menu_nivel_0 current-menu-ancestor"><a href="#"><span>Inicio</span></a>
						
					</li>                                                                            
					<li class="menu_nivel_0"><a href="#autos"><span>Autos</span></a>
                    	
                    </li>       
                    <li class="menu_nivel_0 mega-nav"><a href="#"><span>Servicios</span></a>
                    	<ul class="submenu-1">
							<li class="menu_nivel_1 mega-nav-widget">
							<div class="contenedor_rpm menu_items_rpm"> 
									<h3 class="titulo-menu-item">Planes de crédito a su medida.</h3>								
									<ul>
										<li class="clearfix">
											<a href="#" class="nombre_link">Tasa de interés Baja.</a>
										</li>
										<li class="clearfix">
											<a href="#" class="nombre_link">Mensualidades fijas.</a>
										</li>
                                        <li class="clearfix">
                                            <a href="#" class="nombre_link">Bonificación de intereses.</a>
                                        </li>
										
									</ul>
								</div>
								
							</li>
							<li class="menu_nivel_1 mega-nav-widget">                            	
								
								<div class="contenedor_rpm widget_featured_posts"> 
									<h3 class="titulo-menu-item">Compra Venta y Consignación de vehículos usados</h3>
									<ul>
										<li class="informacion_item">
											<div class="informacion_item_titulo"><a href="#">Precios Accesibles</a></div>
											<div class="info_menu">Ofertas <span class="post-author">Gran venta</span></div>
											<div class="imagen_menu"><a href="#"><img src="img/temp/featured_thumb_1.jpg" alt=""></a></div>
													
										</li>																		                    
									</ul>										
								</div>
								
							</li>     
							<li class="menu_nivel_1 mega-nav-widget">        
								
								<div class="contenedor_rpm widget_twitter">							
									<h3 class="titulo-menu-item">Más servicios de RPM</h3>							
									<div class="servicios_otros">											   
										<div class="info_servicios_menu clearfix">
											<div class="img_avatar"><img src="img/temp/twitter_avatar.png" width="30" height="30" alt="" /></div>
											<div class="texto_servicios">
												<div class="informacion_item_titulo">
												Disfruta del mejor servicio en Durango  <a href="#">Ir</a>
											
												</div>
											</div>
										</div>   
										
										<div class="info_servicios_menu clearfix">
											<div class="img_avatar"><img src="img/temp/twitter_avatar.png" width="30" height="30" alt="" /></div>
											<div class="texto_servicios">
												<div class="texto_servicios">
												Lorem ipsum dolor sit amet, consectetur adiping elit. Class aptent taciti sociosqu ad litora torquent per conubia nostr <a href="#">h</a>
												
											  </div>
											</div>
										</div>								
									</div>
								
							</div>
					
							</li>												
						</ul>  
                    </li>
	                <li class="menu_nivel_0 mega-nav"><a href="#"><span>Acerca de</span></a>
	                	
	                            
	                        </li>	                        
                            <li class="menu_nivel_1"><a href="#mensualidades"><span>Mensualidades</span></a>
	                        
							</li>
	                        <li class="menu_nivel_1"><a href="contacto.html"><span>Contacto</span></a>
	                         
							</li>                        	                                                                    
	                    </ul>
	                </li>
                   					                              
				</ul>   
			</nav>    
		<!--/ menu_principal -->
		</div>
	</div>
	<!--/ header barra arriba-->

<div class="header" style="background:#000">
            

    <div class="ancho_completo_contenedor"> 
		<div class="banner_ancho_completo">
        	<ul>
				<li data-transition="fade" data-slotamount="1" data-masterspeed="500">
					<img src="img/temp/slider_1_1.jpg" data-fullwidthcentering="on">
                                      
				</li>
            </ul>
        </div>          
	</div>
  
</div>
<div class="zona_autos zona_gris clearfix">
    <h2 class="titulo_secciones">Nuestros Autos</h2>
    <a name="autos"></a> 
    <div class="oferta_autos">
        <?php
            echo $carrosP1;
        ?>
    </div>
    <div class="oferta_autos metiche">
        <?php
            echo $carrosP2;
        ?>
    </div>	
    <section class="columna_derecha metiche">
        <ul id="vertical-ticker">
            <li>Oferta 1</li>
            <li>Otros</li>
            <li><img src="img/temp/special_offer_3.jpg" alt=""></li>
            <li><img src="img/rpmlogo.png" alt=""></li>
            <li>Eenie Meenie</li>
            <li>Never Say Never</li>
            <li>U Smile</li>
            <li>U Smile</li>
            <li>U Smile</li>
            <li>U Smile</li>
        </ul>
    </section>
</div>

	<a name="mensualidades"><div class="zona_autos franja_blanca clearfix"></a>  
		<h2 class="titulo_secciones">Calcula las mensualidades. </h2>
      
        <form id="calculo" name="calculo" action="meses.php" method="post" class="formulario_pago">
            
            <input id="txtCosto"name="txtCosto"type="Text"class="costo form-control"  placeholder="Escriba el Precio del auto" required/>
     

            <select id="sltMeses" name="sltMeses"class="form-control control_select">
                <option>Seleccione las mensualidades</option>
                <option value="12">12 </option>
                <option value="15">15 </option>
                <option value="18">18 </option>
                <option value="24">24 </option>
                <option value="30">30 </option>
                <option value="36">36 </option>


            </select>
            <input id="btnCalcular" class="btn btn-danger btn-lg" value="Calcular"/>

            
        </form>
        
          <section class="oferta_pago metiche2">
               <figure> <img src="img/temp/service_2.jpg"/></figure>
          </section>
       
	</div>
    
    <!-- marcas populares -->
	<div class="zona_autos zona_gris lista_marcas">
		
	            <h2 class="titulo_secciones">MARCAS POPULARES:</h2>
	            <ul class="marcas_ul">
	            	<li><a href="#"><img src="img/temp/marca_logo_1.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_2.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_3.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_4.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_5.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_6.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_7.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_8.png" alt=""></a></li>
                    <li><a href="#"><img src="img/temp/marca_logo_9.png" alt=""></a></li>

	            </ul>
	 
	</div>
    <!--/ marcas -->
    
<!--/ mitad -->

<footer id="footer_rpm">
<article class="caja_info">
<h5>Diseñado por: Grupo Arvum División de TI</h5><a href="http://arvumti.com/"> www.arvumti.com </a></article>
<article class="caja_info">
    
</article>
<article class="caja_info">Jesus valadez Villegas</section>
</footer>
<!--/ultimo div cuerpo-->
</div>
</body>
</html>