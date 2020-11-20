# Rangeao
Convierte rango de número en rangos literales y vice versa.

## Instalación
Instálalo desde composer

```
composer require jsanbae/rangeao
```

## Ejemplo de uso

```
$secuencia = [0,1,2,3,4,15,16,17,28];
$Rangeao = new Rangeao($secuencia);
$Rangeao->toLitealRange();

$rangoLiteral = ['0-2',5, '7-11'];
```

Devuelve:

```
#de secuencia a rango literal
['0-4', '15-17', 28]

#de rango literal a secuencia
[0,1,2,5,7,8,9,10,11]
```
 
## Contribución
Esto librería es muy simple para el uso que le doy, sin embargo se que puede mejorar con contribuciones de quienes la usen.

Sugiere tus propias mejoras, como por ejemplo soporte para rangos negativos o decimales. Te invito a discutirlas en "Issues" antes de enviar tus "Pull Requests".

Los "Pull requests" para bugs siempre son bienvenidos, por favor explica el bug que estás intentando corregir en el mensaje.
 
Hay solo algunas pruebas unitarias en el PHPUnit. Sería genial tener más tests para obtener mayor cobertura en otros casos. 

Sientete libre en contribuir con eso.
