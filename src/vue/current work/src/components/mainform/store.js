import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        formList:[],
        formID:0,
        count: 0,
        inputs: [
            {
                fid: 1,
                field_name: '',
                field_type: "inputtext",
                order_of_field: '',
                label: "Enter label name" ,
                placeholder: "Enter Placeholder text",
                helpingText: "Enter helping text",
                min: 0,
                max: 0,
                validations: {
                    email: false,
                    required: false,
                    numeric: false,
                }
            },
            {
                fid: 2,
                field_name: '',
                field_type: "textarea",
                order_of_field: '',
                label: "Textarea" ,
                placeholder: "Enter Placeholder text",
                helpingText: "Enter helping text",
                min: 0,
                max: 100,
                validations: {
                    required:false
                }
            },
            {
                fid:3,
                field_name: '',
                field_type: "date",
                order_of_field: '',
                label:"Date",
                helpingText:"Enter",
                validations:{
                    required:false
                }
            },
            {
                fid:4,
                field_name: 'da',
                field_type: "checkbox",
                default:[],
                order_of_field: '',
                label:"CheckBox",
                count:2,
                options:[],
                validations: {
                    required:false
                }
            },
            {
                fid:5,
                field_name: '',
                field_type: "radio",
                order_of_field: '',
                label:"Radio",
                default_value:"",
                count:2,
                options:[],
                validations: {
                    required: false
                }
            },
            {
                fid:6,
                field_name:'',
                field_type: "select",
                order_of_field: '',
                label: "Select",
                default_value:"",
                count:1,
                options:[],
                validations:{
                    required: false
                }
            },
            {
                fid:7,
                field_name:'',
                field_type:"fileupload",
                order_of_field:'',
                label: "Fileupload",
                default_value:"",
                options:[],
                validations:{
                    required:false
                }
            },
            {
                fid:8,
                field_name:'',
                field_type:"daterange",
                order_of_field:'',
                label: "Daterange",
                default_value:"",
                options:[],
                validations:{
                    required:false
                }
            }
        ]
    }
})
