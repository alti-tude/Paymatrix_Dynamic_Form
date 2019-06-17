<template>
<div>
      <div class="row marzeros">
          <div class="col-md-5 col-sm-5">
              <!-- <p class="clrliteashh">Total vendors:70</p> -->
          </div>
          <div class="col-md-7 col-sm-7 ritetocenter">
              <div class="form-inline">
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons"><i class="fas fa-file-download"></i></button>
                    </div>
              </div>
          </div>
      </div><br>
      <div class="row marzeros">
          <div class="col-md-5 col-sm-5">
              <!-- <p class="clrliteashh">Total vendors:70</p> -->
          </div>
          <div class="col-md-7 col-sm-7 ritetocenter">
              <div class="form-inline">
                    <div class="form-group mar5_5">
                       <button type="button" class="btn btn-default">Show all</button>
                    </div>
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons iconpading"><i class="far fa-edit"></i></button>
                    </div>
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons iconpading"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="form-group mar5_5">
                        <button type="button" class="btn btn-icons iconpading"><i class="fas fa-filter"></i></button>
                    </div>
                     <div class="form-group mar5_5">
                        <select class="form-control" id="sel1" style="padding-left:5px;">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="form-group mar5_5">
                        <input type="text" class="form-control" id="" placeholder="Search">
                    </div>
              </div>
          </div>
      </div><br>
      <div class="row marzeros">
          <div class="table-responsive">          
                <table class="table">
                    <thead>
                    <tr>
                        <th> <input type="checkbox" id="opt1" name="opt-1" value="1">
                        <label for="opt1"></label></th>
                        <th>Admin name</th>
                        <th>User name</th>
                        <th>User Email</th>
                        <th>User Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <p><a href="" class="clrliteashh">Download .xls</a></p>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </nav>
            </div>
      </div>
    </div>
</template>

<script>
export default {
  
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.ritetocenter {
    text-align: right;
}
.mar5_5 {
    margin: 5px 5px;
}
.blubtn {
    border-color: #A3D0FD;
    background: #E6F1FC;
    color: #3284EF;
}
.iconpading {
        padding: 9px 12px;
}
.clrliteashh {
    color: #B0BEC5;
}
@media only screen and (max-width: 767px){
.ritetocenter {
    text-align: center;
}
}
</style>