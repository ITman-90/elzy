if (typeof(console) == 'undefined') {
    var console = {
        log: function(message) {},
        info: function(message) {},
        warn: function(message) {},
        error: function(message) {}
    }
}


init_update_all_products();

function init_update_all_products()
{
    $(document).ready(function() {

        var update_btn = $('#update_btn');
        var shop_product_data = $('.shop_product_data');

        var send_data =
        {
            shop_product_color:0,
            shop_product_weight:0
        };



        update_btn.click(function(){

            $('.shop_product_data input[name="shop_product_weight"]').each(function(){
                send_data.shop_product_weight = $(this).val()
            });

            $('.shop_product_data input[name="shop_product_color"]').each(function(){
                send_data.shop_product_color = $(this).val()

                console.info(send_data);
            });


        });


    });

}
