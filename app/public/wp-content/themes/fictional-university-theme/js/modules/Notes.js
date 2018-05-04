import $ from 'jquery';

class Notes {
  // 1. describe and create/initiate our object
  constructor() {
    this.notesField = $(".note-body-field");
    this.editButton = $(".edit-note");
    this.deleteButton = $(".delete-note");
    this.events();
  }

  // 2. events
  events() {
    this.editButton.on("click", this.editNote.bind(this));
    this.deleteButton.on("click", this.deleteNote.bind(this));
  }

  // 3. methods (function, action)
  editNote(e) {
    var thisNote = $(e.target).parents("li");
    thisNote.find(".note-title-field, .note-body-field").removeAttr("readonly").addClass("note-active-field");
    console.log('Edit');
    thisNote.find(".update-note").addClass("update-note--visible");
  }

  deleteNote(e) {
    var thisNote = $(e.target).parents("li");
    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
      },
      url: universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.data('id'),
      type: 'DELETE',
      success: (response) => {
        thisNote.slideUp();
        console.log("Deleted");
        console.log(response);
      },
      error: (response) => {
        console.log("Error");
        console.log(response);
      }
    });
  }
}

export default Notes;
