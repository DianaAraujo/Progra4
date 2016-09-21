<?php

/*
 *Título: Algoritmo de preguntas y respuestas
 *Autor:  Grupo #?
 *Versión: 1.0
 *Fecha: 20/09/2016
*/

	//Inicializamos el request de ID, porque en un inicio la ruta no tiene ningun parametro
	if(!isset($_REQUEST['id'])){
		$_REQUEST['id'] = 0;
	}

	//Arreglos con preguntas
	$preguntas = array(
		"¿En que a&ntilde;o termino la segunda guerra mundial?",
		"¿Como se llama el hombre más adinerado de Mexico?",
		"¿Que día se celebra la independencia de El Salvador?"
	);

	//Arreglos con respuestas
	$respuestas = array(
		array(
			'En el a&ntilde;o 1945',
			'En el a&ntilde;o 1995',
			'En el año 2001',
			'En el año 1981',
			'correcta' => 0
		),
		array(
			'Richard Branson',
			'Carlos Slim',
			'Amancio Ortega',
			'Enrique Peña Nieto',
			'correcta' => 1
		),
		array(
			'El 12 de septiembre',
			'El 15 de septiembre',
			'El 24 de Diciembre',
			'El 5 de septiembre',
			'correcta' => 1)
		);

	$final 	= count($preguntas);
	$id 	= $_REQUEST['id'];
	$fallo 	= "false";

	if($id != $final)
	{
		$indice_correcta 	= $respuestas[$id]['correcta'];
		$pregunta 			= $preguntas[$id];

		if($id != 0)
		{

			$id = $id - 1;
			$indice_correcta = $respuestas[$id]['correcta'];

			if(isset($_REQUEST['r']))
			{
				$seleccionada = $_REQUEST['r'];
				if($indice_correcta == $seleccionada)
				{
			 		$id = $id + 1;
				}
				else
				{
			  		$fallo = "true";
				}
		 	}
		}
		elseif($final == $id)
		{

			$id = $id - 1;
			$indice_correcta = $respuestas[$id]['correcta'];

			if(isset($_REQUEST['r']))
			{
				$seleccionada = $_REQUEST['r'];
				if($indice_correcta == $seleccionada)
				{
			  		$win = "true";
				}else
				{
			  		$fallo = "true";
				}
		  	}
		}
	}

	if($fallo == "false")
	{
		$fondo = "bien";
	}
	else
	{
		$fondo = "mal";
	}
?>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="UTF-8">
	<meta name="author" content="Grupo progra">
	<!--<meta http-equiv="refresh" content="900">-->
	<link rel="icon" href="elephant.png">

	<title>Quieres ser millonario</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="css/main.css" type="text/css" rel="stylesheet">
</head>
<body class="<?php echo $fondo ;?>">
  	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="logo">
					<img src="http://4.bp.blogspot.com/-Q8H7ecFhIJE/URSKFpmf3WI/AAAAAAAAA8o/ePZRIGK_Cnw/s1600/QUIEN+QUIERE+SER+MILLONARIO.png" alt="">
				</div>
			</div>
		</div>
		<?php
			if($fallo == "false")
			{
				if($final == $id )
				{
					$id = $id - 1;
					$indice_correcta = $respuestas[$id]['correcta'];
					if(isset($_REQUEST['r']))
					{
						$seleccionada = $_REQUEST['r'];
						if($indice_correcta == $seleccionada)
						{
						echo "<h1 class='felicidades'>¡Has ganado, felicidades!</h1></br><center><a href='?id=0' class='iniciar'>Iniciar de nuevo</a></center>";
						}
						else
						{
							echo "<h1 class='felicidades'>Lo sentimos, has perdido</h1></br><center><a href='?id=0' class='iniciar'>Iniciar de nuevo</a></center>";
						}
					}
				}
				else
				{
		?>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="preguntas">
					<h2><?php echo $pregunta;?></h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="respuestas">
				<?php
					for($i = 3; $i >= 0 ; $i--)
					{
					$link = $id+1;
				?>
				<a href="<?php echo "?id=".$link."&r=".$i;?>">
					<div class="col-md-5 col-md-offset-1">
						<h4>
							<?php echo $respuestas[$id][$i]; ?>
						</h4>
					</div>
				</a>
				<?php
				}
				?>
			</div>
			<?php

				}
			}
			else
			{

			?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h1 class='felicidades'>Lo sentimos, has perdido</h1>
					</br>
					<center>
						<a href='?id=0' class='iniciar'>Iniciar de nuevo</a>
					</center>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</body>
</html>
