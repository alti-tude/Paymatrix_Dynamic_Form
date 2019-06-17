<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use App\Services\Validators\ArticleValidator;
use Input, Notification, Redirect, Sentry, Str;
use App\Http\Requests;
use App\Client_forms;
use App\Template_data;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Http\Response;
use PDF;
use File;
// use App\Services\Pdf;
class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function pdfStore(Request $request,Client_forms $form)
    {
      $data = $form->template;
      $req_data = $request->all();
      $data_cols = $form->agreement_forms()->get();
      $rules  = [];

      //This loop to add validations which are provided
      foreach($data_cols as $dc)
      {
          $rules[$dc->data_column] = $dc->validations;
          if($rules[$dc->data_column]==NULL) $rules[$dc->data_column]="";
          if(strpos($rules[$dc->data_column],'numeric')!==false)
          {
              if($dc->min!=NULL && $dc->max!=NULL)
              {
                  $rules[$dc->data_column] = $rules[$dc->data_column]."|digits_between:";
                  $rules[$dc->data_column] = $rules[$dc->data_column]."{$dc->min},";
                  $rules[$dc->data_column] = $rules[$dc->data_column]."{$dc->max}";
              }
              else if($dc->max!=NULL)
              {
                  $rules[$dc->data_column] = $rules[$dc->data_column]."|digits:";
                  $rules[$dc->data_column] = $rules[$dc->data_column]."{$dc->max}";
              }
              else if($dc->min!=NULL)
              {
                  $rules[$dc->data_column] = $rules[$dc->data_column]."|digits:";
                  $rules[$dc->data_column] = $rules[$dc->data_column]."{$dc->min}";
              }
          }
          else
          {
              if($dc->min!=NULL)
              {
                  $rules[$dc->data_column] = $rules[$dc->data_column]."|min:";
                  $rules[$dc->data_column] = $rules[$dc->data_column]."{$dc->min}";
              }
              if($dc->max!=NULL)
              {
                  $rules[$dc->data_column] = $rules[$dc->data_column]."|max:";
                  $rules[$dc->data_column] = $rules[$dc->data_column]."{$dc->max}";
              }
          }
      }
      //foreach($rules as $r) error_log($r);
      //-------------------------------------------------------------------------------

      //This checks the validations and returns if there is any validation error
      $validator = \Validator::make($request->all(), $rules);
      if($validator->fails()){
        return response($validator->errors(),422);
      }
      //-------------------------------------------------------------------------------

      //This replaces the required string with the [[col_i]] parts of the template
      foreach($data_cols as $dc)
      {
          $word_to_replace = "[[".$dc->data_column."]]";
          $data = str_replace($word_to_replace,$req_data[$dc->data_column],$data);
      }
      //--------------------------------------------------------------------------------------------------

      //This commented part is if the template still contains double square brackets to throw an error
      // for($i = 0; $i < strlen($data); $i++)
      // {
      //     if($data[$i]=="[" && $data[$i+1]=="["){ return response("Error",422); }
      // }
      //-------------------------------------------------------------------------------
      $present = Template_data::where(['client_form_id' => $form->id,'user_id' => $request->uid])->first();
      if($present != NULL)
      {
          $path = $present->Link;
          $req = parse_url($path);
          File::delete(public_path($req['path']));
          $present->delete();
      }
      $template_data = new Template_data;
      //This adds the data sent to our database for further usage
      if(array_key_exists("col_1",$req_data)) $template_data->col_1=$req_data["col_1"];
      if(array_key_exists("col_2",$req_data)) $template_data->col_2=$req_data["col_2"];
      if(array_key_exists("col_3",$req_data)) $template_data->col_3=$req_data["col_3"];
      if(array_key_exists("col_4",$req_data)) $template_data->col_4=$req_data["col_4"];
      if(array_key_exists("col_5",$req_data)) $template_data->col_5=$req_data["col_5"];
      if(array_key_exists("col_6",$req_data)) $template_data->col_6=$req_data["col_6"];
      if(array_key_exists("col_7",$req_data)) $template_data->col_7=$req_data["col_7"];
      if(array_key_exists("col_8",$req_data)) $template_data->col_8=$req_data["col_8"];
      if(array_key_exists("col_9",$req_data)) $template_data->col_9=$req_data["col_9"];
      if(array_key_exists("col_10",$req_data)) $template_data->col_10=$req_data["col_10"];
      if(array_key_exists("col_11",$req_data)) $template_data->col_11=$req_data["col_11"];
      if(array_key_exists("col_12",$req_data)) $template_data->col_12=$req_data["col_12"];
      if(array_key_exists("col_13",$req_data)) $template_data->col_13=$req_data["col_13"];
      if(array_key_exists("col_14",$req_data)) $template_data->col_14=$req_data["col_14"];
      if(array_key_exists("col_15",$req_data)) $template_data->col_15=$req_data["col_15"];
      if(array_key_exists("col_16",$req_data)) $template_data->col_16=$req_data["col_16"];
      if(array_key_exists("col_17",$req_data)) $template_data->col_17=$req_data["col_17"];
      if(array_key_exists("col_18",$req_data)) $template_data->col_18=$req_data["col_18"];
      if(array_key_exists("col_19",$req_data)) $template_data->col_19=$req_data["col_19"];
      if(array_key_exists("col_20",$req_data)) $template_data->col_20=$req_data["col_20"];
      if(array_key_exists("col_21",$req_data)) $template_data->col_21=$req_data["col_21"];
      if(array_key_exists("col_22",$req_data)) $template_data->col_22=$req_data["col_22"];
      if(array_key_exists("col_23",$req_data)) $template_data->col_23=$req_data["col_23"];
      if(array_key_exists("col_24",$req_data)) $template_data->col_24=$req_data["col_24"];
      if(array_key_exists("col_25",$req_data)) $template_data->col_25=$req_data["col_25"];
      if(array_key_exists("col_26",$req_data)) $template_data->col_26=$req_data["col_26"];
      if(array_key_exists("col_27",$req_data)) $template_data->col_27=$req_data["col_27"];
      if(array_key_exists("col_28",$req_data)) $template_data->col_28=$req_data["col_28"];
      if(array_key_exists("col_29",$req_data)) $template_data->col_29=$req_data["col_29"];
      if(array_key_exists("col_30",$req_data)) $template_data->col_30=$req_data["col_30"];
      if(array_key_exists("col_31",$req_data)) $template_data->col_31=$req_data["col_31"];
      if(array_key_exists("col_32",$req_data)) $template_data->col_32=$req_data["col_32"];
      if(array_key_exists("col_33",$req_data)) $template_data->col_33=$req_data["col_33"];
      if(array_key_exists("col_34",$req_data)) $template_data->col_34=$req_data["col_34"];
      if(array_key_exists("col_35",$req_data)) $template_data->col_35=$req_data["col_35"];
      if(array_key_exists("col_36",$req_data)) $template_data->col_36=$req_data["col_36"];
      if(array_key_exists("col_37",$req_data)) $template_data->col_37=$req_data["col_37"];
      if(array_key_exists("col_38",$req_data)) $template_data->col_38=$req_data["col_38"];
      if(array_key_exists("col_39",$req_data)) $template_data->col_39=$req_data["col_39"];
      if(array_key_exists("col_40",$req_data)) $template_data->col_40=$req_data["col_40"];
      $template_data->client_form_id = $form->id;
      $template_data->user_id = $req_data["uid"];
      $html = $data;
      $template_data->save();
      //-------------------------------------------------------------------------------
      //This generates a pdf out of the given content
      PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
      $pdf = PDF::loadHTML($html);
      $content = $pdf->output();
      file_put_contents("../storage/app/public/{$form->id}-{$template_data->created_at}.pdf", $content);
      $req_path = asset("storage/{$form->id}-{$template_data->created_at}.pdf");
      // $template_data->Link = $req_path;
      $template_data->update(['Link' => $req_path]);
      error_log($template_data);
      //return response(asset("storage/{$form->id}-{$template_data->created_at}.pdf"),200);
      return response($req_path,Response::HTTP_OK);
      /*---------------------------This commented part is if hashing is required for the file name--------------------*/
      //$hash = "";
      //$hash = $hash.$form->id.$template_data->created_at;
      //$hash = Hash::make($hash);
      //file_put_contents("../storage/app/public/{$hash}.pdf", $content);
      //$template_data->save();
      //error_log(asset('storage/{$form->id}-{$template_data->timestamps}.pdf'));
      //return response(asset("storage/{$hash}.pdf"),200);
      //return "HAII";
    }


    //-------------------------------------------------------------------------------
    //this for only view pdf instaed of storing in backend currently not working
    public function pdfview(Request $request,Client_forms $form)
    {
      /* Load the html from backend */
        $data = $form->template;
        $req_data = $request->all();
        $data_cols = $form->agreement_forms()->pluck('data_column');
        foreach($data_cols as $dc)
        {
            $word_to_replace = "[[".$dc."]]";
            $data = str_replace($word_to_replace,$req_data[$dc],$data);
        }
        $html = $data;
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadHTML($html);
        $content = $pdf->output();
        //file_put_contents('../storage/app/public/test.pdf', $content);
        //error_log(asset('storage/test.pdf'));
        //return response(asset('storage/test.pdf'),200);
        return response($content,200)->withHeaders([
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "'inline'; filename='invoice.pdf'",
        ]);
        //return $pdf->stream('pdfview.pdf');
    }
}
