<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardStoreRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CardResource::collection(Card::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(CardStoreRequest $request)
    {
        return Card::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param Card $card
     * @return CardResource
     */
    public function show(Card $card)
    {
        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CardStoreRequest $request
     * @param Card $card
     * @return Card
     */
    public function update(CardStoreRequest $request, Card $card)
    {
        $card->update($request->validated());
        return $card;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Card $card
     * @return Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
