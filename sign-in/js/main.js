
//       // Wait for the DOM to be ready
// $(function() {
//   // Initialize form validation on the registration form.
//   // It has the name attribute "registration"
//   $("form[name='submit']").validate({
//     // Specify validation rules
//     rules: {
//       // The key name on the left side is the name attribute
//       // of an input field. Validation rules are defined
//       // on the right side
//       nama: "required",
//       username: "required",
//       telp: "required",
//       password: {
//         required : true,
//             minlength: 8,
//       },
//     cpassword: {
//         required : true,
//             minlength: 8,
//       },
//       nik: {
//         required: true,
//         // Specify that email should be validated
//         // by the built-in "email" rule
//         number : true
//       }
//     },
//     // Specify validation error messages
//     messages: {
//       nama: "nama tidak boleh kosong harus disi",
//       username: "username tidak boleh kosong",
//       telp: "telphone number tidak boleh kosong",

//       password: {
//         required: "password  tidak boleh kosong",
//         minlength: "minlength password (8 Character)"
//       },
//       cpassword: {
//         required: "Repeat password  tidak boleh kosong",
//         minlength: "minlength Repeat password (8 Character)"
//       },
//       nik: {
//         required:"NIK tidak boleh kosong",
//         min: "Nik hanya boleh angka (999999999)"
//       }
//     },
//     // Make sure the form is submitted to the destination defined
//     // in the "action" attribute of the form when valid
//     submitHandler: function(form) {
//       form.submit();
//     }
//   });
// });





//       // Wait for the DOM to be ready
// $(function() {
//   // Initialize form validation on the registration form.
//   // It has the name attribute "registration"
//   $("form[name='register']").validate({
//     // Specify validation rules
//     rules: {
//       // The key name on the left side is the name attribute
//       // of an input field. Validation rules are defined
//       // on the right side
//       nama: "required",
//       username: "required",
//       telp: "required",
//       password: {
//         required : true,
//             minlength: 10,
//       },
//     cpassword: {
//         required : true,
//             minlength: 10,
//       },
//       nik: {
//         required: true,
//         // Specify that email should be validated
//         // by the built-in "email" rule
//         number : true
//       }
//     },
//     // Specify validation error messages
//     messages: {
//       nama: "nama tidak boleh kosong harus disi",
//       username: "username tidak boleh kosong",
//       telp: "telphone number tidak boleh kosong",

//       password: {
//         required: "password  tidak boleh kosong",
//         minlength: "minlength password (10 Character)"
//       },
//       cpassword: {
//         required: "Repeat password  tidak boleh kosong",
//         minlength: "minlength Repeat password (10 Character)"
//       },
//       nik: {
//         required:"NIK tidak boleh kosong",
//         min: "Nik hanya boleh angka (999999999)"
//       }
//     },
//     // Make sure the form is submitted to the destination defined
//     // in the "action" attribute of the form when valid
//     submitHandler: function(form) {
//       form.submit();
//     }
//   });
// });