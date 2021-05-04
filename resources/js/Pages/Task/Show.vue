<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            </h2>
        </template>

        <!-- This is the way we called TodoForm.vue -->
        <!-- If we put the file name FormTodo.vue then we need to called it as <form-todo /> -->
        <!-- After called the form, dont forget to import it -->
        <todo-form />

        <!-- The first variable tasks will be pass to Todolist.vue
        The second variable tasks need to be same as variable declared below -->
        <todo-list :lists="lists" />



    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import TodoForm from './TodoForm.vue';
import TodoList from './TodoList.vue';


export default {
    components: {
        AppLayout,
        TodoForm,
        TodoList,
    },
    props:{
        lists: Array,
    },
};
</script>


