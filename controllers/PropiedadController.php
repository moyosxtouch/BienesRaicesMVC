<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;
class  PropiedadController
{
  public static function index(Router $router) {
    $propiedades=Propiedad::all();
    $resultado= $_GET['resultado'] ?? null;
  $router->render('propiedades/admin',['propiedades'=> $propiedades, 'resultado'=>$resultado]);
  }
  public static function crear(Router $router) {
    $propiedad= new Propiedad;
    $vendedores=Vendedor::all();
    $errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  //Crea una nueva instancia
  $propiedad=new Propiedad($_POST['propiedad']);
 
    
 // Generar un nombre único
        $nombreImagen = md5( uniqid( rand(), true ) ).".jpg";
//Setear la imagen
//Realiza un resize a la imagen con intervention
if($_FILES["propiedad"]["tmp_name"]["imagen"]) {
$image=Image::make($_FILES["propiedad"]["tmp_name"]["imagen"]);
$image->fit(800,600);
$propiedad->setImagen($nombreImagen);
}


//Validar
 $errores=$propiedad->validar();
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedor = $_POST['vendedores_id'];
    $creado = date('Y/m/d');

    // El array de errores esta vacio
    if (empty($errores)) {

      //Crear la carpeta pára subir imagenes
      if (!is_dir(CARPETA_IMAGENES . $nombreImagen)) {
        mkdir(CARPETA_IMAGENES);
      }
    
$image->save(CARPETA_IMAGENES.$nombreImagen);

//Guarda en la base de datos
 $propiedad->guardar();

 
    }
}


  $router->render('propiedades/crear',['propiedad'=>$propiedad, 'vendedores'=>$vendedores, 'errores'=>$errores]) ;
  }
  public static function actualizar() {
    echo"actualizar propiedad";
  }
}