// jQuery(document).ready(function($) {
//     var page = 2;
//     var loading = true;
//     var $window = $(window);
//     var $content = $("#posts-container");
//     var loadingText = '<div class="loading-text">Loading more posts...</div>';
//     var noMorePostsText = '<div class="no-more-posts">No more posts to load.</div>';

//     function loadPosts() {
//         $.ajax({
//             type: "GET",
//             data: { action: "load_more_posts", page: page },
//             dataType: "html",
//             url: ajaxurl,
//             beforeSend: function() {
//                 if (!loading) {
//                     $("#loading").html(loadingText);
//                     loading = true;
//                 }
//             },
//             success: function(data) {
//                 $content.append(data);
//                 $("#loading").empty();
//                 loading = false;
//                 page++;
//             },

//             error: function(xhr, status, error) {
//                 console.log(xhr.responseText);
//             }
//         });
//     }

//     // Load more posts when the user scrolls to the bottom of the page
//     $window.scroll(function() {
//         if ($window.scrollTop() + $window.height() >= $content.height() && !loading) {
//             loadPosts();
//         }
//     });
// });


/* Ajax functions */

jQuery(document).ready(function ($) {
    $(document).on('click', '.sunset-load-more', function () {

        let that = $(this);
        let page = $(this).data('page');
        let newPage = page - 1;
        let ajaxurl = that.data('url');
        let load_more_container = $('.load-more-content');
        // let postUrl = window.location.href;
        let post_id = $(this).data('post');
        let post_link = $(this).data('link');
        let new_link = "";
        var loading = true;
        let loadingText = '<div class="loading-text">Loading more posts...</div>';

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {
             
                action: 'sunset_load_more',
                post_id: post_id,
                post_link :post_link
            },
            beforeSend: function () {
                if (!loading) {
                    $("#loading").html(loadingText);
                    loading = true;
                }
            },
            error: function (response) {
                console.log(response);
            },
            success: function (response) {
                console.log(response);
                that.data('page', newPage);
   
                 $('.sunset-posts-container').append(response);
                // if (data.post_url) {
                //     history.pushState(null, null, data.post_url);
                // } else {
                //     console.log('Error: Could not update URL.');
                // }
                // history.pushState( '', '', data.link);
                // let data = response.data;

                // html = `<img src="${data.image_url}">
                //         <h2><a href="${data.link}">${data.title}</a></h2>`;
                // load_more_container.append(html);
                //update url
                history.pushState(null, null, data.post_link);
            }

        });

    });
    $(window).on('popstate', function () {
        location.reload();
    });

});



// (function ($) {
//     'use strict';
//     // ajax goes here....
//     let load_more_container = $('.load-more-content');

//     $(window).scroll(function () {
//         // detect if div is visible ".load-more-point"
//         if ($('.load-more-point').is(':visible')) {
//             let post_id = $('.load-more-point').data('post-id');
//             $(document).trigger('reach-load-more-div', [post_id]);
           
//             console.log('ok')
//         }

//     });
//     var loading = true;
//     var loadingText = '<div class="loading-text">Loading more posts...</div>';
//     $(document).on('reach-load-more-div', function (e, post_id) {

//         $.ajax({
//             url: ajaxurl,
//             type: 'post',
//             data: {
//                 action: 'sunset_load_more',
//                 post_id: post_id,
             

//             },
//             beforeSend: function () {
//                 if (!loading) {
//                     $("#loading").html(loadingText);
//                     loading = true;
//                 }
//             },
//             success: function (response) {
//                 if (response.success) {
                   
//                     //success
//                     let data = response.data,
//                         html = `<img src="${data.image_url}">
//                                 <h2><a href="${data.link}">${data.title}</a></h2>`;
//                     load_more_container.append(html);
//                     //update url
//                     history.pushState(null, data.title, data.link);
//                     $('.load-more-point').data('post-id', data.id);
//                 } else {
//                     console.log('failed');
//                     console.log(post_id);


//                 }
//             }
//         });
//     });

// })(jQuery);