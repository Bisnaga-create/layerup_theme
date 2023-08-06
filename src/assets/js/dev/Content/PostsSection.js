/**
 * Updates the posts section.
 * 
 * @param {object[]} posts Posts to update the section of posts.
 */
export function update_posts(posts){
    const posts_row = document.querySelector('.posts .row');
    
    //Using a model to just switch the information and append.
    const post_div_model = document.querySelector('.posts .row div:first-child');

    if(post_div_model && !window.post_div_model){
        //Adding it on the window for the case of no model being available on the row.
        window.post_div_model = post_div_model.cloneNode(true);
    }

    //Erasing the current posts.
    posts_row.innerHTML = '';

    posts.forEach((post) => {
        let new_post_div = window.post_div_model.cloneNode(true);

        //Updating title.
        new_post_div.querySelector('.card-title').textContent = post.title;

        //Removing all tags from the excerpt.
        const sanitized_excerpt = post.excerpt.replace(/<[^>]*>?/gm, '');
        //Updating excerpt.
        new_post_div.querySelector('.card-text').textContent = sanitized_excerpt;

        //Updating url.
        new_post_div.querySelector('a').setAttribute('href', post.url);

        const img = new_post_div.querySelector('img');
        if(img){
            if(post.thumbnail){
                //Updating thumbnail.
                img.setAttribute('src', post.thumbnail);
            }else{
                //Removing the possible image.
                img.parentNode.removeChild(img);
            }
        }

        update_categories(new_post_div,post.categories);

        posts_row.appendChild(new_post_div);
    });
}

/**
 * Updates the categories from the post.
 * 
 * @param {DOMElement} new_post_div THe div to be added to the DOM.
 * @param {object[]} categories Categories to update the div of the post.
 */
function update_categories(new_post_div,categories){
    const categories_row = new_post_div.querySelector('.categories');
    
    //Using a model to just switch the information and append.
    const cat_div_model = categories_row.querySelector('div:first-child');

    if(cat_div_model && !window.cat_div_model){
        //Adding it on the window for the case of no model being available on the row.
        window.cat_div_model = cat_div_model.cloneNode(true);
    }

    //Erasing previous values from the categories div.
    categories_row.innerHTML = '';

    categories.forEach((category) => {
        const new_cat_model = window.cat_div_model.cloneNode(true);
        
        //Updating url.
        new_cat_model.querySelector('a').setAttribute('href',category.url);

        //Upating slug.
        new_cat_model.querySelector('a').setAttribute('id',category.slug);

        //Updating name.
        new_cat_model.querySelector('a').textContent = category.name;

        categories_row.appendChild(new_cat_model);
    });
}