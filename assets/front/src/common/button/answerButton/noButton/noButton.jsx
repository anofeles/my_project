import React, { Component } from 'react';
import '../buttons.scss';
class NoButton extends Component {

    clickFunction = (type,startTime, realAnswer, automaticAnswer,timeOut,symbol, symbo2,quantity,total,arrangement) =>{
        if(symbol && symbo2){
            this.props.fillAnswer(type, startTime, realAnswer, automaticAnswer,timeOut,symbol,symbo2);
        }
        if(quantity && total && arrangement){
            this.props.fillAnswer(type, startTime, realAnswer, automaticAnswer,timeOut,quantity,total,arrangement);
        }

    }

    render() {
        const {startTime, realAnswer, automaticAnswer,timeOut,symbol, symbo2,quantity,total,arrangement} = {...this.props}
        return (
            <button 
                className="test-button button-No" 
                onClick = {()=>{this.clickFunction('No',startTime, realAnswer, false, timeOut, symbol, symbo2,quantity,total,arrangement)}}
            >არა</button>
        );
    }
}

export default NoButton;