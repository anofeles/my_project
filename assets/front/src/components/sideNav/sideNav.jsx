import React, { Component } from 'react';
import testList from '../tests/testList/tests';
import SideNavItem from './sideNavItem/sideNavItem';
import './sideNav.css';
import {NavLink} from 'react-router-dom';
class SideNav extends Component {

    render() {
        const navigation = testList.map(elem =>{
            return( 
                <SideNavItem
                    key={elem.id}
                    testName = {elem.testName}
                    url = {elem.url}
                />
            )
        });
        const className = this.props.className;
        return (
            <section className={className}>
                <nav className="sideNav-navigation">
                    <ul className="sideNav-navigation-ul">
                        <li className="sideNav-navigation-li">
                            <NavLink to={`${process.env.PUBLIC_URL}/`} className="side-nav-link">მთავარი</NavLink>
                        </li>
                        {navigation}
                    </ul>
                </nav>
            </section>
        );
    }
}

export default SideNav;