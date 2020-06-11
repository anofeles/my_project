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
        // setTimeout(()=>{
        //     let elemClassName = this.state.elemClassName;
        //     elemClassName += ' hidden';
        //     this.setState({elemClassName});
        // },timetoShow);

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
        const {gradusi, revers, testaso, timeOut} = {...this.props}
        const realAnswer = revers === 1 ? true : false;
        let attributes ={};
        attributes.gradusi = gradusi;
        attributes.revers = revers;
        attributes.testaso = testaso;
        attributes.realAnswer = realAnswer;
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
                <div className="buttons">                
                    <button className="answer-buttons" onClick={()=>{this.props.fillAnswer(false,startTime,realAnswer,automaticAnswer,timeOut,testaso, gradusi, revers)}}>არასარკული</button>
                    <button className="answer-buttons" onClick={()=>{this.props.fillAnswer(true,startTime,realAnswer,automaticAnswer,timeOut,testaso, gradusi, revers)}}>სარკული</button>
                </div>
            </div>
        );
    }
}

export default Question;