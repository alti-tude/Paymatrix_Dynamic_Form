<template>
<div>
      <div class="row marzeros">
          <div class="col-md-5 col-sm-5">
              <!-- <p class="clrliteashh">Total vendors:70</p> -->
          </div>
          <div class="col-md-7 col-sm-7 ritetocenter">
              <div class="form-inline">
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons"><i class="fas fa-file-download"></i></button>
                    </div>
                    <div class="form-group mar5_5">
                       <button type="button" class="btn btn-info blubtn" @click="createNew">Create template</button>
                    </div>
              </div>
          </div>
      </div><br>
      <div class="row marzeros">
          <div class="col-md-5 col-sm-5">
              <!-- <p class="clrliteashh">Total vendors:70</p> -->
          </div>
          <div class="col-md-7 col-sm-7 ritetocenter">
              <div class="form-inline">
                    <div class="form-group mar5_5">
                       <button type="button" class="btn btn-icons iconpading"><i class="far fa-clone"></i></button>
                    </div>
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons iconpading"><i class="far fa-edit"></i></button>
                    </div>
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons iconpading"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons iconpading"><i class="fas fa-filter"></i></button>
                    </div>
                     <div class="form-group mar5_5">
                        <select class="form-control" id="sel1" style="padding-left:5px;">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="form-group mar5_5">
                        <input type="text" class="form-control" id="" placeholder="Search">
                    </div>
              </div>
          </div>
      </div><br>
      <div class="row marzeros">
          <div class="table-responsive">          
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Template name</th>
                        <th>Stamp amount</th>
                        <th>Admin name</th>
                        <th>Created date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in formDetails" :key = index> 
                        <td> 
                            <input type="checkbox" :id="'opt'+index" name="opt-2" value="2">
                            <label :for="'opt'+index"> </label>
                            
                        </td>
                        <td>{{item.form_name}} </td> 
                        <td>Lorem Ipsum</td>
                        <td>Lorem Ipsum</td>
                        <td>{{item.created_at.split(' ')[0]}}</td>
                        <td>{{item.form_status}}</td>
                        <td v-if="item.form_status == 'Draft'"> 
                            <div class="form-inline">
                            <button type="button" class="btn btn-info  blubtn" @click="draft(index)">Draft</button>
                            </div>
                        </td>
                        <td v-else>
                            <div class="form-inline">
                                <button type="button" class="btn btn-default ">view</button>
                            </div>
                        </td>
                    </tr>
                    
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <p><a href="" class="clrliteashh">Download .xls</a></p>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </nav>
            </div>
      </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import axios from 'axios'

export default {

  data(){
      return{
          formDetails: [],
      };
  },
  created(){
      console.log("adsdasdasds")
      axios.get('http://127.0.0.1:8000/api/Forms/all')
        .then(response => {
            this.formDetails = JSON.parse(JSON.stringify(response.data))
        })
        .catch(err => {console.log(err)})
  },
  methods:{
      draft(form_index){
          localStorage.clear();
          localStorage.formID = this.formDetails[form_index].id
          localStorage.form_name = this.formDetails[form_index].form_name
          this.$router.push('/form1')
      },
      createNew(){
          localStorage.clear();
          localStorage.formID = -1;
          this.$router.push('form1');
      }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.clrrdd{
    color: #FA8072;
}
</style>