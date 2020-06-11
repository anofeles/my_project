import React, { Component } from 'react';
import Element from './element/element';
import './question.css';
class Question extends Component {

    state = {
        className : 'test-to-show',
        automaticAnswer : false,
        defineColors:[
            {
                key: 'w',
                color: '#ff0000',
                className: 'red'
            },
            {
                key: 'y',
                color: '#ffff00',
                className: 'yellow'

            },
            {
                key: 'm',
                color: '#009933',
                className: 'green'

            },
            {
                key: 'l',
                color: '#0000ff',
                className: 'blue'
            }
        ]        
    }

    componentDidMount(){
        // const userAnswers = this.props.userAnswers;

        const timeOut = this.props.timeOut;
        const timetoShow = this.props.timetoShow;
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
        const {color, value, keyBoardKey, timeOut} = {...this.props}

        const defineColors = this.state.defineColors;
        let attributes ={};

        attributes.color = color;
        attributes.value = value;
        attributes.keyBoardKey = keyBoardKey;
        defineColors.map(elem=>{
            if(elem.color == color){
                attributes.className = elem.className
            }
        })
        let startTime = new Date();
        const automaticAnswer = this.state.automaticAnswer;
        return (
            <div className={this.state.className}>
                <Element
                    attributes={attributes}
                    startTime = {startTime}
                    timeOut = {timeOut}
                    automaticAnswer = {automaticAnswer}
                    fillAnswer = {this.props.fillAnswer}
                    updateEventListenerStatus = {this.props.updateEventListenerStatus}
                    isEventListenerNeeded = {this.props.isEventListenerNeeded}
                />
            </div>
        );
    }
}

export default Question;