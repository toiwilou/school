var isStudentYet = document.querySelector('.is-student-yet');
var isStudentYetForm = document.querySelector('.is-student-yet-form');
var validationInscription = document.querySelector('.validation-inscription');
var emailForm = document.querySelector('.email-form');
var diveFormFile = document.querySelector('.dive-form-file');
var checkLevel = document.querySelector('#check-level');
var formations = document.querySelector('.formations');
var checkLevel = null;

if (formations) {
    for (var i = 0; i < diveFormFile.id; i++) {
        checkLevel = document.querySelector('#check-level' + (i + 1));
        checkLevel.addEventListener('click', function() {
            console.log(checkLevel.value);
        });
    }
}

isStudentYet.addEventListener('click', function() {
    if (isStudentYet.checked) {
        isStudentYetForm.style.display = 'block';
    } else {
        isStudentYetForm.style.display = 'none';
    }
});

for (var i = 0; i < 3; i++) {
    checkLevel = document.querySelector('#check-level');
    console.log(checkLevel);
}