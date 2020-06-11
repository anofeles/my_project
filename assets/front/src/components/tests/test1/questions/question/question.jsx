import React, { Component } from 'react';
import OuterBoxHolder from './outerBoxes/outerBoxHolder';
import YesButton from '../../../../../common/button/answerButton/yesButton/yesButton';
import NoButton from '../../../../../common/button/answerButton/noButton/noButton';
import './question.scss';
class Question extends Component {

    state = {
        className : 'test-to-show',
        attributes:{},
        columns : [
            {
               arrangement: 1,
               cols: [1,2,3],
               otherCols : [4,5,6,7,8,9]
            },
            {
               arrangement: 2,
               cols: [4,5,6],
               otherCols : [1,2,3,7,8,9]
            },
            {
               arrangement: 3,
               cols: [7,8,9],
               otherCols : [1,2,3,4,5,6]
            },
            {
               arrangement: 4,
               cols: [1,4,7],
               otherCols : [2,3,4,5,8,9]
            },
            {
               arrangement: 5,
               cols: [2,5,8],
               otherCols : [1,2,3,4,6,7]
            },
            {
               arrangement: 6,
               cols: [3,6,9],
               otherCols : [1,2,4,5,7,8]
            }
        ],
        outerBoxes : [
            {
                id : 1,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 2,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 3,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 4,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 5,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 6,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 7,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 8,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            },
            {
                id : 9,
                className : 'outer-boxes',
                quantity : null,
                hasCorrect: null
            }
        ],
        automaticAnswer : false

    }

    componentDidMount(){
        // const userAnswers = this.props.userAnswers;
        const timeOut = this.props.timeOut;
        const timetoShow = this.props.timetoShow;
        const columns = this.state.columns;
        let attributes = {};
        attributes.correct = this.props.correct
        attributes.quantity = this.props.quantity
        attributes.wrong = this.props.wrong
        attributes.arrangement = this.props.arrangement
        attributes.percent = this.props.percent
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

        for(let i =0; i<columns.length; i++){
            let qunatities = [];
            // debugger;
            if(columns[i].arrangement === parseInt(this.props.arrangement)){
                // console.log(this.props.arrangement);
                let quant1 = Math.floor(this.props.quantity / 3);
                if (quant1 > 9){
                    quant1 = quant1 - (quant1 - 9);
                }
                let quant2 = quant1 + 3;
                if (quant2 > 9){
                    quant2 = quant2 - (quant2 - 9);
                }
                let quant3 = this.props.quantity - quant1 - quant2;
                
                qunatities = [
                    {
                        id: columns[i].cols[0],
                        quantity : quant1
                    },
                    {
                        id: columns[i].cols[1],
                        quantity : quant2
                    },
                    {
                        id: columns[i].cols[2],
                        quantity : quant3
                    }
                ];

                let wholeQuant = this.props.wrong - this.props.quantity;
                for(let k=0; k<columns[i].otherCols.length; k++){
                    qunatities.push({
                        id : columns[i].otherCols[k],
                        quantity : Math.floor(wholeQuant / 6)
                    })

                }

                let outerBoxes = this.state.outerBoxes;
                for(let j=0; j<qunatities.length; j++){
                    for(let k=0; k<outerBoxes.length; k++){
                        if(outerBoxes[k].id === qunatities[j].id){
                            outerBoxes[k].quantity = qunatities[j].quantity;
                        }
                    }   
                }
                let counter = 0;
                while(counter < this.props.correct){
                    let randomIndex = Math.floor(Math.random() * 9);
                    if(outerBoxes[randomIndex].quantity < 9 && outerBoxes[randomIndex].hasCorrect == null){
                        outerBoxes[randomIndex].hasCorrect = true;
                        counter ++;
                    }
                }
                this.setState({timeOut, attributes,outerBoxes});
            }

        }
    }

    updateAutomatic = () =>{
        let automaticAnswer = true;
        this.setState({automaticAnswer});
        // console.log(nextState);
    }

    render() {
        // const OuterBoxes = this.state.outerBoxes.map((elem,i) => {
        //     return <OuterBoxHolder
        //             key={elem.id}
        //             attributes = {this.state.attributes}
        //             className = {elem.className}
        //             dataId = {elem.id}
        //             columns = {this.state.columns}
        //             outerBoxes = {this.state.outerBoxes}
        //             />
        // })

        let startTime = new Date();
        let timeOut = this.props.timeOut;
        return (
            <React.Fragment>
                <div className={this.state.className} >
                    {/* {OuterBoxes} */}
                    <OuterBoxHolder 
                        attributes = {this.state.attributes}
                        columns = {this.state.columns}
                        outerBoxes = {this.state.outerBoxes}
                    />
                </div>
                <div className="buttons">
                    <YesButton
                        fillAnswer = {this.props.fillAnswer}
                        startTime = {startTime}
                        realAnswer = {this.props.correct ? true: false}
                        timeOut = {timeOut}
                        automaticAnswer = {this.state.automaticAnswer}
                        quantity = {this.props.quantity}
                        total = {this.props.wrong}
                        arrangement = {this.props.arrangement}

                    />
                    <NoButton                             
                        fillAnswer = {this.props.fillAnswer}
                        realAnswer = {this.props.correct ? true: false}
                        startTime = {startTime}
                        timeOut = {timeOut}
                        automaticAnswer = {this.state.automaticAnswer}
                        quantity = {this.props.quantity}
                        total = {this.props.wrong}
                        arrangement = {this.props.arrangement}
                        
                        />
                </div>
            </React.Fragment>
            
        );
    }
}

export default Question;