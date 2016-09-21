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