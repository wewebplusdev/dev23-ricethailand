        <section class="site-container">
{* {$callTagName->fields|print_pre} *}
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-search.jpg)">
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">ค้นหา</h1>
                            <p class="desc">{$settingpage.subjecten}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-block">
                <div class="container">
                    <ol class="breadcrumb" data-aos="fade-up">
                        <li><a class="link" href="{$ul}/home"><span class="fa fa-home"></span> หน้าแรก</a></li>
                        <li class="active">ค้นหา</li>
                    </ol>
                </div>
            </div>
            {if $callTagName->_numOfRows eq 0}
            <div class="search-head">
                <form action="{$ul}/search" name="myForm" id="myForm" class="form-default">
                    <input type="hidden" class="form-control" name="typeSch" value="{$typeSearch}"/>
                    <div class="container">
                        <div class="whead t-cen" data-aos="fade-down">
                            <h2 class="title">
                                ค้นหา
                            </h2>
                        </div>

                        <div class="box-content" data-aos="fade-up">
                            <div class="inner">
                                <div class="ojb-box-clip">
                                    <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                </div>
                                {* <form action="{$ul}/search" name="myForm" id="myForm" class="form-default"> *}
                                    <div class="row row-0 align-items-end height">
                                        <div class="col-8">
                                            <label class="control-label">คำค้น</label>
                                            <input class="form-control" name="searchKeyword" type="search" value="{if $keyword neq ''}{$keyword}{/if}" placeholder="ค้นหา">
                                        </div>
                                        <div class="col-2">
                                            <div class="action">
                                                <button class="btn btn-primary" onclick="document.getElementById('myForm').submit()">
                                                    <span class="feather icon-search"></span>
                                                    ค้นหา
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="action">
                                                <button class="btn btn-primary advance-search-txt" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="{if $typeSearch eq 2}true{else}false{/if}" aria-controls="collapseExample">
                                                    ค้นหาขั้นสูง
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                {* </form> *}
                                <!-- search advance -->
                                <div class="whead t-cen" data-aos="fade-down">
                                    <div class="collapse {if $typeSearch eq 2}show{/if}" id="collapseExample">
                                        <h3>ค้นหาขั้นสูง</h3>
                                        <div class="card card-body">
                                            <div class="row row-0 align-items-end height">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="hashtag">ประเภท</label>
                                                        <select id="hashtag" name="typeOption" class="select-control" onchange="document.getElementById('myForm').submit()">
                                                            <option value="1" {if $typeOption eq 1}selected{/if}>เนื้อหา</option>
                                                            <option value="2" {if $typeOption eq 2}selected{/if}>แท็กเชื่อมโยง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label" for="start">วันที่เริ่มต้น</label>
                                                        <div class="block-control -icon">
                                                            <input autocomplete="off" class="form-control" type="date" id="start" data-date-format="DD/MMMM/YYYY" name="trip-start" value="{$dateStart}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label" for="end">วันที่สิ้นสุด</label>
                                                        <div class="block-control -icon">
                                                            <input autocomplete="off" class="form-control" type="date" id="end" data-date-format="DD/MMMM/YYYY" name="trip-end" value="{$dateEnd}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- search advance -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {/if}
            {if $callTagName->_numOfRows > 0}
            <div class="search-head -tag">
                <div class="container">
                    <div class="box-content" data-aos="fade-up">
                        <div class="inner">
                            <div class="ojb-box-clip">
                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                            </div>
                            <div class="tag-content">
                                <p class="tag-title">#{$callTagName->fields.subject}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/if}

            <div class="search-body">
                <div class="ojb -ojbI" data-aos="fade-right">
                    <img src="{$template}/assets/img/static/ojb-search1.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbII" data-aos="fade-left">
                    <img src="{$template}/assets/img/static/ojb-search2.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbIII" data-aos="fade-up">
                    <img src="{$template}/assets/img/static/ojb-search3.png" alt="" class="lazy">
                </div>
                <div class="container">
                    <div class="whead" data-aos="fade-down">
                        <h3 class="s-title">
                            ผลการค้นหา {$callNews->_numOfRows} รายการ
                        </h3>
                    </div>
                    <div class="search-list">
                        <ul class="item-list">
                            {foreach $callNews as $keycallNews => $valuecallNews}
                                {if $valuecallNews.tag|unserialize neq ""}
                                    {$call_hashtag_list = callTagName(0, 0, unserialize($valuecallNews.tag))}
                                {/if}
                                <li class="item" data-aos="fade-up">
                                    <a href="{$ul}/news/{$valuecallNews.gid}/detail/{$valuecallNews.id}" class="link wrapper">
                                        <div class="title">
                                            {$valuecallNews.subject}
                                        </div>
                                        <div class="desc">
                                            {$valuecallNews.title}
                                        </div>

                                        {if $call_hashtag_list->_numOfRows gte 1}
                                            <div class="row">
                                              {foreach $call_hashtag_list as $keycall_hashtag_list => $valuecall_hashtag_list}
                                                <div class="col-md-3 col-sm-4 col-12 search-click" data-url="{$ul}/{$menuActive}?tag={$valuecall_hashtag_list.id}">
                                                  <div class="list-link">#{$valuecall_hashtag_list.subject}</div>
                                                </div>
                                              {/foreach}
                                            </div>
                                        {/if}

                                        {* <div class="url">http://dmsc.moph.go.th/kis/contact.php</div> *}
                                        <div class="url">{$URL}news/{$valuecallNews.gid}/detail/{$valuecallNews.id}</div>
                                        <div class="action">
                                            <div class="btn">
                                                อ่านต่อ
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                    {if $callNews->_numOfRows > 0}
                        {* {include file="paginationV2.tpl" title=title} *}
                        {include file="pagination.tpl" title=title}
                    {/if}
                    {* <div class="pagination-block" data-aos="fade-up">
                        <div class="pagination-label">
                            <div class="title">
                                รายการทั้งหมด <strong>20</strong>  รายการ
                            </div>
                        </div>
                        <div class="pagination">
                            <ul class="item-list">
                                <li class="pagination-nav"><a class="link" href="#"><span class="feather icon-arrow-left"></span></a></li>
                                <li class="active"><a class="link" href="#">1</a></li>
                                <li><a class="link" href="#">2</a></li>
                                <li><a class="link" href="#">3</a></li>
                                <li class="pagination-nav"><a class="link" href="#"><span class="feather icon-arrow-right"></span></a></li>
                            </ul>
                        </div>
                    </div> *}
                </div>
            </div>

        </section>