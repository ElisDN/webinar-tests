<?php

namespace tests\acceptance;

use \AcceptanceTester;
use tests\_pages\SearchPage;

class SearchCest
{
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that search works');

        $page = SearchPage::openBy($I);

        $I->see('Найти');

        $page->search('Codeception');

        if (method_exists($I, 'wait')) {
            $I->wait(3); // only for selenium
        }

        $I->seeInCurrentUrl('/search/?text=Codeception');
        $I->see('Codeception - BDD-style PHP testing');
    }
}