import React, { Component } from 'react';
import {NavLink} from 'react-router-dom';
import './questionIntermediary.css';
import {Cookies} from 'react-cookie';
import axios from 'axios';
import $ from 'jquery';


class QuestionIntermediary extends Component {

    state={
        elemClassName : "text-outer",
        string : '',
        requestSent : false
    }

    componentDidMount(){
        let elemClassName = this.state.elemClassName;
        setTimeout(()=>{
            elemClassName += ' hidden';
            this.setState({elemClassName});
        },1000);
        // let string = this.state.string;
        // console.log(this.state.string);
        // if (string == ""){
        //     axios.get('http://psychologytest.tsu.ge/backend/user/index/')
        //     .then(response => {
        //         string = response.data
        //         let startIndex = string.indexOf('<meta name="csrf-token" content="') + '<meta name="csrf-token" content="'.length;
        //         let lastIndex = null;

        //         for(let i=startIndex; i<string.length; i++){
        //             if(string[i]==='"'){
        //                 lastIndex = i;
        //                 break;
        //             }
        //         }
        //         string = string.substring(startIndex, lastIndex);
        //         this.setState({string});
        //     });
        // }
        

    }

    returnPostData(userAnswer, testName){
        let postData = null;
        switch(testName){
            case 'Test1' : postData = {
                data : {
                    'sworpasux' : userAnswer.isUserAnswerCorrect,
                    'saertoraod' : userAnswer.total,
                    'ganlageba' : userAnswer.arrangement,
                    'ganlraod' : userAnswer.quantity,
                    'momxpasux' : userAnswer.userAnswer,
                    'pasxdro' : userAnswer.answerTime,
                    'upasuxatuara' : userAnswer.answered,
                    'testissworpas' : userAnswer.correct,
                    'signaluuid' : userAnswer.uuidpas,
                    'datauser' : new Date(),
                    'id' : userAnswer.id
                },
                postName : 'signalPost'

            }; break;
            case 'Test2' : postData = {
                data : {
                    'persbig' : userAnswer.persbig,
                    'persbigpass' : userAnswer.persbigpass,
                    'momxpasux' : userAnswer.userAnswer,
                    'pasuxdro' : userAnswer.answerTime,
                    'upasuxtuara' : userAnswer.answered,
                    'sworipasux' : userAnswer.isUserAnswerCorrect,
                    'signaluuid' : userAnswer.uuidpas,
                    'datauser' : new Date(),
                    'id' : userAnswer.id
                },
                postName : 'percPost'

            }; break;
            case 'Test3' : postData = {
                data:{
                    'color': userAnswer.color,
                    'text': userAnswer.text,
                    'kebord' : userAnswer.realAnswer,
                    'momxpasux' :userAnswer.userAnswer,
                    'pasuxdro' :userAnswer.answerTime,
                    'upasuxtuara' :userAnswer.answered,
                    'sworipasux' :userAnswer.isUserAnswerCorrect,
                    'datauser' : new Date(),
                    'signaluuid' :userAnswer.uuidpas,
                    'id' : userAnswer.id
                },
                postName : 'strupPost'
            }; break;
            case 'Test4' : postData = {
                data:{
                    'variant' : userAnswer.variant,
                    'dashoreba'  : userAnswer.margin,
                    'pirveliaso' : userAnswer.firstLetter,
                    'meoreaso' : userAnswer.secondLetter,
                    'momxpasux' : userAnswer.userAnswer,
                    'pasuxdro' : userAnswer.answerTime,
                    'upasuxtuara' : userAnswer.answered,
                    'sworipasux' : userAnswer.isUserAnswerCorrect,
                    'datauser' : new Date(),
                    'signaluuid' :userAnswer.uuidpas,
                    'id' : userAnswer.id
                },
                postName : 'seleqcPost'

            }; break;
            case 'Test5' : postData = null; break;
            case 'Test6' : postData = {
                data:{
                    'pirveliaso' : userAnswer.firstLetter,
                    'pirvelgilak'  : userAnswer.firstKey,
                    'meoreaso' : userAnswer.secondLetter,
                    'meoregilak' : userAnswer.secondKey,
                    'mesameaso' : userAnswer.thirdLetter,
                    'mesamegilak' : userAnswer.thirdKey,
                    'meotxeaso' : userAnswer.fourthLetter,
                    'meotxegilak' : userAnswer.fourthKey,
                    'momxpasux' : userAnswer.userAnswer,
                    'pasuxdro' : userAnswer.answerTime,
                    'upasuxtuara' : userAnswer.answered,
                    'sworipasux' :userAnswer.isUserAnswerCorrect,
                    
                    'datauser' : new Date(),
                    'signaluuid' :userAnswer.uuidpas,
                    'id' : userAnswer.id
                },
                postName : 'reaqPost'

            }; break;
            case 'Test7' : postData = {
                data:{
                    'testaso' : userAnswer.testLetter,
                    'gradusi'  : userAnswer.degree,
                    'revers' : userAnswer.reverse,
                    'momxpasux' : userAnswer.userAnswer,
                    'pasuxdro'  : userAnswer.answerTime,
                    'upasuxtuara' : userAnswer.answered,
                    'sworipasux'  : userAnswer.isUserAnswerCorrect,
                    'datauser' : new Date(),
                    'signaluuid' :userAnswer.uuidpas,
                    'id' : userAnswer.id
                },
                postName : 'mentPost'

            }; break;
        }
        return postData;
    }

    sendRequest = (postData) => {

        const token = this.props.token;
        localStorage.setItem('token', token)

        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  token
            },
            url : `http://psychologytest.tsu.ge/backend/postadd/${postData.postName}`,
            dataType: 'json',
            type: 'POST',
            data : postData.data,
            success: (e)=>{
                console.log(e)
            },
            error :(e)=>{
                console.log(e)
            }

       })
    }


    render() {
        let {userAnswers} = {...this.props}

        let wholeNumber = userAnswers.length;
        let percent = 0;
        let correctAnswers = 0;
        let cookie = new Cookies();

        for(let i=0; i<userAnswers.length; i++){
            if(userAnswers[i].isUserAnswerCorrect){
                correctAnswers ++;
            }
        }


        percent = (correctAnswers / wholeNumber) * 100;
        percent = percent.toFixed(2);
        
        let linkToReal= null;
        let button = <button onClick={this.props.updateCounter} className="button">შემდეგი</button>;
        let testPercent = this.props.percent ? this.props.percent : parseInt(cookie.get('percent'));
        let sendRequest = null;
        cookie.set('trialPercent', percent , {path:'/'});

        if(this.props.sortedQuestions.length === this.props.userAnswers.length){
            button = null;
            if((parseFloat(percent) >= testPercent) && this.props.type==="demoquestions"){
                linkToReal = <NavLink to={`${process.env.PUBLIC_URL}/${this.props.name}/modes/questions`}><button className="button">რეალურ ტესტზე გადასვლა</button></NavLink>
            }
            if((parseFloat(percent) < testPercent) && this.props.type==="demoquestions"){
                linkToReal = <NavLink to={`${process.env.PUBLIC_URL}/${this.props.name}/modes`}><button className="button">თავიდან დაწყება</button></NavLink>
            }
            if(this.props.type === "questions"){
                button = 
                <NavLink to={`${process.env.PUBLIC_URL}/result`}>
                    <button 
                        className="button" 
                        onClick={()=>{this.props.updateResultsForChart(userAnswers, this.props.name)}}
                        >
                            შედეგების ნახვა
                        </button>
                </NavLink>;
                console.log(this.props.requestSend);
                if(!this.props.requestSend){
                    for(let i =0; i<this.props.userAnswers.length; i++){
                        let postData = this.returnPostData(this.props.userAnswers[i], this.props.name);
                        this.sendRequest(postData);
                        this.props.sentRequest();
                    }
                }            
            }
        }
        

        const answer = userAnswers[userAnswers.length - 1].isUserAnswerCorrect;
        const answered = userAnswers[userAnswers.length - 1].answered;
        
        let answerTime = userAnswers[userAnswers.length - 1].answerTime;
        answerTime = (answerTime/1000).toFixed(2);
        
        let className = 'inner-text';
        answer ? className+= ' green' :className+= ' red';

        const textToShow = (
            answered 
            ? <p className={className}>თქვენი პასუხი არის {answer ? 'სწორი' : 'მცდარი'}</p>
            : <p className={className}>თქვენ ვერ მოასწარით პასუხის დაფიქსირება</p>
        );

        let elemClassName = this.state.elemClassName;

        return (
            <React.Fragment>
                <div className="plus-for-inter">
                    +
                </div>

                <div className="questionIntermediary">
                    <div className={elemClassName}>
                        <p className="inner-text">სწორია {percent}%</p>
                        <p className="inner-text">პასუხის დრო {answerTime} წამი</p>
                        {textToShow}
                    </div>
                    {button}
                    {linkToReal}
                    {sendRequest}
                </div>
            </React.Fragment>
        );
    }
}

export default QuestionIntermediary;