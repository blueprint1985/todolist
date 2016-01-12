<?php 
$I = new ApiTester($scenario);
$I->wantTo('Get a specific note');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendGET('/notes/6');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    'id' => 6,
    'content' => 'tyutyu',
    'deadline' => '2016-01-07 10:28:42',
    'completed' => 1
]);
