import React, { Component } from 'react';
import Question from './question/question';
import QuestionIntermediary from '../../../../common/questionIntermediary/questionIntermediary';
import axios from 'axios';
import $ from 'jquery';
import './questions.scss'
import test7json from '../test7quiz';
import Burger from '../../../../common/burger/burger';
import SideNav from '../../../sideNav/sideNav';
import BurgerArrow from '../../../../common/burgerArrow/burgerArrow';
import Instructions from '../../../../common/instructions/instructions';
import { Cookies } from 'react-cookie';

class Questions extends Component {
    state={
        answered : false,
        userAnswer : null,
        realAnswer : null,
        answerTime : null,
        startTime : null,
        endTime : null,
        timetoShow: null,
        timeOut : null,
        isEventListenerNeeded: true,
        falseCounter : 0,
        userAnswers: [],
        sortedQuestions: [],
        counter: 0,
        token : '',
        whatToShow : false,
        type: null,
        parameters: {},
        className : 'sideNav-holder',
        instClassName: 'instructions',
        sentRequest:false
    }

    openSideNav=(clicked)=>{
        let className = this.state.className;
        if(!clicked){
            className='sideNav-holder open';
            this.setState({className});
        }
        else{
            className='sideNav-holder';
            this.setState({className});
        }
    }

    openInstuctions = (clicked) =>{
        let instClassName = this.state.instClassName;
        if(!clicked){
            instClassName = "instructions open";
            this.setState({instClassName});
        }
        else{
            instClassName = "instructions";
            this.setState({instClassName});
        }
    }


    updateReq =() =>{
        let sentRequest = this.state.sentRequest;
        sentRequest = true;
        this.setState({sentRequest});
    }
    componentDidMount(){


        // console.log(this.props.test7Percent);
        let type = this.props.match.url;
        type = type.substring(type.lastIndexOf('/')+1);
        this.setState({type});
        let sortedQuestions = [];
        let questions = [];
        let string;
        let parameters ={};
        // for development
        // let question = {};
        // for(let test in test7json){
        //     if(test7json[test].proc !== "" && type === "demoquestions"){
        //         question.id = test;
        //         question.questions = test7json[test];
        //         if(question.questions.pasux){
        //             parameters.userAnswer = true;
        //             parameters.answerTime = true;
        //             parameters.answered = true;
        //             parameters.isUserAnswerCorrect = true;
        //             parameters.testLetter = question.questions.pasux.testaso === "on" ? true : false;
        //             parameters.degree = question.questions.pasux.gradusi === "on" ? true : false;
        //             parameters.reverse = question.questions.pasux.revers === "on" ? true : false;
        //             parameters.uuidpas = question.questions.pasux.uuidpas;
        //             parameters.id = test;
        //         }
        //         else{
        //             parameters.userAnswer = true;
        //             parameters.answered = true;
        //             parameters.answerTime = true;
        //             parameters.isUserAnswerCorrect = true;
        //             parameters.uuidpas = question.questions.pasux.uuidpas;
        //             parameters.id = test;
        //         }
        //         this.setState({parameters});

        //         // console.log(question.questions,response[test]);
        //     }
        //     if((test7json[test].proc === "" || test7json[test].proc === undefined) && type === "questions"){
        //         question.id = test;
        //         question.questions = test7json[test];
        //         if(question.questions.pasux){
        //             parameters.userAnswer = true;
        //             parameters.answerTime = true;
        //             parameters.answered = true;
        //             parameters.isUserAnswerCorrect = true;
        //             parameters.testLetter = question.questions.pasux.testaso === "on" ? true : false;
        //             parameters.degree = question.questions.pasux.gradusi === "on" ? true : false;
        //             parameters.reverse = question.questions.pasux.revers === "on" ? true : false;
        //             parameters.uuidpas = question.questions.pasux.uuidpas;
        //             parameters.id = test;
        //         }
        //         else{
        //             parameters.userAnswer = true;
        //             parameters.answered = true;
        //             parameters.answerTime = true;
        //             parameters.isUserAnswerCorrect = true;
        //             parameters.uuidpas = question.questions.pasux.uuidpas;
        //             parameters.id = test;
        //         }
        //         this.setState({parameters});
        //         // console.log(question.questions,response[test]);
        //     }
        // }

        // questions = question.questions.quiz;
        // while(questions.length > 0){
        //     let elementIndex = Math.floor(Math.random() * questions.length);
        //     if(questions[elementIndex]){
        //         sortedQuestions.push(questions[elementIndex]);
        //         questions.splice(elementIndex,1);
        //     }
        // }
        // // console.log(questions);
        // const timetoShow = 2000;
        // const timeOut = 3000;
        // this.setState({sortedQuestions, timetoShow, timeOut});
        // // console.log(sortedQuestions);



        //for build
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
                this.setState({token:string});

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':  string
                    },
                    url : 'http://psychologytest.tsu.ge/backend/user/mentJson',
                    dataType: 'json',
                    type: 'POST',
                    success : response => {
                        let question = {};
                        for(let test in response){
                            if(response[test].proc !== "" && type === "demoquestions"){
                                question.id = test;
                                question.questions = response[test];
                                console.log(question.questions);
                                if(question.questions.pasux){
                                    parameters.userAnswer = true;
                                    parameters.answerTime = true;
                                    parameters.answered = true;
                                    parameters.isUserAnswerCorrect = true;
                                    parameters.testLetter = question.questions.pasux.testaso === "on" ? true : false;
                                    parameters.degree = question.questions.pasux.gradusi === "on" ? true : false;
                                    parameters.reverse = question.questions.pasux.revers === "on" ? true : false;
                                    parameters.uuidpas = question.questions.pasux.uuidpas;
                                    parameters.id = test;
                                }
                                else{
                                    parameters.userAnswer = true;
                                    parameters.answered = true;
                                    parameters.answerTime = true;
                                    parameters.isUserAnswerCorrect = true;
                                    parameters.uuidpas = question.questions.pasux.uuidpas;
                                    parameters.id = test;
                                }
                                this.setState({parameters});

                                console.log(question.questions,response[test]);
                            }
                            if((response[test].proc === "" || response[test].proc === undefined) && type === "questions"){
                                question.id = test;
                                question.questions = response[test];
                                if(question.questions.pasux){
                                    parameters.userAnswer = true;
                                    parameters.answerTime = true;
                                    parameters.answered = true;
                                    parameters.isUserAnswerCorrect = true;
                                    parameters.testLetter = question.questions.pasux.testaso === "on" ? true : false;
                                    parameters.degree = question.questions.pasux.gradusi === "on" ? true : false;
                                    parameters.reverse = question.questions.pasux.revers === "on" ? true : false;
                                    parameters.uuidpas = question.questions.pasux.uuidpas;
                                    parameters.id = test;
                                }
                                else{
                                    parameters.userAnswer = true;
                                    parameters.answered = true;
                                    parameters.answerTime = true;
                                    parameters.isUserAnswerCorrect = true;
                                    parameters.uuidpas = question.questions.pasux.uuidpas;
                                    parameters.id = test;
                                }
                                this.setState({parameters});
                                console.log(question.questions,response[test]);
                            }
                        }

                        questions = question.questions.quiz;
                        while(questions.length > 0){
                            let elementIndex = Math.floor(Math.random() * questions.length);
                            if(questions[elementIndex]){
                                sortedQuestions.push(questions[elementIndex]);
                                questions.splice(elementIndex,1);
                            }
                        }
                        const timetoShow = question.questions.taim;
                        const timeOut = question.questions.testtaim;
                        // const timetoShow = 100;
                        // const timeOut = 1000;

                        this.setState({sortedQuestions, timetoShow, timeOut});
                    }
                })

            });
    }


    updateState = () => {
        let counter = this.state.counter;
        let whatToShow = this.state.whatToShow;
        whatToShow = !whatToShow;
        if(counter>=0){
            counter ++;
        }
        else{
            counter = 0;
        }

        this.setState({counter, whatToShow});
    }


    fillAnswer=(userAnswer, startTime, realAnswer, automaticAnswer, timeOut, testLetter, degree, reverse)=>{
        // console.log('answer',reverse);
        let whatToShow = this.state.whatToShow;
        whatToShow = !whatToShow;

        let timeNow = new Date();
        let endTime = timeNow - startTime;

        if(automaticAnswer){
            userAnswer = null;
            endTime = timeOut;
        }
        const isUserAnswerCorrect = userAnswer == realAnswer ? true: false;
        const answered = automaticAnswer ? false : true
        let answer = null;
        if(userAnswer === true){
            answer = 'სარკული';
        }
        if(userAnswer === false){
            answer = 'არასარკული';
        }
        if(userAnswer === null){
            answer = null;
        }

        let userAnswers = this.state.userAnswers;
        let answerParameters = {...this.state.parameters};
        userAnswers.push({
        userAnswer :
            answerParameters.userAnswer
                ?
                    answer
                : null
        ,
        answerTime :
            answerParameters.answerTime
                ? endTime
                : null
        ,
        isUserAnswerCorrect :
            answerParameters.isUserAnswerCorrect
                ?
                isUserAnswerCorrect
                : null
        ,
        answered :
            answerParameters.answered
                ?
                answered
                : null
        ,
        testLetter :
            answerParameters.testLetter
                ?
                testLetter
                : null
        ,
        degree : 
            answerParameters.degree
                ?
                degree
                : null
        ,
        reverse : 
            answerParameters.reverse
                ?
                reverse ? 'სარკული' : 'არასარკული'
                : null
        ,
        uuidpas : answerParameters.uuidpas,
        id : answerParameters.id
        });

        this.setState({userAnswers, whatToShow});

        // console.log(this.state.sortedQuestions.length === userAnswers.length);
        console.log(userAnswers);
    }

    render() {
        const sortedQuestions = this.state.sortedQuestions;
        let question = null;
        // console.log(`questions 3: ${isEventListenerNeeded}`);
        if(this.state.counter == 0 && sortedQuestions[0]){
            question =
            <Question
                key = {0}
                userAnswers = {this.state.userAnswers}
                questionNumber = {0}
                gradusi = {sortedQuestions[0].gradusi}
                revers={sortedQuestions[0].revers}
                testaso={sortedQuestions[0].testaso}
                fillAnswer = {this.fillAnswer}
                timeOut = {this.state.timeOut}
                timetoShow = {this.state.timetoShow}

            />
        }
        else{
            question = sortedQuestions.map((quest,i) => {
                if(i == this.state.counter){
                    return <Question
                    key = {i}
                    userAnswers = {this.state.userAnswers}
                    questionNumber = {i}
                    gradusi = {sortedQuestions[i].gradusi}
                    revers={sortedQuestions[i].revers}
                    testaso={sortedQuestions[i].testaso}
                    fillAnswer = {this.fillAnswer}
                    timeOut = {this.state.timeOut}
                    timetoShow = {this.state.timetoShow}
                />
                }
            });
        }

        // this.setState({counter});


        let contentToShow = null;
        let whatToShow = this.state.whatToShow;
        let requestSend = this.state.sentRequest;
        if(whatToShow){
            contentToShow = <QuestionIntermediary
                                updateCounter = {this.updateState}
                                userAnswers = {this.state.userAnswers}
                                sortedQuestions={this.state.sortedQuestions}
                                percent = {this.props.test7Percent}
                                type={this.state.type}
                                name={'Test7'}
                                updateResultsForChart = {this.props.updateResultsForChart}
                                token = {this.state.token}
                                sentRequest = {this.updateReq}
                                requestSend = {requestSend}
                                />;
            whatToShow = false;
        }
        else{
            contentToShow = question;
            whatToShow = true;
        }

        let currentQuestion = this.state.counter;
        currentQuestion ++;
        let wholeNumber = this.state.sortedQuestions.length;
        let className = this.state.className;
        let instClassName = this.state.instClassName;


        return (
            <React.Fragment>
                <Burger openNavigation= {this.openSideNav}/>
                <SideNav className={className}/>
                <BurgerArrow openInstuctions= {this.openInstuctions}/>
                <Instructions className={instClassName}/>
                <div className="tests-holder">
                    <div className="test-wrapper">
                        {contentToShow}
                        <p className="current-question">
                            {`${currentQuestion} / ${wholeNumber}`}
                        </p>
                    </div>
                    <div className="small-desc">
                        თუ თვლით რომ ფიგურა სარკულია დააჭირეთ ღილაკს "სარკული", თუ თვლით რომ ფიგურა არასარკულია დააჭირეთ ღილაკს "არასარკული"
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default Questions;
