
<?php
/*
 * @Author: Ujang Wahyu 
 * @Date: 2018-09-03 15:41:34 
 * @Last Modified by: Ujang Wahyu
 * @Last Modified time: 2018-09-07 15:29:08
 */

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'ExampleController@index');

$router->get('/me', [
    'middleware' => 'jwt.auth',
    'uses' => 'UserController@me'
]);

// Authentication
$router->group(['prefix' => 'auth'], function ($app) {
    $app->post('/facebook', 'AuthController@loginFacebook');
    $app->post('/email', 'AuthController@loginEmail');
    $app->post('/register', 'AuthController@register');
    $app->post('/logout', [
        'middleware' => 'jwt.auth',
        'uses' => 'AuthController@logout'
    ]);
});

$router->group(['prefix' => 'berita'], function ($app) {
    $app->get('/', 'BeritaController@index');
    $app->get('/{id}', 'BeritaController@show');
    $app->post('/', 'BeritaController@store');
    $app->post('/{id}', 'BeritaController@update');
    $app->delete('/{id}', 'BeritaController@destroy'); 
});

$router->group(['prefix' => 'foto'], function ($app) {
    $app->get('/', 'FotoController@index');
    $app->get('/{id}', 'FotoController@show');
    $app->post('/', 'FotoController@store');
    $app->post('/{id}', 'FotoController@update');
    $app->delete('/{id}', 'FotoController@destroy'); 
});

$router->group(['prefix' => 'kategori'], function ($app) {
    $app->get('/', 'KategoriController@index');
    $app->get('/{id}', 'KategoriController@show');
    $app->post('/', 'KategoriController@store');
    $app->post('/{id}', 'KategoriController@update');
    $app->delete('/{id}', 'KategoriController@destroy'); 
});

$router->group(['prefix' => 'lokasi'], function ($app) {
    $app->get('/', 'LokasiController@index');
    $app->get('/{id}', 'LokasiController@show');
    $app->post('/', 'LokasiController@store');
    $app->post('/{id}', 'LokasiController@update');
    $app->delete('/{id}', 'LokasiController@destroy'); 
});

$router->group(['prefix' => 'penginapan'], function ($app) {
    $app->get('/', 'PenginapanController@index');
    $app->get('/{id}', 'PenginapanController@show');
    $app->post('/', 'PenginapanController@store');
    $app->post('/{id}', 'PenginapanController@update');
    $app->delete('/{id}', 'PenginapanController@destroy'); 
});

$router->group(['prefix' => 'wisata'], function ($app) {
    $app->get('/', 'WisataController@index');
    $app->get('/{id}', 'WisataController@show');
    $app->post('/', 'WisataController@store');
    $app->post('/{id}', 'WisataController@update');
    $app->delete('/{id}', 'WisataController@destroy'); 
});

$router->group(['prefix' => 'kuliner'], function ($app) {
    $app->get('/', 'KulinerController@index');
    $app->get('/{id}', 'KulinerController@show');
    $app->post('/', 'KulinerController@store');
    $app->post('/{id}', 'KulinerController@update');
    $app->delete('/{id}', 'KulinerController@destroy'); 
});

$router->group(['prefix' => 'tempatkuliner'], function ($app) {
    $app->get('/', 'TempatkulinerController@index');
    $app->get('/{id}', 'TempatkulinerController@show');
    $app->post('/', 'TempatkulinerController@store');
    $app->post('/{id}', 'TempatkulinerController@update');
    $app->delete('/{id}', 'TempatkulinerController@destroy'); 
});

$router->group(['prefix' => 'jeniskuliner'], function ($app) {
    $app->get('/', 'JeniskulinerController@index');
    $app->get('/{id}', 'JeniskulinerController@show');
    $app->post('/', 'JeniskulinerController@store');
    $app->post('/{id}', 'JeniskulinerController@update');
    $app->delete('/{id}', 'JeniskulinerController@destroy'); 
});

$router->group(['prefix' => 'user'], 
    function() use ($router) {
        $router->get('/', function() {
            $users = \App\Models\User::all();
            return response()->json($users);
        });
    }
);