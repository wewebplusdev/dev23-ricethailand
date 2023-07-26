<section class="site-container">
    <div class="main-slider" data-aos="fade-up">
        {foreach $callTGP as $keycallTGP => $valuecallTGP}
            <a {if $valuecallTGP['url'] != '' && $valuecallTGP['url'] != '#'} href="{$valuecallTGP['url']}" 
            {else}
                    href="javascript:void(0)" style="pointer-events: none;" {/if} {if $valuecallTGP['target'] == 2}
                target="_blank" {/if} class="item image link" title="{$valuecallTGP.subject}">
                <div class="wrapper">
                    <figure class="cover">
                        <img src="{$valuecallTGP.pic|fileinclude:"real":{$valuecallTGP.masterkey}:"link"}" alt="{$valuecallTGP.subject}" title="{$valuecallTGP.subject}" class="lazy">
                    </figure>
                </div>
            </a>
        {/foreach}
    </div>

    <div class="wg-statistics -home">
        <div class="ojb -ojbI" data-aos="fade-left">
            <img src="{$template}/assets/img/static/ojb-wg-statistics1.png" alt="" class="lazy">
        </div>
        <div class="ojb -ojbII" data-aos="fade-right">
            <img src="{$template}/assets/img/static/ojb-wg-statistics2.png" alt="" class="lazy">
        </div>
        <div class="ojb -ojbIII" data-aos="fade-left">
            <img src="{$template}/assets/img/static/ojb-wg-statistics3.png" alt="" class="lazy">
        </div>
        <div class="container">
            <div class="whead" data-aos="fade-down">
                <h1 class="title">
                    Knowledge Information
                    <span class="desc">{$datenow|DateThai:1:"th":"shot"}</span>
                </h1>
            </div>
            <div class="row row-40">
                <div class="col-md-6">
                    <div class="charts-box" data-aos="fade-up">
                        <div class="inner">
                            <div class="ojb-chart">
                                <img src="{$template}/assets/img/static/ojb-chart.png" alt="" class="lazy">
                            </div>
                            <div class="action">
                                <a href="{$ul}/statistics" class="btn btn-outline-primary"
                                    title="ดูทั้งหมด">ดูทั้งหมด</a>
                            </div>
                            <figure class="highcharts-figure">
                                <div id="HighchartsI"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    {foreach $data_count as $keydata_count => $valuedata_count}
                        <div class="box-content" data-aos="fade-up" style="cursor:pointer;"
                            onclick="javascript:location.href='{$ul}/news/{$valuedata_count['gid']}'">
                            <div class="inner">
                                <div class="ojb-box-clip">
                                    <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                </div>
                                <div class="title">{$valuedata_count['subject']}</div>
                                <div class="desc">
                                    <span class="number">{$valuedata_count['data']}</span>
                                    เล่ม
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    <div class="box-content" data-aos="fade-up" style="cursor:pointer;"
                        onclick="javascript:location.href='{$ul}/kmplan/'">
                        <div class="inner">
                            <div class="ojb-box-clip">
                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                            </div>
                            <div class="title">แผนการจัดการความรู้ประจำปี</div>
                            <div class="desc">
                                <span class="number">{$numrowcallPlanKm}</span>
                                แผน
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wg-book">
        {if $callNewsGroup1->_numOfRows gte 1}
            <div class="container">
                <div class="whead t-cen" data-aos="fade-down">
                    <h2 class="title">{$callNewsGroup1->fields['subjectg']}</h2>
                </div>
                <div class="wg-book-slide" data-aos="fade-up">
                    {foreach $callNewsGroup1 as $keycallNewsGroup1 => $valuecallNewsGroup1}
                        <div class="item">
                            <a href="{$ul}/news/{$valuecallNewsGroup1.idg}/{$menuDetail}/{$valuecallNewsGroup1.id}"
                                class="link wrapper" title="{$valuecallNewsGroup1.subject}">
                                <div class="title">
                                    {$valuecallNewsGroup1.subject}
                                </div>
                                <div class="desc">{$valuecallNewsGroup1['credate']|DateThai:1:"th":"shot"}</div>
                                <div class="thumb">
                                    <figure class="cover">
                                        <img src="{$valuecallNewsGroup1.pic|fileinclude:"pictures":{$valuecallNewsGroup1.masterkey}:"link"}{$setVersionTemp}" alt="{$valuecallNewsGroup1.subject}" class="lazy">
                                    </figure>
                                </div>
                            </a>
                        </div>
                    {/foreach}
                </div>
                <div class="book-base" data-aos="fade-in"></div>
                <div class="action" data-aos="fade-up">
                    <a href="{$ul}/news/{$valuecallNewsGroup1.idg}" class="btn btn-primary" title="ดูทั้งหมด">ดูทั้งหมด</a>
                </div>
            </div>
        {/if}
        {if $callNewsGroup2->_numOfRows gte 1}
            <div class="container">
                <div class="whead t-cen" data-aos="fade-down">
                    <h2 class="title">{$callNewsGroup2->fields['subjectg']}</h2>
                </div>
                {assign var="number" value="1"}
                {assign var="numOfRows" value=$callNewsGroup2->_numOfRows-1}
                {foreach $callNewsGroup2 as $keycallNewsGroup2 => $valuecallNewsGroup2}
                    {* {$number|print_pre} *}
                    {if $number == 1 || $number == 6}
                        <div class="wg-book-list" data-aos="fade-up">
                            <ul class="item-list">
                            {/if}
                            <li class="item">
                                <a href="{$ul}/news/{$valuecallNewsGroup2.idg}/{$menuDetail}/{$valuecallNewsGroup2.id}"
                                    class="link wrapper" title="{$valuecallNewsGroup2.subject}">
                                    <div class="title">
                                        {$valuecallNewsGroup2.subject}
                                    </div>
                                    <div class="desc">{$valuecallNewsGroup2['credate']|DateThai:1:"th":"shot"}</div>
                                    <div class="thumb">
                                        <figure class="cover">
                                            <img src="{$valuecallNewsGroup2.pic|fileinclude:"pictures":{$valuecallNewsGroup2.masterkey}:"link"}{$setVersionTemp}" alt="{$valuecallNewsGroup2.subject}" class="lazy">
                                        </figure>
                                    </div>
                                </a>
                            </li>
                            {if $number == 5 || $number == 10}
                            </ul>
                            <div class="book-base" data-aos="fade-in"></div>
                        </div>
                    {elseif $numOfRows eq $keycallNewsGroup2}
                        </ul>
                        <div class="book-base" data-aos="fade-in"></div>
                    </div>
                {/if}
                {$number = $number+1}
            {/foreach}
            <div class="action" data-aos="fade-up">
                <a href="{$ul}/news/{$valuecallNewsGroup2.idg}" class="btn btn-primary" title="ดูทั้งหมด">ดูทั้งหมด</a>
            </div>
        </div>
    {/if}
    </div>

    {if $callActivetyGroup->_numOfRows gte 1}
        <div class="wg-about">
            <div class="ojb -ojbI" data-aos="fade-left">
                <img src="{$template}/assets/img/static/ojb-wg-about1.png" alt="" class="lazy">
            </div>
            <div class="ojb -ojbII" data-aos="fade-right">
                <img src="{$template}/assets/img/static/ojb-wg-about2.png" alt="" class="lazy">
            </div>
            <div class="container">
                <div class="whead t-cen" data-aos="fade-down">
                    <h2 class="title">ข่าวประชาสัมพันธ์</h2>
                </div>
                <div class="wg-book-slide" data-aos="fade-up">
                    {foreach $callActivetyGroup as $keycallNewsGroup1 => $valuecallNewsGroup1}
                        {assign var="nameActID" value={$valuecallNewsGroup1.idg}}
                        <div class="item">
                            <a href="{$ul}/activity/{$valuecallNewsGroup1.idg}/{$menuDetail}/{$valuecallNewsGroup1.id}"
                                class="link wrapper" title="{$valuecallNewsGroup1.subject}">
                                <div class="title">
                                    {$valuecallNewsGroup1.subject}
                                </div>
                                <div class="desc">{$valuecallNewsGroup1['credate']|DateThai:1:"th":"shot"}</div>
                                <div class="thumb">
                                    <figure class="cover">
                                        <img src="{$valuecallNewsGroup1.pic|fileinclude:"pictures":{$valuecallNewsGroup1.masterkey}:"link"}{$setVersionTemp}" alt="{$valuecallNewsGroup1.subject}" class="lazy">
                                    </figure>
                                </div>
                            </a>
                        </div>
                    {/foreach}
                </div>
                <div class="book-base" data-aos="fade-in"></div>
                <div class="action" data-aos="fade-up">
                    <a href="{$ul}/activity/{$nameActID}" class="btn btn-primary" title="ดูทั้งหมด">ดูทั้งหมด</a>
                </div>
            </div>
        </div>
    {/if}

    <div class="wg-service">
        <div class="ojb -ojbI" data-aos="fade-right">
            <img src="{$template}/assets/img/static/ojb-wg-service1.png" alt="" class="lazy">
        </div>
        <div class="ojb -ojbII" data-aos="fade-up">
            <img src="{$template}/assets/img/static/ojb-wg-service2.png" alt="" class="lazy">
        </div>
        <div class="container">
            <div class="whead t-cen" data-aos="fade-down">
                <h4 class="title">ชุมชนนักปฏิบัติ (CoPs)</h4>
            </div>
            <div class="wg-service-slide" data-aos="fade-up">
                {foreach $callNewsList as $keycallNewsList => $valuecallNewsList}
                    <div class="item">
                        {assign var="href_target" value="_self" }
                        {if $valuecallNewsList.typec eq 2}
                            {if $valuecallNewsList.urlc neq "" && $valuecallNewsList.urlc neq "#"}
                                {assign var="href_url" value="{$ul}/pageredirect/{$valuecallNewsList.masterkey|page_redirect:'cms':$valuecallNewsList.id}"}
                                {if $valuecallNewsList.target eq 2}
                                    {$href_target = "_blank"}
                                {/if}
                            {else}
                                {assign var="href_url" value="javascript:void(0);" }
                            {/if}
                        {else}
                            {assign var="href_url" value="{$ul}/community-of-practitioners/{$valuecallNewsList.gid}/detail/{$valuecallNewsList.id}"}
                        {/if}
                        <a class="link" href="{$href_url}" target="{$href_target}" title="{$valuecallNewsList.subject}">
                            <div class="thumb">
                                <figure class="cover">
                                    <img src="{$valuecallNewsList.pic|fileinclude:"pictures":{$valuecallNewsList.masterkey}:"link"}{$setVersionTemp}" alt="{$valuecallNewsList.subject}" class="lazy">
                                </figure>
                            </div>
                            <div class="title">{$valuecallNewsList.subject}</div>
                            <div class="desc">{$valuecallNewsList.title}</div>
                        </a>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>

</section>