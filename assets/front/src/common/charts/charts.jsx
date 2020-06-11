import React, { Component } from 'react';
import ChartHolder from './chartHolder/chartHolder';
import './charts.css'
import $ from 'jquery';

class Charts extends Component {

    returnChartValues = (resultsForChart, name, id) =>{
        let chartValues = [];
        switch(name){
            case 'Test1': {

            }; break;
            case 'Test2': {

            }; break;
            case 'Test3': {

            }; break;
            case 'Test4': {

            }; break;
            case 'Test5': {

            }; break;
            case 'Test6': {

            }; break;
            case 'Test7': {
                debugger;
                let firstChart = {};
                let secondChart = {};
                let thirdCHart = {}
                let fourthChart = {};
                let chart1data1={
                    timeCouner:0,
                    time:0,
                    correct: 0,
                };

                let chart2data2={
                    timeCouner:0, 
                    time:0,
                    correct: 0,
                };
                let degrees = [];
                for(let i =0 ;i<resultsForChart.length; i++){
                    degrees.push(resultsForChart[i].degree);
                    if(resultsForChart[i].reverse === "სარკული"){
                        chart2data2.timeCouner = chart2data2.timeCouner+=1;
                        chart2data2.time = chart2data2.time += resultsForChart[i].answerTime;
                        if(resultsForChart[i].isUserAnswerCorrect){
                            chart2data2.correct = chart2data2.correct +=1;
                        }
                    }
                    if(resultsForChart[i].reverse === "არასარკული"){
                        chart1data1.timeCouner = chart1data1.timeCouner+=1;
                        chart1data1.time = chart1data1.time += resultsForChart[i].answerTime;
                        if(resultsForChart[i].isUserAnswerCorrect){
                            chart1data1.correct = chart1data1.correct +=1;
                        }
                    }

                }
                degrees = [...new Set(degrees)];
                degrees = degrees.sort();
                let degreesAnswer = {};
                let degTimeCount = {};
                let degCorrect = {};
                degrees.map(degree=>{
                    degreesAnswer[degree] = 0;
                });
                degrees.map(degree=>{
                    degTimeCount[degree] = 0;
                });
                degrees.map(degree=>{
                    degCorrect[degree] = 0;
                });
                for(let i=0; i<resultsForChart.length; i++){
                    let degree = resultsForChart[i].degree;
                    degreesAnswer[degree] = degreesAnswer[degree] + resultsForChart[i].answerTime;
                    degTimeCount[degree] = degTimeCount[degree] += 1;
                    if(resultsForChart[i].isUserAnswerCorrect){
                        degCorrect[degree] = degCorrect[degree] += 1;
                    }
                }

                let thirdChartData = [];
                let fourthChartData = [];
                for(let key in degreesAnswer){
                    thirdChartData.push(Math.round(degreesAnswer[key]/degTimeCount[key]));
                }
                for(let key in degCorrect){
                    fourthChartData.push(Math.round(degCorrect[key]/resultsForChart.length*100));
                }
                let firstChartoptions = {
                    chart :{
                        id: "basic-bar"
                    },
                    xaxis: {
                        categories : ['არასარკული', 'სარკული'],
                        title:{
                            text:"სტიმულის სახე"
                        }
                    },
                    yAxis : {
                        categories : [parseInt(Math.round(chart1data1.time / chart1data1.timeCouner)),parseInt(Math.round(chart2data2.time/chart2data2.timeCouner))],
                        min: 0,
                        title:{
                            text:"რეაქციის დრო(მილიწამი)"
                        }
                    },
                    title: {
                        text: 'რეაქციის დრო როგორც სტიმულის სახის ფუნქცია',
                        align: 'center'
                    }                    
                };
                let firstChartseries= [
                    {
                        name: 'series-1',
                        data: [parseInt(Math.round(chart1data1.time / chart1data1.timeCouner)),parseInt(Math.round(chart2data2.time/chart2data2.timeCouner))]
                    }
                ];
                let secondChartoptions = {
                    chart :{
                        id: "basic-bar"
                    },
                    xaxis: {
                        categories : ['არასარკული', 'სარკული'],
                        title: {
                            text : "სტიმულის სახე"
                        }
                    },
                    yaxis : {
                        categories : [ Math.round(chart1data1.correct / resultsForChart.length*100),Math.round(chart2data2.correct / resultsForChart.length*100)],
                        min: 0,
                        title: {
                            text : "სისწორე(პროცენტი %)"
                        }

                    },
                    title: {
                        text: 'სისწორე როგორც სტიმულის სახის ფუნქცია',
                        align: 'center'
                    }
                };
                let secondChartseries= [
                    {
                        name: 'series-1',
                        data: [ Math.round(chart1data1.correct / resultsForChart.length*100),Math.round(chart2data2.correct / resultsForChart.length*100)]
                    }
                ];
                let thirdChartoptions = {
                    chart :{
                        id: "basic-bar"
                    },
                    xaxis: {
                        categories : degrees,
                        title : {
                            text:"ბრუნვის კუთხე(გრადუსი)"
                        }
                    },
                    yaxis:{
                        categories : thirdChartData,
                        min: 0,
                        title:{
                            text: "რეაქციის დრო(მილიწამი)"
                        }
                    },
                    title: {
                        text: 'რეაქციის დრო როგორც ბრუნვის კუთხის ფუნქცია',
                        align: 'center'
                    }
                };
                let thirdChartseries= [
                    {
                        name: 'series-1',
                        data: thirdChartData
                    }
                ];
                let fourthChartoptions = {
                    chart :{
                        id: "basic-bar"
                    },
                    xaxis: {
                        categories : degrees,
                        title: {
                            text : "ბრუნვის კუთხე(გრადუსი)"
                        }
                    },
                    yaxis : {
                        categories : fourthChartData,
                        min : 0,
                        title: {
                            text: "სისწორე"
                        }
                    },
                    title: {
                        text: 'სისწორე როგორც ბრუნვის კუთხის ფუნქცია',
                        align: 'center'
                    }
                }
                let fourthChartseries = [
                    {
                        name: 'series-1',
                        data: fourthChartData
                    }
                ]
                console.log(degCorrect);

                firstChart.options = firstChartoptions;
                firstChart.series = firstChartseries;
                secondChart.options = secondChartoptions;
                secondChart.series = secondChartseries;
                thirdCHart.options = thirdChartoptions;
                thirdCHart.series = thirdChartseries;
                fourthChart.options = fourthChartoptions;
                fourthChart.series = fourthChartseries;
                chartValues.push(firstChart,secondChart,thirdCHart,fourthChart);
                let arraysForBack=[
                    {
                        chartArray: {
                            x :['არასარკული', 'სარკული'],
                            y :[parseInt(Math.round(chart1data1.time / chart1data1.timeCouner)),parseInt(Math.round(chart2data2.time/chart2data2.timeCouner))]
                        }
                    },
                    {
                        chartArray : {
                           x : ['არასარკული', 'სარკული'],
                           y : [ Math.round(chart1data1.correct / resultsForChart.length*100),Math.round(chart2data2.correct / resultsForChart.length*100)]
                        }
                    },
                    {
                        chartArray: {
                            x : [...degrees],
                            y : [...thirdChartData]
                        }
                    },
                    {
                        chartArray : {
                           x : [...degrees],
                           y : [fourthChartData]
                        }
                    }
                ]
                let token = localStorage.getItem('token');
                for(let i=0; i<arraysForBack.length; i++){
                    console.log(arraysForBack[i].chartArray);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN':  token
                        },
                        url : `http://psychologytest.tsu.ge/backend/diagram/mentaldiagram`,
                        dataType: 'json',
                        type: 'POST',
                        data : {
                            'id' : id,
                            'diagramx' : arraysForBack[i].chartArray.x.toString(),
                            'diagramy' : arraysForBack[i].chartArray.y.toString()
                        },
                        success: (e)=>{
                            console.log(e)
                        },
                        error :(e)=>{
                            console.log(e)
                        }
            
                   })
    
                }


            }; break;
        }
        return chartValues;
    }

    render() {
        let tableData =JSON.parse(localStorage.getItem('chartData'));
        const resultsForChart = tableData.results;
        let id = resultsForChart[0].id;
        let results = this.returnChartValues(resultsForChart, tableData.name, id);

        let element = results.map((elem,i)=>{
            return  <ChartHolder key={i} options={elem.options} series={elem.series} type="line" width="800"/> 
        })


        // if(options && series){
        //     console.log(options, series);
        //     element = <Chart options={options} series={series} type="line" width="800"/>
        // }
        return (
            <div className="charts-holder">
                {element}
            </div>
        );
    }
}

export default Charts; 

