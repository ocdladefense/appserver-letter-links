
// Settings and options
let options = new Map();
options.set("includeFileDialog", true);             // Show the file input element?
options.set("uploadOnDrop", true);                  // Upload the file when it is dropped?
options.set("useExistingForm", false);               // Use a form that already exists in your page?
options.set("dropZoneSelector", "body");            // The id of the element that you want to be the drop zone?
options.set("formId", "dynamic-form");               // The id of the form.  Either the Id of a pre-existing form, or the id that will be given to the form rendered by the js. 
options.set("formAction", "/update/student/image");// The action attribute that will be added to the form rendered by the js.  
options.set("formContainerId", "form-container");   // The Id that you want set to the form container element.

let dragDrop = new DragDropFileUpload(options);

