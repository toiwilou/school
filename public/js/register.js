var isStudentYet = document.querySelector('.is-student-yet');
var isStudentYetForm = document.querySelector('.is-student-yet-form');
var emailForm = document.querySelector('.email-form');
var diveFormFile = document.querySelector('.dive-form-file');
var checkLevel = document.querySelector('#check-level');
var formations = document.querySelector('.formations');
var idLevel = document.querySelector('.id-level');
var checkLevel = null;

if (formations) {
    formations.addEventListener('click', function(){
        for (var i = 1; i <= diveFormFile.id; i++) {
            checkLevel = document.querySelector('#check-level' + i);
            if(checkLevel.checked){
                diveFormFile.style.display = 'block';
                idLevel.value = checkLevel.value;
                break
            }
        }
    });
}

isStudentYet.addEventListener('click', function() {
    if (isStudentYet.checked) {
        isStudentYetForm.style.display = 'block';
    } else {
        isStudentYetForm.style.display = 'none';
    }
});