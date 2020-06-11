import React, { Component } from 'react';
import InnerBox from './innerBox/innerBox';

class OuterBox extends Component {
    state={
        dataInnerIds: [
            {
                id: 1,
                symbol : null
            },
            {
                id: 2,
                symbol : null
            },
            {
                id: 3,
                symbol : null
            },
            {
                id: 4,
                symbol : null
            },
            {
                id: 5,
                symbol : null
            },
            {
                id: 6,
                symbol : null
            },
            {
                id: 7,
                symbol : null
            },
            {
                id: 8,
                symbol : null
            },
            {
                id: 9,
                symbol : null
            }
        ]
    }

    componentDidMount(){
        // debugger;
        const quantity = this.props.quantity ? this.props.quantity : -1;
        const correct = this.props.correct ? this.props.correct : -1;
        // console.log(correct);
        let counter = 0;
        let dataInnerIds = this.state.dataInnerIds;
        // console.log(quantity);
        while(counter < quantity){
            let index = Math.floor(Math.random() * 9);
            if(dataInnerIds[index].symbol === null){
                dataInnerIds[index].symbol = 'P';
                counter ++;

            }
        }
        let correctCounter = 0;
        while(correctCounter < correct){
            let index = Math.floor(Math.random() * 9);
            if(dataInnerIds[index].symbol !== 'P'){
                dataInnerIds[index].symbol = 'R';
                correctCounter ++;
            }
        }
        // console.log(dataInnerIds);
        this.setState({dataInnerIds})
    }

    render() {
        const dataInnerIds = [...this.state.dataInnerIds];
        const innerBoxes = dataInnerIds.map(elem=>{
            return <InnerBox
                        key = {elem.id}
                        symbol = {elem.symbol}
                        id = {elem.id}
                    />
        })
        // console.log(this.state.dataInnerIds);
        return (
        <div  className="outer-boxes" data-id={this.props.dataId}>
            {/* <div data-innerid="1" className="inner-boxes"></div>
            <div data-innerid="2" className="inner-boxes"></div>
            <div data-innerid="3" className="inner-boxes"></div>
            <div data-innerid="4" className="inner-boxes"></div>
            <div data-innerid="5" className="inner-boxes"></div>
            <div data-innerid="6" className="inner-boxes"></div>
            <div data-innerid="7" className="inner-boxes"></div>
            <div data-innerid="8" className="inner-boxes"></div>
            <div data-innerid="9" className="inner-boxes"></div> */}
            {innerBoxes}
        </div>
                
        );
    }
}

export default OuterBox;