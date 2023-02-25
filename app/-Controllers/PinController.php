<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Pin;

use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Events\Events;

class PinController extends BaseController
{


    /**
     * Process a New Pin
     * @return Response
     */

    public function createPin()
    {
        $input = $this->getRequestInput($this->request);
        $rules = [
            'pin' => 'required|min_length[4]|integer',
        ];
        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        $pinModel = new Pin();
        $existPin =  $pinModel->where('user_id', CURRENT_USER['id'])->find();
        if ($existPin == null) {
            $pinData['pin'] = md5($input['pin']);
            $pinData['user_id'] =  CURRENT_USER['id'];
            $pinData['status'] = 1;
            $isSuccess = $pinModel->save($pinData);

            unset($pinData['pin']);
            $pinData['pin'] = $input['pin'];

            if ($isSuccess) {
                $sucess = $this->generateSuccess(lang('Pin.pin_saved_sucessfull'), $pinData);

                return $this
                    ->getResponse(
                        $sucess
                    );
            } else {

                $error = $this->generateError(lang('Pin.pin_not_saved'));
                return $this
                    ->getResponse(
                        $error,
                        ResponseInterface::HTTP_OK
                    );
            }
        } else {
            $error = $this->generateError(lang('Pin.pin_exist'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }

    /**
     *  Verify Pin to procces withdraw
     * @return Response
     */

public function verifyPin(){
    $input = $this->getRequestInput($this->request);
    $rules = [
        'pin' => 'required|min_length[4]|integer',
    ];
    if (!$this->validateRequest($input, $rules)) {
        $error = $this->generateError($this->validator->getErrors());
        return $this
            ->getResponse(
                $error,
                ResponseInterface::HTTP_OK
            );
    }
    $pinModel = new Pin();
    $pinInfo =  $pinModel->where('user_id', CURRENT_USER['id'])->first();
   
    if($pinInfo && (md5($input['pin']) == $pinInfo['pin'])){
        unset($pinInfo['updated_at']);
        unset($pinInfo['status']);
        $pinInfo['pin']=$input['pin'];

        $sucess = $this->generateSuccess(lang('Pin.pin_match'), $pinInfo);

        return $this
            ->getResponse(
                $sucess
            );
    } else {

        $error = $this->generateError(lang('Pin.pin_not_match'));
        return $this
            ->getResponse(
                $error,
                ResponseInterface::HTTP_OK
            );
      }
  
}


    
}
