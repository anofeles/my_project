import React, { Component } from 'react';
import TestDescription from '../../../common/testDescription/testDescription';
import axios from 'axios';
import $ from 'jquery';
class Test1 extends Component {
    state={
        title: null,
        description: null,
        isTrialNeeded : null,
        percent : null
    }

    componentDidMount(){
        let string = '';
        let isTrialNeeded = this.state.isTrialNeeded;
        let percent = this.state.percent;
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

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  string
                },
                url : 'http://psychologytest.tsu.ge/backend/user/signal',
                dataType: 'json',
                type: 'POST',
                success: response=>{
                    let title="";
                    let description="";
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
                },
                error : response=(e)=>{
                    console.log(e);
                }
           })
        });
    }

    render() {
        const{title, description,isTrialNeeded,percent} = {...this.state}
        return (
            <TestDescription
                title={title}
                description={description}
                url={'Test1/modes'}
                findIfTrialNeeded = {this.props.findIfTrialNeeded}
                isTrialNeeded = {isTrialNeeded}
                testName = {'istest1TrialNeeded'}
                testPercent = {'test1Percent'}
                percent = {percent}
                updateTestPercent = {this.props.updateTestPercent}

            />
        );
    }
}

export default Test1;
