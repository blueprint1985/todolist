<?php 
$I = new ApiTester($scenario);
$I->wantTo('Get all non-deleted notes');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendGET('/notes');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    [
        'id' => 8,
        'user' => 'Howken',
        'project' => 'KulGrej',
        'content' => 'rtyrty',
        'completed' => 1,
        'created' => '2016-01-05 10:28:03',
        'deadline' => '2016-01-08 10:28:03'
    ],
    [
        'id' => 2,
        'user' => 'BluePrint',
        'project' => 'Fiskpinne',
        'content' => 'qweqwea',
        'completed' => 1,
        'created' => '2016-01-05 10:28:42',
        'deadline' => '2016-01-05 10:28:42'
    ],
    [
        'id' => 3,
        'user' => 'BluePrint',
        'project' => 'KulGrej',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'completed' => 1,
        'created' => '2016-01-05 10:28:42',
        'deadline' => '2016-01-05 10:28:42'
    ],
    [
        'id' => 4,
        'user' => 'BluePrint',
        'project' => 'Fiskpinne',
        'content' => '123123',
        'completed' => 0,
        'created' => '2016-01-05 10:28:42',
        'deadline' => '2016-01-08 10:28:42'
    ],
    [
        'id' => 5,
        'user' => 'Howken',
        'project' => 'Birdie',
        'content' => 'jkljkl',
        'completed' => 0,
        'created' => '2016-01-05 10:28:42',
        'deadline' => '2016-01-05 10:28:42'
    ],
    [
        'id' => 6,
        'user' => 'Howken',
        'project' => 'Fiskpinne',
        'content' => 'tyutyu',
        'completed' => 1,
        'created' => '2016-01-05 10:28:42',
        'deadline' => '2016-01-07 10:28:42'
    ],
    [
        'id' => 7,
        'user' => 'Howken',
        'project' => 'KulGrej',
        'content' => 'bnmbnm',
        'completed' => 0,
        'created' => '2016-01-05 10:28:42',
        'deadline' => '2016-01-05 10:28:42'
    ],
    [
        'id' => 1,
        'user' => 'BluePrint',
        'project' => 'Birdie',
        'content' => 'Martin',
        'completed' => 0,
        'created' => '2016-01-05 10:30:41',
        'deadline' => '2016-01-14 10:29:38'
    ]
]);
