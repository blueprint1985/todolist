angular.module('todoApp').controller('UserController', function($scope, UserFactory) {
    var thisApp = this;
    
    // Controller init sort of say
    function activate() {
        getUsers();
    }
    activate();
    
    // Get all users
    function getUsers()
    {
        UserFactory.getUsers().then(function(response){ 
            thisApp.users = response.data;
        }, function() { 
            alert("Error getting users"); 
        });
    }
});