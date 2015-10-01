<?php

namespace tests\_pages;

class SearchPage
{
    public static $URL = '';

    /**
     * @var \AcceptanceTester
     */
    protected $actor;

    public function __construct($I)
    {
        $this->actor = $I;
    }

    /**
     * @param \AcceptanceTester $I
     * @return static
     */
    public static function openBy($I)
    {
        $page = new static($I);
        $I->amOnPage(self::$URL);
        return $page;
    }

    public function search($query)
    {
        $I = $this->actor;
        $I->fillField('input[name=text]', $query);
        $I->click('button[type=submit]');
    }
}