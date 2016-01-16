angular.module('todoApp').controller('NoteController', function($scope, NoteFactory) {
    var thisApp = this;

    // Exposed functions in the view
    thisApp.addNote = addNote;
    thisApp.delNote = delNote;
    thisApp.updNote = updNote;
    thisApp.toggleVisible = toggleVisible;
    thisApp.updVis = false;

    // Toggle visibility of overlay
    function toggleVisible()
    {
        if (thisApp.updVis) getNotes();
        thisApp.updVis = !thisApp.updVis;
    }
    
    // Controller init sort of say
    function activate()
    {
        getNotes();
    }
    
    activate();
    
    // Get all active notes
    function getNotes()
    {
        NoteFactory.getNotes().then(function(response){ 
            thisApp.notes = response.data; 
        }, function() { 
            alert("Error getting notes"); 
        });
    }

    // Add a new note
    function addNote(note)
    {
        NoteFactory.addNote(note).then(getNotes, function() {
            alert("Error adding note");
        });
    }

    // Delete a note
    function delNote(note)
    {
        var r = confirm("Are you sure?");

        if (r == true) {
            NoteFactory.delNote(note).then(getNotes, function() {
                alert("Error deleting note");
            });
        }
    }

    // Show overlay with form for updating a note
    thisApp.showUpd = function(note)
    {
        thisApp.updVis = true;
        thisApp.noteupd = angular.copy(note);

        if (note.completed == 1) {
            thisApp.noteupd.completed = true;
        } else {
            thisApp.noteupd.completed = false;
        }
    }

    // Update a note
    function updNote(note)
    {
        NoteFactory.updNote(note).then(function() {
            getNotes();
            thisApp.updVis = false;
        }, function() {
            alert("Error updating note");
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
