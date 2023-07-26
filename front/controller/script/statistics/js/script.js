var path = $("base").attr("href");
$(document).ready(function () {
    getsectionID();
    // $('.nav-news').addClass('active');
    // $('.nav-statistics').addClass('active');
    // console.log(path);
});

function setselect(){ // setter id select to div 
    var selectYear = $('#selectYear').find(":selected").val();
    var selectAgency = $('#selectAgency').find(":selected").val();
    $('.searchYear').data('id',selectYear); //setter
    $('.searchAgenid').data('id',selectAgency); //setter
    changeitem();
}

function changeitem(id = null){
    // Start getter id select from div 
    let Yearid = $('.searchYear').data('id');
    let Agenid = $('.searchAgenid').data('id');
    var rowsitem = $('.numOfRow').data('id');
    // End getter id select from div

    var myarray = new Array();
    for(let i = 0; i < rowsitem; i++){
        let index = $('.actionID'+i).data('id');
        myarray.push(index);
    }
    $.ajax({
        type: "GET",
        url: path+"api/getDataChart",
        data: {id: myarray,action:'select', idagen:Agenid, idyear:Yearid},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(result) {
            // let countCard = Object.values(result.card).length;
            // let countYearTable = Object.values(result.year.table).length;
            console.log(result);

             /* Start append card top section */ 
             $('.cardList').empty();
             for(let index = 0;index < result.card.length; index++){
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
            /* End append card top section */ 
            /* Start append Chart && Table Year */ 
            chartAppendYear(result.year);
            // ## change img
            if(Yearid > 0){
                $(".piechartY").attr("src",path+"/front/template/default/assets/img/icon/piechart.svg");
            }else{
                $(".piechartY").attr("src",path+"/front/template/default/assets/img/icon/line-chart.svg");
            }
            var strHTML = "";
            strHTML = `
                <table>
                    <tbody> `;
            for(let index = 0;index < result.year.table.length; index++){
                strHTML += `  
                        <tr>
                            <td>งบประมาณประจำปี ${result.year.table[index]['name']}</td>
                            <td>${result.year.table[index]['count']}</td>
                        </tr>
                `;
            }
            strHTML += `  
                    </tbody>
                </table>
            `;
            $('.tableYear').empty();
            $('.tableYear').append(strHTML);
            /* End append Chart && Table Year */ 
            /* Start append Chart && Table Agency */ 
            chartAppendAgency(result.agency);
            if(Agenid > 0){
                $('.piechartA').removeClass("active");
                $('.piechartA').removeClass("show");
                $('#piechartAbtn').hide();
                $('.barchartA').addClass("active");
                $('.barchartA').addClass("show");
            }else{
                $('#piechartAbtn').show();
            }
            strHTML = "";
            strHTML = `
                <table>
                    <tbody> `;
            for(let index = 0;index < result.agency.card.length; index++){
                strHTML += `  
                        <tr>
                            <td>${result.agency.card[index]['name']}</td>
                            <td>${result.agency.card[index]['count']}</td>
                        </tr>
                `;
            }
            strHTML += `  
                    </tbody>
                </table>
            `;
            $('.tableAgency').empty();
            $('.tableAgency').append(strHTML);
            /* End append Chart && Table Agency */ 
            /* Start append Chart && Table Group */ 
            let countGruopTable = Object.values(result.group.chart).length;
			console.log(result.group.chart);
            for(var i = 1; i<= countGruopTable;i++){
                if(Agenid > 0){
                    $('.piechartDetail'+i).removeClass("active");
                    $('.piechartDetail'+i).removeClass("show");
                    $('#piechartBtn'+i).hide();
                    $('.barchartDetail'+i).addClass("active");
                    $('.barchartDetail'+i).addClass("show");
                }else{
                    $('#piechartBtn'+i).show();
                }
				var valResId = result.group.chart[i][0]['id'];
                chartAppend(result.group.chart[i],valResId);
                strHTML = "";
                strHTML = `
                    <table>
                        <tbody> `;
                for(let index = 0; index < result.group.chart[i].length; index++){
                    strHTML += `  
                            <tr>
                                <td>${result.group.chart[i][index]['name']}</td>
                                <td>${result.group.chart[i][index]['y']}</td>
                            </tr>
                    `;
                }
                strHTML += `  
                        </tbody>
                    </table>
                `;
                $('.table'+valResId).empty();
                $('.table'+valResId).append(strHTML);
            }
            /* End append Chart && Table Group */ 
        }
    });
}

/* START SECTION GROUP */
function getsectionID(){
    var rowsitem = $('.numOfRow').data('id');
    // console.log(rowsitem);
    var myarray = new Array();
    for(let i = 0; i < rowsitem; i++){
        let index = $('.actionID'+i).data('id');
        myarray.push(index);
    }
   //console.log(myarray);
    getChartYear();
    getChartAgency();
    $.ajax({
        type: "GET",
        url: path+"api/getDataChart",
        data: {id: myarray},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(result) {
				let chart = Object.values(result.chart).length;
				//console.log(result.chart);
				for(let i = 1; i<= chart;i++){
					//console.log(i);
					
					/* Start append chart */ 
					var valResId = result.chart[i][0]['id'];
					chartAppend(result.chart[i],valResId);
					/* End append chart */ 
					
					/* Start append table */ 
					var strHTML = "";
					strHTML = '<table><tbody>';
					
					for(let index = 0; index < result.chart[i].length; index++){
						var valResName = result.chart[i][index]['name'];
						var valResY = result.chart[i][index]['y'];
						strHTML += ' <tr><td>'+valResName+'</td><td>'+valResY+'</td></tr>';
					
					}
					
					strHTML += '</tbody></table>';
					//console.log(valResId);
					$('.table'+valResId).empty();
					$('.table'+valResId).append(strHTML);
					
		
					
				}
			
			}
    });
}

function chartAppend(dataArr = null,elementID = null){
    // console.log(dataArr);
    Highcharts.chart('HighchartsI-'+elementID+'', {
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
        series: [
            {
                name: 'จำนวน',
                colorByPoint: true,
                    data: dataArr
            }
        ]
    });
    Highcharts.chart('HighchartsII-'+elementID+'', {
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
/* END SECTION GROUP */

/* START SECTION YEAR */
function getChartYear(){
    $.ajax({
        type: "GET",
        url: path+"api/getDataChart",
        data: {action: 'year'},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(result) {
            // let count = Object.values(result.table.table).length;
            var tableCard = result.table.table;
            // console.log(result);
            chartAppendYear(result);
            // for(let i = 1; i<= tableCard.table.length;i++){
                /* Start append chart */ 
                // chartAppend(result[i],i);
                /* End append chart */ 

                /* Start append table */ 
                var strHTML = "";
                strHTML = `
                    <table>
                        <tbody> `;
                for(let index = 0; index < tableCard.length; index++){
                    strHTML += `  
                            <tr>
                                <td>งบประมาณประจำปี ${tableCard[index]['name']}</td>
                                <td>${tableCard[index]['count']}</td>
                            </tr>
                    `;
                }
                strHTML += `  
                        </tbody>
                    </table>
                `;
                $('.tableYear').empty();
                $('.tableYear').append(strHTML);
                /* End append table */ 
                // console.log(strHTML);
            }
        // }
    });
}

function chartAppendYear(dataArr = null,elementID = null){
    // console.log(dataArr.chart);
    Highcharts.chart('HighchartsI', {
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
            type: 'category',
            categories: dataArr.category.default
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
        series: dataArr.chart.default
    });
    // ## use when select filter year
    if(dataArr.action){
        Highcharts.chart('HighchartsII', {
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
                data: dataArr.chart.other
            }]
        });
    }else{
        Highcharts.chart('HighchartsII', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: ''
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
            },
            xAxis: {
                categories: dataArr.category.default
                // plotBands: [{ // visualize the weekend
                //     from: 4.5,
                //     to: 6.5,
                //     color: 'rgba(68, 170, 213, .2)'
                // }]
            },
            yAxis: {
                title: {
                    text: 'Fruit units'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' รายการ'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series:  dataArr.chart.default
        });
    }
}
/* START SECTION YEAR */

/* START SECTION AGENCY */
function getChartAgency(){
    $.ajax({
        type: "GET",
        url: path+"api/getDataChart",
        data: {action: 'agency'},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(result) {
            // let count = Object.values(result.table.table).length;
            var tableCard = result;
        //    console.log(tableCard.card);
            // chartAppendAgency(result);
                var strHTML = "";
                strHTML = `
                    <table>
                        <tbody> `;
                for(let index = 0; index < tableCard.card.length; index++){
                    strHTML += `  
                            <tr>
                                <td>${tableCard.card[index]['name']}</td>
                                <td>${tableCard.card[index]['count']}</td>
                            </tr>
                    `;
                }
                strHTML += `  
                        </tbody>
                    </table>
                `;
                $('.tableAgency').empty();
                $('.tableAgency').append(strHTML);
                /* End append table */ 
                // console.log(strHTML);
                chartAppendAgency(tableCard);
            }
    });
}

function chartAppendAgency(dataArr = null,elementID = null){

    Highcharts.chart('HighchartsIII', {
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
        series: [
            {
                name: 'จำนวน',
                colorByPoint: true,
                    data: dataArr.chart.default
            }
        ]
    });

    Highcharts.chart('HighchartsIIII', {
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
            data: dataArr.chart.default
        }]
    });
}
/* START SECTION AGENCY */