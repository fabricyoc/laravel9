<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();

        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(StoreLivroRequest $request)
    {
        /* FORMA PAIA */
        // $livro = new Livro();
        // $livro->author = $request->autor;
        // $livro->title = $request->titulo;
        // $livro->subject = $request->assunto;
        // $livro->dateAcquisition = $request->dataAquisicao;
        // $livro->totBooks = $request->totLivros;
        // $livro->save();

        // FORMA 10 ANOS
        Livro::create([
            'author' => $request->autor,
            'title' => $request->titulo,
            'subject' => $request->assunto,
            'dateAcquisition' => $request->dataAquisicao,
            'totBooks' => $request->totLivros,
        ]);

        return redirect()->route('livros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        // dd($livro->totboo);
        return view('livros.edit', compact('livro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLivroRequest  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        $l = Livro::find($livro->id)->update([
                'author' => $request->autor,
                'title' => $request->titulo,
                'subject' => $request->assunto,
                'totBooks' => $request->totLivros,
                'dateAcquisition' => $request->dataAquisicao,
            ]);

        return redirect()->route('livros.show', $livro->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        Livro::find($livro->id)
            ->delete();

        return redirect()->route('livros.index');
    }
}
