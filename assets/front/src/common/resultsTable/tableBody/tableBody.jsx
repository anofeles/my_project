import React, { Component } from 'react';

class TableBody extends Component {

    returnTableBody(name, tableData){
        let tableRow = null;
        switch(name){
            case 'Test1' : tableRow = tableData.map((element,i)=>{
                return (
                    <tr key={i}>
                        <td>ცდის ნომერი</td>
                        <td>სიგნალის ინტენსივობა</td>
                        <td>სიგნალის არსებობა</td>
                        <td>სისწორე</td>
                        <td>სწორი ამოცნობა</td>
                        <td>ცრუ განგაში</td>
                    </tr>
                )
            }); break;
            case 'Test2' : tableRow = tableData.map((element,i)=>{
                return (
                    <tr key={i}>
                        <td>ცდის ნომერი</td>
                        <td>მსგავსების ტიპი</td>
                        <td>სიზუსტე</td>
                        <td>რეაქციის დრო</td>
                    </tr>
                )
            }); break;
            case 'Test3' : tableRow = tableData.map((element,i)=>{
                return (
                    <tr key={i}>
                        <td>ცდის ნომერი</td>
                        <td>სიგნალის ინტენსივობა</td>
                        <td>სიგნალის არსებობა</td>
                        <td>სისწორე</td>
                        <td>სწორი ამოცნობა</td>
                        <td>ცრუ განგაში</td>
                    </tr>
                )
            }); break;
            case 'Test4' : tableRow = tableData.map((element,i)=>{
                return (
                    <tr key={i}>
                        <td>ცდის ნომერი</td>
                        <td>დაშორება</td>
                        <td>სტიმულები</td>
                        <td>რეაქციის დრო</td>
                        <td>სისწორე</td>
                    </tr>
                )
            }); break;
            case 'Test5' : tableRow = tableData.map((element,i)=>{
                return (
                    <tr key={i}>
                        <td>ცდის ნომერი</td>
                        <td>სიგნალის ინტენსივობა</td>
                        <td>სიგნალის არსებობა</td>
                        <td>სისწორე</td>
                        <td>სწორი ამოცნობა</td>
                        <td>ცრუ განგაში</td>
                    </tr>
                )
            }); break;
            case 'Test6' : tableRow = tableData.map((element,i)=>{
                return (
                    <tr key={i}>
                        <td>ცდის ნომერი</td>
                        <td>სტიმული</td>
                        <td>ალტერნატივათა რაოდენობა</td>
                        <td>პასუხების სისწორე</td>
                        <td>რეაქციის დრო</td>
                    </tr>
                )
            }); break;
            case 'Test7' : tableRow = tableData.map((element,i)=>{
                return (
                    <tr key={i}>
                        <td>{i+1}</td>
                        <td>{element.degree}</td>
                        <td>{element.reverse}</td>
                        <td>{element.answerTime} მწმ</td>
                        <td>{element.isUserAnswerCorrect ? '1' : '0'}</td>
                    </tr>
                )
            }); break;
        }
        return tableRow;
    }

    render() {
        let tableData = this.props.tableBody;
        let name = this.props.name;
        console.log(tableData);
        let tableRow = this.returnTableBody(name, tableData);
        return(
            <tbody>
                {tableRow}
            </tbody>
        );
    }
}

export default TableBody;