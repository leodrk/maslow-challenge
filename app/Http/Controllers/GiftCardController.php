<?php
namespace App\Http\Controllers;

use App\Services\GiftCardService;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    protected $giftCardService;

    public function __construct(GiftCardService $giftCardService)
    {
        $this->giftCardService = $giftCardService;
    }

    public function index()
    {
        $giftCards = $this->giftCardService->getAllGiftCards();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $giftCard = $this->giftCardService->createGiftCard($data);
    }

    public function show($id)
    {
        $giftCard = $this->giftCardService->getGiftCardById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $giftCard = $this->giftCardService->updateGiftCard($id, $data);
    }

    public function destroy($id)
    {
        $giftCard = $this->giftCardService->deleteGiftCard($id);
    }

}
