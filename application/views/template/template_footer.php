<?php



$cart_item_count = $this->flexi_cart->cart_summary();

$cart_count = $cart_item_count['total_items'];

$cart_item_count = $this->flexi_cart->cart_summary();

$cart_summary = $cart_item_count['total'];
$cart_summary = substr($cart_summary, 0, -3);
$cart_summary = str_replace("&nbsp;", "", $cart_summary);
$cart_summary = str_replace(",", "", $cart_summary);

?>


<div class="container container_override footer_container_cart" id="footer_container_cart">

    <div class="row override_margin-left footer_head_bg_block">
        <img src="<?php echo base_url();?>public/img/index_page/footer_head_bg.png">
        <p class="footer_head_bg_link_cart">Оформление заказа</p>
    </div>

</div>

<div class="container container_override footer_container footer_container_cart">
    <br>
<div class="row override_margin-left order_form_wrap"></div>
</div>


</div>
<div class="container last_main_content_container container_override"></div>


</body>
</html>