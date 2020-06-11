import React, { Component } from 'react';

class TableHead extends Component {
    state={
        headCells : null
    }
    
    componentDidMount(){
        const headCells = this.props.tableHead;
        this.setState({headCells});
    }
    render() {
        const headCells = this.props.tableHead;
        let headCell = headCells.map(column=> {
            return (
                <th key={column.id}>
                    {column.name}
                </th>
            )
        })
        return (
            <thead>
                <tr>
                    {headCell}
                </tr>
            </thead>
        );
    }
}

export default TableHead;