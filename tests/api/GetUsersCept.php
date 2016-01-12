<?php 
$I = new ApiTester($scenario);
$I->wantTo('Get all users');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendGET('/users');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    ['id' => 1, 'name' => 'BluePrint'],
    ['id' => 2, 'name' => 'Howken']
]);
