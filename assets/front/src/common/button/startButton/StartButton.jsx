import React, { Component } from 'react';
import './startButton.css';
import {NavLink} from 'react-router-dom';

class StartButton extends Component {

    clickFunction = (testName, isTrialNeeded,testPercent, percent)=>{
        this.props.findIfTrialNeeded(testName, isTrialNeeded);
        this.props.updateTestPercent(testPercent, percent);

    }

    render() {
        const {url, findIfTrialNeeded, isTrialNeeded, testName, percent,testPercent} = {...this.props};
        return (
        <button className="start-test button" onClick={()=>{this.clickFunction(testName, isTrialNeeded,testPercent,percent)}}>
            <NavLink className="navLink" to={`${process.env.PUBLIC_URL}/${this.props.url}`}></NavLink>
            <span className="text">დაწყება</span>
        </button>
);
    }
}

export default StartButton;