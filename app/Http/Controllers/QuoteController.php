<?php

namespace App\Http\Controllers;

use App\QuoteModel;
use Illuminate\Http\Request;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests;


class QuoteController extends Controller
{

    public function index()
    {
        return view('quote.create');
    }


    public function create()
    {
        //
    }


    public function all()
    {
        $quote = QuoteModel::all();
        return view('quote.all', ['quote' => $quote]);
    }


    public function store(Request $request, QuoteRequest $quote)
    {
        $this->validate($request, $quote->rules());
        $quote = new QuoteModel($request->all());
        $quote->save();

        return redirect()->to('/quote/all');
    }


    public function show($id)
    {
        $quote = QuoteModel::where('quote_id', $id)->get();
        return view('quote.show', ['quote' => $quote]);
    }


    public function edit($id)
    {
        $quote = QuoteModel::find($id);
        return view('quote.edit', ['quote' => $quote]);
    }


    public function update(Request $request, QuoteRequest $quote, $id)
    {
        $this->validate($request, $quote->rules());
        QuoteModel::find($id)
            ->update(
                [
                    'quote_author' => $request->quote_author,
                    'quote_text' => $request->quote_text,
                ]
            );

        return redirect()->back()->withErrors(['Данные сохранены']);
    }


    public function destroy($id)
    {
        QuoteModel::find($id)->delete();
        return redirect()->back()->withErrors(['Цитата удалена']);
    }
}
