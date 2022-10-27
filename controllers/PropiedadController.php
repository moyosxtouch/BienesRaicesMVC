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
    $vendedores=Vendedor::all();
    $resultado= $_GET['resultado'] ?? null;
  $router->render('propiedades/admin',['propiedades'=> $propiedades, 'resultado'=>$resultado,'vendedores'=>$vendedores]);
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
  public static function actualizar(Router $router) {
 $id=validarORedireccionar('/admin');
 $propiedad=Propiedad::find($id);
 $errores=Propiedad::getErrores();
    $vendedores=Vendedor::all();

    //Metodo Post para actualizar
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
 
        // Asignar los atributos
        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);
 
        // Validación 
        $errores = $propiedad->validar();     
 
 
 
        // SUBIDA DE ARCHIVOS
        // Generar un nombre único
        $nombreImagen = md5( uniqid(rand(), true ) ) . ".jpg";
 
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); 
            $propiedad->setImagen($nombreImagen);
        }
 
 
 
        if( empty($errores) ) {
            // Almacenar la imagen
         if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
 
            $propiedad->guardar();
        }
    }
 

 $router->render('/propiedades/actualizar',['propiedad'=>$propiedad,'errores'=>$errores,'vendedores'=>$vendedores]);
  }
  public static function eliminar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id=$_POST['id'];
  $id=filter_var($id,FILTER_VALIDATE_INT);
if($id) {
$tipo=$_POST['tipo'];
if(validarTipoContenido($tipo)) {
$propiedad = Propiedad::find($id);
       $propiedad->eliminar();
}
  }
}
  }

}
