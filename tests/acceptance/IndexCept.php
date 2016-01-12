<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that frontpage works');
$I->amOnPage('/'); 
$I->see('Todo-list:');
$I->see('Note:');
$I->see('Author:');
$I->see('Project:');
$I->see('Created:');
$I->see('Deadline:');
$I->see('Modify:');
$I->see('Add new note:');
$I->see('User:');
$I->see('Deadline (format YYYY-MM-DD HH:MM:SS):');
