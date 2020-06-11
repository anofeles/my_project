import React, { Component } from 'react';
import YesButton from '../../../../../common/button/answerButton/yesButton/yesButton';
import NoButton from '../../../../../common/button/answerButton/noButton/noButton';
import './question.scss';
class Question extends Component {

    state = {
        className : 'test-to-show',
        attributes:{},
        automaticAnswer : false
    }

    componentDidMount(){
        // const userAnswers = this.props.userAnswers;
        const timeOut = this.props.timeOut;
        const timetoShow = this.props.timetoShow;
        let attributes = {};
        attributes.correct = this.props.correct
        setTimeout(()=>{
            let className = this.state.className;
            className += ' hidden';
            this.setState({className});
        },timetoShow);

        let automaticAnswer = this.state.automaticAnswer;
        setTimeout(()=>{
            automaticAnswer = true;
            this.setState({automaticAnswer});
        },timeOut);

    }

    updateAutomatic = () =>{
        let automaticAnswer = true;
        this.setState({automaticAnswer});
    }

    render() {

        let startTime = new Date();
        let timeOut = this.props.timeOut;
        const isCorrect = this.props.correct === "true" ? true: false;
        const {symbol, symbo2} = {...this.props}
        return (
            <React.Fragment>
                <div className={this.state.className} >
                    <p className="symbol">{symbol}</p>
                    <p className="symbol">{symbo2}</p>
                </div>
                <div className="buttons">
                    <YesButton
                        fillAnswer = {this.props.fillAnswer}
                        startTime = {startTime}
                        realAnswer = {isCorrect}
                        timeOut = {timeOut}
                        automaticAnswer = {this.state.automaticAnswer}
                        symbol = {symbol}
                        symbo2 = {symbo2}
                    />
                    <NoButton                             
                        fillAnswer = {this.props.fillAnswer}
                        realAnswer = {isCorrect}         
                        timeOut = {timeOut}
                        startTime = {startTime}
                        automaticAnswer = {this.state.automaticAnswer}
                        symbol = {symbol}
                        symbo2 = {symbo2}

                        />
                </div>
            </React.Fragment>
            
        );
    }
}

export default Question;