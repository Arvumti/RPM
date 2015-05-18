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

error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
header('Content-Type: text/html; charset=utf-8');
include("funciones_db.php");

$id = $_GET['id'];

$auto = select("  SELECT  idCarro, dirImg, nombre, modelo, killit, kilometraje, precio,
                            CASE tipo   WHEN 1 THEN 'Hatchback'
                                        WHEN 2 THEN 'Sedán'
                                        WHEN 3 THEN 'SUV'
                                        WHEN 4 THEN 'Pickup'
                                        WHEN 5 THEN 'Convertible'
                                        WHEN 6 THEN 'Camión'
                                        WHEN 7 THEN 'Motocicleta'
                                        WHEN 8 THEN 'Deportivo'
                            END tipo
                  FROM carros
                  WHERE idCarro = {$id}");
$auto = $auto[0];

$carro = '';
if(strlen($auto['dirImg']) > 0)
  $carro = '
            <li data-thumb="img/db_imgs/'.$auto['dirImg'].'">
              <img src="img/db_imgs/'.$auto['dirImg'].'" />
            </li>
           ';

$galeria = select(" SELECT  direccion
                    FROM galerias
                    WHERE idCarro = {$id}");

for ($i=0; $i < count($galeria); $i++) { 
  $carro .= '
          <li data-thumb="'.$galeria[$i]['direccion'].'">
            <img src="'.$galeria[$i]['direccion'].'" />
          </li>
         ';
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
            <?php echo $carro; ?>          
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
        <h3><?php echo $auto['nombre']; ?></h3>
        <div class="datos_auto_fila_2"><span>Tipo:</span> <?php echo $auto['tipo']; ?></div>
        <div class="datos_auto_fila_2"><span>Modelo:</span> <?php echo $auto['modelo']; ?></div>
        <div class="datos_auto_fila_2"><span>Kilómetros por litro:</span> <?php echo $auto['killit']; ?> km/lt</div>
        <div class="datos_auto_fila_2"><span>Kilometraje</span> <?php echo $auto['kilometraje']; ?></div>
        <div class="precio_auto_2">$<?php echo $auto['precio']; ?></div>
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
