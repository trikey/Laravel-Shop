<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\PaySystem;

class PaySystemRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */

    public function rules()
    {
        $id = '';
        if ($this->get('code')) {
            $paySystem = PaySystem::findByCode($this->get('code'))->first();
            if ($paySystem) {
                $id = ','.$paySystem->id;
            }
        }
        return [
            'name' => 'required',
            'preview_picture' => 'mimes:jpeg,png,jpg',
            'code' => 'required|unique:blog,code'.$id
        ];
    }

}
