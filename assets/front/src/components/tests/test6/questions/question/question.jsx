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

    updateAutomatic = () =>{
        let automaticAnswer = true;
        this.setState({automaticAnswer});
    }


    render() {
        const {quest,timeOut} = {...this.props}
        console.log(this.props.quest);
        let attributes ={};
        attributes.pirveliaso = quest.question.pirveliaso;
        attributes.pirvelgilak = quest.question.pirvelgilak;
        attributes.meoreiaso = quest.question.meoreiaso;
        attributes.meoregilak = quest.question.meoregilak;
        attributes.mesameaso = quest.question.mesameaso;
        attributes.mesamegilak = quest.question.mesamegilak;
        attributes.meotxeaso = quest.question.meotxeaso;
        attributes.meotxegilak = quest.question.meotxegilak;
        attributes.type = quest.type;
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
            </div>
        );
    }
}

export default Question;