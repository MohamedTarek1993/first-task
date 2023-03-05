(function ($) {
    'use strict';
    // ajax goes here....
    let load_more_container = $('.load-more-content');

    $(window).scroll(function () {
        // detect if div is visible ".load-more-point"
        if ($('.load-more-point').is(':visible') && !ajaxInProgress) {
            let post_id = $('.load-more-point').data('post-id');
            $(document).trigger('reach-load-more-div', [post_id]);
            console.log('ok')
        }

        

    });

    var loading = true;
    var loadingText = '<div class="loading-text">Loading more posts...</div>';
    var ajaxInProgress = false; // flag variable

    $(document).on('reach-load-more-div', function (e, post_id) {
        ajaxInProgress = true; // set flag variable to true before AJAX call
        $.ajax({
                  
            url: loadMore.ajax_url,
            type: 'post',
            data: {
                action: 'my_load_more_function',
                post_id: post_id,

            },
            beforeSend: function () {
                if (!loading) {  
                    $("#loading").html(loadingText);
                    loading = true;
                }
            },
             success: function (response) {
                ajaxInProgress = false; // set flag variable to false after AJAX call completes
                if (response.success) {
                    //success
                    let data = response.data,
                        html = `<div class = "post_content">
                        <img src="${data.image_url}">
                        <h2><a href="${data.link}">${data.title}</a></h2>
                        <div> ${data.content}</div>
                        <div class="change_url" id="changeUrl" ></div>
                        </div>`;
                    load_more_container.append(html);
                    //update url
                    history.pushState(null, data.title, data.link);
                    html = `<div class ="load-more-point"></div>`
                    $('.load-more-point').data('post-id', data.id);
                    $('.load-more-point').append(html)
                } else {
                    console.log('failed');
                    console.log(post_id);


                }
            }
        });
    });

})(jQuery);