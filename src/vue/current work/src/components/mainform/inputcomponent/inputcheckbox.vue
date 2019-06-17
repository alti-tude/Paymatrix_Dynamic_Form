<template>
<div>
    <div class="dragdiv" ref>
        <i class="fas fa-grip-vertical dotpos"></i>
        <div class="pull-right" v-if="activated==true">
            <i class="far fa-edit mar05 clrdrc cuspointer" data-toggle="modal" :data-target="target"></i>
            <i class="fas fa-times mar05 clrlitegry cuspointer" @click="del"></i>
        </div>
        <div v-if="binding==true" class="form-group">
            <label class="lblcustm" for="usr">{{element.label}}</label> 
                        <input type="checkbox" name="opt1" v-model="val">
                        <label for="opt1" @click="togle">{{element.options[0].name}}</label>
        </div>
        <div v-else class="form-group">
            <label class="lblcustm" for="usr">{{element.label}}</label>
                <div class="form-group" v-for="(item, index) in element.options" :key="index" >
                        <input type="checkbox" name="opt1" v-model="element.options[index].value" >
                        <label for="opt1" @click="makeDefault(item.name, index)">{{item.name}}</label>
                </div>
        </div>
      </div>
      <div :id="index" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Checkbox attribute form</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label class="lblcustm">Label name</label>
                  <input type="text" class="form-control" placeholder="Enter label name" v-model="element.label">
                </div>
                <div class="row" style="margin:0px;">
                <div class="form-group">
                  <!-- <label class="lblcustm">Option list</label> -->

                  <div class="form-group" v-for="(item, index) in this.element.options" :key="index">
                    <input type="text" class="form-control fombotm10" placeholder="Enter option name" v-model="element.options[index].name" />
                  </div>

                </div>
                </div>
                <!-- <button class="pull-right" @click="add" style="text-decoration:underline;margin-right:15px;"><i class="fas fa-plus"></i>&nbsp;add option</button> -->
                <br>
                <!-- <div class="form-group">
                      <input type="checkbox" id="chck" name="checkrequired" value="1" v-model="element.validations.required">
                      <label for="chck">Required</label>
                  </div> -->
              </div>
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
  name:'inputCheckbox',
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
      val: '',
    }
  },
  created(){
        if(this.binding){
        if(this.element['options'][0].value)
          this.formVals[this.index] = this.element['options'][0].name
      }
      if(this.activated && this.element['options'].length == 0) this.element['options'].push({name:"Default", value: false});
      this.save();
  },
  methods:{
    save(){
      let temp = JSON.parse(localStorage.formList)
      temp[this.index] = this.element
      localStorage.formList = JSON.stringify(temp) 
    },
    add(){
      if(!this.activated) return
      this.element['options'].push({name:"Default", value: false});
      this.save()      
    },
    remove(index){
      if(!this.activated) return
      this.element.options.splice(index, 1);
      this.save()      
    },
    del(){
      if(!this.activated) return
      this.formList.splice(this.index, 1);
      localStorage.formList = JSON.stringify(this.formList) 
      // this.save()            
    },
    makeDefault(req, idx){
      if(!this.activated) return
      this.element.options[idx].value ^= 1
      if(this.element.options[idx].value) this.element.default_value = req
      else this.element.default_value = ""
      this.save()      
    },
    togle(){
      this.val ^= 1
      if(this.val) {
        this.formVals[this.index] = this.element.options[0].name
      }
      else this.formVals[this.index] = ""
      let value = this.formVals
      this.$emit("formValsUpdate", value)
      console.log(this.formVals)

    }

  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
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


</style>
