<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$lang_iso}">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# indusdiva: http://ogp.me/ns/fb/indusdiva#">
        <title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
        {if isset($meta_description) AND $meta_description}
            <meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
        {/if}
        {if isset($meta_keywords) AND $meta_keywords}
            <meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
        {/if}
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
        {if isset($og_meta) AND $og_meta}
            <meta property="fb:app_id" content="285166361588635" /> 
            <meta property="og:title" content="{$og_title|escape:'htmlall':'UTF-8'}"/>
            <meta property="og:type" content="{$og_type|default:'product'|escape:'htmlall':'UTF-8'}"/>
            <meta property="og:url" content="{$og_page_url|escape:'htmlall':'UTF-8'}"/>
            <meta property="og:image" content="{$og_image_url|escape:'htmlall':'UTF-8'}"/>
            <meta property="og:description" content="{$og_description|escape:'htmlall':'UTF-8'}"/>
        {else}
            <meta property="og:title" content="{$meta_title|escape:'htmlall':'UTF-8'}"/>
            <meta property="og:type" content="website"/>
            <meta property="og:image" content="{$base_dir}img/logo.jpg"/>
            <meta property="og:description" content="{$meta_description|escape:html:'UTF-8'}"/>
        {/if}
        {if isset($canonical_url)}
            <link rel="canonical" href="{$canonical_url|escape:'htmlall':'UTF-8'}" />
        {/if}
        {if isset($p) AND $p}
            {if $pages_nb > 1 AND $p != $pages_nb}
                {assign var='p_next' value=$p+1}
                <link rel="next" href="{$paginationBaseUrl}{$link->goPage($requestPage, $p_next)}" />
            {/if}
            {if $p != 1}
                {assign var='p_previous' value=$p-1}
                <link rel="prev" href="{$paginationBaseUrl}{$link->goPage($requestPage, $p_previous)}" />
            {/if}
        {/if}
        <meta property="og:site_name" content="indusdiva.com"/>

        <meta name="robots" content="{if isset($nobots)}no{/if}index,follow" />
        <link rel="icon" type="image/vnd.microsoft.icon" href="{$img_ps_dir}favicon.ico?{$img_update_time}" />
        <link rel="shortcut icon" type="image/x-icon" href="{$img_ps_dir}favicon.ico?{$img_update_time}" />
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css' />

        <script type="text/javascript">
            var baseDir = '{$content_dir}';
            var static_token = '{$static_token}';
            var token = '{$token}';
            var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
            var priceDisplayMethod = {$priceDisplay};
            var roundMode = {$roundMode};
            var requestURI = '{$request_uri}';
        </script>
        {if isset($css_files)}
            {foreach from=$css_files key=css_uri item=media}
                <link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
            {/foreach}
        {/if}
        {if isset($js_files)}
            {foreach from=$js_files item=js_uri}
                <script type="text/javascript" src="{$js_uri}"></script>
            {/foreach}
        {/if}
        <script type="text/javascript">
            $(document).ready(function() {
                $('.login_link').fancybox({
                    autoSize: true
                });
                $('.shipping_link').fancybox({
                    autoSize: true
                });
            });
            $(document).ajaxSend(function(event, xhr, settings) {
                settings.xhrFields = {
                    withCredentials: true
                };
            });
        </script>
        {$HOOK_HEADER}
    </head>
    {if $page_name eq 'helpanorphan'}
       <body id="helpanorphan" style="background:url('http://cdn.indusdiva.com/img/dec25bg.png') repeat scroll left top">
    {else}
        <body {if $page_name}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if}>
    {/if}
        {if !$content_only}
            {if isset($restricted_country_mode) && $restricted_country_mode}
                <div id="restricted-country">
                    <p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
                </div>
            {/if}
           
		  
                <div style="width:1170px;margin:auto;" class="clearfix">
                    <div id="header_right" class="clearfix">
                        <div id="header_logo" style="padding-top:20px;">
                            {* <a  href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}" id="logo_link" style="background: url(http://cdn.indusdiva.com/img/divalogo.png) 0px 0px no-repeat scroll transparent;">
                            </a> *}
                            <a  href = "{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}" ><img src="imageN/logo.png" width="220px"></a>
                            
                        </div>
                        {$HOOK_TOP}
                    </div>
                </div>
                {include file="$tpl_dir./categoriesbar.tpl"}
                {include file="$tpl_dir./bannerblock.tpl"}
                {* Ncommented--
                <div id="feedback-button-panel" style="position:fixed;right:0px; top:250px;">
                <a rel="nofollow" id="feedback_button" href="#feedback-panel" style="cursor: pointer"><img src="{$img_ps_dir}feedback1.png" alt="feedback" /></a>
                </div>
                
                <div id="feedback-button-panel" style="position:fixed;right:0px; top:250px;z-index:100000">
                <a href="./help-an-orphan"><img src="{$img_ps_dir}gift-box-re.gif" alt="Gift a box" width="140px"/></a>
		</div> *}
            </div>
            <div id="page" style="clear:both;padding-top:10px;" clear="clearfix">

                <!-- Header -->


                <div id="columns">
                    {if isset($bannername)}
                        <a href="{$link->getmanufacturerLink($manufacturer->id, $manufacturer->link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$manufacturer->name|escape:'htmlall':'UTF-8'} products">
                            <img src="{$img_ps_dir}brands/{$bannername}" width="980"  height="169" alt="{$manufacturer->name|escape:'htmlall':'UTF-8'}" />
                        </a>
                    {/if}
                    <!-- Left -->
                    <div id="left_column" class="column">
                        {$HOOK_LEFT_COLUMN}
                    </div>

                    <!-- Center -->
                    <div id="center_column">
                    {/if}
