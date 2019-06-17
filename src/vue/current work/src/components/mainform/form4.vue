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
        <li class="active complete clrbluu">Add input</li>
        <li class="active complete clrdarc boddarc">Testing</li>
        <li>Assign to admin</li>
    </ul>
    <hr style="border-color:#EEEEEE;">
    <a class="custback" @click="$router.go(-1) "><i class="fas fa-chevron-left"></i>&nbsp;Back</a>
    <div class="row" style="margin: 0px auto;margin-top:10px;font-family: 'Roboto', sans-serif !important;">
        <div class="col-sm-8">
             <!-- templateBinder-------- {{errors}} -->
            <span v-html="output"></span>
            <!-- <template-binder :template="template" :formVals="formValsPass"> </template-binder> -->
            <!-- <span name="" id="" class="form-control" rows="20" v-html="dataeditor"></span> -->
        </div>
        <div class="col-sm-4">
            <h4 class="fomheadin">{{formName}} </h4>
            <div>
                <div class="alert alert-danger" v-for="(item,index) in errors['items']" :key="index">
                    <strong>{{item['field']}}: </strong>{{item['msg']}}
                </div>
            </div>
            <div class="mar0_15" v-for="(element, index) in formVals" :key="index">
                <i> {{cols[index]}} </i>

                <input-text  :binding="true" :formVals="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==1"></input-text>
                <input-textarea  :binding="true" :formVals="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==2"></input-textarea>
                <input-checkBox v-on:formValsUpdate="formValsUpdate" :binding="true" :formVals ="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==4"></input-checkBox>
                <input-radio v-on:formValsUpdate="formValsUpdate" :binding="true" :formVals="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==5"></input-radio>
                <input-select v-on:formValsUpdate="formValsUpdate" :binding="true" :formVals="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==6"></input-select>
                <input-date  :binding="true" :formVals="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==3"></input-date>
                <!-- <input-textarea  :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==2"></input-textarea>
                <input-date :element="element" :index="index" :formList="formList" :activated="false" v-if="element.fid==3"></input-date> -->
            </div>
            <hr style="border-color:#D5D5D5;">
            <div class="row" style="margin-bottom:20px;">
            <div class="col-sm-6 col-xs-12"><button @click="handleSubmit(true)" type="button" class="btn btn-info custbtnn">Save and Next</button></div>
            <div class="col-sm-6 col-xs-12"><button type="button" class="btn btn-info custbtnn sendlinkbtn" data-toggle="modal" data-target="#sendlink">Send link</button></div>
            <div class="col-sm-6 col-xs-12" style="clear:both;" @click="handleSubmit(false)"><button type="button" class="btn btn-info custbtnn2">Save and Close</button></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sendlink" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body" style="max-width: 420px;margin: 0px auto;">
             <h5>Enter email address for get form link</h5>
          <div class="form-group">
                <label class="lblcustm">Email address</label>
                <input type="email" class="form-control">
            </div><br><br>
            <div class="row" style="margin:0px;">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button"  class="btn btn-info  sendlinkbtn pull-right">Send</button>
          </div><br>
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
import templateBinder from './templateBinder.vue'

import VueLodash from 'vue-lodash'
import store from './store.js'
import draggable from 'vuedraggable'
import axios from 'axios'

export default {
    name: 'form4',
    components:{
        inputText,
        inputTextarea,
        inputDate,
        draggable,
        inputRadio,
        inputCheckBox,
        inputSelect,
        inputFileupload,
        inputDaterange,
        templateBinder
    },
    data(){
        return {
            dataeditor : '',
            formList: [],
            cols: [],
            formVals: [],
            template: [],
            output: '',
            formName: '',
            error: []
        };
    },
    created(){
        if(!localStorage.formID) this.$router.push('/form1')
        if(localStorage.formID == -1) this.$router.push('/form2')
        if(localStorage.template && localStorage.formList && localStorage.cols && localStorage.formName){
            this.dataeditor = localStorage.template
            this.formList = JSON.parse(localStorage.formList)
            this.cols = JSON.parse(localStorage.cols)
            this.formName = localStorage.formName
        }
        else this.$router.push('/form3')

        this.updateTemplate()
        this.debouncedUpdateTemplate = this.updateTemplate
        length = this.formList.length
        for(let i=0;i<length;i++)
        {
            this.formVals.push("")
        }

        this.template.push({isPlaceholder: false, index: -1, value: ''})

        // template is the array that stores the parsed template, isPlaceholder would mean it is a placeholder for that value
        let s = ''
        for(let i=0;i<this.dataeditor.length;){

            if(this.dataeditor[i]=='[' && i!=this.dataeditor.length-1 && this.dataeditor[i+1]=='['){
                this.template.push({isPlaceholder: false, value: s, index: -1})
                s = ''
                let j = 0
                for(j=i+2;j<this.dataeditor.length-2 && (this.dataeditor[j]!=']' || this.dataeditor[j+1]!=']');j++)
                    s = s+this.dataeditor[j]

                if(this.dataeditor[j+1]!=']') continue;

                let isPlaceholder = true
                let index = -1

                for(j=0;j<this.cols.length;j++)
                {
                    if(this.cols[j]==s) {
                        index = j
                        break
                    }
                }
                this.template.push({isPlaceholder: isPlaceholder, value: '', index: index})
                i+=s.length+4
                s=''
            }
            else{
                s = s+this.dataeditor[i]
                i++
            }
        }

        this.template.push({isPlaceholder: false, value: s, index: -1})
        this.updateTemplate()
        //template array creation end

    },
    methods:{
        formValsUpdate(value){
            this.formVals = value
            console.log(this.formVals)
            this.updateTemplate()
        },
        updateTemplate(){
            this.output = ''
            for(let i=0;i<this.template.length;i++)
            {
                if(this.template[i].isPlaceholder) this.template[i].value = '<u>' + this.formVals[this.template[i].index] + '</u>'
                this.output = this.output + this.template[i].value
            }

        },
        handleSubmit(e){
            let valid = true
            for(let i=0;i<this.formVals.length;i++){
                if(this.formList[i].validations.required && this.formVals[i]==""){
                    valid = false;
                    console.log(this.formVals)
                    break;
                }
            }
            console.log(this.errors.items.length);
            if( (this.errors && this.errors.items.length!=0) || !valid) {console.log("fis evrythig"); return;}
            let resp = {}
            for(let i=0;i<this.cols.length;i++){
                resp[this.cols[i]] = this.formVals[i]
            }
            resp['uid'] = 1010
            console.log(resp)

            axios.post('http://127.0.0.1:8000/api/Forms/SavePdf/'+localStorage.formID, resp)
                .then( response =>{
                    console.log(response.data);
                    if(e)this.$router.push('/form5')
                    else this.$router.push('/templates')
                    }
                )
                .catch( error => { console.log(error) });
        }
    },
    watch: {
        formVals: function(){
            this.updateTemplate()
        }
    }
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
.custbtnn, .custbtnn2{
    margin-bottom: 10px;
    padding: 7px 0px;
}
.sendlinkbtn{
    background: #E9F3FF !important;
    color: #3284EF !important;
}
</style>
