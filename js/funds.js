// ClassicEditor
//     .create(document.querySelector('#editor'))
//     .catch(error => {
//         console.error(error);
//     });

// CKEDITOR.replace('editor');
function Filevalidation(id) {
    var fi = document.getElementById(id);
    if (fi.files.length > 0) {
        for (var i = 0; i <= fi.files.length - 1; i++) {
            var fsize = fi.files.item(i).size;
            var file = Math.round((fsize / 1024));
            if (file >= 1024) {
                document.getElementById('submit').disabled = true;
                document.getElementById('size').style.display = 'block';
                alert('File size must be less than 1 MB')
            } else {
                document.getElementById('submit').disabled = false;
                document.getElementById('size').style.display = 'none';
            }
        }
    }
}




// $(function () {
//     $('input[type=file]').change(function () {
//         var val = $(this).val().toLowerCase(),
//             regex = new RegExp("(.*?)\.(png|jpg|jpeg|)$");

//         if (!(regex.test(val))) {
//             $(this).val('');
//             alert('Please select correct file format');
//         }
//     });
// });

// var formSubmitting = false;
// var setFormSubmitting = function () {
//     formSubmitting = true;
// };

// window.onload = function () {
//     window.addEventListener("beforeunload", function (e) {
//         if (formSubmitting) {
//             return undefined;
//         }

//         var confirmationMessage = 'It looks like you have been editing something. ' +
//             'If you leave before saving, your changes will be lost.';

//         (e || window.event).returnValue = confirmationMessage; //Gecko + IE
//     });
// };
