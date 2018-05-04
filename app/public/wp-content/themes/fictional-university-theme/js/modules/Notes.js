import $ from 'jquery';

class Notes {
  // 1. describe and create/initiate our object
  constructor() {
    this.notesField = $(".note-body-field");
    this.editButton = $(".edit-note");
    this.deleteButton = $(".delete-note");
    this.updateButton = $(".update-note");
    this.createButton = $(".submit-note");
    this.events();
    this.isNoteEditable = false;
  }

  // 2. events
  events() {
    this.editButton.on("click", this.editNote.bind(this));
    this.deleteButton.on("click", this.deleteNote.bind(this));
    this.updateButton.on("click", this.updateNote.bind(this));
    this.createButton.on("click", this.createNote.bind(this));
  }

  // 3. methods (function, action)
  editNote(e) {
    var thisNote = $(e.target).parents("li");
    if (!this.isNoteEditable) {
      this.makeNoteEditable(thisNote);
      this.isNoteEditable = true;
    } else {
      this.makeNoteReadOnly(thisNote);
      this.isNoteEditable = false;
    }

  }

  makeNoteEditable(thisNote) {
    thisNote.find(".note-title-field, .note-body-field").removeAttr("readonly").addClass("note-active-field");
    console.log('Edit');
    thisNote.find(".update-note").addClass("update-note--visible");
    this.editButton.html('<i class="fa fa-times" aria-hidden="true"></i> Cancel');
  }

  makeNoteReadOnly(thisNote) {
    thisNote.find(".note-title-field, .note-body-field").attr("readonly", true).removeClass("note-active-field");
    console.log('ReadOnly');
    thisNote.find(".update-note").removeClass("update-note--visible");
    this.editButton.html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');
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

  updateNote(e) {
    var thisNote = $(e.target).parents("li");
    var ourUpdatedPost = {
      'title': thisNote.find(".note-title-field").val(),
      'content': thisNote.find(".note-body-field").val()
    }
    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
      },
      url: universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.data('id'),
      type: 'POST',
      data: ourUpdatedPost,
      success: (response) => {
        this.makeNoteReadOnly(thisNote);
        console.log("Post Saved");
        console.log(response);
      },
      error: (response) => {
        console.log("Error");
        console.log(response);
      }
    });
  }

  createNote(e) {
    var ourNewPost = {
      'title': $(".new-note-title").val(),
      'content': $(".new-note-body").val(),
      'status': 'publish'
    }
    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
      },
      url: universityData.root_url + '/wp-json/wp/v2/note/',
      type: 'POST',
      data: ourNewPost,
      success: (response) => {
        $(".new-note-title, .new-note-body").val('');
        $('<li>New note here</li>').prependTo("#my-notes").hide().slideDown();
        console.log("Created Note");
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
