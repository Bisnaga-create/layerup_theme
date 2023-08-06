import { update_posts } from "../Content/PostsSection";

/**
 * Makes a ajax request to get the posts by the category slug.
 * 
 * @param {string} slug The slug to be searched.
 * 
 * @return {object|void} The post object on success and void (console.error) on failure.
 */
export function make_request(slug){
    //Using a href previously added url.
    let default_url = document.querySelector('link[rel="default_url"]').href;

    if(0 === default_url.length){
        //Link was ot properly inserted, extiting...
        console.error('WP not loaded properly.Can not find default url');
    }

    jQuery(function($) {
        $.ajax({
            url: default_url + '/wp-json/layerup/v1/get_by_category',
            method: 'GET',
            data: { slug },
            success: function(data) {
                update_posts(data);
            },
            error: function(xhr, status, error) {
              // Log any errors that occurred during the request
              console.error('Erro:', status, error);
            }
        });
    });
}



  
  
  
  