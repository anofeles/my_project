import React, { Component } from 'react';
import Question from './question/question';
import QuestionIntermediary from '../../../../common/questionIntermediary/questionIntermediary';
import axios from 'axios';
import $ from 'jquery';
import './questions.scss'
import Burger from '../../../../common/burger/burger';
import SideNav from '../../../sideNav/sideNav';
import BurgerArrow from '../../../../common/burgerArrow/burgerArrow';
import Instructions from '../../../../common/instructions/instructions';
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
        testType : null,
        userAnswers: [],
        sortedQuestions: [],
        counter: 0,
        token : '',
        whatToShow : false,
        type: null,
        parameters:{},
        className : 'sideNav-holder',
        instClassName: 'instructions',
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

    componentDidMount(){
        let type = this.props.match.url;
        type = type.substring(type.lastIndexOf('/')+1);
        this.setState({type});
        let sortedQuestions = [];
        let questions = [];
        let string;
        let parameters = {};
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
                this.setState({token: string});
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':  string
                    },
                    url : 'http://psychologytest.tsu.ge/backend/user/signal',
                    dataType: 'json',
                    type: 'POST',
                    success : response => {
                        let question = {};
                        console.log(response);
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
                                    parameters.arrangement = question.questions.pasux.arrangement === "on" ? true : false;
                                    parameters.quantity = question.questions.pasux.arrangementNumber === "on" ? true : false;
                                    parameters.total = question.questions.pasux.totalNumber === "on" ? true : false;
                                    parameters.correct = question.questions.pasux.correctAnswer === "on" ? true : false;
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

                            }
                            if((response[test].proc === "" || response[test].proc === undefined) && type === "questions"){
                                question.id = test;
                                question.questions = response[test];
                                if(question.questions.pasux){
                                    parameters.userAnswer = true;
                                    parameters.answerTime = true;
                                    parameters.answered = true;
                                    parameters.isUserAnswerCorrect = true;
                                    parameters.arrangement = question.questions.pasux.arrangement === "on" ? true : false;
                                    parameters.quantity = question.questions.pasux.arrangementNumber === "on" ? true : false;
                                    parameters.total = question.questions.pasux.totalNumber === "on" ? true : false;
                                    parameters.correct = question.questions.pasux.correctAnswer === "on" ? true : false;
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

                            }

                            console.log(response[test]);
                        }

                        questions = question.questions.quiz;
                        while(questions.length > 0){
                            let elementIndex = Math.floor(Math.random() * 150);
                            if(questions[elementIndex]){
                                sortedQuestions.push(questions[elementIndex]);
                                questions.splice(elementIndex,1);
                            }
                        }
                        const timetoShow = question.questions.taim;
                        const timeOut = question.questions.testtaim;
                        this.setState({sortedQuestions, timetoShow, timeOut});
                        // console.log(sortedQuestions);
                    }
                })
            });
    }

    // shouldComponentUpdate(nextProps,nextState){
    //     console.log(this.state.counter, nextState.counter);
    //     if(this.state.counter === 0 &&  nextState.counter === 0){
    //         return true;
    //     }
    //     else{
    //         if(this.state.counter !== nextState.counter){
    //             return true;
    //         }
    //         else{
    //             return false;
    //         }
    //     }

    // }

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
        // console.log(this.state.counter, this.state.whatToShow);
    }

    fillAnswer=(buttonType, startTime, realAnswer, automaticAnswer, timeOut, quantity,total,arrangement)=>{
        let whatToShow = this.state.whatToShow;
        whatToShow = !whatToShow;

        let answerParameters = this.state.parameters;

        let timeNow = new Date();
        let endTime = timeNow - startTime;
        let userAnswer = null;

        if(buttonType === 'Yes'){
            userAnswer = true;
        }
        if(buttonType === 'No'){
            userAnswer = false;
        }
        if(buttonType === 'No Answer'){
            userAnswer = null;
        }

        if(automaticAnswer){
            userAnswer = null;
            endTime = timeOut;
        }
        const isUserAnswerCorrect = userAnswer === realAnswer ? true: false;
        const answered = automaticAnswer ? false : true;
        // console.log(userAnswer);


        let userAnswers = this.state.userAnswers;
        userAnswers.push({
            userAnswer :
                answerParameters.userAnswer
                    ?
                        userAnswer ? 'სიგანლი არის' : userAnswer === false ? 'სიგნალი არ არის' : 'პასუხი ვერ დააფიქსირა'
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
            arrangement :
                answerParameters.arrangement ? arrangement : null,
            quantity :
                answerParameters.quantity ? quantity : null,
            total :
                answerParameters.total ? total : null,
            correct :
                answerParameters.correct ? realAnswer : null,
            uuidpas : answerParameters.uuidpas,
            id : answerParameters.id
        });

        this.setState({userAnswers, whatToShow});
        console.log(userAnswers);
    }

    render() {
        const sortedQuestions = this.state.sortedQuestions;
        let question = null;
        if(this.state.counter == 0 && sortedQuestions[0]){
            question =
            <Question
                key = {0}
                userAnswers = {this.state.userAnswers}
                questionNumber = {0}
                correct = {sortedQuestions[0].Correct}
                quantity = {sortedQuestions[0].Quantity}
                wrong = {sortedQuestions[0].Wrong}
                arrangement = {sortedQuestions[0].arrangement}
                percent = {sortedQuestions[0].procenti}
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
                    correct = {sortedQuestions[i].Correct}
                    quantity = {sortedQuestions[i].Quantity}
                    wrong = {sortedQuestions[i].Wrong}
                    arrangement = {sortedQuestions[i].arrangement}
                    percent = {sortedQuestions[i].procenti}
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
        if(whatToShow){
            contentToShow = <QuestionIntermediary
                                updateCounter = {this.updateState}
                                userAnswers = {this.state.userAnswers}
                                sortedQuestions={this.state.sortedQuestions}
                                percent = {this.props.test1Percent}
                                type={this.state.type}
                                name={'Test1'}
                                updateResultsForChart = {this.props.updateResultsForChart}
                                token = {this.state.token}
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
                </div>
            </React.Fragment>
        );
    }
}

export default Questions;
