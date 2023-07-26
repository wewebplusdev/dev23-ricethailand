var path = $("base").attr("href");
$(document).ready(function () {
    getsectionID();
    // $('.nav-news').addClass('active');
    // $('.nav-statistics').addClass('active');

    // Highcharts.chart('HighchartsI', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: false,
    //     subtitle: false,
    //     accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         }
    //     },
    //     xAxis: {
    //         type: 'category'
    //     },
    //     yAxis: {
    //         title: {
    //             text: false
    //         }

    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         series: {
    //             borderWidth: 0,
    //             dataLabels: {
    //                 enabled: false
    //             }
    //         }
    //     },
    //     series: [
    //         {
    //             colorByPoint: true,
    //             data: [
    //                 {
    //                     name: 'สำนักงานเลขานุการกรม',
    //                     y: 62.74,
    //                     color: '#0160D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันวิจัยสมุนไพร',
    //                     y: 10.57,
    //                     color: '#0195D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                     y: 7.23,
    //                     color: '#81D8FF',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักยาและวัตถุเสพติด',
    //                     y: 5.58,
    //                     color: '#1DC3C9',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                     y: 4.02,
    //                     color: '#BFDFF8',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันชีววัตถุ',
    //                     y: 1.92,
    //                     color: '#0C4B98',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 }
    //             ]
    //         }
    //     ]
    // });

    // Highcharts.chart('HighchartsII', {
    //     chart: {
    //         type: 'pie'
    //     },
    //     title: false,
    //     subtitle: false,
    //     plotOptions: {
    //         pie: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             dataLabels: {
    //                 enabled: false
    //             },
    //             showInLegend: true,
    //             shadow: true,
    //             center: ['50%', '50%'],
    //             size: '100%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         colorByPoint: true,
    //         innerSize: '50%',
    //         data: [
    //             {
    //                 name: 'สำนักงานเลขานุการกรม',
    //                 y: 62.74,
    //                 color: '#0160D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันวิจัยสมุนไพร',
    //                 y: 10.57,
    //                 color: '#0195D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                 y: 7.23,
    //                 color: '#81D8FF',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักยาและวัตถุเสพติด',
    //                 y: 5.58,
    //                 color: '#1DC3C9',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                 y: 4.02,
    //                 color: '#BFDFF8',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันชีววัตถุ',
    //                 y: 1.92,
    //                 color: '#0C4B98',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             }
    //         ]
    //     }]
    // });

    // Highcharts.chart('HighchartsI-TII', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: false,
    //     subtitle: false,
    //     accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         }
    //     },
    //     xAxis: {
    //         type: 'category'
    //     },
    //     yAxis: {
    //         title: {
    //             text: false
    //         }

    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         series: {
    //             borderWidth: 0,
    //             dataLabels: {
    //                 enabled: false
    //             }
    //         }
    //     },
    //     series: [
    //         {
    //             colorByPoint: true,
    //             data: [
    //                 {
    //                     name: 'สำนักงานเลขานุการกรม',
    //                     y: 62.74,
    //                     color: '#0160D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันวิจัยสมุนไพร',
    //                     y: 10.57,
    //                     color: '#0195D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                     y: 7.23,
    //                     color: '#81D8FF',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักยาและวัตถุเสพติด',
    //                     y: 5.58,
    //                     color: '#1DC3C9',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                     y: 4.02,
    //                     color: '#BFDFF8',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันชีววัตถุ',
    //                     y: 1.92,
    //                     color: '#0C4B98',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 }
    //             ]
    //         }
    //     ]
    // });

    // Highcharts.chart('HighchartsII-TII', {
    //     chart: {
    //         type: 'pie'
    //     },
    //     title: false,
    //     subtitle: false,
    //     plotOptions: {
    //         pie: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             dataLabels: {
    //                 enabled: false
    //             },
    //             showInLegend: true,
    //             shadow: true,
    //             center: ['50%', '50%'],
    //             size: '100%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         colorByPoint: true,
    //         innerSize: '50%',
    //         data: [
    //             {
    //                 name: 'สำนักงานเลขานุการกรม',
    //                 y: 62.74,
    //                 color: '#0160D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันวิจัยสมุนไพร',
    //                 y: 10.57,
    //                 color: '#0195D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                 y: 7.23,
    //                 color: '#81D8FF',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักยาและวัตถุเสพติด',
    //                 y: 5.58,
    //                 color: '#1DC3C9',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                 y: 4.02,
    //                 color: '#BFDFF8',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันชีววัตถุ',
    //                 y: 1.92,
    //                 color: '#0C4B98',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             }
    //         ]
    //     }]
    // });

    // Highcharts.chart('HighchartsI-TIII', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: false,
    //     subtitle: false,
    //     accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         }
    //     },
    //     xAxis: {
    //         type: 'category'
    //     },
    //     yAxis: {
    //         title: {
    //             text: false
    //         }

    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         series: {
    //             borderWidth: 0,
    //             dataLabels: {
    //                 enabled: false
    //             }
    //         }
    //     },
    //     series: [
    //         {
    //             colorByPoint: true,
    //             data: [
    //                 {
    //                     name: 'สำนักงานเลขานุการกรม',
    //                     y: 62.74,
    //                     color: '#0160D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันวิจัยสมุนไพร',
    //                     y: 10.57,
    //                     color: '#0195D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                     y: 7.23,
    //                     color: '#81D8FF',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักยาและวัตถุเสพติด',
    //                     y: 5.58,
    //                     color: '#1DC3C9',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                     y: 4.02,
    //                     color: '#BFDFF8',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันชีววัตถุ',
    //                     y: 1.92,
    //                     color: '#0C4B98',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 }
    //             ]
    //         }
    //     ]
    // });

    // Highcharts.chart('HighchartsII-TIII', {
    //     chart: {
    //         type: 'pie'
    //     },
    //     title: false,
    //     subtitle: false,
    //     plotOptions: {
    //         pie: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             dataLabels: {
    //                 enabled: false
    //             },
    //             showInLegend: true,
    //             shadow: true,
    //             center: ['50%', '50%'],
    //             size: '100%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         colorByPoint: true,
    //         innerSize: '50%',
    //         data: [
    //             {
    //                 name: 'สำนักงานเลขานุการกรม',
    //                 y: 62.74,
    //                 color: '#0160D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันวิจัยสมุนไพร',
    //                 y: 10.57,
    //                 color: '#0195D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                 y: 7.23,
    //                 color: '#81D8FF',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักยาและวัตถุเสพติด',
    //                 y: 5.58,
    //                 color: '#1DC3C9',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                 y: 4.02,
    //                 color: '#BFDFF8',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันชีววัตถุ',
    //                 y: 1.92,
    //                 color: '#0C4B98',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             }
    //         ]
    //     }]
    // });

    // Highcharts.chart('HighchartsI-TIV', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: false,
    //     subtitle: false,
    //     accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         }
    //     },
    //     xAxis: {
    //         type: 'category'
    //     },
    //     yAxis: {
    //         title: {
    //             text: false
    //         }

    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         series: {
    //             borderWidth: 0,
    //             dataLabels: {
    //                 enabled: false
    //             }
    //         }
    //     },
    //     series: [
    //         {
    //             colorByPoint: true,
    //             data: [
    //                 {
    //                     name: 'สำนักงานเลขานุการกรม',
    //                     y: 62.74,
    //                     color: '#0160D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันวิจัยสมุนไพร',
    //                     y: 10.57,
    //                     color: '#0195D6',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                     y: 7.23,
    //                     color: '#81D8FF',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สำนักยาและวัตถุเสพติด',
    //                     y: 5.58,
    //                     color: '#1DC3C9',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                     y: 4.02,
    //                     color: '#BFDFF8',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 },
    //                 {
    //                     name: 'สถาบันชีววัตถุ',
    //                     y: 1.92,
    //                     color: '#0C4B98',
    //                     dataLabels: {
    //                         enabled: false
    //                     }
    //                 }
    //             ]
    //         }
    //     ]
    // });

    // Highcharts.chart('HighchartsII-TIV', {
    //     chart: {
    //         type: 'pie'
    //     },
    //     title: false,
    //     subtitle: false,
    //     plotOptions: {
    //         pie: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             dataLabels: {
    //                 enabled: false
    //             },
    //             showInLegend: true,
    //             shadow: true,
    //             center: ['50%', '50%'],
    //             size: '100%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         colorByPoint: true,
    //         innerSize: '50%',
    //         data: [
    //             {
    //                 name: 'สำนักงานเลขานุการกรม',
    //                 y: 62.74,
    //                 color: '#0160D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันวิจัยสมุนไพร',
    //                 y: 10.57,
    //                 color: '#0195D6',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักรังสีและเครื่องมือแพทยย์',
    //                 y: 7.23,
    //                 color: '#81D8FF',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สำนักยาและวัตถุเสพติด',
    //                 y: 5.58,
    //                 color: '#1DC3C9',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'ศูนย์เทคโนโลยีสารสนเทศ',
    //                 y: 4.02,
    //                 color: '#BFDFF8',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             },
    //             {
    //                 name: 'สถาบันชีววัตถุ',
    //                 y: 1.92,
    //                 color: '#0C4B98',
    //                 dataLabels: {
    //                     enabled: false
    //                 }
    //             }
    //         ]
    //     }]
    // });
});

function changeitem(id = null){
    var rowsitem = $('.numOfRow').data('id');
    var myarray = new Array();
    for(let i = 0; i < rowsitem; i++){
        let index = $('.actionID'+i).data('id');
        myarray.push(index);
    }
    // console.log(id.value);
    // console.log(myarray);
    $.ajax({
        type: "GET",
        url: path+"api/getDataChart",
        data: {id: myarray,action:'select',idagen:id.value},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(result) {
            let countCard = Object.values(result.card).length;
            let countChart = Object.values(result.chart).length;
            // console.log(result.card);
            // console.log(countCard);

            /* Start append card */ 
            $('.cardList').empty();
            for(let index = 0;index < countCard; index++){
                var strHTMLCard = "";
                strHTMLCard = `
                    <li class="item" data-aos="fade-up">
                        <div class="box-content" data-aos="fade-up">
                            <div class="inner">
                                <div class="ojb-box-clip">
                                    <img src="${path}front/template/default/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                </div>
                                <div class="title">${result.card[index]['subject']}</div>
                                <div class="desc">
                                    <span class="number">${result.card[index]['count']}</span>
                                    เล่ม
                                </div>
                            </div>
                        </div>
                    </li>
                `;
                // console.log(strHTML);
                $('.cardList').append(strHTMLCard);
            }
            /* End append card */ 

            /* Start append chart */ 
            for(let i = 1; i<= countChart;i++){
                // console.log(result.chart[i]);

                /* Start convert obj to array */ 
                var arrPop = new Array();
                $.each(result.chart[i], function(key, value)
                {
                    arrPop.push(value);
                });
                /* End convert obj to array */ 
                chartAppend(arrPop,i);

                /* Start append table */ 
                var strHTML = "";
                // console.log(arrPop);
                strHTML = `
                    <table>
                        <tbody> `;
                for(let index = 0; index < arrPop.length; index++){
                    strHTML += `  
                            <tr>
                                <td>${arrPop[index]['name']}</td>
                                <td>${arrPop[index]['y']}</td>
                            </tr>
                    `;
                }
                strHTML += `  
                        </tbody>
                    </table>
                `;
                // console.log(strHTML);
                $('.table'+i).empty();
                $('.table'+i).append(strHTML);
                /* End append table */ 
            }
            /* End append chart */ 
        }
    });
}

function getsectionID(){
    var rowsitem = $('.numOfRow').data('id');
    // console.log(rowsitem);
    var myarray = new Array();
    for(let i = 0; i < rowsitem; i++){
        let index = $('.actionID'+i).data('id');
        myarray.push(index);
    }
    // console.log(myarray);
    $.ajax({
        type: "GET",
        url: path+"api/getDataChart",
        data: {id: myarray},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(result) {
            let count = Object.values(result).length;
            for(let i = 1; i<= count;i++){
                /* Start append chart */ 
                chartAppend(result[i],i);
                /* End append chart */ 

                /* Start append table */ 
                var strHTML = "";
                strHTML = `
                    <table>
                        <tbody> `;
                for(let index = 0; index < result[i].length; index++){
                    strHTML += `  
                            <tr>
                                <td>${result[i][index]['name']}</td>
                                <td>${result[i][index]['y']}</td>
                            </tr>
                    `;
                }
                strHTML += `  
                        </tbody>
                    </table>
                `;
                // console.log(strHTML);
                $('.table'+i).empty();
                $('.table'+i).append(strHTML);
                /* End append table */ 
            }
        }
    });
}

function chartAppend(dataArr = null,elementID = null){
    // console.log(dataArr);
    Highcharts.chart('Highcharts'+elementID+'I', {
        chart: {
            type: 'column'
        },
        title: false,
        subtitle: false,
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: false
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: false
                }
            }
        },
        tooltip: {
            valueSuffix: ' รายการ'
        },
        // series: [
        //     {
        //         name: 'จำนวน',
        //         colorByPoint: true,
        //             data: dataArr
        //     }
        // ]
        series: [{
            data: [7,12,16,32,64]
        },{
            data: [7,12,16,32,64]
        },{
            data: [7,12,16,32,64]
        }]
    });

    Highcharts.chart('Highcharts'+elementID+'II', {
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
            name: 'จำนวน',
            type: 'pie',
            colorByPoint: true,
            innerSize: '50%',
            data: dataArr
        }]
    });
}