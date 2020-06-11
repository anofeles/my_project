import React, { Component } from 'react';
import './innerBox.css';
class InnerBox extends Component {
    render() {
        return (
            <React.Fragment>
                    <div data-innerid={this.props.id} className="inner-boxes">
                        {this.props.symbol ? this.props.symbol : ''}
                    </div>
            </React.Fragment>
        );
    }
}

export default InnerBox;