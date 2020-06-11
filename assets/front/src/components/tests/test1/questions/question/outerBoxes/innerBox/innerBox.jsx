import React, { Component } from 'react';

class InnerBox extends Component {
    render() {
        return (
            <React.Fragment>
                    <div data-innerid="1" className="inner-boxes"></div>
            </React.Fragment>
        );
    }
}

export default InnerBox;