<template>
<div>
      <div class="dragdiv" ref>
        <i class="fas fa-grip-vertical dotpos"></i>
        <div class="pull-right" v-if="activated==true">
            <i class="far fa-edit mar05 clrdrc cuspointer" data-toggle="modal" :data-target="target"></i>
            <i class="fas fa-times mar05 clrlitegry cuspointer" @click="del"></i>
        </div>
        <div v-if="binding==true" class="form-group">
          <b style="color: red" v-if="element.validations.required">* </b>
            <label class="lblcustm" for="usr">{{element.label}}</label>
                <div class="form-group">
                    <select name = "options" v-model="selected">
                        <option name="opt1" class="form-group" v-for="(item, index) in this.element.options" :key="index">{{item}}</option>
                    </select>
                </div>
        </div>

        <div v-else class="form-group">
          <b style="color: red" v-if="element.validations.required">* </b>
            <label class="lblcustm" for="usr">{{element.label}}</label>
                <div class="form-group">
                    <select name = "options" v-model="selected">
                        <option name="opt1" class="form-group" v-for="(item, index) in this.element.options" :key="index" >{{item}}</option>
                    </select>
                </div>
        </div>


      </div>

    <div :id="index" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select attribute form</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="lblcustm">Label name</label>
            <input type="text" class="form-control" placeholder="Enter label name" v-model="element.label">
          </div>
          <div class="row" style="margin:0px;">
          <div class="form-group">
            <label class="lblcustm">Option list</label>
                    <div class="form-group" v-for="(item, index) in this.element.options" :key="index">
                    <input type="text" class="form-control fombotm10" placeholder="Enter option name" v-model="element.options[index]" />
                    <span><i @click="remove(index)" class="fas fa-times clrlitegry crspos cuspointer"></i></span>
                  </div>
          </div>
          </div>
      <button class="pull-right" @click="add" style="text-decoration:underline;margin-right:15px;"><i class="fas fa-plus"></i>&nbsp;add option</button>
      <div class="form-group">
                <input type="checkbox" id="selc" name="selectrequired" value="1" v-model="element.validations['required']">
                <label for="selc">Required</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
    </div>
    </div>

</template>

<script>
export default {
  name:'inputselect',
  props:[
    'element',
    'index',
    'formList',
    'activated',
    'binding',
    'formVals'

  ],
  data(){
    return{
      target:'#'+this.index,
      selected: ''
    }
  },
  created(){
    if(this.element.default_value) this.selected = this.element.default_value
  },
  methods:{
    select(item){
      this.formVals[this.index] = item
      console.log("here")
      this.$emit('formValsUpdate', this.formVals)
    },
     save(){
      let temp = JSON.parse(localStorage.formList)
      temp[this.index] = this.element
      localStorage.formList = JSON.stringify(temp) 
    },
    add(){
      if(!this.activated) return;
      this.element['options'].push("Default");
      this.save()
    },
    remove(index){
      if(!this.activated) return;
      console.log(index);
      this.element.options.splice(index, 1);
      this.save()
    },
    del(){
      if(!this.activated) return;
      this.formList.splice(this.index, 1);
      localStorage.formList = JSON.stringify(this.formList) 
      // this.save()
    }

  },
  watch:{
    selected(){
      if(this.binding) this.select(this.selected)
      if(this.activated) this.element.default_value = this.selected
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.fombotm10{
  margin-bottom: 15px;
  width: 97%;
  float: left;
}
.crspos{
  float: right;
  margin-top: 10px;
}

</style>
