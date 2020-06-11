import React, { Component } from 'react';
import {Router, NavLink } from "react-router-dom";
class testListItem extends Component {

    state={
        name : '',
        url: ''
    }


    componentDidMount(){
        const name = this.props.name;
        const url = this.props.url;
        this.setState({name, url});
    }

    render() {
        // console.log(`${process.env.PUBLIC_URL}/${this.props.url}`);
        return (
            <li className="tests-li">
                <div className="tests-li-hover-div"></div>
                <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/${this.state.url}`} onClick={()=>{this.props.showHide('')}}></NavLink>
                <span className="tests-li-inner">{this.state.name}</span>
            </li>
        );
    }
}

export default testListItem;