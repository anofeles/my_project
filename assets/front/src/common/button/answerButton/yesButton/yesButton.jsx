import React, { Component } from 'react';
import '../buttons.scss';
class YesButton extends Component {


    clickFunction = (type,startTime, realAnswer, automaticAnswer,timeOut, symbol, symbo2,quantity,total,arrangement) =>{
        if(symbol && symbo2){
            this.props.fillAnswer(type, startTime, realAnswer, automaticAnswer, timeOut, symbol, symbo2);
        }
        if(quantity && total && arrangement){
            this.props.fillAnswer(type, startTime, realAnswer, automaticAnswer, timeOut,quantity,total,arrangement);
        }

    }

    render() {
        const {startTime, realAnswer, automaticAnswer, timeOut,symbol,symbo2,quantity,total,arrangement} = {...this.props}

        if(automaticAnswer){
            this.clickFunction('No Answer', startTime, realAnswer,automaticAnswer,timeOut ,symbol, symbo2,quantity,total,arrangement)
        }

        return (
            <button 
                className="test-button button-Yes"
                onClick = {()=>{this.clickFunction('Yes',startTime, realAnswer, false, timeOut, symbol, symbo2,quantity,total,arrangement)}}
            >კი</button>
        );
    }
}

export default YesButton;