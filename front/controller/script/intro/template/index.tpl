

<div class="intro-page">
    <div class="intro-img">
        <div class="slider">
            {* {$infoIntroTpl|print_pre} *}
            {foreach $infoIntroTpl as $listIntro}
                <div class="item">
                    <div class="wrapper image">
                        <figure class="cover">
                            <img src="{$listIntro.4|fileinclude:"real":{$listIntro.1}:"link"}" alt="" class="lazy">
                        </figure>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
    {* <div class="" style="background-image: url('{$listIntro.4|fileinclude:"real":{$listIntro.1}:"link"}'); background-color: {$listIntro.5} ;"></div> *}

    <div class="intro-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="brand">
                        <a href="{$ul}/home" class="wrapper">
                            <div class="thumb">
                                <img src="{$template}/assets/img/static/brand.png" alt="">
                            </div>
                            <div class="inner">
                                <h3 class="title">{$settingpage.subject}</h3>
                                <h4 class="desc">{$settingpage.subjecten}</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="action">
                        <a href="{$ul}/home" class="btn btn-primary btn-medium">เข้าสู่เว็บไซต์</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
