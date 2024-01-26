<script>

    import axios from 'axios';

  export default{
    name: 'ApiComp',

    data(){
      return{
          //definisco array vuoto
          todos: [],

          //definisco input di testo vuoto
          newTaskText: "",
      }
    },

    methods: {

      // PUSH TASK
      pushTask(){

        //definisco il parametro
        const params = {

          //inserisco il test alla chiamata 'task' del mio array
          task: this.newTaskText,
        };

        //configurazione per .POST
        const config = {
          headers:{
            'Content-Type': 'multipart/form-data'
          }
        };

        //chiamata API
        axios
        .post('http://localhost/php-todo-list-json/Back-end/pushTask.php', params, config)
        .then(res => {
          this.todos = res.data
          this.newTaskText = ""
        })
        .catch(err => console.log("errori pushh" + err));

      },


      // CANCELLA TASK
      deleteTask(index){

        const params = {

          params: {

            index: index,

          }
        };

        axios
        .get('http://localhost/php-todo-list-json/Back-end/deleteTask.php', params)
        .then(res => {

          console.log(res.data);
          this.todos = res.data;
        })
        .catch(err => console.log("delete error" + err));
      }
    },

    mounted(){

      //chiamata API
      axios
            .get('http://localhost/php-todo-list-json/Back-end/todosApi.php')
            .then(res => {
              //JSON.stringify = è una funzione che converte un oggetto JavaScript in una stringa JSON.
              //console.log("data: " + JSON.stringify(res.data));

              this.todos = res.data;
            })
            .catch(err => console.error("chiamata principale err" + err));

    }

  }

  

</script>

<template>
  <div class="todo-app">

    <h1>Todo List:</h1>

    <form @submit.prevent="pushTask" class="todo-form">

      <input type="text" placeholder="Inserisci altri Task" v-model="newTaskText" class="task-input">
      <button type="submit" class="submit-button">Inserisci</button>

    </form>

    <ul class="todo-list">

      <li v-for="(todo, index) in todos" :key="index" class="todo-item">
        
        {{ todo.task }}

        <button @click="deleteTask(index)" class="delete-button">CANCELLA</button>

      </li>

    </ul>

  </div>
</template>

<style scoped>

.todo-app {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.todo-form {
  display: flex;
  margin-bottom: 20px;
}

.task-input {
  flex-grow: 1;
  padding: 8px;
  font-size: 16px;
}

.submit-button{
  padding: 8px 12px;
  font-size: 15px;
  cursor: pointer;
}
.delete-button {
  padding: 8px 12px;
  font-size: 10px;
  cursor: pointer;
}

.submit-button {
  background-color: #4caf50;
  color: #fff;
  border: none;
}

.delete-button {
  background-color: #ff3333;
  color: #fff;
  border: none;
  border-radius: 5px;
}

.todo-list {
  list-style-type: none;
  padding: 0;
}

.todo-item {
  background-color: #f2f2f2;
  margin: 5px 0;
  padding: 10px;
  border-radius: 5px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>