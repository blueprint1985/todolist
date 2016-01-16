angular.module('todoApp').factory('UserFactory', factory);

function factory($http) {
    var service = {
        getUsers: getUsers
    };

    return service;
    
    // API call for getting all users
    function getUsers() {
        return $http({
            method : 'GET',
            url : 'http://localhost:8000/users'
        });
    }
}