import React, { Component } from 'react';
import {BrowserRouter} from 'react-router-dom';
import Router from '../router/router';
import {Cookies} from 'react-cookie';
import AvatarImage from '../common/avatarImage/avatarImage';
import "bootstrap/dist/css/bootstrap.css";
class MainApp extends Component {
    state={
        className : 'sideNav-holder',
        instClassName: 'instructions',
        classNames : 'hidden',
        hidden : true,

        resultsForChart : null,

        istest1TrialNeeded: null,
        test1Trial : null,
        test1Percent : null,

        istest2TrialNeeded: null,
        test2Trial : null,
        test2Percent : null,

        istest3TrialNeeded: null,
        test3Trial : null,
        test3Percent : null,

        istest4TrialNeeded: null,
        test4Trial : null,
        test4Percent : null,

        istest5TrialNeeded: null,
        test5Trial : null,
        test5Percent : null,

        istest6TrialNeeded: null,
        test6Trial : null,
        test6Percent : null,

        istest7TrialNeeded: null,
        test7Trial : null,
        test7Percent : null
    }
    
    showHide = (className) => {
        let classNames = className;
        this.setState({classNames});
    }

    findIfTrialNeeded = (key,value)=>{
        this.setState({[key]:value});
        let cookie = new Cookies();
        cookie.set('trial', value, {path:'/'});
    }

    openSideNav=(clicked)=>{
        let className = this.state.className;
        if(!clicked){
            className='sideNav-holder open';
            this.setState({className});
        }
        else{
            className='sideNav-holder';
            this.setState({className});
        }
    }

    openInstuctions = (clicked) =>{
        let instClassName = this.state.instClassName;
        if(!clicked){
            instClassName = "instructions open";
            this.setState({instClassName});
        }
        else{
            instClassName = "instructions";
            this.setState({instClassName});
        }
    }

    updateTestPercent = (key,value) =>{
        this.setState({[key]: value});
        let cookie = new Cookies();
        cookie.set('percent', value, {path:'/'});
    }

    updateResultsForChart =(results, testsName)=>{
        let resultsForChart = {};
        resultsForChart.results = results;
        resultsForChart.name = testsName;
        this.setState({resultsForChart});
        localStorage.setItem('chartData',JSON.stringify(resultsForChart));
        // let cookies = new Cookies();
        // cookies.set('chartData', resultsForChart, {path : '/'});
    }



    componentDidMount(){
        window.onbeforeunload = ()=>{ return 'dont leave me'};
    }

    componentWillUnmount(){

    }
    render() {

        let {className, instClassName, resultsForChart} = {...this.state}
        let classNames = this.state.classNames;
        let {istest1TrialNeeded, istest2TrialNeeded, istest3TrialNeeded, istest4TrialNeeded, istest5TrialNeeded, istest6TrialNeeded, istest7TrialNeeded} = {...this.state};
        let {test1Percent,test2Percent,test3Percent,test4Percent,test5Percent,test6Percent,test7Percent} = {...this.state};
        return (
            <React.Fragment>
                <BrowserRouter basename="/">
                    {/* <Burger openNavigation= {this.openSideNav} /> */}
                    <AvatarImage/>
                    {/* <BurgerArrow openInstuctions= {this.openInstuctions} /> */}
                    {/* <SideNav className={className}/> */}
                    {/* <Instuctions className={instClassName}/> */}
                    <Router
                        findIfTrialNeeded = {this.findIfTrialNeeded}
                        updateTestPercent = {this.updateTestPercent}
                        istest1TrialNeeded = {istest1TrialNeeded}
                        istest2TrialNeeded = {istest2TrialNeeded}
                        istest3TrialNeeded = {istest3TrialNeeded}
                        istest4TrialNeeded = {istest4TrialNeeded}
                        istest5TrialNeeded = {istest5TrialNeeded}
                        istest6TrialNeeded = {istest6TrialNeeded}
                        istest7TrialNeeded = {istest7TrialNeeded}
                        test1Percent = {test1Percent}
                        test2Percent = {test2Percent}
                        test3Percent = {test3Percent}
                        test4Percent = {test4Percent}
                        test5Percent = {test5Percent}
                        test6Percent = {test6Percent}
                        test7Percent = {test7Percent}
                        resultsForChart = {resultsForChart}
                        updateResultsForChart = {this.updateResultsForChart}
                        showHide = {this.showHide}
                        classNames = {classNames}
                        />
                </BrowserRouter>
            </React.Fragment>
          );
    }
}

export default MainApp;