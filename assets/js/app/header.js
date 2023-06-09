import '../../styles/app/header.css';
import '../../bootstrap';

const btnYouAre = document.querySelector('#header-app .right .you-are .btn');
const listContent = document.querySelector('#header-app .right .list-content');

btnYouAre.addEventListener('click', () => {
    if (listContent.classList.contains('none')) {
        listContent.classList.remove('none');
    } else {
        listContent.classList.add('none');
    }
});

window.addEventListener('click', (e) => {
    if (!listContent.contains(e.target) && !btnYouAre.contains(e.target)) {
        listContent.classList.add('none');
    }
});

window.addEventListener('scroll', () => {
    if (!listContent.classList.contains('none')) {
        listContent.classList.add('none');
    }
});