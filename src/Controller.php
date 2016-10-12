<?php
namespace Walthere\UEditor;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Walthere\UEditor\Uploader;

class Controller extends BaseController
{
    public function server(Request $request)
    {
        $config = config('UEditor');
        $action = $request->input('action');
        switch ($action) {
            case 'config':
                $result = $config;
                break;
            /* 上传图片 */
            case 'uploadimage':
                /* 上传文件 */
            case 'uploadfile':
                $result = $this->uploadFile($config, $action);
                break;
            default:
                $result = json_encode(array(
                    'state' => '请求地址出错'
                ));
                break;
        }


        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);

    }


    public function uploadFile($config, $action)
    {
        /* 上传配置 */
        $base64 = "upload";
        switch ($action) {
            case 'uploadimage':
                $uploadConfig = array(
                    "pathFormat" => $config['imagePathFormat'],
                    "maxSize" => $config['imageMaxSize'],
                    "allowFiles" => $config['imageAllowFiles']
                );
                $fieldName = $config['imageFieldName'];
                break;
            case 'uploadfile':
            default:
                $uploadConfig = array(
                    "pathFormat" => $config['filePathFormat'],
                    "maxSize" => $config['fileMaxSize'],
                    "allowFiles" => $config['fileAllowFiles']
                );
                $fieldName = $config['fileFieldName'];
                break;
        }

        /* 生成上传实例对象并完成上传 */


        $up = new Uploader($fieldName, $uploadConfig, $base64);

        /**
         * 得到上传文件所对应的各个参数,数组结构
         * array(
         *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
         *     "url" => "",            //返回的地址
         *     "title" => "",          //新文件名
         *     "original" => "",       //原始文件名
         *     "type" => ""            //文件类型
         *     "size" => "",           //文件大小
         * )
         */

        /* 返回数据 */
        return $up->getFileInfo();
    }


}

