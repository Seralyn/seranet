import React, { Component } from "react";
import ToDoItem from "./ToDoItem";
import PropTypes from "prop-types";

class Todos extends Component {
  render() {
    return this.props.todos.map((todo) => (
      <ToDoItem
        key={todo.id}
        todo={todo}
        markComplete={this.props.markComplete}
        delTodo={this.props.delTodo}
      />
    ));
  }
}

// PropTypes
Todos.propTypes = {
  todos: PropTypes.array.isRequired,
};

export default Todos;
