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
        <li class="active complete clrbluu">Testing</li>
        <li class="active complete clrdarc boddarc">Assign to admin</li>
    </ul>
    <hr style="border-color:#EEEEEE;">
    <a class="custback" @click="$router.go(-1)"><i class="fas fa-chevron-left"></i>&nbsp;Back</a>
    <br class="hidden-xs">
    <br class="hidden-xs">
    <div class="fom1">
        <div class="col-sm-12">
        <form class="form-horizontal">
            <div class="form-group">
            <label class="control-label col-sm-4 lblcustm" for="agrname">Add admin</label>
             <div class="col-sm-8">
            <v-select v-model="selected" :options="selectoptions"></v-select>
             </div>
            </div>
            <br class="hidden-xs">
            <div class="form-group">
            <label class="control-label col-sm-4 lblcustm" for="stampduty">Admin details</label>
            <div class="col-sm-8">
            <textarea name="" id="" class="form-control"  rows="3"></textarea>
            </div>
            </div>
            <!-- <br class="hidden-xs">
            <div class="form-group">
            <label for="agrtype">Agreement type</label>
            <input type="text" class="form-control" id="agrtype">
            </div> -->
            <br class="hidden-xs">
            <div class="row">
            <div class="maxbtnwid pull-right">
            <router-link :to="{ name: 'dashboard' }"><div class="col-xs-6"><button type="button" class="btn btn-info custbtnn">Save and Next</button></div></router-link>
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
  data() {
    return{
        selectoptions: [
        'Vikram',
        'Isaac',
        'Rahul',
        'Suraj',
        'Ramu'
        ],
        selected: null
  };
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.v-select input[type=search], .v-select input[type=search]:focus{
    margin: 0px !important;
}
.v-select .dropdown-toggle{
    padding: 0px !important;
    border: 1px solid #DFDFDF !important;
}
</style>