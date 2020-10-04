<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Session;


class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = storage_path("app\public\articulo.json") ; 
        $articulos = json_decode(file_get_contents($path), true); 
        return view('welcome',compact('articulos'));

    }

    public function addCarro(Request $request)

    {

        $path = storage_path("app\public\articulo.json") ; 
        $articulos = json_decode(file_get_contents($path), true); 

        foreach ( $articulos as $articulo ) {
            if ( $request->id == $articulo["id"] ) {
                Session::push('articulos',$articulo);
             }
        }
        
        return "I am in";

    }
    public function deleteCarro(Request $request)

    {
        $articulos = Session::get('articulos'); // Get the array
        unset($articulos[$request->id]); // Unset the index you want
        Session::put('articulos', $articulos); // Set the array again

           
        return "I am in";

    }

    public function deleteSessions(Request $request)
    {

        log::info('dentro');
       Session::flush();
       return "200";


    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
