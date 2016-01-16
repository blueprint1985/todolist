angular.module('todoApp').controller('ProjectController', function($scope, ProjectFactory) {
    var thisApp = this;
    
    // Controller init sort of say
    function activate() {
        getProjects();
    }
    activate();
    
    // Get all projects
    function getProjects() {
        ProjectFactory.getProjects().then(function(response){ 
            thisApp.projects = response.data; 
        }, function() { 
            alert("Error getting projects"); 
        });
    }
});