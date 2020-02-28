<?php   global $woocommerce; ?>
<div class="apus-topcart">
    <div class="version-1 cart">
        
        <a class="mini-cart mini-cart-full" role="button" href="#" title="<?php esc_html_e('View your shopping cart', 'greenorganic'); ?>">
            <span class="text-skin cart-icon">
            	<span class="count"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                <i class="icon-bag icons"></i>
            </span>
        </a>            
        
    </div>
</div>