import React, { Component } from 'react';
class Element extends Component {


    componentDidMount(){
        document.addEventListener('keypress',this.handleClick)
    }

    returnFirstElement=(pirveliaso,pirvelgilak,meoreiaso,meoregilak)=>{
        let elementToShow = {};
        let number = Math.floor(Math.random()*2);
        if(number === 0){
            elementToShow.char = pirveliaso;
            elementToShow.realAnswer = pirvelgilak;
        }
        else{
            elementToShow.char = meoreiaso;
            elementToShow.realAnswer = meoregilak;
        }
        return elementToShow;
    };

    returnSecondElement = (mesameaso,mesamegilak, meotxeaso, meotxegilak)=>{
        let elementToShow = {};
        let number = Math.floor(Math.random()*2);
        if(number === 0){
            elementToShow.char = mesameaso;
            elementToShow.realAnswer = mesamegilak;
        }
        else{
            elementToShow.char = meotxeaso;
            elementToShow.realAnswer = meotxegilak;
        }
        return elementToShow;

    };

    returnThirdElement = (pirveliaso,pirvelgilak,meoreiaso,meoregilak,mesameaso,mesamegilak,meotxeaso,meotxegilak)=>{
        let elementToShow = {};
        let number = Math.floor(Math.random()*4);
        if(number === 0){
            elementToShow.char = pirveliaso;
            elementToShow.realAnswer = pirvelgilak;
        }
        if(number === 1){
            elementToShow.char = meoreiaso;
            elementToShow.realAnswer = meoregilak;
        }

        if(number === 2){
            elementToShow.char = mesameaso;
            elementToShow.realAnswer = mesamegilak;
        }
        if(number === 3){
            elementToShow.char = meotxeaso;
            elementToShow.realAnswer = meotxegilak;
        }
        return elementToShow;
    };

    returnElementByType=(attributes)=>{
        const {type,pirveliaso,pirvelgilak,meoreiaso,meoregilak,mesameaso,mesamegilak,meotxeaso,meotxegilak} = {...attributes}
        switch(type){
            case 'type1' : return(this.returnFirstElement(pirveliaso,pirvelgilak,meoreiaso,meoregilak));
            case 'type2' : return(this.returnSecondElement(mesameaso,mesamegilak, meotxeaso, meotxegilak));
            case 'type3' : return(this.returnThirdElement(pirveliaso,pirvelgilak,meoreiaso,meoregilak,mesameaso,mesamegilak,meotxeaso,meotxegilak));
        }
    }

    // returnElementByType=(type, firstLetter, secondLetter, spacing)=>{
    //     let space = null;
    //     switch(spacing){
    //         case '3' : space = 'margin3'; break;
    //         case '2' : space = 'margin2'; break;
    //         case '1' : space = 'margin1'; break;
    //     }
    //     switch(type){
    //         case '1' : return (
    //             <p className={`letters-holder ${space}`}>
    //                 <span className="left-letter">{secondLetter}</span>
    //                 <span className="center-letter">{firstLetter}</span>
    //             </p>
    //         );
    //         case '2' : return(
    //             <p className={`letters-holder ${space}`}>
    //                 <span className="left-letter">{firstLetter}</span>
    //                 <span className="center-letter">{secondLetter}</span>
    //             </p>
    //         );
    //         case '3' : return(
    //             <p className={`letters-holder ${space}`}>
    //                 <span className="left-letter">{secondLetter}</span>
    //                 <span className="center-letter">{firstLetter}</span>
    //                 <span className="right-letter">{secondLetter}</span>
    //             </p>
    //         );
    //         case '4' : return(
    //             <p className="letters-holder">
    //                 <span className="left-letter">{firstLetter}</span>
    //                 <span className="center-letter">{secondLetter}</span>
    //                 <span className="right-letter">{firstLetter}</span>
    //             </p>
    //         )
    //     }
    // }

    handleClick = (event)=>{
        const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
        const element = this.returnElementByType(attributes);
        this.props.fillAnswer(event.key ? event.key : '', startTime, element.realAnswer, automaticAnswer, timeOut, 
        attributes.pirveliaso, attributes.pirvelgilak, attributes.meoreiaso, attributes.meoregilak, attributes.mesameaso, attributes.mesamegilak, attributes.meotxeaso, attributes.meotxegilak);
        document.removeEventListener('keypress', this.handleClick);
    }

    render() {
        const {attributes, startTime, timeOut, automaticAnswer} ={...this.props};
        const element = this.returnElementByType(attributes);
        console.log(element)
        if(automaticAnswer ){
            this.props.fillAnswer('', startTime, element.realAnswer, automaticAnswer, timeOut, attributes.pirveliaso, attributes.pirvelgilak, attributes.meoreiaso, attributes.meoregilak, attributes.mesameaso, attributes.mesamegilak, attributes.meotxeaso, attributes.meotxegilak);
            document.removeEventListener('keypress', this.handleClick);
        }

        return (
            <React.Fragment>
                {element.char}
            {/* <span className={attributes.className}>{attributes.value}</span> */}
            </React.Fragment>
        );
    }
}

export default Element;