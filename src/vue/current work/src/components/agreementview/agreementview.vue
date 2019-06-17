<template>
<div>
  <div class="mar0_15">
    <span class="fonweigh700" style="float:right;"><a>X</a></span>
    <h4 class="fonweigh700">Agreement view</h4>
    <hr style="border-color:#EEEEEE;">
  </div>
<div class="mainfomlayout">
    <br class="hidden-xs">
    <div class="respmrgn1">
   <router-link :to="{ name: 'agreement' }"> <a class="custback" style="display: inline-block;margin: 10px 0px;"><i class="fas fa-chevron-left"></i>&nbsp;Back</a></router-link>
    <button type="button" class="btn  drcblubtn pull-right">Download .pdf</button>
    </div>
    <div class="agrmtbdr">
        <p class="fon14">LEAVE AND LICENSE AGREEMENT
This Rent Agreement is made and executed on at Hyderabad , on 1 September, 2018 BETWEEN:

Shri Narashimha, male aged about 28.Years, with Mobile number 9663610951, PAN ANTPN4587G residing at GAGANA, S/o Vishnu Naik, Near keni bridge, Honnekeri.

Shri , aged about .Years, with Mobile number , PAN residing at .


HEREINAFTER called the LICENSOR or LANDLORD (which expression shall mean and include the Licensor/s named above and also his/her respective heirs, representatives, executors, successors etc.)

AND:

Shri suraj, male aged about 23.Years, with Mobile number 9876543210, PAN ANTPN7672H residing at Suraj Naik, Paymatrix, Ground Floor, CIE Building, IIIT-H, in front of TCS.

Shri suraj, aged about .Years, with Mobile number 9876543210, PAN ANTPN7672H residing at .

HEREINAFTER called the LICENSEE or TENANT (which expression shall mean and include the Licensee/s named above and also his/her respective heirs, representatives, executors, successors etc.)

Whereas the LANDLORD is the sole and absolute owner of the APARTMENT with address 1 , 1 , sdfsa , ankola , ankola , Telangana. hereinafter referred to as “The Premises”

AND WHEREAS the TENANT has requested the LANDLORD to let-out the said premises on rent for 3. Months and for which the LANDLORD has agreed to letout the same on below terms and conditions.

NOW IT IS AGREED BY AND BETWEEN THE PARTIES HERETO AS FOLLOWS:
This Rental Deed is for a period of 3 . months only, commencing from 4 September, 2018(Date of Possession).
The Tenant agrees to pay Landlord a sum of Rs.23333. per month, on or before 12 day of every month without failure.
The Tenant has paid a sum of Rs23333. as rental deposit to be refunded at the time of vacating the premises.
The Tenant shall not sub-let any portion of the rental premises to any other person or persons without prior written permission of the OWNER
The Tenant shall not alter repair or change the present premises without written permission of the Owner.
The Tenant shall not damage the let out premises or any portion thereof. The Landlord is entitled to recover such damages and its costs from the Tenant.
The Tenant should keep the premises tidy and clean enough to the best hygiene standards.
The Tenant shall have to pay the electricity bills/water charges etc for his/her share of this tenancy as per the bills received or as applicable.
If the premise is to be vacated, propelled, by the Tenant or the Landlord as the case may be, the concerned party has to give a notice period of 2 days to counter party.
The Tenant shall not use the said premises for any illegal activities or to store any contraband or explosive substances.</p>
    </div>
    <br>
 <div class="row marzeros marbot10">
              <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
          </div>
           <div class="row marzeros marbot10">
               <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
              <div class="col-sm-3">
                  <p class="headlbl">Lorem ipsum</p><p class="contntdisp">Lorem ipsum text</p>
              </div>
          </div>
          <div class="row marzeros marbot10">
               <div class="col-sm-12">
                  <p class="headlbl">Update agreement status</p><p class="contntdisp"><button type="button" class="btn btngry ">Printed</button> <span><a href="" style="margin: 0px 10px;">Close</a></span> </p>
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
.drcblubtn{
    background: #0071bc;
    color: #ffffff;
}
.agrmtbdr{
    max-width: 1000px;
    padding: 10px 15px;
    margin: 0px auto;
    border: 1px solid #DFDFDF;
    border-radius: 5px;
    height: 300px;
    overflow-y: scroll;
}
.fon14{
    font-size: 14px;
}
.btngry{
    background: #D6D8D9;
    color: #263238;
    padding: 8px 30px;
}
.respmrgn1{
        margin-bottom: 10px;
}
@media only screen and (max-width: 767px){
    .respmrgn1{
        margin: 0px 15px;
    }
}
</style>