<?php

namespace Tests\Unit;

use App\Services\CardService;
use Tests\TestCase;

class CardServiceTest extends TestCase
{
    protected $cards = [
        'creature'    => 'carnage tyrant',
        'instant'     => 'lightning strike',
        'sorcery'     => 'golden demise',
        'land'        => 'Dragonskull Summit',
        'enchantment' => 'the eldest reborn'
    ];

    /**
     * @test
     */
    public function it_can_save_cards_to_database()
    {
        $this->markTestSkipped('waiting for mock api calls');
        $cardService = $this->app->make(CardService::class);

        foreach ($this->cards as $cardName) {
            $cardService->get($cardName);

            $this->assertDatabaseHas('cards', [
                'name' => $cardName
            ]);
        }
    }
}
