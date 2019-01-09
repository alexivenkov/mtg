<?php

namespace App\Services;

use App\Models\Card as CardModel;
use App\Services\API\CardsGateway;
use Illuminate\Database\Eloquent\Collection;
use mtgsdk\Card;

class CardService
{
    public function get(string $name): Collection
    {
        /** @var Collection $cards */
        $cards = CardModel::where('name', $name)->get();

        if ($cards->isNotEmpty()) {
            return $cards;
        }

        $cards = CardsGateway::where(['name' => $name])->all();

        $result = new Collection();

        /** @var Card $card */
        foreach ($cards as $card) {
            try {
                $newCard = $this->storeCardToDatabase($card);
            } catch (\Exception $e) {
                continue;
            }

            $result->push($newCard);
        }

        return $result;
    }

    public function saveSet(string $setCode)
    {
        $cardsPull = CardsGateway::where(['set' => $setCode])->all();

        foreach ($cardsPull as $card) {
            try {
                $this->storeCardToDatabase($card);
            } catch (\Exception $e) {
                dump($card);
                dump($e->getMessage());
                exit;
            }
        }
    }

    protected function storeCardToDatabase(Card $card)
    {
        return CardModel::create([
            'api_id'        => $card->id,
            'mana_cost'     => $card->manaCost,
            'name'          => $card->name,
            'names'         => $card->names,
            'cmc'           => $card->cmc,
            'colors'        => $card->colors,
            'type'          => $card->type,
            'types'         => $card->types,
            'supertypes'    => $card->supertypes,
            'subtypes'      => $card->subtypes,
            'rarity'        => $card->rarity,
            'set'           => $card->set,
            'set_name'      => $card->setName,
            'text'          => $card->text,
            'artist'        => $card->artist,
            'number'        => $card->number,
            'power'         => $card->power === '*' ? null : $card->power,
            'toughness'     => $card->toughness === '*' ? null : $card->toughness,
            'layout'        => $card->layout,
            'image_url'     => $card->imageUrl,
            'rulings'       => $card->rulings,
            'foreign_names' => $card->foreignNames,
            'printings'     => $card->printings,
            'original_text' => $card->originalText,
            'original_type' => $card->originalType,
            'legalities'    => $card->legalities
        ]);
    }
}
