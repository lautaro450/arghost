<script>
jQuery(document).ready(function () {
    jQuery('#btnShowSidebar').click(function () {
        if (jQuery(".product-selection-sidebar").is(":visible")) {
            jQuery('.row-product-selection').css('left','0');
            jQuery('.product-selection-sidebar').fadeOut();
            jQuery('#btnShowSidebar').html('<i class="fa fa-arrow-circle-right"></i> {$LANG.showMenu}');
        } else {
            jQuery('.product-selection-sidebar').fadeIn();
            jQuery('.row-product-selection').css('left','300px');
            jQuery('#btnShowSidebar').html('<i class="fa fa-arrow-circle-left"></i> {$LANG.hideMenu}');
        }
    });
});
</script>

{if $showSidebarToggle}
    <button type="button" class="btn btn-default btn-sm" id="btnShowSidebar">
        <i class="fa fa-arrow-circle-right"></i>
        {$LANG.showMenu}
    </button>
{/if}

<div class="row row-product-selection">
    <div class="col-xs-3 product-selection-sidebar" id="premiumComparisonSidebar">
        {include file="orderforms/standard_cart/sidebar-categories.tpl"}
    </div>
    <div class="col-xs-12">

        <div id="order-inhost-comparison" class="page-container">
            <div class="txt-center">
                <h3 id="headline">
                    {if $productGroup.headline}
                        {$productGroup.headline}
                    {else}
                        {$productGroup.name}
                    {/if}
                </h3>
                {if $productGroup.tagline}
                    <h5 id="tagline">
                        {$productGroup.tagline}
                    </h5>
                {/if}
                {if $errormessage}
                    <div class="alert alert-danger">
                        {$errormessage}
                    </div>
                {/if}
            </div>
            <div id="products" class="price-table-container">
                <div class="row pricing-row">
                    {foreach $products as $product}
                        <div id="product{$product@iteration}" class="col-md-3 col-sm-6 col-xs-12">
                            <div class="price-table{if $product.isFeatured} active{/if}">
                                <div class="top-head">
                                    <div class="top-area">
                                        <h4 id="product{$product@iteration}-name">
                                            {$product.name}
                                        </h4>
                                        {if $product.isFeatured}
                                            <div class="popular-plan">
                                                <div class="plan-container">
                                                    <div class="txt-container">{$LANG.featuredProduct|upper}</div>
                                                </div>
                                            </div>
                                        {/if}
                                        {if $product.tagLine}
                                            <p id="product{$product@iteration}-tag-line">{$product.tagLine}</p>
                                        {/if}
                                    </div>
                                </div>
								
								<div class="pricing-col-body">
									<div class="price-area">
										<div class="price" id="product-price{$product@iteration}">
											{if $product.bid}
												{$LANG.bundledeal}
												{if $product.displayprice}
													<br /><br /><span>{$product.displayPriceSimple}</span>
												{/if}
											{elseif $product.paytype eq "free"}
												{$LANG.orderfree}
											{elseif $product.paytype eq "onetime"}
												{$product.pricing.onetime} {$LANG.orderpaymenttermonetime}
											{else}
												{if $product.pricing.hasconfigoptions}
													{$LANG.from}
												{/if}
												{$product.pricing.minprice.cycleText}
											{/if}
										</div>
									</div>
									<div id="productDescription{$product@iteration}" class="product-desc">
										{foreach $product.features as $feature => $value}
											<div id="product{$product@iteration}-feature{$value@iteration}">
												<span>{$value}</span> {$feature}
											</div>
										{foreachelse}
											<div id="product{$product@iteration}-description">
												{$product.description}
											</div>
										{/foreach}
									</div>
										{if $product.qty eq "0"}
											<div class="product-order">
												<span id="product{$product@iteration}-unavailable" class="order-button unavailable">
													{$LANG.outofstock}
												</span>
											</div>
										{else}
											<div class="product-order">
												<a href="{$smarty.server.PHP_SELF}?a=add&amp;{if $product.bid}bid={$product.bid}{else}pid={$product.pid}{/if}" class="order-button" id="product{$product@iteration}-order-button">
													{$LANG.ordernowbutton}
												</a>
											</div>
										{/if}
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>

            {if count($productGroup.features) > 0}
                <div class="includes-features">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="head-area">
                                <span>
                                    {$LANG.orderForm.includedWithPlans}
                                </span>
                            </div>
                            <ul class="list-features">
                                {foreach $productGroup.features as $features}
                                    <li>{$features.feature}</li>
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                </div>
            {/if}

        </div>
    </div>
</div>
