<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GeneralSettingRequest;
use App\Http\Requests\MailSettingRequest;
use App\Models\Backend\Admin\Settings;
use Auth;
use App\Traits\UploadAble;

class SettingController extends Controller
{
    use UploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( Auth::user()->role == 'admin' )
        {
            $zones_array = [];
            $timestamp = time();
            foreach (timezone_identifiers_list() as $key => $zone) {
                date_default_timezone_set($zone);
                $zones_array[$key]['zone'] = $zone;
                $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT '.date('P',$timestamp);
            }
            return view('Backend.Admin.settings',compact('zones_array'));
            
        } else {
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generelsetting(GeneralSettingRequest $request)
    {
        //
        if( $request->ajax() )
        {
            try {
                $collection = collect($request->validated())->except(['logo','favicon']);
                foreach ($collection->all() as $key => $value) {
                    Settings::set($key,$value);
                    if ($key == 'timezone') {
                        if(!empty($value)){
                            $this->changeEnvData(['APP_TIMEZONE' => $value]);
                        }
                    }

                }

                if($request->hasFile('logo')){
                    $logo = $this->upload_file($request->file('logo'),LOGO_PATH);
                    if(!empty($request->old_logo)){
                        $this->delete_file($request->old_logo,LOGO_PATH);
                    }
                    Settings::set('logo',$logo);
                }
                if($request->hasFile('adminlogo')){
                    $logo = $this->upload_file($request->file('adminlogo'),LOGO_PATH);
                    if(!empty($request->old_adminlogo)){
                        $this->delete_file($request->old_adminlogo,LOGO_PATH);
                    }
                    Settings::set('adminlogo',$logo);
                }
                if($request->hasFile('favicon')){
                    $favicon = $this->upload_file($request->file('favicon'),LOGO_PATH);
                    if(!empty($request->old_favicon)){
                        $this->delete_file($request->old_favicon,LOGO_PATH);
                    }
                    Settings::set('favicon',$favicon);
                }
                if($request->hasFile('adminfavicon')){
                    $favicon = $this->upload_file($request->file('adminfavicon'),LOGO_PATH);
                    if(!empty($request->old_adminfavicon)){
                        $this->delete_file($request->old_adminfavicon,LOGO_PATH);
                    }
                    Settings::set('adminfavicon',$favicon);
                }

                $output = ['status'=>'success','message'=>'ডাটা সেভ সম্পন্ন হয়েছে!'];
                return response()->json($output);
            } catch (\Exception $e) {
                $output = ['status'=>'error','message'=> $e->getMessage()];
                return response()->json($output);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mailsetting(MailSettingRequest $request)
    {
        //
        if($request->ajax())
        {
            try {
                $collection = collect($request->validated());
                foreach ($collection->all() as $key => $value) {
                    Settings::set($key,$value);
                }

                $this->changeEnvData([
                    'MAIL_MAILER'     => $request->mail_mailer,
                    'MAIL_HOST'       => $request->mail_host,
                    'MAIL_PORT'       => $request->mail_port,
                    'MAIL_USERNAME'   => $request->mail_username,
                    'MAIL_PASSWORD'   => $request->mail_password,
                    'MAIL_ENCRYPTION' => $request->mail_encryption,
                    'MAIL_FROM_NAME'  => $request->mail_from_name
                ]);
                $output = ['status'=>'success','message'=>'Data Has Been Saved Successfully'];
                return response()->json($output);
            } catch (\Exception $e) {
                $output = ['status'=>'error','message'=> $e->getMessage()];
                return response()->json($output);
            }
            
        }
    }

    protected function changeEnvData(array $data)
    {
        if(count($data) > 0){
            $env = file_get_contents(base_path().'/.env');
            $env = preg_split('/\s+/',$env);

            foreach ($data as $key => $value) {
                foreach ($env as $env_key => $env_value) {
                    $entry = explode("=",$env_value,2);
                    if($entry[0] == $key){
                        $env[$env_key] = $key."=".$value;
                    }else{
                        $env[$env_key] = $env_value;
                    }
                }
            }
            $env = implode("\n",$env);

            file_put_contents(base_path().'/.env',$env);
            return true;
        }else {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
