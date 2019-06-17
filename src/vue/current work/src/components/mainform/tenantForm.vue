
<template>
<div>
    <div v-if="error==true">
        <p> no form id given </p>
    </div>
    <div v-else>
        <div class="mainfomlayout">
            <hr style="border-color:#EEEEEE;">
            <div class="row" style="margin: 0px auto;margin-top:10px;font-family: 'Roboto', sans-serif !important;">
                <div class="col-sm-8">
                    <span v-html="output"></span>
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
                        <input-checkBox v-on:formValsUpdate="formValsUpdate" :binding="true" :formVals ="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==4"></input-checkBox>
                        <input-radio v-on:formValsUpdate="formValsUpdate" :binding="true" :formVals="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==5"></input-radio>
                        <input-select v-on:formValsUpdate="formValsUpdate" :binding="true" :formVals="formVals" :element="formList[index]" :index="index" :formList="formList" :activated="false" v-if="formList[index].fid==6"></input-select>
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
    name: 'tenantForm',
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
            error: ''
        };
    },
    created(){
        localStorage.clear()
        if(this.$route.query.fid)
            axios.get('http://127.0.0.1:8000/api/Forms/'+this.$route.query.fid)
                .then( response =>{this.parseResponse(response)})
                .catch( error => console.log(error) )
        else this.error=true
        console.log(this.error)
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
            console.log(response.data)
            this.dataeditor = response.data.template
            this.formName = response.data.form_name
            this.initVals()
        },
        initVals(){
            this.updateTemplate()
            // this.debouncedUpdateTemplate = this.updateTemplate
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
            console.log(resp)
            resp['uid'] = 1010;
            axios.post('http://127.0.0.1:8000/api/Forms/SavePdf/'+this.$route.query.fid, resp)
                .then( response =>{
                        window.location = response.data
                    }
                )
                .catch( error => console.log(error) );
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
