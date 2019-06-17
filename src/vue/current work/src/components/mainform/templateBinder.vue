<template>
    <div>
        templateBinder--------
        <span v-html="output"></span>
    </div>
</template>


<script>
import VueLodash from 'vue-lodash'

export default {
    name: 'templateBinder',
    props:[
        "formVals",
        "template"
    ],
    data(){
        return{
            output: ''
        };
    },
    created(){
        this.updateTemplate()
        this.debouncedUpdateTemplate = this._.debounce(this.updateTemplate, 50)
    },
    methods:{
        updateTemplate(){
            this.output = ''
            for(let i=0;i<this.template.length;i++)
            {
                if(this.template[i].isPlaceholder) this.template[i].value = '<u>' + this.formVals[this.template[i].index] + '</u>'
                this.output = this.output + this.template[i].value
            }

        }
    },
    watch: {

        formVals: function(){
            this.debouncedUpdateTemplate()
            //implement debouncing maybe
            
        }
    },
}
</script>
