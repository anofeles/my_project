import React, { Component } from 'react';
import avatar from '../../assets/images/avatar-user.png';
import './avatarImage.css';
import {NavLink, Link} from 'react-router-dom';

class AvatarImage extends Component {

    state={
        className : "avatar-image",
        opened: false
    }

    openUserPanelHandler = () => {
        let className = this.state.className;
        let opened = this.state.opened;
        if (opened){
            className = "avatar-image";
            opened = ! opened;
        }
        else{
            className = "avatar-image open";
            opened = !opened;
        }
        this.setState({className, opened});
    }
    
    render() {
        let className = this.state.className;

        return (
            <div className={className} onClick={this.openUserPanelHandler} >
                <img src={avatar}  alt="avatar-image"/>
                <div className="user-Details">
                    <NavLink className="avatar-nav" to="">შესრულებული ტესტები</NavLink>
                    <Link className="avatar-nav" to="http://psychologytest.tsu.ge">გამოსვლა</Link>
                </div>
            </div>
        );
    }
}

export default AvatarImage;