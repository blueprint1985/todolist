angular.module('todoApp').factory('NoteFactory', factory);

//Factory for notes
function factory($http) {
    var service = {
        getNotes: getNotes,
        addNote: addNote,
        delNote: delNote,
        updNote: updNote,
        showNote: showNote
    };

    return service;
    
    // API call for getting all active notes
    function getNotes() {
        return $http({
            method : 'GET',
            url : 'http://localhost:8000/notes'
        });
    }

    // API call for adding a new note
    function addNote(noteAdd) {
        return $http({
            method : 'PUT', 
            url : 'http://localhost:8000/notes',
            data : $.param(noteAdd),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    }

    // API call for deleting a note
    function delNote(noteDel) {
        return $http({
            method : 'DELETE',
            url : 'http://localhost:8000/notes',
            data : $.param(noteDel),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    }

    // API call for updating a note
    function updNote(noteUpd) {
        return $http({
            method : 'POST', 
            url : 'http://localhost:8000/notes',
            data : $.param(noteUpd),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    }

    // API call for getting a single note
    function showNote(noteShow) {
        return $http({
            method : 'GET',
            url : 'http://localhost:8000/notes' + noteShow
        });
    }

}
