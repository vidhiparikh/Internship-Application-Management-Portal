<script>

Dropzone.options.cv = {

    url: "includes/process-ajax-request.php",
    paramName: "file",
    autoProcessQueue: false,
    maxFilesize: 1, // MB
    maxFiles: 1,
    acceptedFiles: ".pdf, .docx, .doc",
    addRemoveLinks: true,
    // Language Strings
    dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
    dictInvalidFileType: "Invalid File Type",
    dictCancelUpload: "Cancel",
    dictRemoveFile: "Remove",
    dictMaxFilesExceeded: "Only {{maxFiles}} files are allowed",
    dictDefaultMessage: "Drop files here to upload",
    // The setting up of the dropzone
    init: function() {
        var myDropzone = this;
        var dataURI;
        // First change the button to actually tell Dropzone to process the queue.
        $("#submit_application").on("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
            console.log("Processed");
        });

        // on add file

        this.on("addedfile", function(file) {
//             console.log(file);
        });

        // on error

        this.on("error", function(file, response) {
             console.log(response);
        });

        this.on('thumbnail', function(file, dataUri) {
            dataURI = dataUri;
			console.log(dataURI);
        });

        this.on('sending', function(file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will POST
            var data = $('#add-application').serializeArray();
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });
//            formData.append("fileURI",dataURI);
//			console.log(formData);
        });
    }
}
</script>