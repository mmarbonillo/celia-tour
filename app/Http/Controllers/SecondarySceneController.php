<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecondaryScene;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use App\Scene;

class SecondarySceneController extends Controller
{
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creación previa del objeto vacio
        $s_scene = new SecondaryScene();
        $s_scene->name = $request->name;
        $s_scene->date = $request->date;
        $s_scene->pitch = 0;
        $s_scene->yaw = 0;
        $s_scene->directory_name = "0"; 
        $s_scene->id_scenes = $request->idScene; 
        //Guardamos la escena
        $s_scene->save();
        //Comprobar si existe el archivo 360
        if($request->hasFile('image360')){
            //Crear un nombre para almacenar el fichero
            $idFile = "ss".$s_scene->id;
            $name = $idFile.".".$request->file('image360')->getClientOriginalExtension();
            //Almacenar el archivo en el directorio
            $request->file('image360')->move(public_path('img/scene-original/'), $name);

            /**************************************************/
            /* CREAR TILES (division de imagen 360 en partes) */
            /**************************************************/
            //Ejecucion comando
            $image="img/scene-original/".$name;
            $process = new Process(['krpano\krpanotools', 'makepano', '-config=config', $image]);
            $process->run();
            
            //Comprobar si el comando se ha completado con exito
            if ($process->isSuccessful()) {
                $s_scene->directory_name = $idFile; 
                //Eliminar imagen fuente que utiliza para trozear y crear el tile
                unlink(public_path('img/scene-original/').$name);
                //guardar cambios
                $s_scene->save();
                //Abrir vista para editar la zona
                //return redirect()->route('scene.edit', ['scene' => $scene]);  
                return redirect()->route('zone.edit', ['zone' => $request->idZone]);  
                /*if($scene->save()){
                    return response()->json(['status'=> true]);
                }else{
                    return response()->json(['status'=> false]);
                }*/
            }else{
                //En caso de error eliminar la escena de
                $s_scene->delete();
                //Eliminar imagen fuente
                unlink(public_path('img/scene-original/').$name);

                echo "error al crear";
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_scene)
    {
        $s_scene = SecondaryScene::where('id_scenes', $id_scene)->get();
        //dd($s_scene);
        return Response::json([
            'id' => $s_scene->id,
            'name' => $s_scene->name,
            'date' => $s_scene->date
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idScena = $s_scene->id_scenes;
        $SScene = SecondaryScene::find($idScena);
        $scenes = $SScene->scenes()->get();
        $SScenes = SecondaryScene::all();
        return Response::json([
            'id' => $s_scene->id,
            'name' => $s_scene->name,
            'date' => $s_scene->date,
            'id_scene' => $idScena
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            //Actualizar nombre
            $s_scene->name = $request->name;
            //Actualizar fecha
            $s_scene->date = $request->date;
            //Actualizar foto 360
            if($request->hasFile('image360')){
                //Crear un nombre para almacenar la imagen fuente plano 360
                $idFile = "ss".$s_scene->id;
                $name = $idFile.".".$request->file('image360')->getClientOriginalExtension();
                //Almacenar la imagen en el directorio
                $request->file('image360')->move(public_path('img/scene-original/'), $name);
    
                /**************************************************/
                /* CREAR TILES (division de imagen 360 en partes) */
                /**************************************************/
                //Eliminar directorio antiguo
                File::deleteDirectory(public_path('marzipano/tiles/'.$scene->directory_name));
                $scene->directory_name = ""; 
                //Ejecucion comando
                $image="img/scene-original/".$name;
                $process = new Process(['krpano\krpanotools', 'makepano', '-config=config', $image]);
                $process->run();
                
                //Comprobar si el comando se ha completado con exito
                if ($process->isSuccessful()) {
                    $s_scene->directory_name = $idFile; 
                    //Eliminar imagen fuente que utiliza para trozear y crear el tile
                    unlink(public_path('img/scene-original/').$name);
                    //guardar cambios
                    $s_scene->save();
                    //Abrir vista para editar la zona
                    return redirect()->route('zone.edit', ['zone' => $request->idZone]);  
                }else{
                    //En caso de error eliminar la escena de
                    $s_scene->delete();
                    //Eliminar imagen fuente
                    unlink(public_path('img/scene-original/').$name);
    
                    echo "error al crear";
                }
                
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s_scene = SecondaryScene::find($id);
        $s_scene->destroy();
    }
}
