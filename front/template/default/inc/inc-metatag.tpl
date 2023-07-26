
<base href="{$base}">
<title>{$seo.title|default:"ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์"}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<meta name="keywords" content="{$seo.keyword|default:"ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์"}">
<meta name="description" content="{$seo.keyword|default:"ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์"}">
<meta name="author" content="">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">

<!-- META OPEN GRAPH (FB) -->
{assign  var=valLinkImgSeo value="{$base}{$template}/assets/image/static/brand.png{$setVersionTemp}"}
<meta property="og:type" content="website">
<meta property="og:url" content="{$fullurl}">
<meta property="og:title" content="{$seo.keyword|default:"ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์"}">
<meta property="og:description" content="{$seo.keyword|default:"ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์"}">
<meta property="og:image" content="{$seo.pic|default:$seo.pic}">
<meta property="og:site_name" content="{$seo.title|default:$lang['seo:title']}">
<meta property="og:locale" content="">
<meta property="og:locale:alternate" content="">
<link rel="image_src" href="{$seo.pic|default:$seo.pic}" />

<!-- TWITTER CARD -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:url" content="">
<meta name="twitter:image:src" content="">

<!-- ICONS -->
<link rel="shortcut icon" href="{$template}/assets/favicon/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" sizes="60x60" href="{$template}/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="{$template}/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="{$template}/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="{$template}/assets/favicon/apple-icon-152x152.png">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/android-192x192.png" sizes="192x192">

{strip}
    {if {$assigncss|default:null}}
        {foreach $assigncss as $addAssetCss}
            {$addAssetCss}
        {/foreach}
    {/if}
{/strip}