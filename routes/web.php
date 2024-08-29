<?php

use Illuminate\Support\Facades\Route;


// Esta es la ruta que uso para la vista home con un menú. Hace que cuando voy a la URL aparezca por
//defecto la vista home.
//Route es una clase de Laravel que gestiona todas las rutas de la aplicación.
//get es un método de la clase Route para obtener datos del servidor(solicitudes HTTP GET).
//as =>home es para darle un nombre a la ruta
//function () no tiene parametros porque no necesita datos adicionales para mostrar la vista, solo carga y devuelve la vista home.
//return view:home lo que hace es devolverle al usuario la solicitud que hizo para ver la página home.blade.php. O sea, esta linea de codigo es para que muestre la pagina home.
//NOTA: '/' se refiere a la raiz de la aplicacion, en este caso la raiz es la página de inicio(home).
Route::get('/', ['as' => 'home', function () {
  return view('home');
}]);



// Esta es la ruta para 'salones_disponibles' con un parámetro opcional 'zona'
//'/salones_disponibles/{zona} es la URL que activa la ruta.
///{zona} es un parámetro. Cualquier valor que se coloque en esta posicion de la URL se va a pasar
//a la funcion como parametro "zona"
//en la funcion pongo $zona = 'Ituzaingo' para que tenga Ituzaingo por defecto para el parametro zona.
//Si el usuario ingresa otro valor, se va a reemplazar Ituzaingo por ese valor que ingresó el usuario.
//ctype_alpha es una funcion de PHP para validar que se ingresan letras sin importar si son minusculas o mayusculas.
//En el if le estoy diciendo que si ingresó letras muestre la view (pasando el parámetro $zona a la view), 
//sino que se detenga la ejecución del código y muestre un mensaje de error con el código de estado HTTP 400(400 significa "solicitud incorrecta")
// ->name('salones_disponibles) es para ponerle un nombre a la ruta.
Route::get('/salones_disponibles/{zona?}', function ($zona = 'Ituzaingo') {
    if (ctype_alpha($zona)) {
        return view('salones_disponibles', ['zona' => $zona]);
    } else {
        abort(400, "Zona inválida. Solo se permiten letras.");
    }
})->name('salones_disponibles');


Route::get('/contacto/{numero}', function ($numero) {
    // Validación para asegurarse de que solo se ingresen números con la funcion ctype_digit
    if (ctype_digit($numero)) {
        return view('contacto', ['numero' => $numero]);
    } else {
        abort(400, 'Número inválido. Solo se permiten números.');
    }
})->name('contacto');
