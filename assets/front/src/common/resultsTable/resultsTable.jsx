import React, { Component } from 'react';
import TableHead from './tableHead/tableHead';
import TableBody from './tableBody/tableBody';
import {Cookies} from 'react-cookie';
import ReactExport from "react-export-excel";
import './resultsTable.css';
const ExcelFile = ReactExport.ExcelFile;
const ExcelSheet = ReactExport.ExcelFile.ExcelSheet;
const ExcelColumn = ReactExport.ExcelFile.ExcelColumn;

class ResultsTable extends Component {
    state={
        results : null,
        name : null
    }

    retunExcelFile = (userAnswers, testName) => {
        let excelFile = null;
        if(testName === 'Test7'){
            let data = userAnswers;
            data.map((elem,i) => {
                elem.number = i+1;
                elem.correct= elem.isUserAnswerCorrect ? 1 : 0;
            });
            console.log(data);
            excelFile = (<ExcelFile>
                            <ExcelSheet data={data} name="შედეგები">
                                <ExcelColumn label="ცდის ნომერი" value="number"/>
                                <ExcelColumn label="ბრუნვის კუთხე" value="degree"/>
                                <ExcelColumn label="სტიმულის სახე" value="reverse"/>
                                <ExcelColumn label="რეაქციის დრო" value="answerTime"/>
                                <ExcelColumn label="სისწორე" value="correct"/>
                            </ExcelSheet>
                        </ExcelFile>
                    );
    
        }
        return excelFile;
    
    }

    componentDidMount(){
        let cookie = new Cookies();
        let tableData =JSON.parse(localStorage.getItem('chartData'));
        const resultsForChart = tableData.results;
        let chartValues = {};
        let xAxis = [];
        let yAxis = [];
        resultsForChart.map((elem,i)=>{
            xAxis.push(i+1);
            yAxis.push(elem.answerTime);
        });
        chartValues.x = xAxis;
        chartValues.y = yAxis;
        this.setState({chartValues});
    }

    returnTabelHead = (name) =>{
        let tableHead = null;
        switch(name){
            case 'Test1' : tableHead = [
                {
                    id : '0',
                    name : 'ცდის ნომერი',
                },
                {
                    id : '1',
                    name : 'სიგნალის ალბათობა',
                },
                {
                    id: '2',
                    name: 'სიგნალის ინტენსივობა'
                },
                {
                    id: '3',
                    name : 'ხმაურის ინტესივობა'
                },
                {
                    id : '4',
                    name : 'სიგანლის არსებობა',
                },                
                {
                    id : '5',
                    name : 'სისწორე',
                },
                {
                    id : '6',
                    name : 'სწორი ამოცნობა',
                },
                {
                    id : '7',
                    name : 'ცრუ განგაში',
                }

            ]; break;
            case 'Test2' : tableHead = [
                {
                    id : '0',
                    name : 'ცდის ნომერი',
                },
                {
                    id : '1',
                    name : 'მსგავსების ტიპი',
                },
                {
                    id : '2',
                    name : 'სისწორე',
                },                
                {
                    id : '3',
                    name : 'რეაქციის დრო',
                }
            ]; break;
            case 'Test3' : tableHead = [
                {
                    id : '0',
                    name : 'ცდის ნომერი',
                },
                {
                    id : '1',
                    name : 'სიგნალის ალბათობა',
                },
                {
                    id : '2',
                    name : 'სიგანლის არსებობა',
                },                
                {
                    id : '3',
                    name : 'სისწორე',
                },
                {
                    id : '4',
                    name : 'სწორი ამოცნობა',
                },
                {
                    id : '5',
                    name : 'ცრუ განგაში',
                }
            ]; break;
            case 'Test4' : tableHead = [
                {
                    id : '0',
                    name : 'ცდის ნომერი',
                },
                {
                    id : '1',
                    name : 'სამიზნე სტიმული',
                },
                {
                    id : '2',
                    name : 'დისტრაქტორი სტიმული',
                },                
                {
                    id : '3',
                    name : 'სტიმულები',
                },
                {
                    id : '4',
                    name : 'დისტრაქტორი სტიმულის ტიპი',
                },
                {
                    id : '5',
                    name : 'დაშორება',
                },
                {
                    id : '6',
                    name: 'რეაქციის დრო'
                },
                {
                    id: '7',
                    name: 'სისწორე'
                }
            ]; break;
            case 'Test5' : tableHead = [
                {
                    id : '0',
                    name : 'ცდის ნომერი',
                },
                {
                    id : '1',
                    name : 'სიგნალის ალბათობა',
                },
                {
                    id : '2',
                    name : 'სიგანლის არსებობა',
                },                
                {
                    id : '3',
                    name : 'სისწორე',
                },
                {
                    id : '4',
                    name : 'სწორი ამოცნობა',
                },
                {
                    id : '5',
                    name : 'ცრუ განგაში',
                }
            ]; break;
            case 'Test6' : tableHead = [
                {
                    id : '0',
                    name : 'ცდის ნომერი',
                },
                {
                    id : '1',
                    name : 'სტიმული',
                },
                {
                    id : '2',
                    name : 'ალტერნატივათა რაოდენობა',
                },                
                {
                    id : '3',
                    name : 'პასუხების სისწორე',
                },
                {
                    id : '4',
                    name : 'რეაქციის დრო',
                }
            ]; break;
            case 'Test7' : tableHead = [
                {
                    id : '0',
                    name : 'ცდის ნომერი',
                },
                {
                    id : '1',
                    name : 'ბრუნვის კუთხე',
                },
                {
                    id : '2',
                    name : 'სტიმულის სახე',
                },                
                {
                    id : '3',
                    name : 'რეაქციის დრო',
                },
                {
                    id : '4',
                    name : 'სისწორე',
                }
            ]; break;
        }
        return tableHead;
    }

    render() {
        // let cookies = new Cookies();
        // let tableData = cookies.get('chartData');
        let tableData =JSON.parse(localStorage.getItem('chartData'));
        let name = tableData.name;
        let results = tableData.results;
        let excelFile = this.retunExcelFile(results,name);
        const tableHead = this.returnTabelHead(name);
        return (
            <React.Fragment>
                <section className="results-table">
                    <table className="table table-bordered table-hover">
                        <TableHead tableHead = {tableHead}/>
                        <TableBody tableBody = {results} name={name}/>
                    </table>
                    {excelFile}
                </section>
            </React.Fragment>
        );
    }
}

export default ResultsTable;