<template>
<div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <!-- <div class="agrmtbtnalign"><router-link :to="{ name: 'form1' }"><button type="button" class="btn btn-default btncustom" data-toggle="modal" data-target="#myModal">Create template</button></router-link></div> -->
                   
                   <router-view></router-view>  
                </div>
            </div>
          </div>
      </div>
</div>
</template>



<script>


export default {
  name: 'maincontent',
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

 .btncustom{
   border-radius: 5px;
    margin: 20px 15px 0px 0px;
    float: right;
 }
 .modal{
   padding-left: 0px !important;
 }
 .modal-dialog {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
}
.modal-content {
      position: inherit;
    height: 100%;
    min-height: 100%;
    height: auto;
    border-radius: 0;
        border: none;
        box-shadow: none;
        padding: 0px 25px;
        opacity: 1;
}
 @media only screen and (max-width: 767px){
   .btncustom{
    float: none;
 }
   .agrmtbtnalign{
    text-align: center;
 }
 }

</style>
