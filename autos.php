<?php 
//error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
//header('Content-Type: text/html; charset=utf-8');
//include("funciones_db.php");



//$pdoArr = pdoQuery('SELECT  idCarro, dirGal, FROM galeria WHERE ');
//$autoGal = $pdoArr->fetchAll(PDO::FETCH_ASSOC);


//$galeriaCar = "";

//for($i=0; $i<count($imagen); $i++) {
  //  $fotos= "
    //        <li data-thumb='img/db_imgs/".$imagen[$i]"['dirGal'].'">
      //        <img src='img/db_imgs/".$imagen[$i]"['dirGal'].'"  />
        //    </li>";
    
   
//}

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="RPM motors venta de Autos" content="Venta de Automóviles">
<meta name="Carros autos Durango" content="compra venta de autos">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>RPM motors - Venta de automóviles a los mejores precios de Durango</title>

<link rel="shortcut icon" href="#">

<link href="css/estilo.css" media="screen" rel="stylesheet">
<link href="foundation/css/foundation.css" media="screen" rel="stylesheet">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script src="js/modernizr.js"></script>
</head>

<body>
<div class="body_completo pagina_inicio">
	<div class="header_arriba">
		<div class="contenedor">
			<div class="logotipo">
				<a href="index.html"><img src="img/rpmlogo.png" alt=""></a>
			</div>
			
			
		</div>
	</div>
	<!--/ header barra arriba-->

<div class="header" style="background:#000">
            

    <div class="ancho_completo_contenedor"> 
		<div class="banner_ancho_completo">
     <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            
            <li data-thumb="img/temp/slider_1_2.jpg">
              <img src="img/temp/slider_1_2.jpg" />
            </li>
            <li data-thumb="img/temp/slider_1_3.jpg">
              <img src="img/temp/slider_1_3.jpg" />
            </li>
             <li data-thumb="img/temp/slider_1_3.jpg">
              <img src="img/temp/slider_1_3.jpg" />
            </li>
          
          </ul>
        </div>
      </section>
       <aside>
       
        
    
      </aside>
        </div>          
	</div>
  
</div>
<div class="row"> 
  <div class="zona_autos zona_gris clearfix">
     <h2 class="titulo_secciones">Ficha Técnica del Auto</h2>
     
     <div class="ficha_tecnica_autos">
        <h3>Alfa Romeo Mito</h3>
        <div class="datos_auto_fila_2"><span>Fecha:</span> FEB 2013</div>
        <div class="datos_auto_fila_2"><span>Kilómetros por litro:</span> 50,6 km/lt</div>
        <div class="datos_auto_fila_2"><span>Kilometraje</span> 170,443</div>
        <div class="precio_auto_2">$32233.690</div>
     </div>
  </div>

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
	            </ul>
	 
	</div>
    <!--/ marcas -->
    
<!--/ mitad -->

<footer>
<article>
Grupo Arvum División de TI</article>
<article>
 	<a href="http://arvumti.com/"> www.arvumti.com </a>
</article>
</footer>
<!--/ultimo div cuerpo-->
</div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>
</body>
</html>
