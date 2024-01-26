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
      pushTask(){

        //definisco il parametro
        const params = {

          //inserisco il test alla chiamata 'task' del mio array
          task: this.newTaskText
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
          this.todos = res.data;
          this.newTaskText = "";
        })
        .catch(err => console.log(err));

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
            .catch(err => console.error(err));

    }

  }

  

</script>

<template>
  <h1>Todo List:</h1>
  <form @submit.prevent ="pushTask">
      <input type="text" placeholder="Inserisci altri Task" v-model="newTaskText">
      <input type="submit" value="Inserisci">
  </form>
  <ul>
    <li v-for="(todo, i) in todos" :key="i">
        {{ todo.task }}
    </li>
  </ul>
</template>

<style >

</style>