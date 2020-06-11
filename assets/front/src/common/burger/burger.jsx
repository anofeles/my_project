import React, { Component } from 'react';
import './burger.css';
class Burger extends Component {
    state={
        clicked : false,
        className : 'burger'
    }

    clickBurger=()=>{
        let clicked = this.state.clicked;
        this.props.openNavigation(clicked)
        clicked = !clicked;
        if (clicked) {
            let className = 'burger clickburger ';
            this.setState({clicked, className});
        }
        else{
            let className = 'burger ';
            this.setState({clicked, className})
        }

    }

    componentDidMount(){
        let className = this.state.className;
        className += ` ${this.props.classNames}`;
        this.setState({className});
        console.log(className);
    }

    render() {

        let className = this.state.className;
        console.log(className);
        return (
            <div className={className} onClick={this.clickBurger}>
                <span></span>
                <span></span>
                <span></span>
            </div>
        );
    }
}

export default Burger;