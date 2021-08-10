var isStudentYet = document.querySelector('.is-student-yet');
var isNotStudent = document.querySelector('.is-not-student');
var isStudentYetForm = document.querySelector('.is-student-yet-form');
var emailForm = document.querySelector('.email-form');
var diveFormFile = document.querySelector('.dive-form-file');
var diveFormInscription = document.querySelector('.dive-form-inscription');
var checkLevel = document.querySelector('#check-level');
var formations = document.querySelector('.formations');
var idLevel = document.querySelector('.id-level');
var diveNewStudent = document.querySelector('.dive-new-student');
var hiddenLevel = document.querySelector('.hidden-level');
var birthday = document.querySelector('#register_student_temporary_form_birthday');
var newForm = document.querySelector('#register_student_temporary_form');
var diveDate = document.querySelector('.dive-date');
var validateDate = document.querySelector('.validate-date');
var inputBirthday = document.querySelector('.input-birthday');
var checkLevel = null;

if (formations) {
    formations.addEventListener('click', function() {
        for (var i = 1; i <= diveFormFile.id; i++) {
            checkLevel = document.querySelector('#check-level' + i);
            if (checkLevel.checked) {
                diveFormFile.style.display = 'block';
                idLevel.value = checkLevel.value;
                break
            }
        }
    });
}

if (diveNewStudent) {
    diveNewStudent.addEventListener('click', function() {
        for (var i = 1; i <= diveNewStudent.id; i++) {
            checkLevel = document.querySelector('#check-level_' + i);
            if (checkLevel.checked) {
                diveDate.style.display = 'block';
                hiddenLevel.value = checkLevel.value;
                break
            }
        }
    });
}

validateDate.addEventListener('click', function(){
    birthday.value = inputBirthday.value;
    inputBirthday.setAttribute('disabled', '');
    diveFormInscription.style.display = 'block';
});

isStudentYet.addEventListener('click', function() {
    if (isStudentYet.checked) {
        isStudentYetForm.style.display = 'block';
        isNotStudent.checked = false;
        diveNewStudent.style.display = 'none';
    } else {
        isStudentYetForm.style.display = 'none';
    }
});

isNotStudent.addEventListener('click', function() {
    if (isNotStudent.checked) {
        isStudentYet.checked = false;
        isStudentYetForm.style.display = 'none';
        diveNewStudent.style.display = 'block';
    } else {
        diveNewStudent.style.display = 'none';
    }
});