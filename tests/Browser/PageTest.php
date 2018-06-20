<?php

namespace Tests\Browser;

use App\Page;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group pages
 */
class PageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testHomeOfPages()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pages')
                ->assertSee('Páginas');
        });
    }

    public function testCreatePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pages/create')
                ->type('title', 'Este é um título')
                ->type('body', 'Este é o corpo da página')
                ->press('Salvar')
                ->assertPathIs('/pages')
                ->assertSee('Este é um título');
        });
    }

    public function testDeletePage()
    {
        $page = factory(Page::class)->create(['title' => 'Página de Teste']);
        $this->browse(function (Browser $browser) use ($page) {
            $browser->visit('/pages/' . $page->id)
                ->press('apagar')
                ->assertDontSee('Página de Teste');
        });
    }

    public function testNavigation()
    {
        $pages = factory(Page::class, 7)->create();
        $this->browse(function (Browser $browser) use ($pages) {
            $browser->visit('/pages')
                ->press('#btnCreate')
                ->assertPathIs('/pages/create');

            $browser->visit('/pages/create')
                ->clickLink('voltar')
                ->assertPathIs('/pages');

            $browser->visit('/pages')
                ->clickLink('ver')
                ->assertPathIs('/pages/'.$pages[0]->id);

            $browser->visit('/pages/'.$pages[0]->id)
                ->clickLink('voltar')
                ->assertPathIs('/pages');
        });
    }
}
