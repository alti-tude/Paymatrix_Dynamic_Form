<template>
<div>
   <div class="dragdiv" ref>
    <i class="fas fa-grip-vertical dotpos"></i>
    <div class="pull-right" v-if="activated==true">
        <i class="far fa-edit mar05 clrdrc cuspointer" data-toggle="modal" :data-target="target"></i>
        <i class="fas fa-times mar05 clrlitegry cuspointer" @click="del"></i>
    </div>
    <div class="form-group">
        <b style="color: red" v-if="element.validations.required">* </b>
        <label class="lblcustm" for="usr">Upload Govt. document</label>
          <input class="form-control" type="file" id="myFile">
        <small>jpg/png/pdf files with a size less than 500kb</small>
    </div>

  </div>
  <div :id="index" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">File upload attribute form</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="lblcustm">Label name</label>
            <input type="text" class="form-control" placeholder="Enter label name" v-model="element.label">
          </div>
          <div class="form-group">
            <label class="lblcustm">Helping text</label>
            <input type="text" class="form-control" placeholder="Enter helping text" v-model="element.helpingText">
          </div>
          <div class="form-group">
                <input type="checkbox" id="file" name="fileuploadrequired" value="1" v-model="element.validations.required">
                <label for="file">Required</label>
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
  name:'inputFileupload',
  props:[
    'element',
    'index',
    'formList',
    'activated'

  ],
  data(){
    return{
      target:'#'+this.index
    }
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
