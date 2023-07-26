var path = $("base").attr("href");
$(document).ready(function () {
    callDataPie()
    $('.nav-home').addClass('active');
        
    $('.main-slider').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-arrow-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-arrow-right'></span></div>",
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        focusOnSelect: true,
        rows: 1,
        slidesPerRow:1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    rows: 1,
                    slidesPerRow:1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    rows: 1,
                    slidesPerRow:1
                }
            },
            {
                breakpoint: 1366,
                settings: {
                    rows: 1,
                    slidesPerRow:1
                }
            }
        ]
    });

    

    $('.wg-book-slide').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-arrow-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-arrow-right'></span></div>",
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: false,
        arrows: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    dots: true,
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    dots: true,
                    arrows: false
                }
            }
        ]
    });

    $('.wg-service-slide').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-arrow-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-arrow-right'></span></div>",
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: true,
        arrows: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    dots: true,
                    arrows: false
                }
            }
        ]
    });
});

function updateView(id = null){
    // console.log(id);
    var TYPE = "POST";
    var URL = path+'api/updateView';
    var Contantid = id;
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: {id:Contantid},
        success: function(res) {
            let data = JSON.parse(res);
            if(data.target == '2' && data.link != '' && data.link != '#'){
                window.open(data.link,"_blank");
                // window.location = data.link;
            }
            if(data.target == '1' && data.link != '' && data.link != '#'){
                window.location = data.link;
                // window.open(data.link);
            }
        }
    });
}

function callDataPie(){
    $.ajax({
        type: "POST",
        url: path+"api/getDataChartHome",
        data: "{empid: empid}",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(result) {
            // console.log(result);
            ChartPie(result);
        }
    });
}

function ChartPie(data = null){
    
    Highcharts.chart('HighchartsI', {
        chart: {
            type: 'pie'
        },
        title: false,
        subtitle: false,
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true,
                shadow: true,
                center: ['50%', '50%'],
                size: '100%'
            }
        },
        tooltip: {
            valueSuffix: ' รายการ'
        },
        series: [{
            type: 'pie',
            name: 'จำนวน',
            colorByPoint: true,
            innerSize: '50%',
            data:data //[
                // {
                //     name: 'สำนักงานเลขานุการกรม',
                //     y: 62.74,
                //     color: '#0160D6',
                //     dataLabels: {
                //         enabled: false
                //     }
                // },
                // {
                //     name: 'สถาบันวิจัยสมุนไพร',
                //     y: 10.57,
                //     color: '#0195D6',
                //     dataLabels: {
                //         enabled: false
                //     }
                // },
                // {
                //     name: 'สำนักรังสีและเครื่องมือแพทยย์',
                //     y: 7.23,
                //     color: '#81D8FF',
                //     dataLabels: {
                //         enabled: false
                //     }
                // },
                // {
                //     name: 'สำนักยาและวัตถุเสพติด',
                //     y: 5.58,
                //     color: '#1DC3C9',
                //     dataLabels: {
                //         enabled: false
                //     }
                // },
                // {
                //     name: 'ศูนย์เทคโนโลยีสารสนเทศ',
                //     y: 4.02,
                //     color: '#BFDFF8',
                //     dataLabels: {
                //         enabled: false
                //     }
                // },
                // {
                //     name: 'สถาบันชีววัตถุ',
                //     y: 1.92,
                //     color: '#0C4B98',
                //     dataLabels: {
                //         enabled: false
                //     }
                // }
            //]
        }]
    });
}