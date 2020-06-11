import React, { Component } from 'react';
import {BrowserRouter, Route, Switch, Redirect} from 'react-router-dom';
import TestMode from  '../common/testMode/testMode.jsx';
import TestList from '../components/tests/testList/testList';
import Results from '../common/results/results';

import Test1 from  '../components/tests/test1/test1';
import Test2 from  '../components/tests/test2/test2';
import Test3 from  '../components/tests/test3/test3';
import Test4 from  '../components/tests/test4/test4';

import Test6 from  '../components/tests/test6/test6';
import Test7 from  '../components/tests/test7/test7';

import Questions1 from '../components/tests/test1/questions/questions';
import Questions2 from '../components/tests/test2/questions/questions';
import Questions3 from '../components/tests/test3/questions/questions';
import Questions4 from '../components/tests/test4/questions/questions';

import Questions6 from '../components/tests/test6/questions/questions';
import Questions7 from '../components/tests/test7/questions/questions';

import Charts from '../common/charts/charts.jsx';
import ResultsTable from '../common/resultsTable/resultsTable.jsx';

class Router extends Component {

    componentDidMount(){
        console.log(this.props);
    }
    render() {

        return (
            <Switch>
                <Route path={`${process.env.PUBLIC_URL}/`} component={
                    ()=>  <TestList showHide = {this.props.showHide} classNames = {this.props.classNames}/>
                    } exact/>
                <Route path={`${process.env.PUBLIC_URL}/result`} component={
                    ()=> <Results 
                        resultsForChart={this.props.resultsForChart}/>
                    } exact/>

                <Route path ={`${process.env.PUBLIC_URL}/charts`} component={Charts}/>
                <Route path ={`${process.env.PUBLIC_URL}/resultTable`} component={ResultsTable}/>

                <Route path={`${process.env.PUBLIC_URL}/Test1`} component={
                    ()=><Test1
                        findIfTrialNeeded = {this.props.findIfTrialNeeded}
                        updateTestPercent = {this.props.updateTestPercent}

                        />
                    } 
                    exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test1/modes`} component={
                    () => <TestMode 
                        realUrl={`Test1/modes/questions`}
                        demoUrl={`Test1/modes/demoquestions`}
                        istestTrialNeeded = {this.props.istest1TrialNeeded}
                        testPercent = {this.props.test1Percent}
                        />} 
                    exact
                />
                <Route path={`${process.env.PUBLIC_URL}/Test1/modes/questions`} component={
                    (props)=>
                    <Questions1 
                        {...props} 
                        test1Percent = {this.props.test1Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                    />} exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test1/modes/demoquestions`} component={
                    (props)=>
                    <Questions1 
                        {...props} 
                        test1Percent = {this.props.test1Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                    />} exact/>

                <Route path={`${process.env.PUBLIC_URL}/Test2`} component={
                    ()=> <Test2
                        findIfTrialNeeded = {this.props.findIfTrialNeeded}
                        updateTestPercent = {this.props.updateTestPercent}

                        />
                    } 
                    exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test2/modes`} component={
                    () => <TestMode 
                        realUrl={`Test2/modes/questions`}
                        demoUrl={`Test2/modes/demoquestions`}
                        istestTrialNeeded = {this.props.istest2TrialNeeded}
                        testPercent = {this.props.test2Percent}
                        />} 
                    exact
                />
                <Route path={`${process.env.PUBLIC_URL}/Test2/modes/questions`} component={
                    (props)=>
                    <Questions2 
                        {...props} 
                        test2Percent = {this.props.test2Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                    />} exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test2/modes/demoquestions`} component={
                    (props)=>
                    <Questions2 
                        {...props} 
                        test2Percent = {this.props.test2Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                    />} exact/>

                <Route path={`${process.env.PUBLIC_URL}/Test3`} component={
                    ()=>
                        <Test3
                        findIfTrialNeeded = {this.props.findIfTrialNeeded}
                        updateTestPercent = {this.props.updateTestPercent}

                        />
                    } 
                    exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test3/modes`} component={
                    () => <TestMode 
                        realUrl={`Test3/modes/questions`}
                        demoUrl={`Test3/modes/demoquestions`}
                        istestTrialNeeded = {this.props.istest3TrialNeeded}
                        testPercent = {this.props.test3Percent}
                        />} 
                    exact
                />
                <Route path={`${process.env.PUBLIC_URL}/Test3/modes/questions`} component={
                    (props)=>
                    <Questions3 
                        {...props} 
                        test3Percent = {this.props.test3Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                        />} exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test3/modes/demoquestions`} component={
                    (props)=>
                    <Questions3 
                        {...props} 
                        test3Percent = {this.props.test3Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                        />} exact/>

                <Route path={`${process.env.PUBLIC_URL}/Test4`} component={
                    ()=> 
                        <Test4
                        findIfTrialNeeded = {this.props.findIfTrialNeeded}
                        updateTestPercent = {this.props.updateTestPercent}

                        />
                    } 
                    exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test4/modes`} component={
                    () => <TestMode 
                        realUrl={`Test4/modes/questions`}
                        demoUrl={`Test4/modes/demoquestions`}
                        istestTrialNeeded = {this.props.istest4TrialNeeded}
                        testPercent = {this.props.test4Percent}
                        />} 
                    exact
                />
                <Route path={`${process.env.PUBLIC_URL}/Test4/modes/questions`} component={
                    (props)=>
                    <Questions4 
                        {...props}
                        test4Percent = {this.props.test4Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                        />} exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test4/modes/demoquestions`} component={
                    (props)=>
                    <Questions4 
                        {...props} 
                        test4Percent = {this.props.test4Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                        />} exact/>

                <Route path={`${process.env.PUBLIC_URL}/Test6`} component={
                    ()=>
                    <Test6
                    findIfTrialNeeded = {this.props.findIfTrialNeeded}
                    updateTestPercent = {this.props.updateTestPercent}

                    />
                    } 
                    exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test6/modes`} component={
                    () => <TestMode 
                        realUrl={`Test6/modes/questions`}
                        demoUrl={`Test6/modes/demoquestions`}
                        istestTrialNeeded = {this.props.istest6TrialNeeded}
                        testPercent = {this.props.test6Percent}
                        />} 
                    exact
                />
                <Route path={`${process.env.PUBLIC_URL}/Test6/modes/questions`} component={
                    (props)=>
                    <Questions6 
                        {...props} 
                        test6Percent = {this.props.test6Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                        />} exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test6/modes/demoquestions`} component={
                    (props)=>
                    <Questions6
                        {...props} 
                        test6Percent = {this.props.test6Percent}
                        updateResultsForChart = {this.props.updateResultsForChart}
                        />} exact/>

                <Route path={`${process.env.PUBLIC_URL}/Test7`} component={
                    ()=><Test7
                        findIfTrialNeeded = {this.props.findIfTrialNeeded}
                        updateTestPercent = {this.props.updateTestPercent}
                        />
                    
                    } 
                    exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test7/modes`} component={
                    () => <TestMode 
                        realUrl={`Test7/modes/questions`}
                        demoUrl={`Test7/modes/demoquestions`}
                        istestTrialNeeded = {this.props.istest7TrialNeeded}
                        testPercent = {this.props.test7Percent}
                        />} 
                    exact
                />
                <Route path={`${process.env.PUBLIC_URL}/Test7/modes/questions`} component={
                    (props)=><Questions7 
                    {...props} 
                    test7Percent = {this.props.test7Percent}
                    updateResultsForChart = {this.props.updateResultsForChart}
                    />} exact/>
                <Route path={`${process.env.PUBLIC_URL}/Test7/modes/demoquestions`} component={
                    (props)=><Questions7
                    {...props} 
                    test7Percent = {this.props.test7Percent}
                    updateResultsForChart = {this.props.updateResultsForChart}
                    />
                } exact/>

            </Switch>
        );
    }
}

export default Router;