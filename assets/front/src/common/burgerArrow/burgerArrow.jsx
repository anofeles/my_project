import React, { Component } from 'react';
import './burgerArrow.css';
class BurgerArrow extends Component {

    state={
        clicked: false,
        className: 'arrow-burger-holder'
    }

    clickBurger=()=>{
        let clicked = this.state.clicked;
        this.props.openInstuctions(clicked);
        clicked = !clicked;
        if (clicked) {
            this.setState({clicked, className:'arrow-burger-holder open'});
        }
        else{
            this.setState({clicked, className:'arrow-burger-holder'});
        }

    }

    render() {
        let className = this.state.className;
        return (
            <div className={className} onClick={this.clickBurger}>
                <div className="burger-top">
                    <div className="arrow-burger">
                        <span className="arrow-top"></span>
                        <span className="arrow-middle"></span>
                        <span className="arrow-bottom"></span>
                    </div>
                    <div className="arrow-text">ინსტრუქცია</div>
                </div>
            </div>
        );
    }
}

export default BurgerArrow;