<?php 
$I = new ApiTester($scenario);
$I->wantTo('Get all projects');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendGET('/projects');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    ['id' => 1, 'name' => 'Birdie'],
    ['id' => 2, 'name' => 'Fiskpinne'],
    ['id' => 3, 'name' => 'KulGrej']
]);
