<template>
<div>
    <h4 class="mt-0 mb-0">Account Types</h4>
    <p>Manage the type of account you want to use on {{ planData.basic.sitename }}</p>


    <div class="row no-gutters mt-3 mb-3">
        <div v-for="plan in planData.plans" class="col-xl-3 col-sm-6" >
            <div :class="['card',  'mb-xl-0',   planData.userPlan && planData.userPlan.id == plan.id ?  'bg-primary' : '']" style="background-color: rgba(var(--bs-primary-rgb),var(--bs-bg-opacity))!important;">
                <div class="card-body">
                    <div class="p-2">
                            <h5 :class="['font-size-16', planData.userPlan && planData.userPlan.id == plan.id ? 'text-white' : '']">
                                {{ plan.title }}</h5>
                            <h1 :class="['mt-3',  planData.userPlan && planData.userPlan.id == plan.id ? 'text-white' : '']">{{
                                planData.user.ccy.symbol }}{{ parseFloat(plan.rate).toFixed(planData.user.ccy.decimal_digits)}}</h1>
                            <div :class="['mt-4', 'pt-2',  planData.userPlan && planData.userPlan.id == plan.id ? 'text-white' : '']">
                                <p class="mb-3 font-size-15" v-for="value in plan.details"><i
                                        :class="['mdi', 'mdi-check-circle', planData.userPlan && planData.userPlan.id == plan.id ?  'text-light' : '', 'font-size-18', 'me-2']"></i>
                                    {{ value }}</p>
                            </div>
                            <div class="mt-4 pt-2">
                                <div v-if="!planData.userPlan" >
                                    <button type="button" id="upgrade-acc" @click="submitForm(plan)" class="btn btn-lg btn-outline-primary w-100">
                                        Upgrade Account Type <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                                <div v-else-if="planData.userPlan && planData.userPlan.id != plan.id" >
                                    <input type="hidden" name="plan_id" :value="plan.id"/>
                                    <button type="submit" @click="submitForm(plan)" class="btn btn-lg btn-outline-primary w-100">
                                        Upgrade Account Type <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                                <a v-else-if="planData.userPlan && planData.userPlan.id == plan.id && !planData.userPlan.is_paid" href="javascript::void()" class="btn btn-lg btn-outline-warning">
                                    Requested Account-Type
                                </a>
                                <a v-else-if="planData.userPlan && planData.userPlan.id == plan.id && planData.userPlan.is_paid" class="btn btn-lg btn-outline-info" href="javascript::void();">Active</a>
                                <a v-else href="javascript::void();" class="btn btn-lg btn-danger">
                                    Not Active
                                </a>
                            </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->


    </div>
</div>
</template>

<script>
import { isProxy, toRaw } from "vue";
import swal from 'sweetalert2';
window.Swal = swal;
$('#bootstrap-style')[0].href = '/userassets/css/bootstrap.min.css'

export default {
    data(){
        return {
            planData: {
                basic: { sitename: "Plan"},
                plans: []
            }
        }
    },
    methods: {
        fetchPlans(){
            axios.get("/user/fetch-plans").then(response => {
                if(response.type == 'success'){
                    this.planData = response.data;
                    if(this.planData.userPlan && !this.planData.userPlan.is_paid){
                        this.showUpgradeModal(this.planData.userPlan);
                    }
                    for(let plan of this.planData.plans){
                        plan['details']  = JSON.parse(plan['details'])
                    }
                }
            })
        },
        showUpgradeModal(plan){
            Swal.fire({
                title: "UPGRADE REQUESTED",
                text: `You have requested for an upgrade to ${plan.title}! Kindly make a deposit of ${parseFloat(plan.rate).toFixed(this.planData.user.ccy.decimal_digits)} to activate this plan!`,
                icon: "info",
                // buttons: ['Later', 'Deposit Now'],
                dangerMode: false,
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Deposit Now',
                // denyButtonText: `Don't save`,
                cancelButtonText: 'Later'
            })
            .then((willDelete) => {
                console.log(willDelete)
            if (willDelete.isConfirmed) {
                window.location.href = "/app/wallets";
                } else {
            }
            });
        },
        submitForm(plan){
            axios.post("/user/plan", {plan_id: plan.id}).then(response => {
                if(response.type == 'success'){
                    this.showUpgradeModal(plan)
                    this.planData.userPlan = plan
                }
            })
            console.log("preventDefault",plan)
        }
    },
    created() {
        $('#bootstrap-style')[0].href = '/userassets/css/bootstrap.min.css';
    },
    mounted() {
        this.fetchPlans();
    },
}
</script>