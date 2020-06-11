import React, { Component } from 'react';
import {NavLink} from 'react-router-dom';
import {Cookies} from 'react-cookie';
import './testMode.css';

class TestMode extends Component {

    state={
        trialClassName : 'mode-nav',
        realClassName : 'mode-nav'
    }

    componentDidMount(){
        let cookie = new Cookies();
        let istestTrialNeeded = null;
        if(this.props.istestTrialNeeded === null){
            istestTrialNeeded = cookie.get('trial');
        }
        else{
            istestTrialNeeded = this.props.istestTrialNeeded;
        }
        console.log(istestTrialNeeded);
        let trialClassName = this.state.trialClassName;
        let realClassName = this.state.realClassName;
        let testPercent = this.props.testPercent;
        let trialPercent = parseInt(cookie.get('trialPercent'));
        if(!istestTrialNeeded){
            trialClassName = 'mode-nav disabled';
        }
        else{
            trialClassName = 'mode-nav';
        }


        if(testPercent > 0 || testPercent!==null){
            realClassName  ='mode-nav disabled';
        }
        if(trialPercent >= testPercent || (testPercent <=0 || testPercent === null)){
            realClassName = 'mode-nav';
        }
        this.setState({trialClassName, realClassName});
    }

    render() {
        const trialClassName = this.state.trialClassName;
        const realClassName = this.state.realClassName;
        return (
            <section className="testMode">
                <div className="modes">
                    <div className="demo-mode mode">
                        <div className="modes-hover"></div>
                        <NavLink className={trialClassName} to={`${process.env.PUBLIC_URL}/${this.props.demoUrl}`}></NavLink>
                        <span className="mode-text">საცდელი ვერსია</span>
                    </div>
                    <div className="real-mode mode">
                        <div className="modes-hover"></div>
                        <NavLink className={realClassName} to={`${process.env.PUBLIC_URL}/${this.props.realUrl}`}></NavLink>
                        <span className="mode-text">რეალური ტესტი</span>
                    </div>
                </div>
            </section>
        );
    }
}

export default TestMode;