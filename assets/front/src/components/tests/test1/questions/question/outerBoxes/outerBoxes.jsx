import React, { Component } from 'react';

class OuterBox extends Component {
    state={
        dataIds: [
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
        ],
        outerBoxes : []
    }

    componentDidMount(){
        const outerBoxes = this.props.outerBoxes;
        this.setState({outerBoxes});
    }
    render() {
        // console.log(this.state.outerBoxes);
        const OuterBoxes = this.state.outerBoxes.map(elem => {
            return <div data-innerid={elem.id} className="inner-boxes"></div>
        })
        return (
                <div data-id={this.props.dataId} className="outer-boxes">
                    <div data-innerid="1" className="inner-boxes"></div>
                    <div data-innerid="2" className="inner-boxes"></div>
                    <div data-innerid="3" className="inner-boxes"></div>
                    <div data-innerid="4" className="inner-boxes"></div>
                    <div data-innerid="5" className="inner-boxes"></div>
                    <div data-innerid="6" className="inner-boxes"></div>
                    <div data-innerid="7" className="inner-boxes"></div>
                    <div data-innerid="8" className="inner-boxes"></div>
                    <div data-innerid="9" className="inner-boxes"></div>
                </div>
        );
    }
}

export default OuterBox;