const filter = document.querySelector('.filter');
const filterForm = document.querySelector('#filter-form');

filter.addEventListener('change', (event) => {
    event.preventDefault();
    filterForm.submit();
});
