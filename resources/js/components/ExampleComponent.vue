<template>
  <div class="container">
    <button
      type="button"
      class="btn btn-primary m-2 fload-end"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
      @click="addEmployee()"
    >
      Add Employee
    </button>
    <div class="col-4">
      <form @submit.prevent="searchEmployee">
        <div class="input-group">
          <input
            v-model="search"
            type="text"
            placeholder="Search Employee"
            class="form-control"
          />
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
              Search
            </button>
          </div>
        </div>
      </form>
    </div>
    <div>
        <form @submit.prevent="filterEmployee">
            <label for="">From</label>
            <input type="date" v-model="startDate">
  
            <label for="">To</label>
            <input type="date" v-model="endDate">
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    <div>
      <form @submit.prevent="filterDep">
        <div class="input-group">
          <select class="form-select" v-model="fildep">
            <option
              v-for="depart in departments"
              :key="depart.id"
            >
              {{ depart.roles }}
            </option>
          </select>
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
              Filter
            </button>
          </div>
        </div>
      </form>
    </div>
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
              <th scope="col">Signed Date</th>
              <th scope="col">Department</th>
              <th scope="col">Manager/Staff</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in employees" :key="employee.id">
              <th scope="row">{{ employee.id }}</th>
              <td>{{ employee.name }}</td>
              <td>{{ employee.username }}</td>
              <td>{{ employee.identity }}</td>
              <td>{{ employee.address }}</td>
              <td>{{ employee.phone }}</td>
              <td>{{ employee.datesigned | moment("YYYY-MM-DD") }}</td>
              <td>{{ employee.roles }}</td>
              <td><div v-if="employee.role == 1">
                Manager
                </div>
                <div v-else>
                  Staff
                </div>
              </td>
              <td>
                <button
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  class="btn btn-warning"
                  @click="editEmployee(employee)"
                >
                  Edit
                </button>
                <button
                  type="button"
                  @click="deleteEmployee(employee.id)"
                  class="btn btn-danger"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div></div>
    </div>
    <div class="container2">
      <div class="row justify-content-center">
        <div>
          <button
            type="button"
            class="btn btn-primary m-2 fload-end"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal2"
            @click="addDepartment()"
          >
            Add Department
          </button>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="department in departments" :key="department.id">
                <th scope="row">{{ department.id }}</th>
                <td>{{ department.roles }}</td>
                <td>
                  <button
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal2"
                    type="button"
                    @click="editDepartment(department)"
                    class="btn btn-warning"
                  >
                    Edit</button
                  ><button
                    @click="deleteDepartment(department.id)"
                    type="button"
                    class="btn btn-danger"
                  >
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ modalTitle }}</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex bd-hightlight mb-3">
              <div class="p-2 w-100 bd-highlight">
                <div class="input-group mb-3">
                  <span class="input-group-text">Name</span>
                  <input
                    type="text"
                    class="form-control"
                    v-model="EmployeeName"
                  />
                </div>
                <br />
                <div class="input-group mb-3">
                  <span class="input-group-text">UserName</span>
                  <input
                    type="text"
                    class="form-control"
                    v-model="EmployeeUsername"
                  />
                </div>
                <br />
                <div class="input-group mb-3">
                  <span class="input-group-text">Password</span>
                  <input
                    type="password"
                    class="form-control"
                    v-model="EmployeePassword"
                  />
                </div>
                <br />
                <div class="input-group mb-3">
                  <span class="input-group-text">Identity</span>
                  <input
                    type="text"
                    class="form-control"
                    v-model="EmployeeIdentity"
                  />
                </div>
                <br />
                <div class="input-group mb-3">
                  <span class="input-group-text">Address</span>
                  <input
                    type="text"
                    class="form-control"
                    v-model="EmployeeAddress"
                  />
                </div>
                <b></b>
                <div class="input-group mb-3">
                  <span class="input-group-text">Phone</span>
                  <input
                    type="text"
                    class="form-control"
                    v-model="EmployeePhone"
                  />
                </div>
                <br />
                <div class="input-group mb-3">
                  <span class="input-group-text">Date Signed</span>
                  <input
                    type="date"
                    class="form-control"
                    v-model="EmployeeDate"
                  />
                </div>
                <br />
                <div class="input-group mb-3">
                  <span class="input-group-text">Department</span>
                  <select class="form-select" v-model="Department_ID">
                    <option
                      v-for="dep in departments"
                      :key="dep.id"
                      v-bind:value="dep.id"
                    >
                      {{ dep.roles }}
                    </option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text">Manager/Staff</span>
                  <select class="form-select" v-model="DepartmentRole">
                    <option>
                      Manager
                    </option>
                    <option>
                      Staff
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="">
              <button
                type="button"
                v-if="EmployeeID == 0"
                @click="createEmployee()"
                class="btn btn-primary"
              >
                Create
              </button>
              <button
                type="button"
                v-if="EmployeeID != 0"
                @click="updateEmployee()"
                class="btn btn-primary"
              >
                Update
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="exampleModal2"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              {{ modalTitle2 }}
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex bd-hightlight mb-3">
              <div class="p-2 w-100 bd-highlight">
                <div class="input-group mb-3">
                  <span class="input-group-text">Roles</span>
                  <input
                    type="text"
                    class="form-control"
                    v-model="DepartmentRole"
                  />
                </div>
                <br />
              </div>
            </div>
            <div class="">
              <button
                type="button"
                @click="createDepartment()"
                v-if="DepartmentID == 0"
                class="btn btn-primary"
              >
                Create
              </button>
              <button
                type="button"
                @click="updateDepartment()"
                class="btn btn-primary"
              >
                Update
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      employees: [],
      departments: [],
      managers: [],
      EmployeeID: 0,
      EmployeeName: "",
      EmployeeUsername: "",
      EmployeePassword: "",
      EmployeeIdentity: "",
      EmployeeAddress: "",
      EmployeePhone: "",
      EmployeeDate: "",
      EmployeeRole: "",
      modalTitle: "",
      Department_ID: "",
      DepartmentID: 0,
      DepartmentRole: "",
      modalTitle2: "",
      search: "",
      startDate: "",
      endDate: "",
      fildep: ""
    };
  },
  created() {
    let url = "api/employees/";
    axios.get(url).then((res) => {
      this.employees = res.data;
      console.log(res.data);
    });

    let url2 = "api/departments/";
    axios.get(url2).then((res2) => {
      this.departments = res2.data.data;
      console.log(res2.data.data);
    });
  },
  methods: {
    addEmployee() {
      this.modalTitle = "Add new Employee",
        this.EmployeeID = 0,
        this.EmployeeName = "",
        this.EmployeeUsername = "",
        this.EmployeePassword = "",
        this.EmployeeIdentity = "",
        this.EmployeeAddress = "",
        this.EmployeePhone = "",
        this.EmployeeDate = "",
        this.Department_ID = "",
        this.DepartmentRole = ""
    },
    createEmployee() {
      let department_role = 0;
      if(this.DepartmentRole == "Manager"){
        department_role = 1;
      }else if(this.DepartmentRole == "Staff"){
        department_role = 0;
      }
      axios
        .post("api/employees/", {
          name: this.EmployeeName,
          username: this.EmployeeUsername,
          password: this.EmployeePassword,
          identity: this.EmployeeIdentity,
          address: this.EmployeeAddress,
          phone: this.EmployeePhone,
          datesigned: this.EmployeeDate,
          department_id: this.Department_ID,
          role : department_role
        })
        .then((response) => {
          console.log(response.data);
          let url = "api/employees/";
          axios.get(url).then((res) => {
            this.employees = res.data;
            console.log(res.data);
          });
          alert("created succeed!");
        });
    },
    deleteEmployee(id) {
      if (!confirm("Are you sure to delete employee id: " + id)) {
        return;
      }
      axios.delete("api/employees/" + id).then((response) => {
        console.log(response.data);
        let url = "api/employees/";
        axios.get(url).then((res) => {
          this.employees = res.data;
          console.log(res.data);
        });
        alert("delete succeed!");
      });
    },
    editEmployee(employee) {
      this.modalTitle = "Edit Employee", this.EmployeeID = employee.id;
      this.EmployeeName = employee.name,
        this.EmployeeUsername = employee.username,
        this.EmployeePassword = employee.password,
        this.EmployeeIdentity = employee.identity,
        this.EmployeeAddress = employee.address,
        this.EmployeePhone = employee.phone,
        this.EmployeeDate = employee.datesigned
        
    },
    updateEmployee() {
      let id = this.EmployeeID;
      let department_role = 0;
      if(this.DepartmentRole == "Manager"){
        department_role = 1;
      }else if(this.DepartmentRole == "Staff"){
        department_role = 0;
      }
      axios
        .put("api/employees/" + id, {
          name: this.EmployeeName,
          username: this.EmployeeUsername,
          password: this.EmployeePassword,
          identity: this.EmployeeIdentity,
          address: this.EmployeeAddress,
          phone: this.EmployeePhone,
          datesigned: this.EmployeeDate,
          department_id: this.Department_ID,
          role: department_role
        })
        .then((response) => {
          console.log(response.data);
          let url = "api/employees/";
          axios.get(url).then((res) => {
            this.employees = res.data;
            console.log(res.data);
          });
          alert("Updated!");
        });
    },
    addDepartment() {
      this.modalTitle2 = "Add new Department",
        this.DepartmentID = 0,
        this.DepartmentRole = ""
    },
    createDepartment() {
      axios
        .post("api/departments/", {
          roles: this.DepartmentRole,
        })
        .then((response) => {
          console.log(response.data);
          let url2 = "api/departments/";
          axios.get(url2).then((res2) => {
            this.departments = res2.data.data;
            console.log(res2.data.data);
          });
          alert("created succeed!");
        });
    },
    deleteDepartment(id) {
      if (!confirm("Are you sure to delete department id: " + id)) {
        return;
      }
      axios.delete("api/departments/" + id).then((response) => {
        console.log(response.data);
        let url2 = "api/departments/";
        axios.get(url2).then((res2) => {
          this.departments = res2.data.data;
          console.log(res2.data.data);
        });
        alert("delete succeed!");
      });
    },
    editDepartment(department) {
      this.modalTitle2 = "Edit Department",
        this.DepartmentRole = department.roles;
      console.log(department);
    },
    updateDepartment() {
      var id = this.DepartmentID;
      axios
        .put("api/departments/" + id, {
          roles: this.DepartmentRole,
        })
        .then((response) => {
          console.log(response.data);
          let url2 = "api/departments/";
          axios.get(url2).then((res2) => {
            this.departments = res2.data.data;
            console.log(res2.data.data);
          });
          alert("Updated!");
        });
    },
    searchEmployee(){
        if(this.search == ""){
          let url = "api/employees/";
          axios.get(url).then((res) => {
            this.employees = res.data;
            console.log(res.data);
          });
        }else{axios.get("api/empsearch/" + this.search).then(response => this.employees = response.data);}
    },
    filterEmployee(){
        axios.get("api/filter/?start_date=" + this.startDate+"&end_date=" + this.endDate).then(response => {this.employees = response.data;
         console.log(response.data)});
    },
    filterDep(){
      axios.get("api/filterdep/"+this.fildep).then((res)=> {
        this.employees = res.data;
        console.log(res.data);
      })
    }
  },
};
</script>
