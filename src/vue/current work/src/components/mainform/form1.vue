<template>
<div>
  <div class="mar0_15">
    <span class="fonweigh700" style="float:right;"><a>X</a></span>
    <h4 class="fonweigh700">Create template</h4>
    <hr style="border-color:#EEEEEE;">
  </div>
<div class="mainfomlayout">
    <ul id="progressbar">
        <li class="active clrdarc">Template info</li>
        <li>Create input</li>
        <li>Add input</li>
        <li>Testing</li>
        <li>Assign to admin</li>
    </ul>
    <hr style="border-color:#EEEEEE;">
    <br class="hidden-xs">
    <br class="hidden-xs">
    <div class="fom1">
        <div class="col-sm-12">
        <form class="form-horizontal">
            <div class="form-group">
            <label class="control-label col-sm-4 lblcustm" for="agrname">Rent agreement name</label>
             <div class="col-sm-8">
            <input type="text" class="form-control" id="agrname" v-model="formName">
             </div>
            </div>
            <br class="hidden-xs">
            <div class="form-group">
            <label class="control-label col-sm-4 lblcustm" for="stampduty">Select stamp</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="stampduty">
            </div>
            </div>
            <!-- <br class="hidden-xs">
            <div class="form-group">
            <label for="agrtype">Agreement type</label>
            <input type="text" class="form-control" id="agrtype">
            </div> -->
            <br class="hidden-xs">
            <div class="row">
            <div class="maxbtnwid">
            <div class="col-xs-6"><button type="button" class="btn btn-info custbtnn" @click="handleSubmit">Save and Next</button></div>
            <router-link class="link" :to="{ name: 'dashboard' }"><div class="col-xs-6"><button type="button" class="btn btn-info custbtnn2">Save and Close</button></div></router-link>
            </div>
            <!-- <div class="col-xs-5 closelink"><a @click="$router.go(-1)" data-dismiss="modal" style="cursor:pointer;">Close</a></div> -->
            </div>
        </form>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
    name: 'form1',
    data(){
        return{
            formName: ''
        }
    },
    created(){
        if(localStorage.formID!=-1) {
            this.formName = localStorage.form_name;
        }
    },  
    methods:{
        handleSubmit(e){
            e.preventDefault();
            localStorage.formName = JSON.stringify(this.formName)
            console.log(localStorage)
            this.$router.push('/form2')
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.fonweigh700{
    font-weight: 700;
}
.mar0_15{
    margin: 0px 15px;
}
   /*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
    padding-left: 0px;
    font-family: 'Roboto', sans-serif;
}

#progressbar li {
    list-style-type: none;
    color: #504c4c;
    text-transform: uppercase;
    font-size: 9px;
    width: 20%;
    float: left;
    position: relative;
    letter-spacing: 0px;
    text-align: center;
}

#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 24px;
    height: 24px;
    line-height: 23px;
    display: block;
    font-size: 12px; 
    font-weight: 400;
    color: #B0BEC5;
    background: #ffffff;
    border: 2px solid #B0BEC5;
    border-radius: 25px;
    margin: 0 auto 10px auto;
        z-index: 1;
    position: relative;
}
.clrbluu{
    color: #3284EF !important;
}
.clrdarc{
    color: #263238 !important;
}

/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #B0BEC5;
    position: absolute;
    left: -50%;
    top: 11px;
   /* z-index: -1; put it behind the numbers*/
}

#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before {
    background: #ffffff;
    color: #263238;
    border: 2px solid #263238;
}
 #progressbar li.active:after{
    background: #ffffff;
    color: #263238;
    border: 1px solid #B0BEC5;
 }

#progressbar li.complete:before {
    background: #ffffff;
    color: #3284EF;
    border: 2px solid #3284EF;
    font-weight: 400;
}
 #progressbar li.complete:after{
     background: #ffffff;
    color: #3284EF;
    border: 1px solid #3284EF;
    font-weight: 400;
 }

.mainfomlayout{
    max-width: 1000px;
    margin: 0px auto;
}
.fom1{
  max-width: 560px;
    margin: 0px auto;
}
.maxbtnwid{
    max-width: 400px;
    margin: 0px auto;
}
.custbtnn{
    width: 100%;
    padding: 7px 0px;
    color: #fff !important;
    background-color: #0486FE!important;
    border-color: #0486FE !important;
}
.custbtnn2{
    width: 100%;
    padding: 7px 0px;
    color: #606266 !important;
    background-color: #FFFFFF !important;
    border-color: #DCDFE6 !important;
}
.custbtnn:hover{
    color: #fff;
    background-color: #31b0d5;
    border-color: #269abc;
}
.closelink{
    text-align: center;
    margin: 8px 0px;
}
</style>