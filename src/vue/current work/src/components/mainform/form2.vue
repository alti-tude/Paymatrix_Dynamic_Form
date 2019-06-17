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
                <h5 class="clrlitegry fonweigh700">{{formName}}</h5>
                <draggable v-bind:style="{height: height+'px'}" class="dragArea" :list="formList" :options="formOptions" @add='add' @change="handleFormChange" >
                     <div class="mar0_15" v-for="(element, index) in formList" :key="index">
                        <input-text  :element="element" :index="index" :formList="formList" :activated="true" :binding="false" v-if="element.fid==1"> </input-text>
                        <input-textarea  :element="element" :index="index" :formList="formList" :activated="true" v-if="element.fid==2"> </input-textarea>
                        <input-date :element="element" :index="index" :formList="formList" :activated="true" v-if="element.fid==3"></input-date>
                        <input-checkBox :element="element" :index="index" :formList="formList" :activated="true" v-if="element.fid==4"></input-checkBox>
                        <input-radio :element="element" :index="index" :formList="formList" :activated="true" v-if="element.fid==5"></input-radio>
                        <input-select :element="element" :index="index" :formList="formList" :activated="true" v-if="element.fid==6"></input-select>
                        <input-fileupload :element="element" :index="index" :formList="formList" :activated="true" v-if="element.fid==7"></input-fileupload>
                        <input-daterange :element="element" :index="index" :formList="formList" :activated="true" v-if="element.fid==8"></input-daterange>
                    </div>
                   <!-- <h4>    --END--    </h4> -->
                    <!-- <h4></h4> -->
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
            <div class="col-xs-6"><button type="button" class="btn btn-info custbtnn" @click="submit(true)">Save and Next</button></div>
            <div class="col-xs-6"><button type="button" class="btn btn-info custbtnn2" @click="submit(false)">Save and Close</button></div>
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
import inputSelect from './inputcomponent/inputselect.vue'
import inputFileupload from './inputcomponent/inputfileupload.vue'
import inputDaterange from './inputcomponent/inputdaterange.vue'

import store from './store.js'
import draggable from 'vuedraggable'
import axios from 'axios'
import qs from 'qs'

export default {
    name: 'form2',
    components:{
        inputText,
        inputTextarea,
        inputDate,
        draggable,
        inputRadio,
        inputCheckBox,
        inputSelect,
        inputFileupload,
        inputDaterange
    },
    data(){
        return{
            inputs:'',
            formList: [],
            success: false,
            err: '',
            formName: '',
            uid: 1010,
            height: 20
        }
    },
    created: function(){
        if(!localStorage.formID) this.$router.push('/form1')

        this.inputs = this.$store.state.inputs;
        this.formName = localStorage.formName
        this.height = 200*(this.formList.length+1)
        console.log("adsasd")
        console.log(JSON.parse(this.formName))
        if(localStorage.formID != -1){
            axios.get('http://127.0.0.1:8000/api/Forms/'+localStorage.formID)
                .then( response =>{this.parseResponse(response)})
                .catch( error => console.log(error) );
        }
        else{
            if(!localStorage.formName) this.$router.push('/form1')
            else this.formName = localStorage.formName

            if(localStorage.formList) this.formList = JSON.parse(localStorage.formList)
            else this.formList = []
        }
        // console.log(JSON.parse(localStorage.formList))
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
        parseResponse(response){
            var data = []
            var length = response.data.attr.length
            for(var i=0;i<length;i++)
                data.push(response.data.attr[i])

            this.formList = JSON.parse(JSON.stringify(data))
            length = this.formList.length
            for(i=0;i<length;i++)
            {
                if(this.formList[i].options) this.formList[i].options = this.formList[i].options.split(',')
                else this.formList[i].options = []

                let a = []
                if(this.formList[i].options && this.formList[i].fid==4) //only for checkbox
                {
                    a.push({name: this.formList[i].options[0], value: false})
                    if(this.formList[i].default_value) a[0].value = true
                    this.formList[i].options = JSON.parse(JSON.stringify(a))
                }

                a = JSON.parse(JSON.stringify(this.$store.state.inputs[this.formList[i].fid-1].validations))
                if(this.formList[i].validations)
                {
                    this.formList[i].validations = this.formList[i].validations.split('|')
                    for(let j = 0;j<this.formList[i].validations.length; j++)
                        a[this.formList[i].validations[j]] = true;

                }
                this.formList[i]["validations"] = JSON.parse(JSON.stringify(a))
                console.log(this.formList[i]["validations"])
            }
            if(response.data.form_name) this.formName = JSON.stringify(response.data.form_name)
        },
        handleFormChange(){
            localStorage.formList = JSON.stringify(this.formList)
        },
        add(evt){
            var item = this.inputs[evt.oldIndex]
            this.formList.splice(evt.newIndex, 1, JSON.parse(JSON.stringify(item)))
            this.height = 100*(this.formList.length+1)
        },
        handleChange(){
            this.inputs = this.$store.state.inputs
        },
        submit(e){
            // e.preventDefault();
            var returnList = JSON.parse(JSON.stringify(this.formList))

            for(let i=0;i<returnList.length;i++){
                returnList[i].order_of_field=i+1
                //validation formatting
                returnList[i].validations=[]
                var a = this.formList[i].validations

                for(var key in this.formList[i].validations){
                    if(this.formList[i].validations.hasOwnProperty(key) && this.formList[i].validations[key]==true)
                        returnList[i].validations.push(key)
                }

                //field_name
                returnList[i].field_name = returnList[i].label.replace(/\s+/g, '_').toLowerCase();
                //options
                if(returnList[i].fid==4){
                    returnList[i].options = []
                    for(let j=0; j<this.formList[i].options.length; j++){
                        console.log(this.formList[i].options[j].name)
                        returnList[i].options.push(this.formList[i].options[j].name)
                    }
                }

                //min and max should not be null
                // if(returnList[i].min==null) returnList[i].min = 0
                // if(returnList[i].max==null) returnList[i].max = 0

            }

                //console.log(resp)
                // console.log(this.uid)
                // console.log(this.formName)
            localStorage.returnList = JSON.stringify(returnList)
            var resp = {
               title:JSON.parse(this.formName),
               u_id: this.uid,
               id: localStorage.formID,
               attr: JSON.parse(localStorage.returnList)
            }

            axios.post('http://127.0.0.1:8000/api/Forms/store',resp)
                .then( response => {
                        if(response.status==201) {
                            localStorage.formID = response.data.id
                            if(e)this.$router.push('/form3')
                            else this.$router.push('/templates')
                        }
                    }
                )
                .catch( error => console.log(error) );

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
