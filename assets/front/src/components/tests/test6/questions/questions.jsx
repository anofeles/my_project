import React, { Component } from 'react';
import Question from './question/question';
import QuestionIntermediary from '../../../../common/questionIntermediary/questionIntermediary';
import axios from 'axios';
import $ from 'jquery';
import './questions.scss'
import test6json from '../test6quiz';
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
        let type1 = [];
        let type2 = [];
        let type3 = [];
        let sortedQuestions1 =[];
        let sortedQuestions2 =[];
        let sortedQuestions3 =[];
        // for development
        // questions = test6json.quiz;
        // console.log(questions);
        // questions.map(elem => {
        //     // debugger;
        //     if(elem.mesameaso === "" && elem.meotxeaso === ""){
        //         let quest  = {};
        //         quest.type="type1";
        //         quest.question= elem;
        //         type1.push(quest);
        //     }
        //     if(elem.pirveliaso === "" && elem.meoreiaso === ""){
        //         let quest  = {};
        //         quest.type="type2";
        //         quest.question= elem;
        //         type2.push(quest)
        //     }
        //     if(elem.pirveliaso !== "" && elem.meoreiaso !== "" && elem.mesameaso !== "" && elem.meotxeaso !== ""){
        //         let quest  = {};
        //         quest.type="type3";
        //         quest.question= elem;
        //         type3.push(quest);
        //     }
        //  })


        //  while(type1.length > 0){
        //      let elementIndex = Math.floor(Math.random() * type1.length);
        //      if(type1[elementIndex]){
        //          sortedQuestions1.push(type1[elementIndex]);
        //          type1.splice(elementIndex,1);
        //      }
        //  }



        //  while(type2.length > 0){
        //     let elementIndex = Math.floor(Math.random() * type2.length);
        //     if(type2[elementIndex]){
        //         sortedQuestions2.push(type2[elementIndex]);
        //         type2.splice(elementIndex,1);
        //     }
        // }


        // while(type3.length > 0){
        //     let elementIndex = Math.floor(Math.random() * type3.length);
        //     if(type3[elementIndex]){
        //         sortedQuestions3.push(type3[elementIndex]);
        //         type3.splice(elementIndex,1);
        //     }
        // }

        // sortedQuestions=[...sortedQuestions1,...sortedQuestions2,...sortedQuestions3];
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
                this.setState({token:string});

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':  string
                    },
                    url : 'http://psychologytest.tsu.ge/backend/user/reaqJson',
                    dataType: 'json',
                    type: 'POST',
                    success : response => {
                        let question = {};
                        for(let test in response){
                            if(response[test].proc !== "" && type === "demoquestions"){
                                question.id = test;
                                question.questions = response[test];
                                if(question.questions.pasux){
                                    parameters.userAnswer = true;
                                    parameters.answerTime = true;
                                    parameters.answered = true;
                                    parameters.isUserAnswerCorrect = true;
                                    parameters.firstLetter = question.questions.pasux.pirveliaso === "on" ? true : false;
                                    parameters.firstKey = question.questions.pasux.pirvelgilak === "on" ? true : false;
                                    parameters.secondLetter = question.questions.pasux.meoreaso === "on" ? true : false;
                                    parameters.secondKey = question.questions.pasux.meoregilak === "on" ? true : false;
                                    parameters.thirdLetter = question.questions.pasux.mesameaso === "on" ? true : false;
                                    parameters.thirdKey = question.questions.pasux.mesamegilak === "on" ? true : false;
                                    parameters.fourthLetter = question.questions.pasux.meotxeaso === "on" ? true : false;
                                    parameters.fourthKey = question.questions.pasux.meotxegilak === "on" ? true : false;
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
                                    parameters.firstLetter = question.questions.pasux.pirveliaso === "on" ? true : false;
                                    parameters.firstKey = question.questions.pasux.pirvelgilak === "on" ? true : false;
                                    parameters.secondLetter = question.questions.pasux.meoreaso === "on" ? true : false;
                                    parameters.secondKey = question.questions.pasux.meoregilak === "on" ? true : false;
                                    parameters.thirdLetter = question.questions.pasux.mesameaso === "on" ? true : false;
                                    parameters.thirdKey = question.questions.pasux.mesamegilak === "on" ? true : false;
                                    parameters.fourthLetter = question.questions.pasux.meotxeaso === "on" ? true : false;
                                    parameters.fourthKey = question.questions.pasux.meotxegilak === "on" ? true : false;
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
                        }

                        questions = question.questions.quiz;
                        // console.log(questions);
                        // while(questions.length > 0){
                        //     let elementIndex = Math.floor(Math.random() * questions.length);
                        //     if(questions[elementIndex]){
                        //         sortedQuestions.push(questions[elementIndex]);
                        //         questions.splice(elementIndex,1);
                        //     }
                        // }
                        questions.map(elem => {
                            if(elem.mesameaso === "" && elem.meotxeaso === ""){
                                let quest  = {};
                                quest.type="type1";
                                quest.question= elem;
                                type1.push(quest);
                            }
                            if(elem.pirveliaso === "" && elem.meoreiaso === ""){
                                let quest  = {};
                                quest.type="type2";
                                quest.question= elem;
                                type2.push(quest)
                            }
                            if(elem.pirveliaso !== "" && elem.meoreiaso !== "" && elem.mesameaso !== "" && elem.meotxeaso !== ""){
                                let quest  = {};
                                quest.type="type3";
                                quest.question= elem;
                                type3.push(quest);
                            }
                        })


                        while(type1.length > 0){
                            let elementIndex = Math.floor(Math.random() * type1.length);
                            if(type1[elementIndex]){
                                sortedQuestions1.push(type1[elementIndex]);
                                type1.splice(elementIndex,1);
                            }
                        }



                        while(type2.length > 0){
                            let elementIndex = Math.floor(Math.random() * type2.length);
                            if(type2[elementIndex]){
                                sortedQuestions2.push(type2[elementIndex]);
                                type2.splice(elementIndex,1);
                            }
                        }


                        while(type3.length > 0){
                            let elementIndex = Math.floor(Math.random() * type3.length);
                            if(type3[elementIndex]){
                                sortedQuestions3.push(type3[elementIndex]);
                                type3.splice(elementIndex,1);
                            }
                        }

                        sortedQuestions=[...sortedQuestions1,...sortedQuestions2,...sortedQuestions3];
                        // const timetoShow = 100;
                        // const timeOut = 1000;
                        const timetoShow = question.questions.taim;
                        const timeOut = question.questions.testtaim;

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


    fillAnswer=(keyBoardKey, startTime, realAnswer, automaticAnswer, timeOut, firstLetter, firstKey, secondLetter, secondKey, thirdLetter, thirdKey, fourthLetter, fourthKey)=>{

        let whatToShow = this.state.whatToShow;
        whatToShow = !whatToShow;

        let timeNow = new Date();
        let endTime = timeNow - startTime;
        let userAnswer = keyBoardKey;

        if(automaticAnswer){
            userAnswer = null;
            endTime = timeOut;
        }
        const isUserAnswerCorrect = keyBoardKey.toLowerCase() == realAnswer.toLowerCase() ? true: false;
        const answered = automaticAnswer ? false : true
        // console.log(userAnswer);

        let answerParameters  = this.state.parameters;
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
        firstLetter : 
            answerParameters.firstLetter
                ? 
                firstLetter
                : null
        ,
        firstKey : 
            answerParameters.firstKey
                ? firstKey
                : null
        ,
        secondLetter : 
            answerParameters.secondLetter
                ? secondLetter
                : null
        ,
        secondKey :
            answerParameters.secondKey
                ? secondKey
                : null
        ,
        thirdLetter : 
            answerParameters.thirdLetter
                ? thirdLetter
                : null
        ,
        thirdKey : 
            answerParameters.thirdKey
                ? thirdKey
                : null
        ,
        fourthLetter :
            answerParameters.fourthLetter
                ? fourthLetter
                : null
        ,
        fourthKey : 
            answerParameters.fourthKey
                ? fourthKey
                : null
        ,
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
        // console.log(`questions 3: ${isEventListenerNeeded}`);
        if(this.state.counter == 0 && sortedQuestions[0]){
            question =
            <Question
                key = {0}
                userAnswers = {this.state.userAnswers}
                questionNumber = {0}
                quest = {sortedQuestions[0]}
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
                    quest = {sortedQuestions[i]}
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
                                percent = {this.props.test6Percent}
                                type={this.state.type}
                                name={'Test6'}
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
