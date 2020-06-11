import React, { Component } from 'react';
class Element extends Component {


    componentDidMount(){
        document.addEventListener('keypress',this.handleClick)
    }


    handleClick = (event)=>{
        const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
        this.props.fillAnswer(event.key ? event.key : '', startTime, attributes.keyBoardKey, automaticAnswer, timeOut, attributes.text, attributes.color);
        document.removeEventListener('keypress', this.handleClick);
    }

    render() {
        const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
        if(automaticAnswer ){
            this.props.fillAnswer('', startTime, attributes.keyBoardKey, automaticAnswer, timeOut, attributes.text, attributes.color);
            document.removeEventListener('keypress', this.handleClick);
        }


        return (
            <span className={attributes.className}>{attributes.value}</span>
        );
    }
}

export default Element;