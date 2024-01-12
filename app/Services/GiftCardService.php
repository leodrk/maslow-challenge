<?php
namespace App\Services;

use App\Models\GiftCard;

class GiftCardService
{
    public function getAllGiftCards()
    {
        return GiftCard::all();
    }

    public function getGiftCardById($id)
    {
        return GiftCard::findOrFail($id);
    }

    public function createGiftCard(array $data)
    {
        return GiftCard::create($data);
    }

    public function updateGiftCard($id, array $data)
    {
        $giftCard = $this->getGiftCardById($id);
        $giftCard->update($data);

        return $giftCard;
    }

    public function deleteGiftCard($id)
    {
        $giftCard = $this->getGiftCardById($id);
        $giftCard->delete();

        return $giftCard;
    }
}
