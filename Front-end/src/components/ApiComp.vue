<script>

    import axios from 'axios';

  export default{
    name: 'ApiComp',

    data(){
        return{
            todos: [],
        }
    },

    mounted(){

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
  <ul>
    <li v-for="(todo, i) in todos" :key="i">
        {{ todo.task }}
    </li>
  </ul>
</template>

<style >

</style>