import React, { Component } from 'react';
import Chart from "react-apexcharts";

class chartHolder extends Component {
    componentDidMount(){
    }
    render() {
        return (
            <div className="chartHolder">
                <Chart options={this.props.options} series = {this.props.series} type={this.props.type} width = {this.props.width}/>
            </div>

        );
    }
}

export default chartHolder;