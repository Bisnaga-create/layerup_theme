import '../api/Posts';

window.addEventListener('load', () => {
    remove_unused_categories();
    add_events();
});

/** 
* Switching classes from the categories filter section
* to make them place correctly.
*/
function remove_unused_categories(){
    const categories = document.querySelectorAll('#categories-filter .content');

    categories.forEach((div) => {
        const correct_classes = 'col-xs-12 col-sm-6 col-md-4 col-lg-3 gy-2';
        div.setAttribute('class', correct_classes);
    });
}

/**
 * Adding the event listeners to the tags.
 */
function add_events(){
    const anchors = document.querySelectorAll('#categories-filter a');

    anchors.forEach((anchor) => {
        anchor.addEventListener('click', (event) => {
            event.preventDefault();
            alert('clicou aqui');
        });
    });
}