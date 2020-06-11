import React, { Component } from 'react';
import InnerBox from './outerBox/innerBox/innerBox';
import OuterBox from './outerBox/outerBox';
class OuterBoxHolder extends Component {
    state={
        outerBoxes : [],
        columns : [],
        attributes : {}
    }

    componentDidMount(){
        const outerBoxes = this.props.outerBoxes;
        const columns = this.props.columns;
        const attributes = this.props.attributes;
        this.setState({outerBoxes, columns, attributes});
    }
    render() {
        // console.log(this.state.outerBoxes);
        // let InnerBoxes = this.state.outerBoxes.map(elem => {
            
        //     return  <InnerBox data-innerid={elem.id} />
        // })
        let OuterBoxes = this.state.outerBoxes.map(elem =>{
            // console.log(elem)
            return (<OuterBox
                    key={elem.id}
                    attributes = {this.state.attributes}
                    className = {elem.className}
                    dataId = {elem.id}
                    columns ={this.state.columns}
                    quantity = {elem.quantity}
                    correct = {elem.hasCorrect}
                    />);
            // return <div className={elem.id}></div>
        })
        return (

            <React.Fragment>
                {OuterBoxes}
            </React.Fragment>
        );
    }
}

export default OuterBoxHolder;