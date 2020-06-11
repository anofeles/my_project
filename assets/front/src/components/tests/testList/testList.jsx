import React, { Component } from 'react';
import TestListItem from './testListItem/testListItem';
import testList from './tests.js';
import axios from 'axios';


class TestList extends Component {
    state={
        testList : []
    }

    componentDidMount(){
        this.setState({testList});
    }

    render() {
        let {classNames, showHide} = {...this.props}
        const TestList = this.state.testList.map(test => {
            return (
                <TestListItem
                    key = {test.id}
                    name = {test.testName}
                    url = {test.url}
                    classNames = {classNames}
                    showHide = {showHide}
                />
            );
        });

        return (
            <React.Fragment>
                <section className="choose-test">
                    <div className="tests">
                        <ul className="tests-ul">
                            {TestList}
                        </ul>
                    </div>
                </section>
            </React.Fragment>
        );
    }
}

export default TestList;
