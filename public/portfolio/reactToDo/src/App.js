import React, { Component } from "react";

import Todos from "./components/Todos";
import Header from "./components/layout/Header";
import AddToDo from "./components/AddToDo";
import "./App.css";
import { v4 as uuidv4 } from "uuid";

class App extends Component {
  state = {
    todos: [
      {
        id: uuidv4(),
        title: `Take out the trash`,
        completed: false,
      },
      {
        id: uuidv4(),
        title: `Sort Recycling`,
        completed: false,
      },
      {
        id: uuidv4(),
        title: `Mail Invitations`,
        completed: false,
      },
    ],
  };

  markComplete = (id) => {
    this.setState({
      todos: this.state.todos.map((todo) => {
        if (todo.id === id) {
          todo.completed = !todo.completed;
        }
        return todo;
      }),
    });
  };

  delTodo = (id) => {
    this.setState({
      todos: [...this.state.todos.filter((todo) => todo.id !== id)],
    });
  };

  // Add Todos
  AddToDo = (title) => {
    const newTodo = {
      id: uuidv4(),
      title: title,
      completed: false,
    };
    this.setState({ todos: [...this.state.todos, newTodo] });
  };

  render() {
    // console.log(this.state.todos);
    return (
      <div className="App">
        <div className="container">
          <Header />
          <AddToDo AddToDo={this.AddToDo} />
          <Todos
            todos={this.state.todos}
            markComplete={this.markComplete}
            delTodo={this.delTodo}
          ></Todos>
        </div>
      </div>
    );
  }
}

export default App;
