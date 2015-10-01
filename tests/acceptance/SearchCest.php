<?php

namespace tests\acceptance;

use \AcceptanceTester;

class SearchCest
{
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that search works');

        $I->amOnPage('/');

        $I->see('Найти');

        $I->fillField('input[name=text]', 'Codeception');

        if (method_exists($I, 'wait')) {
            $I->wait(1); // only for selenium
        }

        $I->click('button[type=submit]');

        if (method_exists($I, 'wait')) {
            $I->wait(3); // only for selenium
        }

        $I->seeInCurrentUrl('/search/?text=Codeception');
        $I->see('Codeception - BDD-style PHP testing');
    }
}