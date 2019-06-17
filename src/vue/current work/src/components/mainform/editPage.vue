<template>
<div>
    <div class="mar0_15">
    <span class="fonweigh700" style="float:right;"><a>X</a></span>
    <h4 class="fonweigh700">Create template</h4>
    <hr style="border-color:#EEEEEE;">
  </div>
<div class="mainfomlayout">
    <ul id="progressbar">
        <li class="active complete clrbluu">Template info</li>
        <li class="active complete clrdarc boddarc">Create input</li>
        <li>Add input</li>
        <li>Testing</li>
        <li>Assign to admin</li>
    </ul>
    <hr style="border-color:#EEEEEE;">
    <a class="custback" @click="$router.go(-1)"><i class="fas fa-chevron-left"></i>&nbsp;Back</a>
    <div class="row" style="margin-top:10px;font-family: 'Roboto', sans-serif;">
        <div class="col-sm-8">
            <div class="board-left">
                <h5 class="clrlitegry fonweigh700">Agreement Form {{formName}}</h5>
                <draggable class="dragArea" :list="formList" :options="formOptions" @add='add'>
                     <div class="mar0_15" v-for="(element, index) in formList" :key="index">
                        <input-text  :element="element" :index="index" :formList="formList" v-if="element.id==1"> </input-text>
                        <input-textarea  :element="element" :index="index" :formList="formList" v-if="element.id==2"> </input-textarea>
                        <input-date :element="element" :index="index" :formList="formList" v-if="element.id==3"></input-date>
                        <input-checkBox :element="element" :index="index" :formList="formList" v-if="element.id==4"></input-checkBox>
                        <input-radio :element="element" :index="index" :formList="formList" v-if="element.id==5"></input-radio>
                    </div>
                   <!-- <h4>    --END--    </h4> -->
                    <hr>

                </draggable>


              
            </div> 
        </div>

      <div class="col-sm-4">
            <div class="board-right">
                <p class="mainfieldheading clrdrcgray">input fieds</p>
                <hr style="border-color:#D5D5D5;margin-bottom: 5px;">

                    <ul class="inputulrite">
                        <draggable class="dragArea" v-model="inputs" :options="formOptionsInput" @change="handleChange">

                                <li v-for="(element,index) in inputs" :key="index"><i class="fas fa-chevron-circle-right"></i>&nbsp;&nbsp;&nbsp;{{element.field_type}}</li>
                        </draggable>

                    </ul>
            </div>
            <hr style="border-color:#D5D5D5;">
            <div class="row">
            <div class="col-xs-6"><button type="button" class="btn btn-info custbtnn" @click="submit">Save and Next</button></div>
            <router-link class="link" :to="{ name: 'dashboard' }"><div class="col-xs-6"><button type="button" class="btn btn-info custbtnn2">Save and Close</button></div></router-link>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
import inputTextarea from './inputcomponent/inputtextarea.vue'
import inputRadio from './inputcomponent/inputradio.vue'
import inputCheckBox from './inputcomponent/inputcheckbox.vue'
import inputDate from './inputcomponent/inputdate.vue'
import inputText from './inputcomponent/inputtext.vue'
import store from './store.js'
import draggable from 'vuedraggable'
import axios from 'axios'
import qs from 'qs'

export default {
    name: 'editPage',
    props: [
        'formName',
        'uid'
    ],
    components:{
        inputText,
        inputTextarea,
        inputDate,
        draggable,
        inputRadio,
        inputCheckBox
    },
    data(){
        return{
            inputs:'',
            formList: [],
            success: false,
            err: ''
        }
    },
    created: function(){
        this.inputs = this.$store.state.inputs;
        this.formList = JSON.parse(localStorage.formList);
    },
    computed:{
        formOptionsInput() {
            return{
                animation: 150,
                group: {
                    name: 'description',
                    pull: 'clone',
                    put: false,
                    revertClone: true
                },
                ghost: 'ghost'
            }
        },
        formOptions(){
            return{
                animation: 150,
                group: {
                    name: 'description',
                    put: true
                },
                ghost: 'ghost'
            }
        },
        listSize(){
            return this.formList.length;
        }
    },
    methods:{
        add(evt){
            var item = this.inputs[evt.oldIndex]
            this.formList.splice(evt.newIndex, 1, JSON.parse(JSON.stringify(item)))
        },
        handleChange(){
            this.inputs = this.$store.state.inputs
        },
        submit(e){
            e.preventDefault();

            var returnList = JSON.parse(JSON.stringify(this.formList))

            for(let i=0;i<this.formList.length;i++){
                this.formList[i].order_of_field=i

                returnList[i].validations=[]
                var a = this.formList[i].validations
                // console.log(a)
                // console.log(this.formList[i])
                for(var key in this.formList[i].validations){
                    console.log(this.formList[i].validations[key])
                    if(this.formList[i].validations.hasOwnProperty(key) && this.formList[i].validations[key]==true)
                        returnList[i].validations.push(key)
                }
                console.log(returnList[i].validations)

            }

            
            var resp = {
               title: this.formName,
               u_id: this.uid,
               attr: JSON.parse(JSON.stringify(returnList))
            }
            let axiosConfig = {
                headers: {
                    'Content-Type': 'application/json',
                    "Access-Control-Allow-Origin": "*",
                }
            };
            axios.post('http://127.0.0.1:8000/api/Forms/store',resp)
                      .then( response => console.log(response) )
                      .catch( error => console.log(error) );
            
            this.$router.push('/form3')
        }
    },
    store

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.custback{
    color: #546E7A;
    font-weight: 600;
}
.lblcustm{
    font-weight: 500;
    color: #536771;
}
.clrlitegry{
    color: #B0BEC5;
}
.clrdrc{
    color: #263238;
}
.board-left{
    background: #ffffff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
    transition: box-shadow .5s;
    -webkit-transition: box-shadow .5s;
    -moz-transition: box-shadow .5s;
    transition-timing-function: ease-out;
    -webkit-transition-timing-function: ease-out;
    -moz-transition-timing-function: ease-out;
    margin-bottom: 20px;
}
.board-left:hover{
  box-shadow: 0px 0px 15px rgba(0,0,0,0.4);  
}
.dotpos{
    position: absolute;
    margin-left: -13px;
    margin-top: 2px;
    cursor: move;
}
.mar05{
    margin: 0px 5px;
}
.cuspointer{
    cursor: pointer;
}
.modal{
        background: rgba(0,0,0,0.4);
}
.dragdiv{
        margin-bottom: 30px;
}
.boxul{
    padding-left: 10px;
    list-style: none;
}
/* custom checkbox code */
input[type=checkbox] + label {
  display: block;
  margin: 10px 0px;
  cursor: pointer;
  padding: 0.2em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 20px;
  height: 20px;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  color: transparent;
  transition: .2s;
}

input[type=checkbox] + label:active:before {
  transform: scale(0);
}

input[type=checkbox]:checked + label:before {
  background-color: #3284EF;
  border-color: #3284EF;
  color: #fff;
}

input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}

input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
}
/* custom radio button */
/* TODO change the cursor */
/* Hide default checkboxes */
input[type=radio]{
  display: none;
}

/* Style custom radio button shell */
input[type=radio] + label > span {
  display: inline-block;
  width: 15px;
  height: 15px;
  margin: 3px 6px 3px 3px;
  border: 1px solid #546E7A;
  border-radius: 8px;
  vertical-align: bottom;
}

/* If you want cursor change on hover */
/* input[type=radio] + label > span:hover {
  cursor: pointer;
} */

/* Style custom selected radio button bullet */
input[type=radio]:checked + label > span > span {
  display: block;
  width: 7px;
  height: 7px;
  margin: 3px;
  border: 1px solid #3284EF;
  border-radius: 5px;
  background: #3284EF;
}

.radiolabel {
    display: block;
    font-size: 14px;
    /* color: #363738; */
    margin: 10px 0px;
}

.board-right{
    border: 1px solid #D5D5D5;
}
.mainfieldheading{
    text-align: center;
     margin: 20px 0px 0px;
}
.clrdrcgray{
    color: #546E7A
}
.inputulrite{
    padding-left: 0px;
    list-style: none;
    margin: 0px 15px 10px;
}
.inputulrite li{
    border-bottom: 1px solid #D5D5D5;
    line-height: 40px;
    margin: 6px 0px;
    color: #B0BEC5;
    cursor: move;
}
.inputulrite li:last-child{
    border-bottom: none;
}
.lblcustm {
    font-weight: 400;
    color: #536771;
}
.boddarc.active:before{
    border-color: #263238 !important;
    color: #263238;
}
</style>