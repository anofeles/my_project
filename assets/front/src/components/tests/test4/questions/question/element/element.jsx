import React, { Component } from 'react';
class Element extends Component {


    componentDidMount(){
        document.addEventListener('keypress',this.handleClick)
    }

    returnElementByType=(type, firstLetter, secondLetter, spacing)=>{
        let space = null;
        switch(spacing){
            case '3' : space = 'margin3'; break;
            case '2' : space = 'margin2'; break;
            case '1' : space = 'margin1'; break;
        }
        switch(type){
            case '1' : return (
                <p className={`letters-holder ${space}`}>
                    <span className="left-letter">{secondLetter}</span>
                    <span className="center-letter">{firstLetter}</span>
                </p>
            );
            case '2' : return(
                <p className={`letters-holder ${space}`}>
                    <span className="left-letter">{firstLetter}</span>
                    <span className="center-letter">{secondLetter}</span>
                </p>
            );
            case '3' : return(
                <p className={`letters-holder ${space}`}>
                    <span className="left-letter">{secondLetter}</span>
                    <span className="center-letter">{firstLetter}</span>
                    <span className="right-letter">{secondLetter}</span>
                </p>
            );
            case '4' : return(
                <p className="letters-holder">
                    <span className="left-letter">{firstLetter}</span>
                    <span className="center-letter">{secondLetter}</span>
                    <span className="right-letter">{firstLetter}</span>
                </p>
            )
        }
    }

    handleClick = (event)=>{
        const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
        this.props.fillAnswer(event.key ? event.key : '', startTime, attributes.realAnswer, automaticAnswer, 
        timeOut, attributes.firstLetter, attributes.secondLetter, attributes.spacing, attributes.type);
        document.removeEventListener('keypress', this.handleClick);
    }

    render() {
        const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
        const element = this.returnElementByType(attributes.type, attributes.firstLetter, attributes.secondLetter, attributes.spacing);
        if(automaticAnswer ){
            this.props.fillAnswer('', startTime, attributes.realAnswer, automaticAnswer, timeOut,
            attributes.firstLetter, attributes.secondLetter, attributes.spacing, attributes.type);
            document.removeEventListener('keypress', this.handleClick);
        }

        return (
            <React.Fragment>
                {element}
            {/* <span className={attributes.className}>{attributes.value}</span> */}
            </React.Fragment>
        );
    }
}

export default Element;