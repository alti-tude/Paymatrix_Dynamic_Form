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
          <div class="form-group" v-for="(item, idx) in this.element.options" :key="idx" >
                 <input v-if="element.default_value==item" type="radio" :id="item" name="Ans" :value="item" checked="checked">
                 <input v-else type="radio" :id="item" name="Ans" :value="item">
                 <label class="radiolabel" :for="item" @click ="select(item)"><span><span></span></span>{{item}}</label>
          </div>
    </div>

    <div v-else class="form-group">
        <b style="color: red" v-if="element.validations.required">* </b>
        <label class="lblcustm" for="usr">{{element.label}}</label>
          <div class="form-group" v-for="(item, index) in this.element.options" :key="index" >
                 
                 <input v-if="element.default_value==item" type="radio" :id="item" name="Ans" :value="item" checked="checked">
                 <input v-else type="radio" :id="item" name="Ans" :value="item">
                 <label class="radiolabel" :for="item" @click ="makeDefault(item)"><span><span></span></span>{{item}}</label>
          </div>
    </div>
  </div>

  <div :id="index" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Radio attribute form</h4>
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
                  <input type="checkbox" id="radi" name="radiorequired" value="1" v-model="element.validations['required']" >
                  <label for="radi">Required</label>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click="save">Close</button>
          </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name:'inputRadio',
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
      target:'#'+ this.index
    }
  },
  created(){
    console.log(this.target)
    console.log(this.element)
    if(this.element.default_value) this.select(this.element.default_value)
  },
  methods:{
    select(item){
      if(!this.binding) return;
      this.formVals[this.index] = item
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
    },
    makeDefault(req){
      if(!this.activated) return;
      this.element.default_value = req
      console.log(this.element.default_value)
      this.save()
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
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



</style>
