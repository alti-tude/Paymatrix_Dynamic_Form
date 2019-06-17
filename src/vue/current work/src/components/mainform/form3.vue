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
        <li class="active complete clrbluu ">Create input</li>
        <li class="active complete clrdarc boddarc">Add input</li>
        <li>Testing</li>
        <li>Assign to admin</li>
    </ul>
    <hr style="border-color:#EEEEEE;">
    <a class="custback" @click="$router.go(-1)"><i class="fas fa-chevron-left"></i>&nbsp;Back</a>
    <div class="row" style="margin-top:10px;font-family: 'Roboto', sans-serif !important;">
        <div class="col-sm-8">
            <tinymce id="d1" v-model="dataeditor" :other_options="tinyOptions" ></tinymce>
            <!-- <button @click="checkEditor">check</button> -->
        </div>
        <div class="col-sm-4">
            <h6 class="fomheadin">{{formName}} </h6>
            <div class="mar0_15" v-for="(element, index) in formList" :key="index">
                <i> {{element.data_column}} </i>
                <input-text  :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==1"></input-text>
                <input-textarea  :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==2"></input-textarea>
                <input-date :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==3"></input-date>
                <input-checkBox :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==4"></input-checkBox>
                <input-radio :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==5"></input-radio>
                <input-select :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==6"></input-select>
                <input-fileupload :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==7"></input-fileupload>
                <input-daterange :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==8"></input-daterange>
            </div>
            <hr style="border-color:#D5D5D5;">
            <div class="row" style="margin-bottom:20px;">
            <div class="col-xs-6"><button type="button" class="btn btn-info custbtnn" @click="checkEditorAndSubmit(true)">Save and Next</button></div>
            <div class="col-xs-6"><button type="button" class="btn btn-info custbtnn2" @click="checkEditorAndSubmit(false)">Save and Close</button></div>
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

export default {
    name: 'form3',
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
        return {
            dataeditor : '',
            tinyOptions: {
                    'height': 300,
                    branding: false
            },
            formList: [],
            formName: '',
            cols: [],
            problem: []
        };
    },

    created(){
        if(!localStorage.formID) this.$router.go('/form1')
        if(localStorage.formID == -1) this.$router.go('/form2')
        
        // if(localStorage.template && localStorage.formList && localStorage.cols && localStorage.form_name) {
        //     this.dataeditor = localStorage.template
        //     this.formList = JSON.parse(localStorage.formList)
        //     this.cols = JSON.parse(localStorage.cols)
        //     this.formName = localStorage.formName
        //     console.log(this.cols)
        //     console.log("cols")
        // }
        console.log("asdasda")
        console.log(this.dataeditor)
        axios.get('http://127.0.0.1:8000/api/Forms/'+localStorage.formID)
                .then( response =>{this.parseResponse(response)})
                .catch( error => console.log(error) );
    },
   
    methods:{
        parseResponse(response){
            var data = []
            var length = response.data.attr.length
            for(var i=0;i<length;i++)
                data.push(response.data.attr[i])
            this.formList = JSON.parse(JSON.stringify(data))
            length = this.formList.length
            console.log(this.formList)
            for(i=0;i<length;i++)
            {
                this.cols.push(this.formList[i].data_column)
                if(this.formList[i].options) this.formList[i].options = this.formList[i].options.split(',')
                else this.formList[i].options = []
                
                let a = []
                if(this.formList[i].options && this.formList[i].fid==4) //only for checkbox
                {
                    a.push({name: this.formList[i].options[0], value: false})
                    if(this.formList[i].default_value) a[0].value = true
                    this.formList[i].options = JSON.parse(JSON.stringify(a))
                }
                console.log("dadsada")
                console.log(a)

                //validations
                a = JSON.parse(JSON.stringify(this.$store.state.inputs[this.formList[i].fid-1].validations))
                if(this.formList[i].validations) 
                {
                    this.formList[i].validations = this.formList[i].validations.split('|')
                    for(let j = 0;j<this.formList[i].validations.length; j++)
                        a[this.formList[i].validations[j]] = true;
                    
                }

                //min & max
                if(this.formList[i].min) a['min'] = this.formList[i].min
                if(this.formList[i].max) a['max'] = this.formList[i].max
                this.formList[i]["validations"] = JSON.parse(JSON.stringify(a))
                console.log(JSON.parse(JSON.stringify(a)))

            }
            localStorage.formList = JSON.stringify(this.formList)
            localStorage.cols = JSON.stringify(this.cols)
            console.log(response.data)

            this.dataeditor = response.data.template
            localStorage.template = this.dataeditor 

            this.formName = response.data.form_name
            localStorage.form_name = this.formName
        },
        isMatch(data, pattern, index){
            let valid = true
            for(let i = 0; i<pattern.length;i++)
            {
                if(i+index>=data.length)
                {
                    valid = false
                    break
                }
                if(data[i+index]!=pattern[i]) 
                {
                    valid = false
                    break
                }
            }

            return valid
        },

        checkEditorAndSubmit(e){
            let newData = this.dataeditor
            let strippedData = ""
            let s1 = '<strong style="color: red;">'
            let s2 = ' [wrong]</strong>'
            for(let i =0;i<newData.length;){
                if(this.isMatch(newData, s1, i))
                    i = i+s1.length
                else if(this.isMatch(newData, s2, i))
                    i = i+s2.length
                else {
                    strippedData = strippedData + newData[i]
                    i++
                }
            }

            newData = strippedData
            this.dataeditor = newData
            console.log("newData")
            console.log(newData)
            let valid = true
            for(let i=0;i<newData.length-1;i++){
                let s = ""
                if(newData[i]=='[' && newData[i+1]=='['){
                    let j = 0;
                    for(j=i+2;j<newData.length-2 && (newData[j]!=']' || newData[j+1]!=']');j++)
                        s = s+newData[j]
                    if(newData[j+1]!=']') continue;
                    let flag = false
                    for(j=0;j<this.cols.length;j++)
                    {
                        console.log(this.cols[j])
                        console.log(this.cols[j]==s)
                        console.log(s)
                        if(this.cols[j]==s) {
                            flag = true
                            break
                        }
                    }
                    if(!flag) this.dataeditor = newData.slice(0,i+2)  + newData.slice(i+2+s.length, newData.length)
                    console.log(this.dataeditor)
                    valid &= flag
                }
            }

            if(valid) {
                let resp = {
                    template:this.dataeditor
                }
                axios.post('http://127.0.0.1:8000/api/Forms/addTemplate/'+localStorage.formID,resp)
                    .then( response => {
                            if(response.status<400) {
                                localStorage.template = this.dataeditor
                                localStorage.formList = JSON.stringify(this.formList)
                                localStorage.cols = JSON.stringify(this.cols)
                                if(e)this.$router.push('/form4')
                                else this.$router.push('/templates')
                                console.log("response")
                                console.log(response)
                            }
                        }
                    )
                    .catch( error => { console.log("adasdads"); console.log(error);} );
            }
            
        }
    },
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.fomheadin{
    color: #B0BEC5 !important;
    text-transform: inherit !important;
    font-size: 14px !important;
    font-weight: 400 !important;
}
.marfifteen_zero{
    margin: 10px 0px 20px;
}
.radiolabel, input[type=checkbox] + label{
    cursor: not-allowed;
}
</style>
