<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->name;
        $author = $request->author;
        $category = $request->category;

        $libros = Book::orderBy('id','asc')
            ->Libro($name)
            ->Autor($author)
            ->Categoria($category)
            ->paginate(10);
            
        $filtroCategoria = Category::all();
        return view('books.index',[
            'libros' => $libros,
            'filtroCategoria' => $filtroCategoria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        if($categorys->count() <= 0){
            return redirect()->route('Categoria.create')->with([
                'informacion' => 'Por favor registre una categoria para poder añadir un libro'
            ]);
        }
        else{
            return view('books.create',[
                'categorys' => $categorys
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libro = new Book();
        $validate = $this->validate($request,[
            'name' => 'unique:books',
        ]);

        $libro->name = $request->name;
        $libro->author = $request->author;
        $libro->id_category = $request->category;
        $libro->published = $request->published;
        $libro->borrowed = "NO";
        if ($request->active == 'on') {
            $libro->active = "ACTIVO";
        }
        else{
            $libro->active = "INACTIVO";
        }

        $libro->save();

        return redirect()->route('Libro.index')->with([
            'correcto' => 'Libro registrado de manera exitosa.!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Book::find($id);
        if($libro->active == "ACTIVO"){
            $libro->active = "INACTIVO";
        }
        else{
            $libro->active = "ACTIVO";
        }
        $libro->save();

        return redirect()->route('Libro.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Book::find($id);
        $categorys = Category::all();
        return view('books.edit',[
            'libro' => $libro,
            'categorys' => $categorys
        ]);
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
        $libro = Book::find($id);
        $libro->name = $request->name;
        $libro->author = $request->author;
        $libro->id_category = $request->category;
        $libro->published = $request->published;

        $libro->save();

        return redirect()->route('Libro.index')->with([
            'correcto' => 'Libro Actualizado con exito.!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function eliminar($id){
        $libro = Book::find($id);
        $libro->delete();

        return redirect()->route('Libro.index')->with([
            'peligro' => 'Se elimino el libro de forma exitosa'
        ]);
    }

    public function solicitar(){
        $libros = Book::where('borrowed','NO')->where('active','ACTIVO')->get();
        return view('books.solicitar',[
            'libros' => $libros
        ]);
    }

    public function prestar(Request $request){
        $libro = Book::where('id',$request->libro)->update([
            'user' => $request->user,
            'borrowed' => 'SOLICITADO'
        ]);

        $find = Book::find($request->libro);

        return redirect()->route('Libro.index')->with([
            'informacion' => 'El usuario '.$request->user.' Solicito el libro: '.$find->name
        ]);
    }

    public function confirmar($id){
        $libro = Book::find($id);
        if($libro->borrowed == "SI"){
            $libro = Book::where('id',$id)->update([
                'borrowed' => 'NO',
                'active' => 'ACTIVO'
            ]);
        }
        else{
            $libro = Book::where('id',$id)->update([
                'borrowed' => 'SI',
                'active' => 'INACTIVO'
            ]);
        }
        return redirect()->route('Libro.index');
    }
}
