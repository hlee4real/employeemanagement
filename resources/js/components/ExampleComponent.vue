<template>
  <div class="container">
    <div class="row justify-content-center">
      <div>
        <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Identity</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Datesigned</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="employee in employees" :key="employee.id">
                <th scope="row"> {{ employee.id }} </th>
                <td> {{ employee.name }} </td>
                <td> {{ employee.username }} </td>
                <td> {{ employee.identity }} </td>
                <td> {{ employee.address }} </td>
                <td> {{ employee.phone }} </td>
                <td> {{ employee.datesigned }} </td>
            </tr>
            <tr>
                <th scope="row">Actions</th>
                <td></td>
                <td><a href="" class="btn btn-success">Add</a></td>
                <td></td>
                <td><a href="" class="btn btn-warning">Edit</a></td>
                <td></td>
                <td><a href="" class="btn btn-danger">Delete</a></td>
            </tr>
        </tbody>
        </table>
      </div>
      <div>

      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {
    data() {
        return {
            employees: []
        }
    },
    created(){
        let url = 'api/employees';
        axios.get(url).then(res => {
            this.employees = res.data.data;
            console.log(res.data.data)
        })
    }
};
</script>
