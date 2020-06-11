import React, { Component } from 'react';
import Question from './question/question';
import QuestionIntermediary from '../../../../common/questionIntermediary/questionIntermediary';
import axios from 'axios';
import $ from 'jquery';
import './questions.scss'
import test3json from '../test3quiz';
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
        isEventListenerNeeded: true,
        falseCounter : 0,
        userAnswers: [],
        sortedQuestions: [],
        counter: 0,
        token : '',
        whatToShow : false,
        type: null,
        parameters : {},
        className : 'sideNav-holder',
        instClassName: 'instructions',
    }

    componentDidMount(){
        let type = this.props.match.url;
        type = type.substring(type.lastIndexOf('/')+1);
        this.setState({type});
        let sortedQuestions = [];
        let questions = [];
        let string;
        let parameters = {};
        // for development
        // questions = test3json.quiz;
        // while(questions.length > 0){
        //     let elementIndex = Math.floor(Math.random() * questions.length);
        //     if(questions[elementIndex]){
        //         sortedQuestions.push(questions[elementIndex]);
        //         questions.splice(elementIndex,1);
        //     }
        // }
        // const timetoShow = 100;
        // const timeOut = 1000;
        // this.setState({sortedQuestions, timetoShow, timeOut});
        // console.log(sortedQuestions);



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
                this.setState({token: string});

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':  string
                    },
                    url : 'http://psychologytest.tsu.ge/backend/user/strupJson',
                    dataType: 'json',
                    type: 'POST',
                    success : response => {

                        let question = {};
                        console.log(response);
                        for(let test in response){
                            if(response[test].proc !== "" && type === "demoquestions"){
                                question.id = test;
                                question.questions = response[test];
                                if(question.questions.pasux){
                                    parameters.userAnswer = true;
                                    parameters.answerTime = true;
                                    parameters.answered = true;
                                    parameters.isUserAnswerCorrect = true;
                                    parameters.keyBoard = question.questions.pasux.kebord === "on" ? true : false;
                                    parameters.text = question.questions.pasux.text === "on" ? true : false;
                                    parameters.color = question.questions.pasux.color === "on" ? true : false;
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
                                    parameters.keyBoard = question.questions.pasux.kebord === "on" ? true : false;
                                    parameters.text = question.questions.pasux.text === "on" ? true : false;
                                    parameters.color = question.questions.pasux.color === "on" ? true : false;
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

    updateEventListenerStatus = (status) =>{
        let isEventListenerNeeded = status;
        let falseCounter = this.state.falseCounter;
        // console.log(`questions 1: ${isEventListenerNeeded} ${falseCounter}`);
        const el = this.state.isEventListenerNeeded;
        console.log(el);
        if(!status){
            falseCounter++;
        }
        if(falseCounter >1){
            isEventListenerNeeded = true;
            falseCounter = 0;
        }
        // console.log(`questions 2: ${isEventListenerNeeded} ${falseCounter}`);
        this.setState({isEventListenerNeeded, falseCounter});
        // this.setState(prevState=>({
        //     isEventListenerNeeded : !prevState.isEventListenerNeeded ? true : true
        // }));

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


    fillAnswer=(keyBoardKey, startTime, realAnswer, automaticAnswer, timeOut, text, color)=>{

        let whatToShow = this.state.whatToShow;
        whatToShow = !whatToShow;

        let timeNow = new Date();
        let endTime = timeNow - startTime;
        let userAnswer = keyBoardKey;

        if(automaticAnswer){
            userAnswer = null;
            endTime = timeOut;
        }
        const isUserAnswerCorrect = keyBoardKey == realAnswer ? true: false;
        const answered = automaticAnswer ? false : true
        // console.log(userAnswer);
        let answerParameters = {...this.state.parameters}

        let userAnswers = this.state.userAnswers;
        userAnswers.push({
            userAnswer :
                answerParameters.userAnswer
                    ?
                        userAnswer
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
            realAnswer : 
                answerParameters.keyBoard
                ?
                realAnswer
                :null
            ,
            text : answerParameters.text ? text : null,
            color : answerParameters.color ? color : null,
            uuidpas : answerParameters.uuidpas,
            id : answerParameters.id
        });

        this.setState({userAnswers, whatToShow});

        console.log(userAnswers);
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

    render() {
        const sortedQuestions = this.state.sortedQuestions;
        let question = null;
        const isEventListenerNeeded = this.state.isEventListenerNeeded;
        // console.log(`questions 3: ${isEventListenerNeeded}`);
        if(this.state.counter == 0 && sortedQuestions[0]){
            question =
            <Question
                key = {0}
                userAnswers = {this.state.userAnswers}
                questionNumber = {0}
                color = {sortedQuestions[0].color}
                keyBoardKey={sortedQuestions[0].kebord}
                value={sortedQuestions[0].text}
                fillAnswer = {this.fillAnswer}
                timeOut = {this.state.timeOut}
                timetoShow = {this.state.timetoShow}
                updateEventListenerStatus = {this.updateEventListenerStatus}
                isEventListenerNeeded = {isEventListenerNeeded}

            />
        }
        else{
            question = sortedQuestions.map((quest,i) => {
                if(i == this.state.counter){
                    return <Question
                    key = {i}
                    userAnswers = {this.state.userAnswers}
                    questionNumber = {i}
                    color = {sortedQuestions[i].color}
                    keyBoardKey={sortedQuestions[i].kebord}
                    value={sortedQuestions[i].text}
                    fillAnswer = {this.fillAnswer}
                    timeOut = {this.state.timeOut}
                    timetoShow = {this.state.timetoShow}
                    updateEventListenerStatus = {this.updateEventListenerStatus}
                    isEventListenerNeeded = {isEventListenerNeeded}

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
                                percent = {this.props.test3Percent}
                                type={this.state.type}
                                name={'Test3'}
                                updateResultsForChart = {this.props.updateResultsForChart}
                                token= {this.state.token}
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
