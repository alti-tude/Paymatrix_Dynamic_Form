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
                    <tr>
                        <td>
                            <input type="checkbox" id="opt2" name="opt-2" value="2">
                        <label for="opt2"></label>
                        </td>
                        <td>
                            Lorem ipsum
                        </td>
                        <td>
                            Workspace
                        </td>
                        <td>
                            Lorem ipsum@Lorem.com
                        </td>
                        <td>
                            9999999999
                        </td>
                        <td>
                            Submitted
                        </td>
                        <td>
                            <div class="form-inline">
                                <button type="button" class="btn btn-default "  data-toggle="modal" data-target="#modaldata">view</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" id="opt3" name="opt-3" value="3">
                        <label for="opt3"></label>
                        </td>
                        <td>
                            Lorem ipsum
                        </td>
                        <td>
                            PG/Hostel
                        </td>
                        <td>
                            Lorem ipsum@Lorem.com
                        </td>
                        <td>
                            9999999999
                        </td>
                        <td>
                            Submitted
                        </td>
                        <td>
                            <div class="form-inline">
                                <button type="button" class="btn btn-default "  data-toggle="modal" data-target="#modaldata">view</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" id="opt4" name="opt-4" value="4">
                        <label for="opt4"></label>
                        </td>
                        <td>
                            Lorem ipsum
                        </td>
                        <td>
                            Lorem ipsum
                        </td>
                        <td>
                            Lorem ipsum@Lorem.com
                        </td>
                        <td>
                            9999999999
                        </td>
                        <td>
                            Submitted
                        </td>
                        <td>
                            <div class="form-inline">
                                <button type="button" class="btn btn-default "  data-toggle="modal" data-target="#modaldata">view</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" id="opt5" name="opt-5" value="5">
                        <label for="opt5"></label>
                        </td>
                        <td>
                            Lorem ipsum
                        </td>
                        <td>
                            Lorem ipsum
                        </td>
                        <td>
                            Lorem ipsum@Lorem.com
                        </td>
                        <td>
                            9999999999
                        </td>
                        <td>
                            Submitted
                        </td>
                        <td>
                            <div class="form-inline">
                                <button type="button" class="btn btn-default "  data-toggle="modal" data-target="#modaldata">view</button>
                            </div>
                        </td>
                    </tr>
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

       <!-- Modal for viewing data -->
  <div class="modal fade" id="modaldata" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">View</h6>
        </div>
        <div class="modal-body">
          <div class="row marzeros marbot10">
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
          </div>
          <div class="row marzeros marbot10">
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
          </div>
          <div class="row marzeros marbot10">
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-4">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
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
  
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.headlbl{
    color:#546E7A;
    font-size: 14px;
}
.contntdisp{
    font-size: 16px;
    color: #263238;
}
.marzeros{
    margin: 0px;
}
.marbot10{
    margin-bottom: 10px;
}
</style>