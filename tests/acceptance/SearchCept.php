<?php

/** @var $scenario \Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that search works');

$I->amOnPage('/');
$I->see('Найти');

$I->fillField('input[name=text]', 'Codeception');
$I->click('button[type=submit]');

$I->seeInCurrentUrl('/search/?text=Codeception');
$I->see('Codeception - BDD-style PHP testing');
