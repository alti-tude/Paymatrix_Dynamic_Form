<template>
 <div class="sidebar" data-background-color="white" data-active-color="customblue">
		<div class="sidebar-wrapper">
            <div class="logo">
                <!-- <a href="" class="simple-text">
                    Creative Tim
                </a> -->
                <a href="">
                <img src="../../assets/paymatrix-logo.png" style="width:80%;" alt="">
                </a>
            </div>

            <ul class="nav" id="sidemainnav">
                <li class="active">
                    <router-link :to="{ name: 'page1' }">
                        <i class="fas fa-chart-line"></i>
                        <p>Dashboard</p>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'page2' }">
                        <i class="far fa-file-alt"></i>
                        <p>Invoice</p>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'page1' }">
                        <i class="far fa-building"></i>
                        <p>Inventory</p>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'page1' }">
                        <i class="far fa-address-book"></i>
                        <p>Members</p>
                    </router-link>
                </li>
                <li>
                   <router-link :to="{ name: 'page1' }">
                        <i class="fas fa-exchange-alt"></i>
                        <p>Transactions</p>
                   </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'page1' }">
                        <i class="far fa-user"></i>
                        <p>Profile</p>
                    </router-link>
                </li>
                <li>
						<a data-toggle="collapse" href="#formsExamples" class="navaccord" aria-expanded="true">
	                        <i class="fas fa-exchange-alt"></i>
	                        <p>
								Rent agreements
	                           <b class="caret caretaccd"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="formsExamples" aria-expanded="true" style="">
							<ul class="nav" style="margin-top:0px;font-weight:400;">
								<li>
									<router-link :to="{ name: 'agreement' }">
										<span class="sidebar-normal">Agreements</span>
									</router-link>
								</li>
								<li>
									<router-link :to="{ name: 'template' }">
										<span class="sidebar-normal">Templates</span>
									</router-link>
								</li>
								<li>
									<router-link :to="{ name: 'admindetail' }">
										<span class="sidebar-normal">Admin details</span>
									</router-link>
								</li>
	                        </ul>
	                    </div>
	                </li>
            </ul>
    	</div>
    </div>
</template>


<script>
export default {
  name: 'sidemenu',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
 .navaccord{
     margin-bottom: 0px;
 }
 .caretaccd{
    float: right;
    margin-top: 14px;
    margin-right: 6px;
 }

</style>
