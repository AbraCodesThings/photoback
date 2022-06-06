<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /*
      TODO : crear campos de metadatos de la imagen...? igual se pueden pillar
               desde el front...
    */

    /**
     *  Devuelve una imagen en base a su ID.
     *
     *  Dicho ID viene del slug de la ruta.
     *
     *  @param integer $id ID de la imagen.
     *  @return Image Modelo imagen.
     */

    public function getImage($id){
      return Image::where('id', $request['id'])->first();
    }

    /**
     * Sube una imagen al directorio del usuario correspondiente.
     *
     * TODO: comprobar que el usuario que hace la subida existe y está
     *         autentificado. ('auth')
     */

    public function uploadImage(Request $request, $user){
      /* Validación */
      /* Copiar la imagen a la ruta de su user */
      /* Devolver true o false dependiendo de si consigque guardarse o no.
        Debe venir desde el front ya comprimida.
      */
    }

    /**
    * Sube una colección de imágenes
    *
    * TODO: comprobar que el usuario que hace la subida existe y está
    *         autentificado. ('auth')
    */

    public function uploadImages(Request $request, $user){
      /* Recibe una colección de imágenes desde el front y las añade todas
        al directorio del usuario*/
    }
}
