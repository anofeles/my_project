import React, { Component } from 'react';
import test7json from './test7quiz';
import TestDescription from "../../../common/testDescription/testDescription"
import axios from "axios";
import $ from "jquery";

class Test7 extends Component {
    state={
        title: null,
        description: null,
        isTrialNeeded : null,
        percent : null
    }

    componentDidMount(){
        // let isTrialNeeded = this.state.isTrialNeeded;
        // let percent = this.state.percent;

        // for development
        // let title="";
        // let description="";
        // for(let test in test7json){
        //     if(test7json[test].proc === "" || test7json[test].proc=== undefined){
        //         title = test7json[test].title;
        //         description = test7json[test].desc;
        //     }
        //     if(test7json[test].proc !== ""){
        //         isTrialNeeded = true;
        //         percent = parseInt(test7json[test].proc);
        //         this.setState({isTrialNeeded, percent});
        //     }
        // }

        // // this.setState({title, description});

        // for build
        let string="";
        axios.get('http://psychologytest.tsu.ge/backend/user/index/')
        .then(response => {
            string = response.data
            let startIndex = string.indexOf('<meta name="csrf-token" content="') + '<meta name="csrf-token" content="'.length;
            let lastIndex = null;

            for(let i=startIndex; i<string.length; i++){
                if(string[i]==='"'){
                    lastIndex = i;
                    break;
                }
            }
            string = string.substring(startIndex, lastIndex);
            console.log(string);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  string
                },
                url : 'http://psychologytest.tsu.ge/backend/user/mentJson',
                dataType: 'json',
                type: 'POST',
                success: response=>{
                    let title="";
                    let description="";
                    let isTrialNeeded;
                    let percent;
                    for(let test in response){
                        if(response[test].proc === "" || response[test].proc=== undefined){
                            title = response[test].title;
                            description = response[test].desc;
                        }
                        if(response[test].proc !== ""){
                            isTrialNeeded = true;
                            percent = parseInt(response[test].proc);
                            this.setState({isTrialNeeded, percent});
                        }
                    }

                    this.setState({title, description});
                }
           })
        });
    }
    render() {
        const {title, description, isTrialNeeded, percent} = {...this.state};
        return (
            <React.Fragment>
            <TestDescription
                title={title}
                description={description}
                url={'Test7/modes'}
                findIfTrialNeeded = {this.props.findIfTrialNeeded}
                isTrialNeeded = {isTrialNeeded}
                testName = {'istest7TrialNeeded'}
                testPercent = {'test7Percent'}
                percent = {percent}
                updateTestPercent = {this.props.updateTestPercent}
            />
            </React.Fragment>
            );
    }
}

export default Test7;
