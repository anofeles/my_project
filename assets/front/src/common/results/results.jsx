import React, { Component } from 'react';
import './charts.scss'
import {NavLink} from 'react-router-dom';
import {Cookies} from 'react-cookie';



class Results extends Component {
    state={
        chartValues : {},
        dataSet:[]
    }

    // retunExcelFile = (userAnswers, testName) => {
    //     let excelFile = null;
    //     if(testName === 'Test1'){
    //         let data = userAnswers;
    //         data.map((elem,i) => {
    //             elem.number = i+1;
    //             elem.correct= elem.correct ? 1 : 0;

    //         });
    //         excelFile = (<ExcelFile>
    //                         <ExcelSheet data={data} name="შედეგები">
    //                             <ExcelColumn label="ცდის ნომერი" value="number"/>
    //                             <ExcelColumn label="სიგნალის ინტენსივობა" value="correct"/>
    //                             <ExcelColumn label="სიგნალის არსებობა" value="correct"/>
    //                             <ExcelColumn label="სისწორე" value="isUserAnswerCorrect"/>
    //                         </ExcelSheet>
    //                     </ExcelFile>
    //                 );

    //     }
    //     return excelFile;

    // }
    
    setResultData = () =>{
        let data = this.props.resultsForChart;
        let d = new Date();
        d.setTime(d.getTime() + (100*60*1000));
        localStorage.setItem('chartData',JSON.stringify(data));
        let cookies = new Cookies();
        cookies.set('chartData', data, {path:'/'});
    }
    // changeType=(event)=>{
    //     let chartType = event;
    //     this.setState({chartType});
    // }
    render() {
        return (
            <React.Fragment>
                <div className="result-navigation">
                    <div className="modes">
                        <div className="mode" onClick={this.setResultData}>
                            <div className="modes-hover"></div>
                            <NavLink to={`${process.env.PUBLIC_URL}/charts`} ></NavLink>
                            <span className="mode-text">შედეგები გრაფიკულად</span>
                        </div>
                        <div className="mode" onClick={this.setResultData}>
                            <div className="modes-hover"></div>
                            <NavLink to={`${process.env.PUBLIC_URL}/resultTable`} ></NavLink>
                            <span className="mode-text">შედეგები ცხრილის სახით</span>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default Results;