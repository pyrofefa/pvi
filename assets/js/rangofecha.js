
// Obtenemos el rango de fechas de la semana en la que estamos
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var f=new Date();
switch (diasSemana[f.getDay()])
{
case 'Lunes':
fechainicio = new Date(f.getTime());
//Separamos la fecha de inicio
diainicio = fechainicio.getDate();
mesinicio = fechainicio.getMonth() + 1;
anioinicio = fechainicio.getFullYear();
fechafin = new Date(f.getTime());
diafin = fechafin.getDate();
mesfin = fechafin.getMonth() + 1;
aniofin = fechafin.getFullYear();  break;
case 'Martes':
fechainicio = new Date(f.getTime() - (1 * 24 * 3600 * 1000));
//Separamos la fecha de inicio
diainicio = fechainicio.getDate();
mesinicio = fechainicio.getMonth() + 1;
anioinicio = fechainicio.getFullYear();
fechafin = new Date(f.getTime());
diafin = fechafin.getDate();
mesfin = fechafin.getMonth() + 1;
aniofin = fechafin.getFullYear();  break;
case 'Miércoles':
fechainicio = new Date(f.getTime() - (2 * 24 * 3600 * 1000));
//Separamos la fecha de inicio
diainicio = fechainicio.getDate();
mesinicio = fechainicio.getMonth() + 1;
anioinicio = fechainicio.getFullYear();
fechafin = new Date(f.getTime());
diafin = fechafin.getDate();
mesfin = fechafin.getMonth() + 1;
aniofin = fechafin.getFullYear();  break;
case 'Jueves':
fechainicio = new Date(f.getTime() - (3 * 24 * 3600 * 1000));
//Separamos la fecha de inicio
diainicio = fechainicio.getDate();
mesinicio = fechainicio.getMonth() + 1;
anioinicio = fechainicio.getFullYear();
fechafin = new Date(f.getTime());
diafin = fechafin.getDate();
mesfin = fechafin.getMonth() + 1;
aniofin = fechafin.getFullYear();
break;
 case 'Viernes':
fechainicio = new Date(f.getTime() - (4 * 24 * 3600 * 1000));
//Separamos la fecha de inicio
diainicio = fechainicio.getDate();
mesinicio = fechainicio.getMonth() + 1;
anioinicio = fechainicio.getFullYear();
fechafin = new Date(f.getTime() + (2 * 24 * 3600 * 1000));
diafin = fechafin.getDate();
mesfin = fechafin.getMonth() + 1;
aniofin = fechafin.getFullYear();  break;
 case 'Sábado':
fechainicio = new Date(f.getTime() - (5 * 24 * 3600 * 1000));
//Separamos la fecha de inicio
diainicio = fechainicio.getDate();
mesinicio = fechainicio.getMonth() + 1;
anioinicio = fechainicio.getFullYear();
fechafin = new Date(f.getTime());
diafin = fechafin.getDate();
mesfin = fechafin.getMonth() + 1;
aniofin = fechafin.getFullYear();  break;
 case 'Domingo':
fechainicio = new Date(f.getTime() - (6 * 24 * 3600 * 1000));
//Separamos la fecha de inicio
diainicio = fechainicio.getDate();
mesinicio = fechainicio.getMonth() + 1;
anioinicio = fechainicio.getFullYear();
fechafin = new Date(f.getTime());
diafin = fechafin.getDate();
mesfin = fechafin.getMonth() + 1;
aniofin = fechafin.getFullYear();  break;
}

inicio = anioinicio + "-" + mesinicio + "-"  + diainicio;
fin = aniofin + "-" + mesfin + "-"  + diafin;
