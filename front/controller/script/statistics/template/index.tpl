<section class="site-container">
{* {$callGroupYear->_numOfRows|print_pre} *}
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-statistics.jpg)">
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">Knowledge Information</h1>
                            <p class="desc">Knowledge and Information Systems</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-block">
                <div class="container">
                    <ol class="breadcrumb" data-aos="fade-up">
                        <li><a class="link" href="{$ul}/home"><span class="fa fa-home"></span> หน้าแรก</a></li>
                        {* <li>ข่าวประชาสัมพันธ์</li> *}
                        <li class="active">Knowledge Information</li>
                    </ol>
                </div>
            </div>

            <div class="statistics-head">
                <div class="container">
                    <div class="whead t-cen" data-aos="fade-down">
                        <h2 class="title">
                            Knowledge Information
                        </h2>
                    </div>
                    <div class="h-filter" data-aos="fade-up">
                        <div class="row row-0 align-items-center">
                            <div class="col">
                                <div class="txt">สถิติองค์ความรู้ระดับกรมรายหน่วยงาน</div>
                            </div>
                            <div class="col-auto">
                                <div class="select-box">
                                    <div>
                                        <div class="searchYear" data-id=""></div>
                                        <form action='{$ul}/statistics' name='myForm' method='get'>
                                            <select class="select-control" name='slected' onchange="setselect()" id="selectYear" size="1" style="width: 100%;">
                                                <option value="0" selected>เลือกปีงบประมาณ</option>
                                                {foreach $callGroupYear as $keycallGroupYear => $valuecallGroupYear}
                                                    <option value="{$valuecallGroupYear.id}">{$valuecallGroupYear.subject}</option>
                                                {/foreach}
                                            </select>
                                        <form>
                                    </div>
                                    <div>
                                        <div class="searchAgenid" data-id=""></div>
                                        <form action='{$ul}/statistics' name='myForm' method='get'>
                                            {* <select class="select-control" name='slected' onchange="this.form.submit()" size="1" style="width: 100%;"> *}
                                            <select class="select-control" name='slected' onchange="setselect()" id="selectAgency" size="1" style="width: 100%;">
                                                <option value="0" selected>รายหน่วยงาน</option>
                                                {foreach $callGroup as $keycallGroup => $valuecallGroup}
                                                    <option value="{$valuecallGroup.id}" {if $slected eq $valuecallGroup.id} selected {/if}>{$valuecallGroup.subject}</option>
                                                    
                                                {/foreach}
                                                {* <option value="3">...</option>
                                                <option value="4">...</option>
                                                <option value="5">...</option> *}
                                            </select>
                                        <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wg-statistics">
                        <ul class="item-list cardList">
                            {foreach $callGroupNews as $keycallGroupNews => $valuecallGroupNews}
                             <li class="item" data-aos="fade-up" style="cursor:pointer;" onclick="javascript:location.href='{$ul}/news/{$valuecallGroupNews['gid']}'">
                                    <div class="box-content" data-aos="fade-up">
                                        <div class="inner">
                                            <div class="ojb-box-clip">
                                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                            </div>
                                            <div class="title">จำนวน{$valuecallGroupNews.subject}</div>
                                            <div class="desc">
                                                <span class="number">{$valuecallGroupNews.count}</span>
                                                เล่ม
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            {/foreach}
                             <li class="item" data-aos="fade-up" style="cursor:pointer;"  onclick="window.open('http://innovation.dmsc.moph.go.th/InnovationV2.0/LTE_INDEX.PHP?menubar=0&submenu=0&menu=1&CHART=1&txtgroup_id=0&txtclass_id=0&DEPARTMENT_ID=0&PROJECTYEAR=0')">
                                    <div class="box-content" data-aos="fade-up">
                                        <div class="inner">
                                            <div class="ojb-box-clip">
                                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                            </div>
                                            <div class="title">จำนวนบัญชีนวัตกรรม</div>
                                            
                                            <div class="desc">
                                             <span class="number">&nbsp;</span>
                                                กดเพื่อเข้าชมข้อมูล
                                              
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="statistics-body">
                <div class="ojb -ojbI" data-aos="fade-right">
                    <img src="{$template}/assets/img/static/ojb-about1.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbII" data-aos="fade-right">
                    <img src="{$template}/assets/img/static/ojb-statistics1.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbIII" data-aos="fade-up">
                    <img src="{$template}/assets/img/static/ojb-statistics2.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbIV" data-aos="fade-up">
                    <img src="{$template}/assets/img/static/ojb-statistics3.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbV" data-aos="fade-up">
                    <img src="{$template}/assets/img/static/ojb-statistics4.png" alt="" class="lazy">
                </div>
                <div class="container">
                    <div class="statistics-list">
                        <ul class="item-list">
                            {* {$valuecallGroupNews1|print_pre} *}
                                <li class="item" data-aos="fade-up">
                                    <div class="wrapper">
                                        <div class="head">
                                            <div class="row row-0 align-items-center">
                                                <div class="col">
                                                    <div class="txt">สถิติองค์ความรู้รายปี</div>
                                                </div>
                                                <div class="col-auto">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link link" data-toggle="tab" href="#barchartY">
                                                                <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy barchartY">
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link link active" data-toggle="tab" href="#piechartY" >
                                                                <img src="{$template}/assets/img/icon/line-chart.svg" alt="" class="lazy piechartY">
                                                                {* <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy piechartY"> *}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade " id="barchartY" role="tabpanel" >
                                                    <figure class="highcharts-figure">
                                                        <div id="HighchartsI"></div>
                                                    </figure>
                                                </div>
                                                <div class="tab-pane fade show active" id="piechartY" role="tabpanel" >
                                                    <figure class="highcharts-figure">
                                                        <div id="HighchartsII"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="mcscroll">
                                                <div class="table-block tableYear">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                 <li class="item" data-aos="fade-up">
                                    <div class="wrapper">
                                        <div class="head">
                                            <div class="row row-0 align-items-center">
                                                <div class="col">
                                                    <div class="txt">สถิติองค์ความรู้รายหน่วยงาน</div>
                                                </div>
                                                <div class="col-auto">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link link barchartA" data-toggle="tab" id="barchartAbtn" href="#barchartA">
                                                                <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link link active piechartA" data-toggle="tab" id="piechartAbtn" href="#piechartA" >
                                                                <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade barchartA" id="barchartA" role="tabpanel" >
                                                    <figure class="highcharts-figure">
                                                        <div id="HighchartsIII"></div>
                                                    </figure>
                                                </div>
                                                <div class="tab-pane fade show active piechartA" id="piechartA" role="tabpanel" >
                                                    <figure class="highcharts-figure">
                                                        <div id="HighchartsIIII"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="mcscroll">
                                                <div class="table-block tableAgency">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        </ul>
                        <ul class="item-list -list-III">
                            <div class="numOfRow" data-id="{$callGroupChart->_numOfRows}"></div>
                            {foreach $callGroupChart as $keycallGroupChart => $valuecallGroupChart}
                            <div class="actionID{$keycallGroupChart}" data-id="{$valuecallGroupChart.id}"></div>
                            <li class="item" data-aos="fade-up">
                                <div class="wrapper">
                                    <div class="head">
                                        <div class="row row-0 align-items-center">
                                            <div class="col">
                                                <div class="txt">{$valuecallGroupChart.subject}</div>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link link barchartDetail{$valuecallGroupChart.id}" data-toggle="tab" id="barchartBtn{$valuecallGroupChart.id}" href="#barchart{$valuecallGroupChart.id}">
                                                            <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link link active piechartDetail{$valuecallGroupChart.id}" data-toggle="tab" id="piechartBtn{$valuecallGroupChart.id}" href="#piechart{$valuecallGroupChart.id}" >
                                                            <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade barchartDetail{$valuecallGroupChart.id}" id="barchart{$valuecallGroupChart.id}" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsI-{$valuecallGroupChart.id}"></div>
                                                </figure>
                                            </div>
                                            <div class="tab-pane fade show active piechartDetail{$valuecallGroupChart.id}" id="piechart{$valuecallGroupChart.id}" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsII-{$valuecallGroupChart.id}"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="mcscroll">
                                            <div class="table-block table{$valuecallGroupChart.id}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>

        </section>