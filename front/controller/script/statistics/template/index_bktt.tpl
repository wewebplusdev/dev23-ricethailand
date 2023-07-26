<section class="site-container">
{* {$callGroupNews|print_pre} *}
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-statistics.jpg)">
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">สถิตินวัตกรรมระดับกรม</h1>
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
                        <li class="active">สถิตินวัตกรรมระดับกรม</li>
                    </ol>
                </div>
            </div>

            <div class="statistics-head">
                <div class="container">
                    <div class="whead t-cen" data-aos="fade-down">
                        <h2 class="title">
                            สถิตินวัตกรรมระดับกรม
                        </h2>
                    </div>
                    <div class="h-filter" data-aos="fade-up">
                        <div class="row row-0 align-items-center">
                            <div class="col">
                                <div class="txt">สถิตินวัตกรรมระดับกรมรายหน่วยงาน</div>
                            </div>
                            <div class="col-auto">
                                <div class="select-box">
                                    <div>
                                        <form action='{$ul}/statistics' name='myForm' method='get'>
                                            <select class="select-control" name='slected' onchange="this.form.submit()" size="1" style="width: 100%;">
                                                <option value="0" selected>เลือกปีงบประมาณ</option>
                                                <option value="3">2564</option>
                                                <option value="4">2563</option>
                                                <option value="5">2562</option>
                                            </select>
                                        <form>
                                    </div>
                                    <div>
                                        <form action='{$ul}/statistics' name='myForm' method='get'>
                                            {* <select class="select-control" name='slected' onchange="this.form.submit()" size="1" style="width: 100%;"> *}
                                            <select class="select-control" name='slected' onchange="changeitem(this)" size="1" style="width: 100%;">
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
                             <li class="item" data-aos="fade-up">
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
                                 {* <li class="item" data-aos="fade-up">
                                    <div class="box-content" data-aos="fade-up">
                                        <div class="inner">
                                            <div class="ojb-box-clip">
                                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                            </div>
                                            <div class="title">จำนวนบันทึกความดีบัญชีความสุข</div>
                                            <div class="desc">
                                                <span class="number">300</span>
                                                เล่ม
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                 <li class="item" data-aos="fade-up">
                                    <div class="box-content" data-aos="fade-up">
                                        <div class="inner">
                                            <div class="ojb-box-clip">
                                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                            </div>
                                            <div class="title">จำนวนบันทึกความดีบัญชีความสุข</div>
                                            <div class="desc">
                                                <span class="number">300</span>
                                                เล่ม
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="item" data-aos="fade-up">
                                    <div class="box-content" data-aos="fade-up">
                                        <div class="inner">
                                            <div class="ojb-box-clip">
                                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                            </div>
                                            <div class="title">จำนวนบันทึกความดีบัญชีความสุข</div>
                                            <div class="desc">
                                                <span class="number">300</span>
                                                เล่ม
                                            </div>
                                        </div>
                                    </div>
                                </li> *}
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
                            <div class="numOfRow" data-id="{count($callGroupNews)}"></div>
                            {foreach $callGroupNews as $keycallGroupNews1 => $valuecallGroupNews1}
                            {* {$valuecallGroupNews1|print_pre} *}
                                <li class="item" data-aos="fade-up">
                                    <div class="actionID{$keycallGroupNews1}" data-id="{$valuecallGroupNews1.id}"></div>
                                    <div class="wrapper">
                                        <div class="head">
                                            <div class="row row-0 align-items-center">
                                                <div class="col">
                                                    <div class="txt">{$valuecallGroupNews1.subject}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link link" data-toggle="tab" href="#barchart{$valuecallGroupNews1.id}">
                                                                <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link link active" data-toggle="tab" href="#piechart{$valuecallGroupNews1.id}" >
                                                                <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade " id="barchart{$valuecallGroupNews1.id}" role="tabpanel" >
                                                    <figure class="highcharts-figure">
                                                        <div id="Highcharts{$valuecallGroupNews1.id}I"></div>
                                                    </figure>
                                                </div>
                                                <div class="tab-pane fade show active" id="piechart{$valuecallGroupNews1.id}" role="tabpanel" >
                                                    <figure class="highcharts-figure">
                                                        <div id="Highcharts{$valuecallGroupNews1.id}II"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="table-block table{$valuecallGroupNews1.id}">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>สำนักงานเลขานุการกรม</td>
                                                            <td>2000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>สถาบันวิจัยสมุนไพร</td>
                                                            <td>2000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>สำนักรังสีและเครื่องมือแพทยย์</td>
                                                            <td>2000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>สำนักยาและวัตถุเสพติด</td>
                                                            <td>2000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ศูนย์เทคโนโลยีสารสนเทศ</td>
                                                            <td>2000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>สถาบันชีววัตถุ</td>
                                                            <td>2000</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            {/foreach}
                            {* <li class="item" data-aos="fade-up">
                                <div class="wrapper">
                                    <div class="head">
                                        <div class="row row-0 align-items-center">
                                            <div class="col">
                                                <div class="txt">สถิติรวมเรื่องเล่าเร้าพลัง</div>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link link" data-toggle="tab" href="#barchartII">
                                                            <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link link active" data-toggle="tab" href="#piechartII" >
                                                            <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade " id="barchartII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsI-TII"></div>
                                                </figure>
                                            </div>
                                            <div class="tab-pane fade show active" id="piechartII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsII-TII"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="table-block">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>สำนักงานเลขานุการกรม</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันวิจัยสมุนไพร</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักรังสีและเครื่องมือแพทยย์</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักยาและวัตถุเสพติด</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ศูนย์เทคโนโลยีสารสนเทศ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันชีววัตถุ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item" data-aos="fade-up">
                                <div class="wrapper">
                                    <div class="head">
                                        <div class="row row-0 align-items-center">
                                            <div class="col">
                                                <div class="txt">สถิติรวมบันทึกความดีบัญชีความสุข</div>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link link" data-toggle="tab" href="#barchartIII">
                                                            <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link link active" data-toggle="tab" href="#piechartIII" >
                                                            <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade " id="barchartIII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsI-TIII"></div>
                                                </figure>
                                            </div>
                                            <div class="tab-pane fade show active" id="piechartIII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsII-TIII"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="table-block">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>สำนักงานเลขานุการกรม</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันวิจัยสมุนไพร</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักรังสีและเครื่องมือแพทยย์</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักยาและวัตถุเสพติด</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ศูนย์เทคโนโลยีสารสนเทศ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันชีววัตถุ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item" data-aos="fade-up">
                                <div class="wrapper">
                                    <div class="head">
                                        <div class="row row-0 align-items-center">
                                            <div class="col">
                                                <div class="txt">สถิติรวมองค์ความรู้ที่ได้จากการจัดความรู้ประจำปี</div>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link link" data-toggle="tab" href="#barchartIV">
                                                            <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link link active" data-toggle="tab" href="#piechartIV" >
                                                            <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade " id="barchartIV" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsI-TIV"></div>
                                                </figure>
                                            </div>
                                            <div class="tab-pane fade show active" id="piechartIV" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsII-TIV"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="table-block">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>สำนักงานเลขานุการกรม</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันวิจัยสมุนไพร</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักรังสีและเครื่องมือแพทยย์</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักยาและวัตถุเสพติด</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ศูนย์เทคโนโลยีสารสนเทศ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันชีววัตถุ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li> *}
                        </ul>
                        <ul class="item-list -list-III">
                            <li class="item" data-aos="fade-up">
                                <div class="wrapper">
                                    <div class="head">
                                        <div class="row row-0 align-items-center">
                                            <div class="col">
                                                <div class="txt">สถิติรวมเรื่องเล่าเร้าพลัง</div>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link link" data-toggle="tab" href="#barchartII">
                                                            <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link link active" data-toggle="tab" href="#piechartII" >
                                                            <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade " id="barchartII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsI-TII"></div>
                                                </figure>
                                            </div>
                                            <div class="tab-pane fade show active" id="piechartII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsII-TII"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="table-block">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>สำนักงานเลขานุการกรม</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันวิจัยสมุนไพร</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักรังสีและเครื่องมือแพทย์</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักยาและวัตถุเสพติด</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ศูนย์เทคโนโลยีสารสนเทศ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันชีววัตถุ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item" data-aos="fade-up">
                                <div class="wrapper">
                                    <div class="head">
                                        <div class="row row-0 align-items-center">
                                            <div class="col">
                                                <div class="txt">สถิติรวมบันทึกความดีบัญชีความสุข</div>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link link" data-toggle="tab" href="#barchartIII">
                                                            <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link link active" data-toggle="tab" href="#piechartIII" >
                                                            <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade " id="barchartIII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsI-TIII"></div>
                                                </figure>
                                            </div>
                                            <div class="tab-pane fade show active" id="piechartIII" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsII-TIII"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="table-block">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>สำนักงานเลขานุการกรม</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันวิจัยสมุนไพร</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักรังสีและเครื่องมือแพทย์</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักยาและวัตถุเสพติด</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ศูนย์เทคโนโลยีสารสนเทศ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันชีววัตถุ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item" data-aos="fade-up">
                                <div class="wrapper">
                                    <div class="head">
                                        <div class="row row-0 align-items-center">
                                            <div class="col">
                                                <div class="txt">สถิติรวมองค์ความรู้ที่ได้จากการจัดความรู้ประจำปี</div>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link link" data-toggle="tab" href="#barchartIV">
                                                            <img src="{$template}/assets/img/icon/barchart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link link active" data-toggle="tab" href="#piechartIV" >
                                                            <img src="{$template}/assets/img/icon/piechart.svg" alt="" class="lazy">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade " id="barchartIV" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsI-TIV"></div>
                                                </figure>
                                            </div>
                                            <div class="tab-pane fade show active" id="piechartIV" role="tabpanel" >
                                                <figure class="highcharts-figure">
                                                    <div id="HighchartsII-TIV"></div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="table-block">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>สำนักงานเลขานุการกรม</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันวิจัยสมุนไพร</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักรังสีและเครื่องมือแพทย์</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สำนักยาและวัตถุเสพติด</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ศูนย์เทคโนโลยีสารสนเทศ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>สถาบันชีววัตถุ</td>
                                                        <td>2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>