<section class="site-container">
    <div class="navbars-active" data-id="{$NavbarsActive}"></div>
    {* {$search|print_pre} *}
        {if $callNewsDetail->fields.picg neq ''}
            <div class="default-header" style="background-image:url({$callNewsDetail->fields.picg|fileinclude:"pictures":{$callNewsDetail->fields.masterkey}:"link"}{$setVersionTemp})">
        {else}
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-news.jpg)">
        {/if}
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">{$valNavEnd}</h1>
                            <p class="desc">{$settingpage.subjecten}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-block">
                <div class="container">
                    <div class="row row-0">
                        <div class="col">
                            <ol class="breadcrumb" data-aos="fade-up">
                                <li><a class="link" href="{$ul}/home" title="หน้าแรก"><span class="fa fa-home"></span> หน้าแรก</a></li>
                                <li class="active">{$valNavEnd}</li>
                            </ol>
                        </div>
                        <div class="col-auto">
                            <div class="filter-box" data-aos="fade-up">
                                <a href="javascript:void(0)" class="link filter-search"  title="search">
                                    <span class="icon-on feather icon-search"></span>
                                    <span class="icon-off feather icon-x"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-head -search-filter">
                <div class="container">
                    <div class="box-content" data-aos="fade-up">
                        <div class="inner">
                            <div class="ojb-box-clip">
                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                            </div>
                            <form action="" name="myForm" id="myForm" class="form-default">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">ปีงบประมาณ</label>
                                            <select class="select-control"   id="searchYear" name="searchYear"  size="1" style="width: 100%;">
                                                <option value="0"  {if  $searchYear == 0} selected="selected" {/if} >เลือกปีงบประมาณ</option>
                                                 {foreach $dataNewsYearRows as $keyNewsYearRows => $valNewsYearRows}
                                                <option value="{$valNewsYearRows.id}" {if  $searchYear == $valNewsYearRows.id} selected="selected" {/if} >{$valNewsYearRows.subject}</option>
                                                {/foreach}
                                            </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">หน่วยงาน</label>
                                            <select class="select-control"   id="searchAgency" name="searchAgency"  size="1" style="width: 100%;">
                                                <option value="0"  {if  $searchAgency == 0} selected="selected" {/if} >เลือกหน่วยงาน</option>
                                                 {foreach $datacallNewsUnitRows as $keyNewsUnitRows => $valNewsUnitRows}
                                                <option value="{$valNewsUnitRows.id}" {if  $searchAgency == $valNewsUnitRows.id} selected="selected" {/if} >{$valNewsUnitRows.subject}</option>
                                                {/foreach}
                                            </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">วันที่เริ่มต้น</label>
                                        <input class="form-control datepicker" name="searchSdate" type="text" autocomplete="off" value="{if $searchSdate neq ''}{$searchSdate}{/if}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">วันที่สิ้นสุด</label>
                                        <input class="form-control datepicker" name="searchEdate" type="text" autocomplete="off" value="{if $searchEdate neq ''}{$searchEdate}{/if}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">คำค้น</label>
                                        <input class="form-control" name="searchKeyword" type="text" value="{if $searchKeyword neq ''}{$searchKeyword}{/if}">
                                    </div>
                                </div>
                                <div class="action">
                                    <button class="btn btn-primary" onclick="document.getElementById('myForm').submit()">
                                        <span class="feather icon-search"></span>
                                        ค้นหา
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-news">
                <div class="container">
                    <div class="whead t-cen" data-aos="fade-down">
                        <h4 class="title">{$valNavEnd}</h4>
                        {if $pagination.total >=1}
                        <div class="rss-list">
                            <ul class="item-list">
                                <li>
                                    <a class="link" href="{$ul}/rss/{$callNewsDetail->fields.masterkey}Thai{$NavbarsActive}.xml" target="_blank">
                                        <span class="fa fa-rss"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="link" href="{$ul}/json/{$callNewsDetail->fields.masterkey}Thai{$NavbarsActive}.json" target="_blank">
                                        {* <img src="{$template}/assets/img/icon/json-file.png" alt="" class="lazy"> *}
                                        &#123; JSON &#125;
                                    </a>
                                </li>
                            </ul>
                        </div>
                        {/if}
                    </div>
                    <div class="wg-book">
                    {if $pagination.total >=1}
                        {assign var="numOfRows" value=$callNewsDetail->_numOfRows-1}
                        {* {$callNewsDetail->_numOfRows|print_pre} *}
                        {foreach $callNewsDetail as $keycallNewsDetail => $valuecallNewsDetail}
                            {if $keycallNewsDetail eq 0}
                                <div class="book-hilight">
                                    <div class="row row-0">
                                        <div class="col-auto">
                                            <a href="{$ul}/{$menuActive}/{$valuecallNewsDetail.idg}/detail/{$valuecallNewsDetail.id}{$search}" class="link">
                                                <div class="thumb" data-aos="fade-right">
                                                    <figure class="cover">
                                                        <img src="{$valuecallNewsDetail.pic|fileinclude:"pictures":{$valuecallNewsDetail.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                                                    </figure>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="content" data-aos="fade-left">
                                                <div class="title">
                                                    {$valuecallNewsDetail.subject}
                                                </div>
                                                <div class="date">{$valuecallNewsDetail['credate']|DateThai:1:"th":"shot"}</div>
                                                <div class="desc">
                                                    {$valuecallNewsDetail.title}
                                                </div>
                                                <div class="action">
                                                    <a href="{$ul}/{$menuActive}/{$valuecallNewsDetail.idg}/detail/{$valuecallNewsDetail.id}{$search}" class="btn btn-primary">อ่านต่อ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="book-base" data-aos="fade-in"></div>
                                </div>                        
                            {/if}
                            {if $keycallNewsDetail eq 1 || $keycallNewsDetail eq 6 || $keycallNewsDetail eq 11}
                                <div class="wg-book-list" data-aos="fade-up">
                                    <ul class="item-list">
                            {/if}
                            {if $keycallNewsDetail gt 0 }
                                        <li class="item">
                                        <li class="item">
                                            <a href="{$ul}/{$menuActive}/{$valuecallNewsDetail.idg}/detail/{$valuecallNewsDetail.id}{$search}" class="link wrapper">
                                                <div class="title">
                                                    {$valuecallNewsDetail.subject}
                                                </div>
                                                <div class="desc">{$valuecallNewsDetail['credate']|DateThai:1:"th":"shot"}</div>
                                                <div class="thumb">
                                                    <figure class="cover">
                                                        <img src="{$valuecallNewsDetail.pic|fileinclude:"pictures":{$valuecallNewsDetail.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                                                    </figure>
                                                </div>
                                            </a>
                                        </li>
                            {/if}
                            {if $keycallNewsDetail eq 5 || $keycallNewsDetail eq 10 || $keycallNewsDetail eq 16}
                                    </ul>
                                    <div class="book-base" data-aos="fade-in"></div>
                                </div>
                            {elseif $numOfRows eq $keycallNewsDetail && $keycallNewsDetail neq 0}
                                    </ul>
                                    <div class="book-base" data-aos="fade-in"></div>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                    {else}
                    <div class="row">
                    	<div class="col-12">
                            <div class="noData">ไม่พบข้อมูล</div>
                        </div>
                    </div>
                     {/if}
                    {if $callNewsDetail->_numOfRows > 0}
                        {include file="pagination.tpl" title=title}
                    {/if}
          
                </div>
            </div>

        </section>