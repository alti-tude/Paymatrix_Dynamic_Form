<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Client_forms;
use \App\Agreement_form;
use \App\Archive_client_forms;
use \App\Archive_agreement_forms;

class FormsController extends Controller
{
    //
    public function index(){
      $forms = Client_forms::get();
      return response($forms,Response::HTTP_OK);
    }

    //This function is for storing the dynamic form data in the database
    public function store(Request $request){
      //rules for validating the request form
      $rules  = [
         'id'=>'required',
        'title'=>'required',
        'u_id'=>'required',
        'attr.*.fid'=>'required',
        'attr.*.label'=>'required',
        'attr.*.order_of_field'=>'required',
        'attr.*.field_type'=>'required',
        'attr.*.min'=>'integer|nullable',
        'attr.*.max'=>'integer|nullable',
      ];
      error_log($request);

      //this is for validating the data in case of any errors it return the error status
      $validator = \Validator::make($request->all(), $rules);
      if($validator->fails()){
        return response($validator->errors(),422);
      }
      //creating client form and storing it
      if($request->id==-1)
      {
        $new_form = new Client_forms;
        $new_form->form_status = "Draft";
        $new_form->form_name = $request->title;
        $new_form->Client_id = $request->u_id;
        $new_form->save();
      }
      else
      {
        $new_form = Client_forms::where('id',$request->id)->first();
          if($new_form != NULL)
          {
              $archive = new Archive_client_forms;
              $archive->form_name = $new_form->form_name;
              $archive->client_form_id = $new_form->id;
              $archive->Client_id = $new_form->Client_id;
              $archive->form_status = $new_form->form_status;
              $archive->save();
              $data = [];
              $data = $new_form->agreement_forms()->get();
              foreach($data as $r) {
                $af = new Archive_agreement_forms;
                $af->label = $r->label;
                $af->client_id = $archive->Client_id;
                $af->field_name = $r->field_name;
                $af->fid = $r->fid;
                $af->min = $r->min;
                $af->max = $r->max;
                $af->helpingText = $r->helpingText;
                $af->placeholder = $r->placeholder;
                $af->options = $r->options;
                $af->validations = $r->validations;
                $af->default_value = $r->default_value;
                $af->field_type = $r->field_type;
                $af->order_of_field = $r->order_of_field;
                $af->data_column = $r->data_column;
                $archive->agreement_forms()->save($af);
              }
              $new_form->agreement_forms()->delete();
              $new_form->update(['Client_id'=> $request->u_id,'form_name'=>$request->title]);
              //$new_form->delete();
          }
          else
          {
              return response("Not present",404);
          }
      }

      $k=1;
      $data_column = "col_";
      //this is for storing the form data which is a a collect of json-objects
      foreach($request->attr as $r){
        $af = new Agreement_form;
        $af->label = $r["label"];
        $af->fid = $r["fid"];
        $af->client_id = $request->u_id;
        if(array_key_exists("field_name",$r)) $af->field_name = $r["field_name"];
        if(array_key_exists("min",$r)) $af->min = $r["min"];
        if(array_key_exists("max",$r)) $af->max = $r["max"];
        if(array_key_exists("helpingText",$r)) $af->helpingText = $r["helpingText"];
        if(array_key_exists("placeholder",$r)) $af->placeholder = $r["placeholder"];
        //converting options array into string and storing in the database
        if(array_key_exists("options",$r))
        {
          if(count($r["options"])>0)
          {
            $req=$r["options"][0]; $del = ",";
            for($i = 1; $i < count($r["options"]); $i++) $req = $req.$del.$r["options"][$i];
            $af->options = $req;
          }
        }
        if(array_key_exists("default_value",$r)) $af->default_value = $r["default_value"];
        //converting validations array into string and storing in the database
        if(array_key_exists("validations",$r))
        {
          if(count($r["validations"])>0)
          {
            $val=$r["validations"][0]; $del = "|";
            for($i = 1; $i < count($r["validations"]); $i++) $val = $val.$del.$r["validations"][$i];
            $af->validations = $val;
          }
        }
        $af->field_type = $r["field_type"];
        $af->order_of_field = $r["order_of_field"];
        //assigns a data_column for every field
        $af->data_column = $data_column.$k;
        $k++;
        //save the form data
          $new_form->agreement_forms()->save($af);
      }

      //this is if this is editing request then we need to delete the prevoius one
      //for returning the form data back to frontend
      $data = $new_form;
      $data["attr"] = $new_form->agreement_forms()->get();
      return response($data->jsonSerialize(),Response::HTTP_CREATED);
    }




    //this is for displaying the form
    public function show(Client_forms $form){
      $data = $form;
      $data->attr = $form->agreement_forms()->get();
      return response($data,Response::HTTP_OK);
    }

    //this for destroying the form
    public function destroy(Client_forms $form){
      $form->agreement_forms()->delete();
      $form->delete();
      return "Hai";
    }

    //Adding the template to the given form
    public function addTemplate(Request $request, Client_forms $form){
        $data = $request->template;
        $data_cols = $form->agreement_forms()->pluck('data_column');
        $error=0;
        for($i = 0; $i < strlen($data); $i++)
        {

            if($data[$i]=="[" && $data[$i+1]=="[")
            {
                $s = "";
                for($j=$i+2;($data[$j]!="]" || $data[$j+1]!="]");$j++)
                {
                    if($j>=strlen($data)-2) { $error=1; break; }
                    else $s = $s.$data[$j];
                }
                $i = $j;
                $flag = 1;
                if(!$error)
                {
                    foreach($data_cols as $dc)
                    {
                        if(strcmp($dc,$s)==0) $flag = 0;
                    }
                    if($flag == 1) $error = 1;
                }
                else
                {
                    break;
                }
            }
        }
        if($error == 1) return response("Form not created according to required",422);
        else
        {
            $form->update(['template'=>$data]);
            return response("No Error & added Template",Response::HTTP_OK);
        }
    }
}
