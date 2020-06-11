import React, { Component } from 'react';
import './element.css';
class Element extends Component {


    // componentDidMount(){
    //     document.addEventListener('keypress',this.handleClick)
    // }

    returnElementByType=(degree, reversed, char)=>{
        let className = "character transformed";
        // reversed === 1 ? className += ' reversed' : className +='';
        const deg = reversed === 1 ? 180 : 0;
        const elemStyle = {
            WebkitTransform: 'rotate('+degree+'deg) rotateY('+deg+'deg)',
            MozTransform: 'rotate('+degree+'deg) rotateY('+deg+'deg)',
            msTransform: 'rotate('+degree+'deg) rotateY('+deg+'deg)',
            OTransform: 'rotate('+degree+'deg) rotateY('+deg+'deg)',
            transform: 'rotate('+degree+'deg) rotateY('+deg+'deg)',
        }
        let element =
            ( 
                <div className="element">
                    <p className="real-char character">{char}</p>
                    <p className={className} style={elemStyle}>{char}</p>
                </div>
            );
        return element;
    }

    // handleClick = (event)=>{
    //     const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
    //     console.log('click',attributes.revers);
    //     this.props.fillAnswer(event.key ? event.key : '', startTime, attributes.realAnswer, automaticAnswer, timeOut, attributes.testaso, attributes.gradusi, attributes.revers);
    //     document.removeEventListener('keypress', this.handleClick);
    // }

    render() {
        const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
        // console.log('render',attributes.revers);
        const element = this.returnElementByType(attributes.gradusi, attributes.revers, attributes.testaso);
        if(automaticAnswer ){
            this.props.fillAnswer(null, startTime, attributes.realAnswer, automaticAnswer, timeOut,attributes.testaso, attributes.gradusi, attributes.revers);
            // document.removeEventListener('keypress', this.handleClick);
        }

        return (
            <React.Fragment>
                {element}
            </React.Fragment>
        );
    }
}

export default Element;