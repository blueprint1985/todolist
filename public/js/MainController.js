angular.module('todoApp', []).controller('MainController', function($scope, $http) {
    var thisApp = this;
    $scope.noteadd = {};
    var noteadd = $scope.noteadd;
    $scope.noteupd = {};
    var noteupd = $scope.noteupd;

    // Get all notes:
    $http({method : 'GET', url : 'http://localhost:8000/notes'})
        .then (function(response) {
            thisApp.todos = response.data;
        }, function() {
            alert("Error getting todo notes");
        });

    // Get all users:
    $http({method : 'GET',url : 'http://localhost:8000/users'})
        .then(function(response) {
            thisApp.users = response.data;
        }, function() {
            alert("Error getting users");
        });


    // Get all projects
    $http({method : 'GET', url : 'http://localhost:8000/projects'})
        .then(function(response) {
            thisApp.projects = response.data;
        }, function() {
            alert("Error getting projects");
        });

    // Add note to database
    thisApp.addTodo = function(noteadd)
    {
        $http({
            method : 'PUT', 
            url : 'http://localhost:8000/notes',
            data : $.param($scope.noteadd),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            location.reload();
        }, function() {
            alert("Couldn't add note. Please try again!");
        });
    };

    // Hide note by setting removed to 1
    thisApp.delTodo = function(noteID)
    {
        var r = confirm("Are you sure?");

        if (r == true) {
            var noteObj = JSON.parse('{"id":' + noteID + '}'); // JSON for req
            $http({
                method : 'DELETE', 
                url : 'http://localhost:8000/notes',
                data : $.param(noteObj),
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) {
                location.reload();
            }, function() {
                alert("Couldn't delete note. Please try again!");
            });
        }
    };

    // Show overlay with form for updating a note
    thisApp.showUpd = function(noteID)
    {
        var overlaycover = document.getElementById("overlaycover");
        var overlaybox = document.getElementById("overlaybox");
        overlaycover.style.opacity = .65;

        if(overlaycover.style.display == "block" || noteID == 0){ // For toggling overlay
            overlaycover.style.display = "none"; // Hide div overlaycover
            overlaybox.style.display = "none"; // Hide div overlaybox
        } else {
            $http({method : 'GET', url : 'http://localhost:8000/notes/' + noteID})
                .then (function(response) {
                    noteupd.content = response.data.content; // Update fields in form
                    noteupd.deadline = response.data.deadline;
                    noteupd.id = response.data.id;

                    if (response.data.completed == 1) {
                        noteupd.completed = true;
                    } else {
                        noteupd.completed = false;
                    }
                    
                    overlaycover.style.display = "block"; // Show div overlaycover
                    overlaybox.style.display = "block"; // Show div overlaybox
                }, function() {
                    alert("Error getting todo note");
                });
        }
    }

    // Update a note
    thisApp.updTodo = function(noteupd)
    {
        $http({
            method : 'POST', 
            url : 'http://localhost:8000/notes',
            data : $.param($scope.noteupd),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            location.reload();
        }, function() {
            alert("Couldn't add note. Please try again!");
        });
    }

    // Check if deadline passed for each note in list
    $scope.rowClass = function(completed, deadline)
    {
        var nowTime = Math.floor(Date.now()/1000);
        var deadTime = new Date(deadline);
        var deadUTC = Math.floor(deadTime/1000);

        if (completed == 1) {
            return "success"; // Note is completed
        } else if (deadUTC < nowTime) {
            return "danger"; // Note is not completed, deadline passed
        } else {
            return "active"; // Note is not completed, still time left
        }
    }
});