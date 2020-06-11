import React, { Component } from 'react';
import Element from './element/element';
import './question.css';
class Question extends Component {

    state = {
        className : 'test-to-show',
        automaticAnswer : false,
        elemClassName: 'letter-container'
    }

    componentDidMount(){
        // const userAnswers = this.props.userAnswers;

        const timeOut = this.props.timeOut;
        const timetoShow = this.props.timetoShow;
        console.log(timetoShow);
        setTimeout(()=>{
            let elemClassName = this.state.elemClassName;
            elemClassName += ' hidden';
            this.setState({elemClassName});
        },timetoShow);

        let automaticAnswer = this.state.automaticAnswer;
        setTimeout(()=>{
            automaticAnswer = true;
            this.setState({automaticAnswer});
        },timeOut);
    }

    returnRealAnswer(type, firstLetter, secondLetter){
        switch(type){
            case '1' : return firstLetter;
            case '2' : return secondLetter;
            case '3' : return firstLetter;
            case '4' : return secondLetter;
        }
    }

    updateAutomatic = () =>{
        let automaticAnswer = true;
        this.setState({automaticAnswer});
    }


    render() {
        const {type, spacing, firstLetter, secondLetter, timeOut} = {...this.props}
        let attributes ={};
        attributes.type = type;
        attributes.spacing = spacing;
        attributes.firstLetter = firstLetter;
        attributes.secondLetter = secondLetter;
        attributes.realAnswer = this.returnRealAnswer(type,firstLetter, secondLetter);
        let startTime = new Date();
        const automaticAnswer = this.state.automaticAnswer;
        return (
            <div className="test-to-show">
            <div className={this.state.elemClassName}>
            <Element
                    attributes={attributes}
                    startTime = {startTime}
                    timeOut = {timeOut}
                    automaticAnswer = {automaticAnswer}
                    fillAnswer = {this.props.fillAnswer}
                />

            </div>
            <span className="plus-sign">+</span>
            </div>
        );
    }
}

export default Question;