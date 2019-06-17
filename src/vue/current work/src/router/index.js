import Vue from 'vue'
import Router from 'vue-router'
import dashboard from '@/components/dashboard/dashboard'
import form1 from '@/components/mainform/form1'
import form2 from '@/components/mainform/form2'
import form3 from '@/components/mainform/form3'
import form4 from '@/components/mainform/form4'
import form5 from '@/components/mainform/form5'
import page1 from '@/components/dashboard/page1'
import page2 from '@/components/dashboard/page2'
import agreement from '@/components/dashboard/agreements'
import template from '@/components/dashboard/templates'
import admindetail from '@/components/dashboard/admindetails'
import agreementview from '@/components/agreementview/agreementview'
import inputtext from '@/components/mainform/inputcomponent/inputtext'
import inputselect from '@/components/mainform/inputcomponent/inputselect'
import inputcheckbox from '@/components/mainform/inputcomponent/inputcheckbox'
import inputradio from '@/components/mainform/inputcomponent/inputradio'
import inputtextarea from '@/components/mainform/inputcomponent/inputtextarea'
import inputdate from '@/components/mainform/inputcomponent/inputdate'
import inputdaterange from '@/components/mainform/inputcomponent/inputdaterange'
import inputfileupload from '@/components/mainform/inputcomponent/inputfileupload'
import tenantForm from '@/components/mainform/tenantForm'
Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component:dashboard,
      children:[
        {
          path: '/page1',
          name: 'page1',
          component:page1
        },
        {
          path: '/page2',
          name: 'page2',
          component:page2
        },
        {
          path: '/agreements',
          name: 'agreement',
          component:agreement
        },
        {
          path: '/templates',
          name: 'template',
          component:template
        },
        {
          path: '/admindetails',
          name: 'admindetail',
          component:admindetail
        }
      ]
    },
    {
      path: '/form1',
      name: 'form1',
      component:form1
    },
    {
      path: '/form2',
      name: 'form2',
      component:form2,
        children: [
          {
              path: "/inputtext",
              name: "inputtext",
              component: inputtext
          },
          {
            path: "/inputselect",
            name: "inputselect",
            component: inputselect
          },
          {
            path: "/inputcheckbox",
            name: "inputcheckbox",
            component: inputcheckbox
          },
          {
            path: "/inputradio",
            name: "inputradio",
            component: inputradio
          },
          {
            path: "/inputtextarea",
            name: "inputtextarea",
            component: inputtextarea
          },
          {
            path: "/inputdate",
            name: "inputdate",
            component: inputdate
          },
          {
            path: "/inputdaterange",
            name: "inputdaterange",
            component: inputdaterange
          },
          {
            path: "/inputfileupload",
            name: "inputfileupload",
            component: inputfileupload
          },
      ]
    },
    {
      path: '/form3',
      name: 'form3',
      component:form3
    },
    {
      path: '/form4',
      name: 'form4',
      component:form4
    },
    {
      path: '/form5',
      name: 'form5',
      component:form5
    },
    {
      path: '/agreementview',
      name: 'agreementview',
      component:agreementview
    },
    {
      path: '/tenantform',
      name: 'tenantform',
      component: tenantForm
    },
  ]
})
