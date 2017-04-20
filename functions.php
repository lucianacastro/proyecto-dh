<?php
function get_teams() {
	$teams = ['-- Elegí tu club --', 'Club Atlético Boca Juniors', 'Club Atlético Independiente', 'Club Atlético River Plate', 'Racing Club', 'Club Atlético San Lorenzo de Almagro','Club Atlético Huracán', 'Club Atlético Banfield', 'Club Atlético Belgrano', 'Club Atlético Newell\'s Old Boys', 'Club Ferro Carril Oeste', 'Club Atlético Aldosivi', 'Asociación Atlética Argentinos Juniors', 'Arsenal Fútbol Club', 'Atlético de Rafaela', 'Club Atlético Colón de Sant Fe', 'Club Atlético Tucumán', 'Club Social y Deportivo Defensa y Justicia', 'Club estudiantes de la Plata', 'Club Ginmasia y Esgrima de la Plata', 'Club Deportivo Godoy Cruz', 'Club Atlético Lanús', 'Club Olimpo de Bahia Blanca', 'Quilmes Atlético Club', 'Club Atlético Rosario Central', 'San Martin SJ', 'Club Atlético Sarmiento de Junín', 'Club Atlético Temperley', 'Club Atlético Tigre', 'Club Atlético Unión de Santa Fe', 'Club Atlético Patronato de la Juventud Católica'];
	asort($teams);
	return $teams;

}




?>