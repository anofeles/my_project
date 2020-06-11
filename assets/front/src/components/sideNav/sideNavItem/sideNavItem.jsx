import React, { Component } from 'react';
import {NavLink} from 'react-router-dom';
class SideNavItem extends Component {
    render() {
        const {testName, url} = {...this.props}
        return (
            <li className="sideNav-navigation-li">
                <NavLink to={`${process.env.PUBLIC_URL}/${url}`} className="side-nav-link">{testName}</NavLink>
            </li>
        );
    }
}

export default SideNavItem;