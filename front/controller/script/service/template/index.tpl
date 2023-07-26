<section class="site-container">
{* {$callNewsDetailMenu|print_pre} *}
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-service.jpg)">
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">การบริการ</h1>
                            <p class="desc">Knowledge and Information Systems</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-block">
                <div class="container">
                    <ol class="breadcrumb" data-aos="fade-up">
                        <li><a class="link" href="{$ul}"><span class="fa fa-home"></span> หน้าแรก</a></li>
                        <li class="active">การบริการ</li>
                    </ol>
                </div>
            </div>

            <div class="page-service">
                <div class="ojb -ojbI" data-aos="fade-right">
                    <img src="{$template}/assets/img/static/ojb-Pservice1.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbII" data-aos="fade-down">
                    <img src="{$template}/assets/img/static/ojb-Pservice2.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbIII" data-aos="fade-up">
                    <img src="{$template}/assets/img/static/ojb-Pservice3.png" alt="" class="lazy">
                </div>
                <div class="container">
                    <div class="whead t-cen" data-aos="fade-down">
                        <h4 class="title">การบริการ</h4>
                    </div>
                    <div class="wg-service-slide" data-aos="fade-up">
                        <ul class="item-list">
                            {foreach $callNewsDetailMenu as $keycallNewsDetailMenu => $valuecallNewsDetailMenu}
                                <li class="item">
                                    <a href="{$ul}/{$menuActive}/detail/{$valuecallNewsDetailMenu.id}" class="link">
                                        <div class="thumb">
                                            <figure class="cover">
                                                <img src="{$valuecallNewsDetailMenu.pic|fileinclude:"pictures":{$valuecallNewsDetailMenu.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                                            </figure>
                                        </div>
                                        <div class="title">{$valuecallNewsDetailMenu.subject}</div>
                                        <div class="desc">{$valuecallNewsDetailMenu.title}</div>
                                    </a>
                                </li>
                            {/foreach}

                        </ul>
                    </div>
                    {if $callNewsDetailMenu->_numOfRows > 0}
                        {* {include file="paginationV2.tpl" title=title} *}
                        {include file="pagination.tpl" title=title}
                    {/if}
                    {* <div class="pagination-block" data-aos="fade-up">
                        <div class="pagination">
                            <ul class="item-list">
                                <li class="pagination-nav"><a class="link" href="#"><span class="feather icon-arrow-left"></span></a></li>
                                <li class="active"><a class="link" href="#">1</a></li>
                                <li><a class="link" href="#">2</a></li>
                                <li><a class="link" href="#">3</a></li>
                                <li class="pagination-nav"><a class="link" href="#"><span class="feather icon-arrow-right"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div> *}
            </div>

        </section>