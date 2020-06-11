import React, {Component} from 'react';
import $ from 'jquery';

class Authorization extends Component {
    componentDidMount() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : 'http://psychologytest.tsu.ge/backend/user/signal',
            dataType: 'json',
            type: 'POST',
            success : e=>{console.log(e)}
        })


        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     url : 'http://psychologytest.tsu.ge/backend/user/testpost',
        //     dataType: 'json',
        //     data:{
        //         joni: 'dkjashkjdahj'
        //     },
        //     type: 'POST',
        //     success : e=>{console.log(e)}
        // })

    }

    render() {
        return (
            <div>
                afshdjlkjfahslikj
            </div>
        );
    }
}

export default Authorization;
