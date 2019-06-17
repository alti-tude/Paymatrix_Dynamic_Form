<template>
<div>
  <!-- actual shown input field -->

  <div class="dragdiv" ref>
    <i class="fas fa-grip-vertical dotpos"></i>
    <div class="pull-right" v-if="activated==true">
        <i class="far fa-edit mar05 clrdrc cuspointer" data-toggle="modal" :data-target="target"></i>
        <i class="fas fa-times mar05 clrlitegry cuspointer" @click="del"></i>
    </div>
    <div class="form-group">
        <b style="color: red" v-if="element.validations.required">* </b>
        <label class="lblcustm" for="usr">{{element.label}}</label>
        <!-- <input type="textarea" v-bind:placeholder="element.placeholder" class="form-control" id="usr"> -->
        <input v-if="binding==true" v-validate="element.validations" :name="element.label" type="textarea" v-bind:placeholder="element.placeholder" v-model="formVals[index]" class="form-control" id="usr">
        <input v-else type="textarea" v-bind:placeholder="element.placeholder" class="form-control" id="usr">

    </div>
  </div>

  <!-- popup -->
  <div :id="index" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Text area attribute form</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="lblcustm">Label name</label>
              <input type="text" class="form-control" placeholder="Enter label name" v-model="element.label">
            </div>
            <div class="form-group">
              <label class="lblcustm">Placeholder text</label>
              <input type="text" class="form-control" placeholder="Enter Placeholder text" v-model="element.placeholder">
            </div>
            <div class="form-group">
              <label class="lblcustm">Helping text</label>
              <input type="text" class="form-control" placeholder="Enter helping text" v-model="element.helpingText">
            </div>
            <div class="form-group">
              <label class="lblcustm">Minimum</label>
              <input type="text" class="form-control" v-model="element.min">
            </div>
            <div class="form-group">
              <label class="lblcustm">Maximum</label>
              <input type="text" class="form-control" v-model="element.max">
            </div>
            <div class="form-group">
                  <input type="checkbox" id="texarea" name="textarearequired" value="1" v-model="element.validations.required">
                  <label for="texarea">Required</label>
              </div>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click="save">CLOSE</button>
          </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name:'inputTextarea',
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
      target: '#'+this.index,
      required_id: this.$store.state.count+'#required',
      eml_id: this.$store.state.count+"#eml",
      numeric_id: this.$store.state.count + "#numberic"
    }
  },
  created(){
    this.$store.state.count+=1
    console.log(this.required_id)
  },
  methods:{
   save(){
      let temp = JSON.parse(localStorage.formList)
      temp[this.index] = this.element
      localStorage.formList = JSON.stringify(temp)
    },
    del(){
      if(!this.activated) return;
      this.formList.splice(this.index, 1);
      localStorage.formList = JSON.stringify(this.formList)
      // this.save()
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>


</style>
