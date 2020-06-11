import React, { Component } from 'react';
import StartButton from '../button/startButton/StartButton';
import './testDescription.css';

class TestDescription extends Component {
    render() {
        const {title, description, url, testName} = {...this.props}
        return (
        <section className="content-holder test-detailed">
            <div className="test-description">
                <h1 className="test-name">{title}</h1>
                <div className="test-desc-holder">
                    <p className="test-description-text">
                        {description}
                    </p>
                </div>
                <StartButton
                    url = {url} 
                    findIfTrialNeeded = {this.props.findIfTrialNeeded}
                    updateTestPercent = {this.props.updateTestPercent}
                    isTrialNeeded = {this.props.isTrialNeeded}
                    percent = {this.props.percent}
                    testName = {testName}
                    testPercent = {this.props.testPercent}
                    />
            </div>
        </section>
        );
    }
}

export default TestDescription;