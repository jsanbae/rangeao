# Rangeao
Convierte rango de número en rangos literales y vice versa.

## Instalación
Instálalo desde composer con

´´´
composer install jsanbae/rangeao
´´´

## Ejemplo de uso

´´´
$rango = [0,1,2,3,4];
$Rangeao = new Rangeao($rango);
$Rangeao->toLitealRange(); 
´´´

Devuelve:

´´´
['0-4']
´´´ 
