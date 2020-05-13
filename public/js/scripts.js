if (typeof(console) == 'undefined') {
    var console = {
        log: function(message) {},
        info: function(message) {},
        warn: function(message) {},
        error: function(message) {}
    }
}

init_top_catalog_menu();
init_index_middle_slider();
//init_sale_novelty_over();
init_product_preview();

init_top_catalog();
init_left_catalog();
init_fixed_block();
init_information_left_menu();
init_cart();
init_callback();
init_autocomplete();
init_colors_change();

function init_sale_novelty_over()
{
    $(document).ready(function(){

        var sale_block = $('.sale_block');
        var novelty_block = $('.novelty_block');
        var category_product_block = $('.category_product_block');
        var sub_category_product_block = $('.sub_category_product_block');

        sale_block.hover(function(){
            $(this).addClass('sale_block_over');
        }, function(){
            $(this).removeClass('sale_block_over');
        });

        novelty_block.hover(function(){
            $(this).addClass('novelty_block_over');
        }, function(){
            $(this).removeClass('novelty_block_over');
        });

        category_product_block.hover(function(){
            $(this).addClass('category_product_block_over');
        }, function(){
            $(this).removeClass('category_product_block_over');
        });

        sub_category_product_block.hover(function(){
            $(this).addClass('sub_category_product_block_over');
        }, function(){
            $(this).removeClass('sub_category_product_block_over');
        });

    });
}

function init_autocomplete()
{
    $(document).ready(function(){

        $.ajax({
            url: '/cart/get_products_autocomplete',
            type: 'POST',
            dataType: 'json',
            success: function(data){

//                var ask_vars = data;

                $('#search_input_top').autocomplete(
                    {

                        lookup: data,
                        maxHeight: 150

                    });

            }
        });



    });
}


function init_index_middle_slider()
{
    $(document).ready(function(){
        $('.carousel').carousel();
    });
}


function init_information_left_menu()
{
    $(document).ready(function(){

        var information_left_menu_link = $('.information_left_menu_link');
        var information_news_block_text_away_link = $('.information_news_block_text_away_link');
        var information_articles_block_text_away_link = $('.information_articles_block_text_away_link');
        var link_forest = $('.link_forest');

        var news_row = $('#news_row');
        var news_left_menu_link = $('#news_left_menu_link');

        var articles_row = $('#articles_row');
        var articles_left_menu_link = $('#articles_left_menu_link');

        var delivery_row = $('#delivery_row');
        var delivery_left_menu_link = $('#delivery_left_menu_link');

        var contacts_row = $('#contacts_row');
        var contacts_left_menu_link = $('#contacts_left_menu_link');

        var oplata_row = $('#oplata_row');
        var oplata_left_menu_link = $('#oplata_left_menu_link');

        var company_row = $('#company_row');
        var company_left_menu_link = $('#company_left_menu_link');

        var prevElt, nextElt;

        if(news_row.length > 0)
        {
            news_left_menu_link.empty();
            news_left_menu_link.append('<p class="information_left_menu_notlink">Новости</p>');

            prevElt = news_left_menu_link.prev();
            nextElt = news_left_menu_link.next();


            prevElt.empty();
            prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

            nextElt.empty();
            nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');
        }


        if(articles_row.length > 0)
        {
            articles_left_menu_link.empty();
            articles_left_menu_link.append('<p class="information_left_menu_notlink">Статьи</p>');

            prevElt = articles_left_menu_link.prev();
            nextElt = articles_left_menu_link.next();


            prevElt.empty();
            prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

            nextElt.empty();
            nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');
        }

        if(delivery_row.length > 0)
        {
            delivery_left_menu_link.empty();
            delivery_left_menu_link.append('<p class="information_left_menu_notlink">Доставка</p>');

            prevElt = delivery_left_menu_link.prev();
            nextElt = delivery_left_menu_link.next();


            prevElt.empty();
            prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

            nextElt.empty();
            nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');
        }

        if(contacts_row.length > 0)
        {
            contacts_left_menu_link.empty();
            contacts_left_menu_link.append('<p class="information_left_menu_notlink">Контакты</p>');

            prevElt = contacts_left_menu_link.prev();
            nextElt = contacts_left_menu_link.next();


            prevElt.empty();
            prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

            nextElt.empty();
            nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');
        }

        if(company_row.length > 0)
        {
            company_left_menu_link.empty();
            company_left_menu_link.append('<p class="information_left_menu_notlink">О компании</p>');

            prevElt = company_left_menu_link.prev();
            nextElt = company_left_menu_link.next();


            prevElt.empty();
            prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

            nextElt.empty();
            nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');
        }

        if(oplata_row.length > 0)
        {
            oplata_left_menu_link.empty();
            oplata_left_menu_link.append('<p class="information_left_menu_notlink">Оплата</p>');

            prevElt = oplata_left_menu_link.prev();
            nextElt = oplata_left_menu_link.next();


            prevElt.empty();
            prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

            nextElt.empty();
            nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');
        }

        information_news_block_text_away_link.hover(
            function()
            {
                $(this).children(link_forest).css({'text-decoration':'none'});
            },
            function()
            {
                $(this).children(link_forest).css({'text-decoration':'underline'});
            }
        );

        information_articles_block_text_away_link.hover(
            function()
            {
                $(this).children(link_forest).css({'text-decoration':'none'});
            },
            function()
            {
                $(this).children(link_forest).css({'text-decoration':'underline'});
            }
        );


        information_left_menu_link.hover(
            function()
            {
                var prevElt = $(this).parent().prev();
                var nextElt = $(this).parent().next();

                prevElt.empty();
                prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

                nextElt.empty();
                nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');
            },
            function()
            {
                var prevElt = $(this).parent().prev();
                var nextElt = $(this).parent().next();

                prevElt.empty();
                prevElt.append('<img src="/public/img/index_page/ico-list.png" alt="">');

                nextElt.empty();
                nextElt.append('<img src="/public/img/index_page/menu_arrow.png" alt="">');
            }
        );

    });
}

function init_fixed_block()
{
    $(document).ready(function(){
        var size_button = $('.normal_size');
        size_button.on('click', function(){
            $('.active_size').addClass('normal_size');
            $('.active_size').removeClass('active_size');
            $(this).removeClass('normal_size');
            $(this).addClass('active_size');
            $('input[name="size"]').val(this.innerHTML);
        });


        var user_viewed_btn = $('.user_viewed_btn');
        var user_collate_btn = $('.user_collate_btn');
        var user_bookmarks_btn = $('.user_bookmarks_btn');

        var user_viewed_block = $('#user_viewed_block');
        var user_collate_block = $('#user_collate_block');
        var user_bookmarks_block = $('#user_bookmarks_block');
        var scroll_top_btn = $('#scroll_top_btn');

        var footer_head_bg_link = $('.footer_head_bg_link');
        var footer_content_block = $('.footer_content_block');

        user_viewed_btn.on('click', function(){

            user_viewed_block.toggle();
            user_collate_block.hide();
            user_bookmarks_block.hide();

        });

        user_collate_btn.on('click', function(){

            user_collate_block.toggle();
            user_viewed_block.hide();
            user_bookmarks_block.hide();

        });

        user_bookmarks_btn.on('click', function(){

            user_bookmarks_block.toggle();
            user_viewed_block.hide();
            user_collate_block.hide();

        });

        scroll_top_btn.on('click', function(){

            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;

        });

        footer_head_bg_link.click(function(){
            footer_content_block.slideToggle(450, 'linear', function(){
                $("html, body").animate({ scrollTop: $('.footer_head_bg_block').offset().top }, 150);
                return false;
            });
        });

    });
}

function init_top_catalog_menu()
{
    $(document).ready(function(){

        var top_menu_catalog_btn = $('#top_menu_catalog_btn');
        var top_catalog_menu = $('.top_catalog_menu');
        var left_menu_block = $('.left_menu_block');

        var category_menu_block_parent_link = $('.category_menu_block_parent_link');
        var sub_category_block = $('.sub_category_block');

        var left_menu_block_parent_link = $('.left_menu_block_parent_link');
        var left_menu_sub_category_block = $('.left_menu_sub_category_block');

        top_menu_catalog_btn.on('click', function(){

            top_catalog_menu.toggle('fast');

            if(sub_category_block.hasClass('active'))
            {
                sub_category_block.hide('fast');
                sub_category_block.removeClass('active');
            }

            if(left_menu_sub_category_block.hasClass('active'))
            {
                left_menu_sub_category_block.hide('fast');
                left_menu_sub_category_block.removeClass('active');
            }

        });

        left_menu_block.click(function(){

            if(left_menu_sub_category_block.hasClass('active'))
            {
                left_menu_sub_category_block.hide('fast');
                left_menu_sub_category_block.removeClass('active');
            }

        });

        $('html').click(function(){

            if(left_menu_sub_category_block.hasClass('active'))
            {
                left_menu_sub_category_block.hide('fast');
                left_menu_sub_category_block.removeClass('active');
            }

        });


        function getCategoryLeftMenu()
        {
            $(this).addClass('active');

            if($(this).hasClass('active'))
            {

                var parent_id = $(this).attr('data-parent-id');

                var options = {
                    parent_category_id:parent_id
                };

                var form_url = "/def_index/ajax_get_subcategory";
                var form_method = "post";

                left_menu_sub_category_block.addClass('active').show();

                $.ajax({
                    url: form_url,
                    type: form_method,
                    data: options,
                    cache: false,
                    success: function(data){

                        left_menu_sub_category_block.empty();

                        $.each($.parseJSON(data), function(){
                            left_menu_sub_category_block.append('<a href="/catalog/' + this.parent_category_url + '/' + this.sub_category_url + '" class="category_menu_block_subcategory_link">' + this.category_name + '</a><br>');
                        });

                    }
                });

            }
        }

        function getCategoryTopMenu()
        {
            $(this).addClass('active');

            if($(this).hasClass('active'))
            {

                var parent_id = $(this).attr('data-parent-id');

                var options = {
                    parent_category_id:parent_id
                };

                var form_url = "/def_index/ajax_get_subcategory";
                var form_method = "post";

                sub_category_block.addClass('active').show();

                $.ajax({
                    url: form_url,
                    type: form_method,
                    data: options,
                    success: function(data){

                        sub_category_block.empty();

                        $.each($.parseJSON(data), function(){
                            sub_category_block.append('<a href="/catalog/' + this.parent_category_url + '/' + this.sub_category_url + '" class="category_menu_block_subcategory_link">' + this.category_name + '</a><br>');
                        });

                    }
                });

            }
        }

        category_menu_block_parent_link.hoverIntent(getCategoryTopMenu);
        left_menu_block_parent_link.hoverIntent(getCategoryLeftMenu);

    });

}

function init_left_menu_link()
{
    $(document).ready(function(){
        var sub_cat = $('.link_sub_cat');
        var parent_cat = $('.link_parent_cat');

        parent_cat.on('mouseover', function(){
            $(this).parent().css({
                'background-color':'#c09b89'
            });
            $(this).css({
                'color':'#ffffff'
            });
        });

        parent_cat.on('mouseout', function(){
            $(this).parent().css({
                'background-color':'#e3dfd3'
            });
            $(this).css({
                'color':'#000000'
            });
        });

        sub_cat.on('mouseover', function(){
            $(this)
                .children()
                .css(
                {
                    'color':'#ffffff'
                });
        });

        sub_cat.on('mouseout', function(){
            $(this)
                .children()
                .css(
                {
                    'color':'#000000'
                });
        });

    });

}

function init_top_catalog()
{
    $(document).ready(function(){

        var catalog_top_btn = $('#catalog_top_btn');

        var catalog_top_parent_category_link = $('.catalog_top_parent_category_link');
        var catalog_top_menu = $('.catalog_top_menu');
        var sub_category_top_menu = $('.sub_category_top_menu');

        var catalog_top_parent_category_icon_wrap = $('.catalog_top_parent_category_icon_wrap');
        var catalog_top_parent_category_arrow_icon_fe_wrap = $('.catalog_top_parent_category_arrow_icon_fe_wrap');
        var catalog_top_parent_category_arrow_icon_wrap = $('.catalog_top_parent_category_arrow_icon_wrap');

        var header_parent_category_top = $('.header_parent_category_top');
        var subcategory_top_list = $('.subcategory_top_list');
        var subcategory_top_img = $('.subcategory_top_img');

        catalog_top_btn.on('click', function(){

            if(catalog_top_menu.hasClass('active'))
            {
                catalog_top_menu.hide('fast');
                catalog_top_menu.removeClass('active');
                catalog_top_btn.removeClass('catalog_top_btn_hover');
                sub_category_top_menu.hide('fast');
                catalog_top_parent_category_link.removeClass('parent_category_top_link_hover');
                clear_img();
            }
            else
            {
                catalog_top_menu.show('fast');
                catalog_top_menu.addClass('active');
                catalog_top_btn.addClass('catalog_top_btn_hover');
            }

        });

        function clear_img()
        {

            catalog_top_parent_category_icon_wrap.empty();
            catalog_top_parent_category_icon_wrap.append('<img src="/public/img/index_page/ico-list.png" alt="">');

            catalog_top_parent_category_arrow_icon_fe_wrap.empty();
            catalog_top_parent_category_arrow_icon_fe_wrap.append('<img src="/public/img/index_page/menu_arrow.png" alt="">');

            catalog_top_parent_category_arrow_icon_wrap.empty();
            catalog_top_parent_category_arrow_icon_wrap.append('<img src="/public/img/index_page/menu_arrow.png" alt="">');

            subcategory_top_img.empty().hide();

        }

        function sub_category_menu_show()
        {

            clear_img();

            catalog_top_parent_category_link.removeClass('parent_category_top_link_hover');

            $(this).addClass('active');

            if($(this).hasClass('active'))
            {

                $(this).addClass('parent_category_top_link_hover');

                sub_category_top_menu.show('fast');

                var parent_id = $(this).attr('data-parent-id');

                var prevElt = $(this).parent().prev();
                var nextElt = $(this).parent().next();

                prevElt.empty();
                prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

                nextElt.empty();
                nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');


                var options = {
                    parent_category_id:parent_id
                };

                var form_url = "/def_index/ajax_get_subcategory";
                var form_method = "post";


                $.ajax({
                    url: form_url,
                    type: form_method,
                    data: options,
                    cache: false,
                    success: function(data){

                        header_parent_category_top.empty();
                        subcategory_top_list.empty();

                        var parseData = $.parseJSON(data);

                        var parent_category_name = parseData.parentCategory[0].category_name;
                        var parent_category_url = parseData.parentCategory[0].parent_category_url;

                        $.each(parseData.subCategory, function(){

                            subcategory_top_list.append('<li><a class="subcategory_top_list_link" href="/catalog/' + this.parent_category_url + '/' + this.sub_category_url + '">' + this.category_name + '</a></li>');
                        });

                        header_parent_category_top.append('<img class="header_parent_top_category_img" src="/public/img/index_page/menu_arrow_a.png"><a href="/catalog/' + parent_category_url +'/" class="header_parent_category_top_link">' + parent_category_name + '</a>');

                        subcategory_top_img.append('<img src="/public/img/index_page/menu_foto_cat_' + parent_id + '.png">').show();

                    }
                });

            }

        }

        function avoid_out()
        {
            return true
        }

        catalog_top_parent_category_link.hoverIntent(sub_category_menu_show, avoid_out);

    });

}



function init_left_catalog()
{
    $(document).ready(function(){
        var parent_category_link = $('.parent_category_link');
        var catalog_left_menu = $('.catalog_left_menu');
        var sub_category_menu = $('.sub_category_menu');

        var catalog_parent_category_icon_wrap = $('.catalog_parent_category_icon_wrap');
        var catalog_parent_category_fe_arrow_icon_wrap = $('.catalog_parent_category_fe_arrow_icon_wrap');
        var catalog_parent_category_arrow_icon_wrap = $('.catalog_parent_category_arrow_icon_wrap');

        var header_parent_category = $('.header_parent_category');
        var subcategory_list = $('.subcategory_list');
        var subcategory_img = $('.subcategory_img');

        catalog_left_menu.hover(
            function()
            {
                $(this).addClass('catalog_left_menu_hover');
            }
            ,
            function()
            {
                $(this).removeClass('catalog_left_menu_hover');
            }
        );

        function clear_img()
        {

            catalog_parent_category_icon_wrap.empty();
            catalog_parent_category_icon_wrap.append('<img src="/public/img/index_page/ico-list.png" alt="">');

            catalog_parent_category_fe_arrow_icon_wrap.empty();
            catalog_parent_category_fe_arrow_icon_wrap.append('<img src="/public/img/index_page/menu_arrow.png" alt="">');

            catalog_parent_category_arrow_icon_wrap.empty();
            catalog_parent_category_arrow_icon_wrap.append('<img src="/public/img/index_page/menu_arrow.png" alt="">');

            subcategory_img.empty();

        }

        function sub_category_menu_show()
        {

            clear_img();

            parent_category_link.removeClass('parent_category_link_hover');

            $(this).addClass('active');

            if($(this).hasClass('active'))
            {

                $(this).addClass('parent_category_link_hover');

                sub_category_menu.show();

                var parent_id = $(this).attr('data-parent-id');

                var prevElt = $(this).parent().prev();
                var nextElt = $(this).parent().next();

                prevElt.empty();
                prevElt.append('<img src="/public/img/index_page/ico-list_a.png" alt="">');

                nextElt.empty();
                nextElt.append('<img src="/public/img/index_page/menu_arrow_a.png" alt="">');


                var options = {
                    parent_category_id:parent_id
                };

                var form_url = "/def_index/ajax_get_subcategory";
                var form_method = "post";


                $.ajax({
                    url: form_url,
                    type: form_method,
                    data: options,
                    cache: false,
                    success: function(data){

                        header_parent_category.empty();
                        subcategory_list.empty();

                        var parseData = $.parseJSON(data);

//                        var parent_category_id = parseData.parentCategory[0].parent_category_id;
                        var parent_category_name = parseData.parentCategory[0].category_name;
                        var parent_category_url = parseData.parentCategory[0].parent_category_url;

                        $.each(parseData.subCategory, function(){

                            subcategory_list.append('<li><a class="subcategory_list_link" href="/catalog/' + this.parent_category_url + '/' + this.sub_category_url + '">' + this.category_name + '</a></li>');
                        });

                        header_parent_category.append('<img class="header_parent_category_img" src="/public/img/index_page/menu_arrow_a.png"><a href="/catalog/' + parent_category_url + '/" class="header_parent_category_link">' + parent_category_name + '</a>');

                        subcategory_img.append('<img src="/public/img/index_page/menu_foto_cat_' + parent_id + '.png">');

                    }
                });

            }

        }

        function sub_category_menu_hide()
        {
            sub_category_menu.hide();
            parent_category_link.removeClass('parent_category_link_hover');

            clear_img();
        }

        function avoid_out()
        {
            return true
        }

        parent_category_link.hoverIntent(sub_category_menu_show, avoid_out);

        catalog_left_menu.mouseleave(sub_category_menu_hide);

    });

}

function init_middle_menu()
{
    $(document).ready(function(){

        var index_page = $('#index_page');
        var cart_page = $('#cart_page');
        var pay_page = $('#pay_page');
        var warranty_page = $('#warranty_page');
        var contacts_page = $('#contact_page');

        var index_btn = $('#index');
        var cart_btn = $('#cart');
        var payment_methods = $('#payment_methods');
        var warranty = $('#warranty');
        var contacts = $('#contacts');

        if(index_page.length > 0)
        {

            index_btn.css({
                'color':'#ffffff',
                'background-color':'#5d1111'
            });

            cart_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            payment_methods.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            warranty.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            contacts.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

        }

        if(cart_page.length > 0)
        {

            cart_btn.css({
                'color':'#ffffff',
                'background-color':'#5d1111'
            });

            index_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            payment_methods.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            warranty.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            contacts.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });
        }

        if(pay_page.length > 0)
        {

            payment_methods.css({
                'color':'#ffffff',
                'background-color':'#5d1111'
            });

            index_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            cart_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            warranty.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            contacts.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });
        }

        if(warranty_page.length > 0)
        {

            warranty.css({
                'color':'#ffffff',
                'background-color':'#5d1111'
            });

            index_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            cart_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            payment_methods.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            contacts.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });
        }

        if(contacts_page.length > 0)
        {

            contacts.css({
                'color':'#ffffff',
                'background-color':'#5d1111'
            });

            index_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            cart_btn.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            payment_methods.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });

            warranty.css({
                'color':'#ffffff',
                'background-color':'#c09b89'
            });
        }

    });
}



function init_callback(){
    $(document).ready(function()
    {

        var callback_link = $(".callback_link");

        callback_link.fancybox
        (
            {
                afterClose: function()
                {
                    $('#result_callback').empty();
                    $('#after_send_callback').hide();
                    $('#click_to_send').attr('disabled',false);
                },
                beforeShow: function()
                {

                    var callback_form = $('#callback_form');
                    var callback_client_phone = $('#callback_client_phone');

                    callback_client_phone.mask("(999)999-99-99");
                    var afterShow = $('#after_send_callback');

                    callback_form.show();
                    $('#callback_client_name').val('');
                    $('#callback_client_phone').val('');
                    $('#callback_client_email').val('');
                    $('#callback_client_text').val('');

                    callback_form.validate({
                        rules: {
                            callback_client_name: "required",
                            callback_client_phone:"required",
                            callback_client_email: {
                                email: true
                            }
                        },
                        errorPlacement: function(){
                            return false;
                        },
                        errorClass: "callback_validate_border_error",
                        submitHandler: function() {
                            var clientname = $('#callback_client_name').val();
                            var email = $('#callback_client_email').val();
                            var phone = $('#callback_client_phone').val();
                            var text = $('#callback_client_text').val();


                            $.post
                            (
                                "/def_index/send_callback",
                                {
                                    'callback_client_name' : clientname,
                                    'callback_client_email' : email,
                                    'callback_client_phone' : phone,
                                    'callback_client_text' : text,
                                    'date_question': null
                                },
                                function(){
                                    callback_form.hide('slow');

                                    afterShow.show('slow');
                                    $('#result_callback').append("Спасибо , ваш вопрос принят!<br>В ближайшее время менеджер ответит Вам.");

                                    setTimeout(function(){
                                        $.fancybox.close();
                                    }, 3500);

                                },
                                "json"

                            );

                        }
                    });

                },
                beforeClose: function()
                {
                    $('#result_callback').empty();
                    $('#after_send_callback').hide();
                }
            });


    });

}

function init_ask(){


    var ask_client_phone = $('#ask_client_phone');

    ask_client_phone.mask("(999)999-99-99");

    var ask_form = $('#ask_form');

    ask_form.validate({
        rules: {
            ask_client_name: "required",
            ask_client_phone: "required",
            ask_client_email: {
                email: true
            },
            ask_client_captcha: "required"
        },
        errorPlacement: function(){
            return false;
        },
        errorClass: "ask_validate_border_error"
    });
}

function init_product_preview()
{
    $(document).ready(function() {

        $('.current_product_preview').fancybox({
            autoCenter: true,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });

        $('.cart_current_product_img').fancybox({
            autoCenter: true,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });

        var product_big_image = $('#current_product_big');
        var product_box_image = $('#current_product_box');
        var product_scheme_image = $('#current_product_scheme');

        var product_big_btn = $('#current_product_big_btn');
        var product_box_btn = $('#current_product_box_btn');
        var product_scheme_btn = $('#current_product_scheme_btn');

        var current_product_big_over = $('#current_product_big_over');
        var current_product_scheme_over = $('#current_product_scheme_over');
        var current_product_box_over = $('#current_product_box_over');

        var current_product_compare_link = $('.current_product_compare_link');
        var current_product_bookmarks_link = $('.current_product_bookmarks_link');
        var current_product_compare_btn_link_ico = $('.current_product_compare_btn_link_ico');
        var current_product_bookmarks_btn_link_ico = $('.current_product_bookmarks_btn_link_ico');

        var current_product_price_btn_img = $('.current_product_price_btn_img');
        var current_product_price_btn = $('.current_product_price_btn');

        var current_product_specsbar = $('.current_product_specsbar');
        var current_product_specsbar_link = $('.current_product_specsbar_link');
        var current_product_specsbar_content = $('.current_product_specsbar_content');
        var current_product_tech_specs_block = $('#current_product_tech_specs_block');
        var current_product_review_block = $('#current_product_review_block');
        var current_product_related_products_block = $('#current_product_related_products_block');

        var current_product_related_products_wrap = $('.current_product_related_products_wrap');

        var current_product_review_write_link = $('.current_product_review_write_link');
        var current_product_review_write_ico = $('.current_product_review_write_ico');
        var current_product_review_write_link_span = $('#current_product_review_write_link_span');
        var current_product_review_write_block = $('.current_product_review_write_block');

        var captcha_update_btn = $('#captcha_update_btn');
        var captcha_img_wrap = $('.captcha_img_wrap');

        var current_product_qty_minus = $('.current_product_qty_minus');
        var current_product_qty_plus = $('.current_product_qty_plus');
        var current_product_qty = $('.current_product_qty');

        current_product_qty_minus.click(
            function()
            {
                var current_product_qty_current_value_minus = current_product_qty.val();

                current_product_qty_current_value_minus = Number(current_product_qty_current_value_minus);
                current_product_qty_current_value_minus = current_product_qty_current_value_minus - 1;
                current_product_qty_current_value_minus = String(current_product_qty_current_value_minus);
                current_product_qty.val(current_product_qty_current_value_minus);

                if(current_product_qty.val() <= 0)
                {
                    current_product_qty.val('1');
                }

            }
        );

        current_product_qty_plus.click(
            function()
            {
                var current_product_qty_current_value_plus = current_product_qty.val();

                current_product_qty_current_value_plus = Number(current_product_qty_current_value_plus);
                current_product_qty_current_value_plus = current_product_qty_current_value_plus + 1;
                current_product_qty_current_value_plus = String(current_product_qty_current_value_plus);
                current_product_qty.val(current_product_qty_current_value_plus);

                if(current_product_qty.val() >= 999)
                {
                    current_product_qty.val('1');
                }
            }
        );

        current_product_big_over.show();

        product_big_btn.click(function(){

            product_big_image.fadeIn('slow');
            product_box_image.hide();
            product_scheme_image.hide();
            $(".current_product_image_block div#current_product_color").hide().remove();

            current_product_big_over.fadeIn('slow');
            current_product_scheme_over.hide();
            current_product_box_over.hide();

        });

        product_box_btn.click(function(){

            product_box_image.fadeIn('slow');
            product_big_image.hide();
            product_scheme_image.hide();
            $(".current_product_image_block div#current_product_color").hide().remove();

            current_product_big_over.hide();
            current_product_scheme_over.hide();
            current_product_box_over.fadeIn('slow');

        });

        product_scheme_btn.click(function(){

            product_scheme_image.fadeIn('slow');
            product_big_image.hide();
            product_box_image.hide();
            $(".current_product_image_block div#current_product_color").hide().remove();

            current_product_big_over.hide();
            current_product_scheme_over.fadeIn('slow');
            current_product_box_over.hide();

        });

        current_product_compare_link.hover(
            function()
            {
                current_product_compare_btn_link_ico.attr('src', '/public/img/index_page/ico_compare-akt.png');
            },
            function()
            {
                current_product_compare_btn_link_ico.attr('src', '/public/img/index_page/ico_compare.png');
            }
        );

        current_product_bookmarks_link.hover(
            function()
            {
                current_product_bookmarks_btn_link_ico.attr('src', '/public/img/index_page/ico_bookmarks_akt.png');
            },
            function()
            {
                current_product_bookmarks_btn_link_ico.attr('src', '/public/img/index_page/ico_bookmarks.png');
            }
        );

        current_product_price_btn.hover(
            function()
            {
                current_product_price_btn_img.attr('src', '/public/img/index_page/but_buy-akt.png');
            },
            function()
            {
                current_product_price_btn_img.attr('src', '/public/img/index_page/but_buy.png');
            }
        );

        current_product_specsbar.click(function(){

            current_product_specsbar.removeClass('current_product_specsbar_active');
            $(this).addClass('current_product_specsbar_active');

            current_product_specsbar_link.removeClass('current_product_specsbar_link_active');
            $(this).children().addClass('current_product_specsbar_link_active');

            if($(this).attr('id') == 'current_product_tech_specs')
            {
                current_product_specsbar_content.removeClass('current_product_specsbar_content_active');
                current_product_tech_specs_block.addClass('current_product_specsbar_content_active');
            }

            if($(this).attr('id') == 'current_product_review')
            {
                current_product_specsbar_content.removeClass('current_product_specsbar_content_active');
                current_product_review_block.addClass('current_product_specsbar_content_active');
            }

            if($(this).attr('id') == 'current_product_related_products')
            {
                current_product_specsbar_content.removeClass('current_product_specsbar_content_active');
                current_product_related_products_block.addClass('current_product_specsbar_content_active');

                var current_product_id = $('input[name="current_product_id"]').val();
                var current_sub_category_id = $('input[name="current_sub_category_id"]').val();

                var current_parent_url = $('input[name="current_parent_url"]').val();
                var current_sub_category_url = $('input[name="current_sub_category_url"]').val();

                var related_produtcs_data =
                {
                    'current_product_id':current_product_id,
                    'current_sub_category_id':current_sub_category_id
                };

                $.ajax({
                    url: '/catalog/get_related_products',
                    type: 'POST',
                    data:related_produtcs_data,
                    dataType: 'json',
                    cache: true,
                    success: function(data){

                        current_product_related_products_wrap.empty();

                        for(var i=0; i<data.length; i++)
                        {

                            current_product_related_products_wrap.append('' +
                                '<div class="span2 override_margin-left current_product_related_product">' +
                                    '<div class="row override_margin-left current_product_related_product_img_wrap">' +
                                        '<a href="/catalog/' + current_parent_url +'/' + current_sub_category_url + '/' + data[i].product_url + '" title="' + data[i].product_name +'">' +
                                            '<img title="' + data[i].product_name + '" alt="' + data[i].product_name + '" src="/public/img/products/img_id_' + data[i].product_id + '_big_prod_list.png">' +
                                        '</a>' +
                                    '</div>' +
                                    '<div class="row override_margin-left">' +
                                        '<a href="/catalog/' + current_parent_url +'/' + current_sub_category_url + '/' + data[i].product_url + '" title="' + data[i].product_name +'" class="related_product_title">' + data[i].product_card_name + '</a>' +
                                        '<a href="/catalog/' + current_parent_url +'/' + current_sub_category_url + '/' + data[i].product_url + '" title="' + data[i].product_name +'" class="related_product_title"><p class="current_product_related_products_card_model">модель: <span style="color: #00adef; font-family: PTSansBold, sans-serif;">' + data[i].product_card_model_name + '</span></p></a>' +
                                    '</div>' +
                                '</div>');
                        }

                        $('#load_gif').css({'display':'none'});

                        current_product_related_products_wrap.show('slow');

                    }
                });
            }

        });

        current_product_review_write_link.hover(
            function()
            {
                current_product_review_write_ico.attr('src', '/public/img/index_page/ico_write-akt.png');
                current_product_review_write_link_span.css({'border-bottom':'none'});
            },
            function()
            {
                current_product_review_write_ico.attr('src', '/public/img/index_page/ico_write.png');
                current_product_review_write_link_span.css({'border-bottom':'1px dashed #02709b'});
            }
        );

        current_product_review_write_link.click(
            function()
            {
                current_product_review_write_block.toggle(450);
            }
        );


        captcha_update_btn.click(function(){

            $.ajax({
                url: '/catalog/captcha_update',
                type: 'POST',
                dataType: 'json',
                success: function(data){

                    captcha_img_wrap.hide(700, function(){
                        $(this).empty();
                        $(this).append(data.updated_captcha).show('slow');
                    });

                }
            });


        });

        var product_collate_image_link = $('.product_collate_image_link');

        product_collate_image_link.fancybox(
            {
                autoCenter: true,
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            });


        var product_review_form = $('#product_review_form');

        product_review_form.validate({
            rules: {
                review_plus_text: "required",
                review_client_name: "required",
                review_minus_text: "required",
                review_client_email: {
                    required: true,
                    email: true
                },
                review_client_captcha: "required",
                review_comment_text: "required"
            },
            messages: {
                review_plus_text: "Обязательное поле для ввода",
                review_client_name: "Обязательное поле для ввода",
                review_minus_text: "Обязательное поле для ввода",
                review_client_email: {
                    required : "Обязательное поле для ввода",
                    email: "Не корректный e-mail."
                },
                review_client_captcha: "Обязательное поле для ввода",
                review_comment_text: "Обязательное поле для ввода"
            },
            errorClass: "validate_border_error",
            submitHandler: function () {

                var current_product_id = $('input[name="current_product_id"]').val();;
                var current_product_name_full = $('input[name="current_product_name_full"]').val();;
                var review_plus_text = $('#review_plus_text').val();
                var review_client_name = $('#review_client_name').val();
                var review_minus_text = $('#review_minus_text').val();
                var review_client_email = $('#review_client_email').val();
                var review_client_captcha = $('#review_client_captcha').val();
                var review_comment_text = $('#review_comment_text').val();

                var options = {
                    product_id:current_product_id,
                    product_name:current_product_name_full,
                    plus_text:review_plus_text,
                    minus_text:review_minus_text,
                    result_text:review_comment_text,
                    client_name:review_client_name,
                    client_email:review_client_email,
                    captcha:review_client_captcha
                };

                $.ajax({
                    url: '/catalog/send_review',
                    type: 'POST',
                    data: options,
                    dataType: 'json',
                    complete: function()
                    {
                        $('.current_product_review_write_block').hide('slow');
                        window.location.reload(true);
                    }
                });

            }
        });

    });

}


function init_cart()
{
    $(document).ready(function() {

        var buy_btn = $('#buy_btn');
        var select_pole = $('.select_pole');

        var current_product_color = $('#current_product_color_select');
        var current_product_spec = $('#current_product_spec');

        var current_product_qty = $('.current_product_qty');

        var current_product_price = $('.current_product_price');

        var current_product_title = $('input[name="current_product_title"]').val();

        buy_btn.click(function(){
            debugger;

            var current_product_price = $('.current_product_price').text();

            var current_shop_product_id = $('input[name="current_shop_product_id"]').val();
            var current_product_id = $('input[name="current_product_id"]').val();

            var current_shop_product_weight = $('input[name="current_shop_product_weight"]').val();

            var current_product_color_id = $('#current_product_color_select option:selected').val();
            var current_product_spec_id = $('#current_product_spec option:selected').val();

            var current_product_qty_val = current_product_qty.val();

            var current_product_spec_name = $('#current_product_spec option:selected').text();
            var current_product_color_name = $('#current_product_color_select option:selected').text();

            var collate_status = $('input[name="collate_status"]').val();
            var bookmarks_status = $('input[name="bookmarks_status"]').val();

            if(current_product_spec_id == undefined)
            {
                current_product_spec_name = '';
                current_product_spec_id = '0';
            }

            if(current_product_color_id == undefined)
            {
                current_product_color_id = $('input[name="current_product_shop_color_id"]').val();
                current_product_color_name = $('input[name="current_product_shop_color_name"]').val();
            }

            var options = {
                'product_id' : current_product_id,
                'shop_product_id' : current_shop_product_id,
                'product_color_id' : current_product_color_id,
                'product_spec_id' : current_product_spec_id,
                'product_qty_val' : current_product_qty_val,
                'product_price' : current_product_price,
                'product_spec_name' : current_product_spec_name,
                'product_color_name' : current_product_color_name,
                'product_title' : current_product_title,
                'product_weight' : current_shop_product_weight,
                'product_url' : location.pathname,
                'collate_status' : collate_status,
                'bookmarks_status' : bookmarks_status
            };


            $.ajax({
                url: '/cart/add_to_cart',
                type: 'POST',
                data: options,
                dataType: 'json',
                success: function(data){


                    var modal_order = '/cart/modal_order';
                    var loadIn = $('<div></div>').load(modal_order);


                    $.fancybox.open(loadIn,{
                        width: 440,
                        height: 250,
                        minHeight: 250,
                        minWidth: 440,
                        padding: 10,
                        margin: 10,
                        helpers: {
                            title : {
                                type : 'float'
                            },
                            overlay: {
                                locked: false
                            }
                        },
                        afterShow: function()
                        {


                            $('#order_pic').append("<a href='" + data.product_url + "' title='" + data.product_name + "'><img src='/public/img/products/img_id_" + data.product_id +"_big_prod_view.png' title='" + data.product_name + "'></a>");
                            $('#order_product_desc').append("<p>" + data.product_name + "</p><p>" + data.product_count + " x " + data.product_price + " руб.</p><p>Цвет: "+ data.product_color_name +"</p>");

                            if(data.product_spec_name !== '')
                            {
                                $('#order_product_desc').append("<p>Спецификация: " + data.product_spec_name +"</p>")
                            }

                            $('#let_shop').click(function(){
                                $.fancybox.close();
                            });

                        }
                    });

                    $('#total_price').empty().text(data.cart_summary);
                    $('#footer_cart_summary').empty().text(data.cart_summary);
                    $('#cart_count').empty().text(data.cart_count);
                    $('#footer_cart_count').empty().text(data.cart_count);

                }
            });

        });

        select_pole.change(function(){
            //debugger;


            var current_product_color_id = current_product_color.val();
            var colors = $("#colors_color_id_"+current_product_color_id);
            colors_chang_proc(colors);


            select_pole_change(current_product_color, current_product_spec, current_product_price);
        });

        var cart_current_product_wrap = $('.cart_current_product_wrap');

        if(cart_current_product_wrap.length == 0)
        {

            $('.cart_empty_wrap').show('fast');
            $('#cart_title_table').hide('fast');

        }

        var cart_current_product_plus = $('.cart_current_product_plus');
        var cart_current_product_minus = $('.cart_current_product_minus');

        var cart_current_product_qty = $('.cart_current_product_qty');

        cart_current_product_plus.click(function(){

            var row_id = $(this).attr('data-cart-rowid');

            var current_product_qty_current_value_plus = $(this).parent().prev().children().val();

            current_product_qty_current_value_plus = Number(current_product_qty_current_value_plus);
            current_product_qty_current_value_plus = current_product_qty_current_value_plus + 1;
            current_product_qty_current_value_plus = String(current_product_qty_current_value_plus);
            $(this).parent().prev().children().val(current_product_qty_current_value_plus);

            if($(this).parent().prev().children().val() >= 999)
            {
                $(this).parent().prev().children().val('1');
            }

            var qty = $(this).parent().prev().children().val();

            var options = {
                'row_id' : row_id,
                'qty' : qty
            };

            $.ajax({
                url: '/cart/update_item_cart',
                type: 'POST',
                data: options,
                dataType: 'json',
                success: function(data){

                    if(data.success_data == 1)
                    {
                        window.location.reload(true);
                    }

                }
            });

        });

        cart_current_product_minus.click(function(){

            var row_id = $(this).attr('data-cart-rowid');

            var current_product_qty_current_value_plus = $(this).parent().next().children().val();

            current_product_qty_current_value_plus = Number(current_product_qty_current_value_plus);
            current_product_qty_current_value_plus = current_product_qty_current_value_plus - 1;
            current_product_qty_current_value_plus = String(current_product_qty_current_value_plus);
            $(this).parent().next().children().val(current_product_qty_current_value_plus);

            if($(this).parent().next().children().val() <= 0)
            {
                $(this).parent().next().children().val('1');
            }

            var qty = $(this).parent().next().children().val();

            var options = {
                'row_id' : row_id,
                'qty' : qty
            };

            $.ajax({
                url: '/cart/update_item_cart',
                type: 'POST',
                data: options,
                dataType: 'json',
                success: function(data){

                    if(data.success_data == 1)
                    {
                        window.location.reload(true);
                    }

                }
            });

        });

        cart_current_product_qty.change(function(){

            var row_id = $(this).attr('data-cart-rowid');
            var qty = $(this).val();

            var options = {
                'row_id' : row_id,
                'qty' : qty
            };

            $.ajax({
                url: '/cart/update_item_cart',
                type: 'POST',
                data: options,
                dataType: 'json',
                success: function(data){

                    if(data.success_data == 1)
                    {
                        window.location.reload(true);
                    }

                }
            });

        });


        var cart_current_product_delete = $('.cart_current_product_delete');

        cart_current_product_delete.click(function(){

            var row_id = $(this).attr('data-cart-rowid');

            var options = {
                'row_id' : row_id
            };

            $.ajax({
                url: '/cart/delete_item_cart',
                type: 'POST',
                data: options,
                dataType: 'json',
                success: function(data){

                    if(data.success_data == 1)
                    {
                        window.location.reload(true);
                    }

                }
            });

        });

        var cart_order_btn = $('.cart_order_btn');
        var order_form_wrap = $('.order_form_wrap');
        var footer_content_block = $('.footer_content_block');

        cart_order_btn.click(function(){

            $(this).css({'display':'none'});
            $('#cart_order_btn_fake').css({'display':'block'});

            $('.footer_container_cart').css({'display':'block'});

            var order_form = '/cart/order_form';
            var loadIn = $('<div class="row override_margin-left"></div>').load(order_form);

            //footer_content_block.css({'display':'none'});

            order_form_wrap.append(loadIn);
            $('html, body').animate({
                scrollTop: $('.footer_container_cart').offset().top
            }, 1000);

        });

        var current_product_compare_cart_link = $('.current_product_compare_cart_link');
        var current_product_bookmarks_cart_link = $('.current_product_bookmarks_cart_link');

        current_product_compare_cart_link.hover(
            function()
            {

                $(this).children('.current_product_compare_btn_link_ico').attr('src','/public/img/index_page/ico_compare-akt.png')

            },
            function()
            {
                $(this).children('.current_product_compare_btn_link_ico').attr('src','/public/img/index_page/ico_compare.png')
            }
        );

        current_product_bookmarks_cart_link.hover(
            function()
            {

                $(this).children('.current_product_bookmarks_btn_link_ico').attr('src','/public/img/index_page/ico_bookmarks_akt.png')

            },
            function()
            {
                $(this).children('.current_product_bookmarks_btn_link_ico').attr('src','/public/img/index_page/ico_bookmarks.png')
            }
        );


    });

}

function select_pole_change(current_product_color, current_product_spec, current_product_price)
{
    var current_product_id = $('input[name="current_product_id"]').val();
    var current_product_color_id = current_product_color.val();
    var current_product_spec_id = current_product_spec.val();

    var options = {
        'product_id' : current_product_id,
        'shop_product_color' : current_product_color_id,
        'shop_product_spec' : current_product_spec_id
    };

    $.ajax({
        url: '/cart/cart_get_data_ajax',
        type: 'POST',
        data: options,
        dataType: 'json',
        success: function(data){
            //debugger;
            var current_data = data[0];

            var current_data_shop_id = current_data.shop_product_id;
            var current_data_shop_weight = current_data.shop_product_weight;
            var current_data_price = current_data.shop_product_price;

            $('input[name="current_shop_product_id"]').val(current_data_shop_id);
            $('input[name="current_shop_product_weight"]').val(current_data_shop_weight);
            current_product_price.empty().text(current_data_price);

        }
    });

}

function outer_fn()
{
    var send_to_client = $('#send_to_client');
    var offers = $('#offers');

    offers.change(function(){

        var states = offers.is(':checked');

        if(states == true)
        {
            send_to_client.prop("disabled", false);
        }
        else
        {
            send_to_client.prop("disabled", true);
        }

    });

    var client_phone = $('#client_phone');

    client_phone.mask("(999)999-99-99");

    var order_form = $('#order_form');

    order_form.validate({
        rules: {
            client_name: "required",
            client_phone: "required",
            client_email: {
                required: true,
                email: true
            },
            client_addr: "required"
        },
        messages: {
            client_name: "Обязательное поле для ввода",
            client_phone: "Обязательное поле для ввода",
            client_email: {
                required : "Обязательное поле для ввода",
                email: "Не корректный e-mail."
            },
            client_addr: "Обязательное поле для ввода"
        },
        errorPlacement: function(){
            return false;
        },
        errorClass: "validate_border_error"
    });

}

function send_view_data(data)
{

    $.ajax({
        url: '/cart/set_user_product_view',
        type: 'POST',
        data: data,
        dataType: 'json',
        complete: function(data)
        {
            var send_data = $.parseJSON(data.responseText);

            get_view_data(send_data);
        }
    });
}



function send_collate_data(data)
{

    $.ajax({
        url: '/cart/set_product_collate',
        type: 'POST',
        data: data,
        dataType: 'json',
        complete: function(data)
        {
            var send_data = $.parseJSON(data.responseText);

            get_collate_data(send_data);
        }
    });

}

function send_bookmark_data(data)
{

    $.ajax({
        url: '/cart/set_product_bookmark',
        type: 'POST',
        data: data,
        dataType: 'json',
        complete: function(data)
        {
            var send_data = $.parseJSON(data.responseText);

            get_bookmarks_data(send_data);
        }
    });
}


function get_view_data(data)
{

    $.ajax({
        url: '/cart/get_user_product_view',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(data)
        {

            var user_product_view_block_wrap = $('.user_product_view_block_wrap');

            if(data == "")
            {

                user_product_view_block_wrap.css({'width':'960px','overflow':'hidden'});

                user_product_view_block_wrap.append('' +
                    '<p class="cart_sub_title" style="padding: 0;">Вы не смотрели продукты из каталога =(</p>' +
                    '');
            }
            else
            {
                $('#user_viewed_btn').css({'background':'url("/public/img/index_page/fix_line_bubble_lft_a.png")'}).empty().text(data[0].user_view_products_count);

                var span_width = 250;
                var data_length = data.length;
                var user_product_view_block_wrap_width = span_width * data_length;

                user_product_view_block_wrap_width = String(user_product_view_block_wrap_width);

                user_product_view_block_wrap.css({'width':user_product_view_block_wrap_width,'overflow':'visible'});
                user_product_view_block_wrap.empty();

                for(var i = 0; i<data.length; i++)
                {


                    if(data[i].product_card_name == "" || data[i].product_model_name == "")
                    {
                        $('.user_product_view_block_wrap').append('' +
                            '<div class="span3 override_margin-left sub_category_products_list_block" style="height: 250px;">' +
                            '<div class="row override_margin-left sub_category_product_wrap" style="border: 1px solid #e0e0e0; height: 203px;">' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_title_wrap" style="margin: 10px 0 0 10px; height: 38px;"> ' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '">' + data[i].product_name +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_img_wrap" style="height: 160px; display: block;">' +
                            '<a href="/' + data[i].product_url + '">' +
                            '<img class="sub_category_product_img" src="/public/img/products/img_id_' + data[i].product_id + '_big_prod_list.png">' +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<div id="sub_category_product_price_btn_wrap_footer" class="row override_margin-left">' +
                            '<div class="span1 override_margin-left sub_category_product_price_wrap" style="width: 85px; margin: 5px 0 0 10px;">' +
                            '<p class="sub_category_product_price">' + data[i].product_price + ' <span><img class="sub_category_product_price_img" src="/public/img/index_page/rur.png"></span></p>' +
                            '</div>' +
                            '<div class="span1 override_margin-left sub_category_product_btn_wrap" style="width: 110px; margin: 0 0 0 12px;">' +
                            '<a href="/' + data[i].product_url + '" class="sub_category_product_btn">Купить</a>' +
                            '</div>' +
                            '</div>' +
                            '' +
                            '</div>' +
                            '</div>');
                    }
                    else
                    {
                        $('.user_product_view_block_wrap').append('' +
                            '<div class="span3 override_margin-left sub_category_products_list_block">' +
                            '<div class="row override_margin-left sub_category_product_wrap" style="border: 1px solid #e0e0e0;">' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_title_wrap"> ' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '">' + data[i].product_card_name +
                            '</a>' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '"><p class="sub_category_product_card_model_name">модель: <span>' + data[i].product_model_name +
                            '</span></p></a>' +
                            '</div>' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_img_wrap">' +
                            '<a href="/' + data[i].product_url + '">' +
                            '<img class="sub_category_product_img" src="/public/img/products/img_id_' + data[i].product_id + '_big_prod_list.png">' +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<br>' +
                            '<div class="row override_margin-left sub_category_product_price_btn_wrap">' +
                            '<div class="span1 override_margin-left sub_category_product_price_wrap" style="width: 85px; margin: 5px 0 0 10px;">' +
                            '<p class="sub_category_product_price">' + data[i].product_price + ' <span><img class="sub_category_product_price_img" src="/public/img/index_page/rur.png"></span></p>' +
                            '</div>' +
                            '<div class="span1 override_margin-left sub_category_product_btn_wrap" style="width: 110px; margin: 0 0 0 12px;">' +
                            '<a href="/' + data[i].product_url + '" class="sub_category_product_btn">Купить</a>' +
                            '</div>' +
                            '</div>' +
                            '' +
                            '</div>' +
                            '</div>');
                    }

                }
            }

        }
    });

}


function get_collate_data(data)
{

    $.ajax({
        url: '/cart/get_collate_data',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(data)
        {

            var user_collate_data_block_wrap = $('.user_collate_data_block_wrap');

            if(data == "")
            {

                user_collate_data_block_wrap.css({'width':'960px','overflow':'hidden'});

                user_collate_data_block_wrap.append('' +
                    '<p class="cart_sub_title" style="padding: 0;">В сравнении нету продуктов из каталога =(</p>' +
                    '');
            }
            else
            {
                $('#user_collate_btn').css({'background':'url("/public/img/index_page/fix_line_bubble_lft_a.png")'}).empty().text(data[0].user_collate_products_count);


                var span_width = 250;
                var data_length = data.length;
                var user_product_collate_block_wrap_width = span_width * data_length;

                user_product_collate_block_wrap_width = String(user_product_collate_block_wrap_width);

                user_collate_data_block_wrap.css({'width':user_product_collate_block_wrap_width,'overflow':'visible'});
                user_collate_data_block_wrap.empty();

                for(var i = 0; i<data.length; i++)
                {


                    if(data[i].product_card_name == "" || data[i].product_model_name == "")
                    {
                        $('.user_collate_data_block_wrap').append('' +
                            '<div class="span3 override_margin-left sub_category_products_list_block" style="height: 250px;">' +
                            '<div class="row override_margin-left sub_category_product_wrap" style="border: 1px solid #e0e0e0; height: 203px;">' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_title_wrap" style="margin: 10px 0 0 10px; height: 38px;"> ' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '">' + data[i].product_name +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_img_wrap" style="height: 160px; display: block;">' +
                            '<a href="/' + data[i].product_url + '">' +
                            '<img class="sub_category_product_img" src="/public/img/products/img_id_' + data[i].product_id + '_big_prod_list.png">' +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<div id="sub_category_product_price_btn_wrap_footer" class="row override_margin-left">' +
                            '<div class="span1 override_margin-left sub_category_product_price_wrap" style="width: 85px; margin: 5px 0 0 10px;">' +
                            '<p class="sub_category_product_price">' + data[i].product_price + ' <span><img class="sub_category_product_price_img" src="/public/img/index_page/rur.png"></span></p>' +
                            '</div>' +
                            '<div class="span1 override_margin-left sub_category_product_btn_wrap" style="width: 110px; margin: 0 0 0 12px;">' +
                            '<a href="/' + data[i].product_url + '" class="sub_category_product_btn">Купить</a>' +
                            '</div>' +
                            '</div>' +
                            '' +
                            '</div>' +
                            '</div>');
                    }
                    else
                    {
                        $('.user_collate_data_block_wrap').append('' +
                            '<div class="span3 override_margin-left sub_category_products_list_block">' +
                            '<div class="row override_margin-left sub_category_product_wrap" style="border: 1px solid #e0e0e0;">' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_title_wrap"> ' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '">' + data[i].product_card_name +
                            '</a>' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '"><p class="sub_category_product_card_model_name">модель: <span>' + data[i].product_model_name +
                            '</span></p></a>' +
                            '</div>' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_img_wrap">' +
                            '<a href="/' + data[i].product_url + '">' +
                            '<img class="sub_category_product_img" src="/public/img/products/img_id_' + data[i].product_id + '_big_prod_list.png">' +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<br>' +
                            '<div class="row override_margin-left sub_category_product_price_btn_wrap">' +
                            '<div class="span1 override_margin-left sub_category_product_price_wrap" style="width: 85px; margin: 5px 0 0 10px;">' +
                            '<p class="sub_category_product_price">' + data[i].product_price + ' <span><img class="sub_category_product_price_img" src="/public/img/index_page/rur.png"></span></p>' +
                            '</div>' +
                            '<div class="span1 override_margin-left sub_category_product_btn_wrap" style="width: 110px; margin: 0 0 0 12px;">' +
                            '<a href="/' + data[i].product_url + '" class="sub_category_product_btn">Купить</a>' +
                            '</div>' +
                            '</div>' +
                            '' +
                            '</div>' +
                            '</div>');
                    }

                }
            }

        }
    });

}

function get_bookmarks_data(data)
{

    $.ajax({
        url: '/cart/get_product_bookmark',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(data)
        {


            var user_bookmarks_block_wrap = $('.user_bookmarks_block_wrap');

            if(data == "")
            {

                user_bookmarks_block_wrap.css({'width':'960px','overflow':'hidden'});

                user_bookmarks_block_wrap.append('' +
                    '<p class="cart_sub_title" style="padding: 0;">В избранном нету продуктов из каталога =(</p>' +
                    '');
            }
            else
            {
                $('#user_bookmarks_btn').css({'background':'url("/public/img/index_page/fix_line_bubble_lft_a.png")'}).empty().text(data[0].user_bookmarks_count);


                var span_width = 250;
                var data_length = data.length;
                var user_product_bookmarks_block_wrap_width = span_width * data_length;

                user_product_bookmarks_block_wrap_width = String(user_product_bookmarks_block_wrap_width);

                user_bookmarks_block_wrap.css({'width':user_product_bookmarks_block_wrap_width,'overflow':'visible'});
                user_bookmarks_block_wrap.empty();

                for(var i = 0; i<data.length; i++)
                {


                    if(data[i].product_card_name == "" || data[i].product_model_name == "")
                    {
                        $('.user_bookmarks_block_wrap').append('' +
                            '<div class="span3 override_margin-left sub_category_products_list_block" style="height: 250px;">' +
                            '<div class="row override_margin-left sub_category_product_wrap" style="border: 1px solid #e0e0e0; height: 203px;">' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_title_wrap" style="margin: 10px 0 0 10px; height: 38px;"> ' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '">' + data[i].product_name +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_img_wrap" style="height: 160px; display: block;">' +
                            '<a href="/' + data[i].product_url + '">' +
                            '<img class="sub_category_product_img" src="/public/img/products/img_id_' + data[i].product_id + '_big_prod_list.png">' +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<div id="sub_category_product_price_btn_wrap_footer" class="row override_margin-left">' +
                            '<div class="span1 override_margin-left sub_category_product_price_wrap" style="width: 85px; margin: 5px 0 0 10px;">' +
                            '<p class="sub_category_product_price">' + data[i].product_price + ' <span><img class="sub_category_product_price_img" src="/public/img/index_page/rur.png"></span></p>' +
                            '</div>' +
                            '<div class="span1 override_margin-left sub_category_product_btn_wrap" style="width: 110px; margin: 0 0 0 12px;">' +
                            '<a href="/' + data[i].product_url + '" class="sub_category_product_btn">Купить</a>' +
                            '</div>' +
                            '</div>' +
                            '' +
                            '</div>' +
                            '</div>');
                    }
                    else
                    {
                        $('.user_bookmarks_block_wrap').append('' +
                            '<div class="span3 override_margin-left sub_category_products_list_block">' +
                            '<div class="row override_margin-left sub_category_product_wrap" style="border: 1px solid #e0e0e0;">' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_title_wrap"> ' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '">' + data[i].product_card_name +
                            '</a>' +
                            '<a class="sub_category_product_title" href="/' + data[i].product_url + '"><p class="sub_category_product_card_model_name">модель: <span>' + data[i].product_model_name +
                            '</span></p></a>' +
                            '</div>' +
                            '' +
                            '<div class="row override_margin-left sub_category_product_img_wrap">' +
                            '<a href="/' + data[i].product_url + '">' +
                            '<img class="sub_category_product_img" src="/public/img/products/img_id_' + data[i].product_id + '_big_prod_list.png">' +
                            '</a>' +
                            '</div>' +
                            '' +
                            '<br>' +
                            '<div class="row override_margin-left sub_category_product_price_btn_wrap">' +
                            '<div class="span1 override_margin-left sub_category_product_price_wrap" style="width: 85px; margin: 5px 0 0 10px;">' +
                            '<p class="sub_category_product_price">' + data[i].product_price + ' <span><img class="sub_category_product_price_img" src="/public/img/index_page/rur.png"></span></p>' +
                            '</div>' +
                            '<div class="span1 override_margin-left sub_category_product_btn_wrap" style="width: 110px; margin: 0 0 0 12px;">' +
                            '<a href="/' + data[i].product_url + '" class="sub_category_product_btn">Купить</a>' +
                            '</div>' +
                            '</div>' +
                            '' +
                            '</div>' +
                            '</div>');
                    }

                }
            }

        }
    });

}

function init_colors_change()
{
    $(document).ready(function (){

        var colors = $(".colors");

        colors.each(function()
        {
            $(this).click(function()
            {
                colors_chang_proc($(this));
                var child_id = $(this).children('.current_product_colors_pic').attr('data-id');

                $('#current_product_color_select').children('option:selected').prop('selected', false);
                $("#current_product_color_select :nth-child("+child_id+")").prop("selected", true);
                var current_product_price = $('.current_product_price');
                var current_product_color = $('#current_product_color_select');
                var current_product_spec = $('#current_product_spec');
                //debugger;
                select_pole_change(current_product_color, current_product_spec, current_product_price);
            });
        });

    });

}

function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}

function colors_chang_proc(colors)
{
    $(".current_product_image_block div#current_product_color").remove();
    $("#current_product_big").hide(20);
    $("#current_product_scheme").hide(20);
    $("#current_product_box").hide(20);

    var current_product_colors_pic_block = $('.current_product_colors_pic_block');
    var current_product_colors_title_name = $('.current_product_colors_title_name');
    var current_product_color_name;

    current_product_colors_pic_block.children('.current_product_colors_pic_over').css({'display':'none'});
    colors.children('.current_product_colors_pic_over').css({'display':'block'});
    current_product_color_name = colors.children('.current_product_colors_pic').attr('title');
    current_product_colors_title_name.empty().text(current_product_color_name);


    var empty_img = '/public/img/empty.png';

    var img_url = colors.attr('data-color_url');

    var check_img = UrlExists(img_url);

    if(check_img == true)
    {
        $(".current_product_image_block").append("<div id='current_product_color' style='display: none;'>" +
            "<a href='" + img_url + "' class='current_product_image_zoom current_product_preview'>" +
            "<img src='/public/img/index_page/current_zoom.png'>" +
            "</a>" +
            "<a href='" + img_url + "' class='current_product_preview'>" +
            "<img id='pic_change' src='" + img_url +"'>" +
            "</a></div>" +
            "");
        $("#current_product_color").fadeTo(1000, 1);
    }
    else
    {
        $(".current_product_image_block").append("<div id='current_product_color' style='display: none;'><img id='pic_change' src='" + empty_img +"'></div>");
        $("#current_product_color").fadeTo(1000, 1);

    }
}