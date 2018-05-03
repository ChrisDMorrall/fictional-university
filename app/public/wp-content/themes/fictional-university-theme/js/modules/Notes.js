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
  editNote() {
    console.log('Edit');
  }

  deleteNote() {
    console.log('Delete');
  }
}

export default Notes;
