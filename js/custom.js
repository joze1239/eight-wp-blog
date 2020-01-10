
var defaultPage = 2;
var page = defaultPage;
var postsPerPage = 2;
var minPostsPerPage = 4; // Minimum posts on load/change tags
var tag = ''; // If empty string it loads all tags
var search = '';

jQuery(function ($) {
    function reloadPosts() {
        page = defaultPage;
        var data = {
            'action': 'load_posts_by_ajax',
            'page': 0,
            'posts_per_page': minPostsPerPage,
            'tag': tag,
            'search': search,
            'security': blog.security
        };

        $.post(blog.ajaxurl, data, function (response) {
            $('.blog-posts').empty();
            $('.blog-posts').append(response);
            page++;
        });
    }

    $('#loadmore').on('click',function(){
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'posts_per_page': postsPerPage,
            'tag': tag,
            'search': search,
            'security': blog.security
        };

        $.post(blog.ajaxurl, data, function (response) {
            if (response != '') {
                $('.blog-posts').append(response);
                page++;
            } else {
                $('.loadmore').hide();
            }
        });
    });

    $('#select_tag').on('change',function(){
        var value = $('#select_tag').val();
        tag = (value === 'All') ? '' : value;
        reloadPosts();
    });

    var searchTimeout = null;
    $('#search').on('input',function(){
        search = $('#search').val();
        if (searchTimeout) {  
            clearTimeout(searchTimeout);
          }
          searchTimeout = setTimeout(function() {
             reloadPosts();
          }, 500);
    });
});