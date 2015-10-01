<?php

/** @var $scenario \Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that search works');

$I->amOnPage('/');
$I->see('Найти');
